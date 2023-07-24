<?php

namespace App\Http\Controllers;

use App\Models\Topik;
use Illuminate\Http\Request;

class TopikController extends Controller
{
    public function index()
    {
        $dataTopik = Topik::all();
        return view('admin.topik.index', compact('dataTopik'));
    }
    public function add()
    {
        return view('admin.topik.add');
    }
    public function store(Request $request)
    {
        $topik = new Topik();
        $topik->nama_topik = $request->nama_topik;
        $topik->judul_topik = $request->judul_topik;
        $topik->save();
        return redirect()->back();
    }
}
