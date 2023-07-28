<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $dataGuru = Guru::all();
        return view('admin.guru.index', compact('dataGuru'));
    }
    public function create()
    {
        return view('admin.guru.add');
    }
    public function store(Request $request)
    {
        $guru = new Guru();
        $guru->nuptk = $request->nuptk;
        $guru->nama_guru = $request->nama_guru;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->tempat_lahir = $request->tempat_lahir;
        $guru->tangal_lahir = $request->tangal_lahir;
        return redirect()->back();
    }
}
