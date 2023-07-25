<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Modul;
use App\Models\Topik;
use App\Models\Laporan;
use Illuminate\Http\Request;

use App\Models\Daftar_Laporan;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanContrller extends Controller
{
    public function index()
    {
        $UserPermhs = Auth::user()->guru_id;
        $dataLap = Laporan::query()
            ->leftjoin('guru', 'guru.id', '=', 'laporan.guru_id')
            ->leftjoin('topik', 'topik.id', '=', 'laporan.topik_id')
            ->where('laporan.guru_id', $UserPermhs)
            ->select('laporan.id', 'nama_topik', 'judul_topik')
            ->get();
        $rekapLap = Laporan::query()
        ->leftjoin('guru', 'guru.id', '=', 'laporan.guru_id')
        ->leftjoin('topik', 'topik.id', '=', 'laporan.topik_id')
        ->select('laporan.id', 'nama_topik', 'judul_topik', 'nama_guru');
        if (request('cari')) {
            $rekapLap->where('nama_guru', 'like', '%' . request('cari') . '%');
            $rekapLap->Orwhere('nama_topik', 'like', '%' . request('cari') . '%');
        }
        $lap = Daftar_Laporan::query()
            ->leftjoin('laporan', 'daftar_laporan.laporan_id', '=', 'laporan.id')
            ->leftjoin('guru', 'guru.id', '=', 'laporan.guru_id')
            ->leftjoin('topik', 'topik.id', '=', 'laporan.topik_id')
            ->leftjoin('modul', 'modul.id', '=', 'daftar_laporan.modul_id')
            // ->where('keterangan', 'tuntas')
        ;
        if (request('cari')) {
            $lap->where('nama_guru', 'like', '%' . request('cari') . '%');
            $lap->Orwhere('nama_topik', 'like', '%' . request('cari') . '%');
        }
        return view('admin.laporan.index', [
            'dataLap' => $dataLap,
            'rekapLap' => $rekapLap->get(),
            'lap' => $lap->get()

        ]);
        
    }
    public function store(Request $request)
    {
        $dataGuru = Guru::all();
        $datatopik = Topik::all();

        foreach ($dataGuru as $guru) {
            foreach ($datatopik as $topik) {
                // Check if the combination of guru_id and topik_id already exists
                $existingLaporan = Laporan::where('guru_id', $guru->id)->where('topik_id', $topik->id)->first();

                if (!$existingLaporan) {
                    // If the combination does not exist, create a new entry
                    $laporan = new Laporan();
                    $laporan->guru_id = $guru->id;
                    $laporan->topik_id = $topik->id;
                    $laporan->save();
                }
            }
        }
        
        return redirect()->back();
    }
    public function view(Laporan $laporan)
    {
        // dd($laporan);
        $UserPermhs = Auth::user()->guru_id;
        $title = DB::table('laporan')
        ->join('guru', 'guru.id', 'laporan.guru_id')
        ->join('topik', 'topik.id', 'laporan.topik_id')
        ->where('laporan.guru_id', $UserPermhs) // ganti 'guru_id' dengan 'user_id' jika 'user_id' adalah kolom yang menyimpan id mahasiswa pada tabel laporan
        ->where('topik.id', $laporan->topik_id) // ganti $topik_id dengan id topik yang ingin dicari
        ->first();
        $UserPermhs = Auth::user()->guru_id;
        $dataModel = Modul::query()
            ->leftJoin('daftar_laporan', 'daftar_laporan.modul_id', '=', 'modul.id')
            ->join('topik', 'topik.id', '=', 'modul.topik_id')
            ->join('laporan', function ($join) use ($laporan) {
                $join->on('laporan.topik_id', '=', 'topik.id')
            ->where('laporan.id', '=', $laporan->id);
            })
            ->select([
                'modul.id',
                'modul.topik_id',
                'modul.nama_modul',
                'modul.judul_modul',
            'daftar_laporan.keterangan',
            'daftar_laporan.laporan_id'
            ])
            ->where('daftar_laporan.laporan_id', $laporan->id)
            ->get();
        // dd($dataModel);
        if ($dataModel->count() === 0) {
            $dataModel = Modul::query()

                ->where('topik_id', $laporan->topik_id)->get();
        }
        return view('admin.laporan.view', compact('laporan', 'dataModel', 'title'));
    }
    public function Lap(Request $request)
    {
        foreach ($request->modul_id as $key => $item) {
            // dd($request);
            // Mencari data dengan modul_id dan laporan_id yang sesuai
            $lap = Daftar_Laporan::where('laporan_id', $request->laporan_id)
                ->where('modul_id', $item)
                ->first();
            // Jika data sudah ada, lakukan update
            if ($lap) {
                $lap->keterangan = $request->keterangan[$item]; // Update keterangan
                $lap->save();
            } else {
                // Jika data belum ada, buat data baru
                $lap = new Daftar_Laporan();
                $lap->laporan_id = $request->laporan_id;
                $lap->modul_id = $item;
                $lap->keterangan = $request->keterangan[$item]; // Use the $key to access the corresponding keterangan
                $lap->save();
            }
        }
        return redirect()->back();
    }
}
