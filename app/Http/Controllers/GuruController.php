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
}
