<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Models\Topik;
use App\Models\Laporan;
use App\Models\Daftar_Laporan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanContrller extends Controller
{
    /**
     * ============================================================
     * DAFTAR LAPORAN PMM
     * ============================================================
     *
     * Guru       : melihat PMM miliknya sendiri
     * Pengawas   : melihat seluruh PMM Guru
     * Admin      : melihat seluruh PMM Guru
     * SuperAdmin : melihat seluruh PMM Guru
     */
    public function index()
    {
        $user = Auth::user();


        $query = Laporan::with([
            'guru',
            'topik',
            'daftarLaporan.modul',
            'pemeriksa',
        ]);

        /*
|--------------------------------------------------------------------------
| GURU HANYA MELIHAT PMM MILIKNYA
|--------------------------------------------------------------------------
*/
        if ($user->hasRole('guru')) {
            $query->where(
                'guru_id',
                $user->guru_id
            );
        }

        /*
|--------------------------------------------------------------------------
| SEARCH
|--------------------------------------------------------------------------
*/
        if (request('cari')) {

            $cari = request('cari');

            $query->where(function ($q) use ($cari) {

                $q->whereHas('guru', function ($guru) use ($cari) {

                    $guru->where(
                        'nama_guru',
                        'like',
                        '%' . $cari . '%'
                    );
                })
                    ->orWhereHas('topik', function ($topik) use ($cari) {

                        $topik->where(
                            'nama_topik',
                            'like',
                            '%' . $cari . '%'
                        )
                            ->orWhere(
                                'judul_topik',
                                'like',
                                '%' . $cari . '%'
                            );
                    });
            });
        }

        $laporan = $query
            ->orderByDesc('id')
            ->get();

        return view('admin.laporan.index', [

            'dataLap' => $laporan,

            'rekapLap' => $laporan,

        ]);
    }


    /**
     * ============================================================
     * BUAT PMM
     * ============================================================
     *
     * Hanya Guru yang dapat membuat PMM.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | HANYA GURU
        |--------------------------------------------------------------------------
        */
        if (!$user->hasRole('guru')) {
            abort(
                403,
                'Hanya Guru yang dapat membuat laporan PMM.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | CEK HUBUNGAN DENGAN DATA GURU
        |--------------------------------------------------------------------------
        */
        if (!$user->guru_id) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Akun Guru belum terhubung dengan data Guru.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | AMBIL TOPIK
        |--------------------------------------------------------------------------
        */
        $dataTopik = Topik::orderBy('id')->get();

        /*
        |--------------------------------------------------------------------------
        | BUAT PMM
        |--------------------------------------------------------------------------
        */
        foreach ($dataTopik as $topik) {

            Laporan::firstOrCreate(
                [
                    'guru_id' => $user->guru_id,
                    'topik_id' => $topik->id,
                ],
                [
                    'status_pemeriksaan' => 'belum diperiksa',
                ]
            );
        }

        return redirect()
            ->back()
            ->with(
                'success',
                'Laporan PMM berhasil dibuat.'
            );
    }


    /**
     * ============================================================
     * DETAIL PMM
     * ============================================================
     */
    public function view(Laporan $laporan)
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | GURU HANYA BOLEH MELIHAT MILIK SENDIRI
        |--------------------------------------------------------------------------
        */
        if ($user->hasRole('guru')) {

            if ($laporan->guru_id != $user->guru_id) {

                abort(
                    403,
                    'Anda tidak memiliki akses ke laporan Guru lain.'
                );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | INFORMASI GURU + TOPIK
        |--------------------------------------------------------------------------
        */
        $title = DB::table('laporan')
            ->join(
                'guru',
                'guru.id',
                '=',
                'laporan.guru_id'
            )
            ->join(
                'topik',
                'topik.id',
                '=',
                'laporan.topik_id'
            )
            ->where(
                'laporan.id',
                $laporan->id
            )
            ->select(
                'laporan.id',
                'laporan.guru_id',
                'laporan.topik_id',
                'laporan.status_pemeriksaan',
                'laporan.catatan_pemeriksaan',
                'laporan.diperiksa_oleh',
                'laporan.diperiksa_at',
                'guru.nama_guru',
                'topik.nama_topik',
                'topik.judul_topik'
            )
            ->first();

        /*
        |--------------------------------------------------------------------------
        | DATA MODUL
        |--------------------------------------------------------------------------
        */
        $dataModel = Modul::query()

            ->leftJoin(
                'daftar_laporan',
                function ($join) use ($laporan) {

                    $join->on(
                        'daftar_laporan.modul_id',
                        '=',
                        'modul.id'
                    );

                    $join->where(
                        'daftar_laporan.laporan_id',
                        '=',
                        $laporan->id
                    );
                }
            )

            ->where(
                'modul.topik_id',
                $laporan->topik_id
            )

            ->select([
                'modul.id',
                'modul.topik_id',
                'modul.nama_modul',
                'modul.judul_modul',
            'daftar_laporan.keterangan',
            'daftar_laporan.laporan_id',
            ])

            ->orderBy('modul.id')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | DATA PENGAWAS
        |--------------------------------------------------------------------------
        */
        $pengawas = null;

        if ($laporan->diperiksa_oleh) {

            $pengawas = DB::table('users')
                ->where(
                    'id',
                    $laporan->diperiksa_oleh
                )
                ->first();
        }

        return view(
            'admin.laporan.view',
            compact(
                'laporan',
                'dataModel',
                'title',
                'pengawas'
            )
        );
    }


    /**
     * ============================================================
     * SIMPAN STATUS MODUL PMM
     * ============================================================
     *
     * Hanya Guru yang boleh mengubah status modul.
     */
    public function Lap(Request $request, $id)
    {
        $user = Auth::user();

        $laporan = Laporan::with([
            'guru',
            'topik',
            'daftarLaporan.modul',
        ])->findOrFail($id);


        /*
    |--------------------------------------------------------------------------
    | GURU
    |--------------------------------------------------------------------------
    */

        if ($user->hasRole('guru')) {

            // Guru hanya boleh mengubah laporan miliknya sendiri
            if ($laporan->guru_id != $user->guru_id) {
                abort(403, 'Anda tidak memiliki akses ke laporan ini.');
            }

            $request->validate([
                'keterangan' => 'required|array',
                'keterangan.*' => 'required|in:tuntas,belum tuntas',
            ]);

            foreach ($request->keterangan as $modulId => $keterangan) {

                Daftar_Laporan::updateOrCreate(
                    [
                        'laporan_id' => $laporan->id,
                        'modul_id' => $modulId,
                    ],
                    [
                        'keterangan' => $keterangan,
                    ]
                );
            }

            return redirect()
                ->route('laporan-pmm', $laporan->id)
                ->with('success', 'Laporan PMM berhasil diperbarui.');
        }


        /*
    |--------------------------------------------------------------------------
    | PENGAWAS
    |--------------------------------------------------------------------------
    */

        if ($user->hasRole('pengawas')) {

            if ($request->aksi !== 'periksa') {
                abort(403, 'Aksi tidak diperbolehkan.');
            }

            $request->validate([
                'status_pemeriksaan' => [
                    'required',
                    'in:Diperiksa,Disetujui,Perlu Perbaikan',
                ],

                'catatan_pemeriksaan' => [
                    'nullable',
                    'string',
                    'max:5000',
                ],
            ]);


            $laporan->update([
                'status_pemeriksaan' => $request->status_pemeriksaan,
                'catatan_pemeriksaan' => $request->catatan_pemeriksaan,
                'diperiksa_oleh' => $user->id,
                'diperiksa_at' => now(),
            ]);


            return redirect()
                ->route('laporan-pmm', $laporan->id)
                ->with('success', 'Pemeriksaan laporan PMM berhasil disimpan.');
        }


        /*
    |--------------------------------------------------------------------------
    | ADMIN / SUPER ADMIN
    |--------------------------------------------------------------------------
    */

        abort(403, 'Anda tidak memiliki hak untuk mengubah laporan.');
    }

    /**
     * ============================================================
     * PEMERIKSAAN PMM OLEH PENGAWAS
     * ============================================================
     *
     * Hanya Pengawas yang boleh memeriksa PMM.
     */
    public function periksa(Request $request, Laporan $laporan)
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | HANYA PENGAWAS
        |--------------------------------------------------------------------------
        */
        if (!$user->hasRole('pengawas')) {

            abort(
                403,
                'Hanya Pengawas yang dapat memeriksa PMM.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */
        $request->validate([
            'status_pemeriksaan' => [
                'required',
                'in:disetujui,perlu perbaikan',
            ],

            'catatan_pemeriksaan' => [
                'nullable',
                'string',
                'max:5000',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | SIMPAN PEMERIKSAAN
        |--------------------------------------------------------------------------
        */
        $laporan->update([
            'status_pemeriksaan' =>
            $request->status_pemeriksaan,

            'catatan_pemeriksaan' =>
            $request->catatan_pemeriksaan,

            'diperiksa_oleh' =>
            $user->id,

            'diperiksa_at' =>
            now(),
        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Pemeriksaan PMM berhasil disimpan.'
            );
    }
}
