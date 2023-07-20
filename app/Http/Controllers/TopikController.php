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
}
