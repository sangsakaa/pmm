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
        return view('admin.laporan.index', compact('dataLap'));
    }
    public function store(Request $request)
    {
        $datatopik = Topik::all();
        $dataGuru = Guru::all();

        foreach ($dataGuru as $guru) {
            foreach ($datatopik as $topik) {
                $laporan = new Laporan();
                $laporan->guru_id = $guru->id;
                $laporan->topik_id = $topik->id;
                $laporan->save();
            }
        }
        return redirect()->back();
    }
    public function view(Laporan $laporan)
    {
        // dd($laporan);
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
                'daftar_laporan.keterangan'
            ])
            ->get();
        // dd($dataModel);
        if ($dataModel->count() === 0) {
            $dataModel = Modul::query()

                ->where('topik_id', $laporan->topik_id)->get();
        }
        return view('admin.laporan.view', compact('laporan', 'dataModel'));
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
