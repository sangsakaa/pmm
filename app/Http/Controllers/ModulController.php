<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Modul;
use App\Models\Topik;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    public function index()
    {
        $dataModul = Modul::all();
        return view('admin.modul.index', compact('dataModul'));
    }
    public function add()
    {
        $dataLap = Laporan::query()->get();
        $dataTopik = Topik::query()->get();

        // Mengambil array berisi topik_id yang ada pada $dataLap
        $topikIDsInDataLap = $dataLap->pluck('topik_id')->toArray();

        // Filter dataTopik yang tidak ada pada $dataLap berdasarkan topik_id dan id
        $dataTopikTidakAdaDiLap = $dataTopik->whereNotIn('id', $topikIDsInDataLap);
        return view('admin.modul.add', compact('dataTopikTidakAdaDiLap'));
    }
    public function store(Request $request)
    {
        $modul = new Modul();
        $modul->topik_id = $request->topik_id;
        $modul->nama_modul = $request->nama_modul;
        $modul->judul_modul = $request->judul_modul;
        $modul->save();
        return redirect()->back();
    }
}
