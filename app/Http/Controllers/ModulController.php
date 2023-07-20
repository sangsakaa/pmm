<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    public function index()
    {
        $dataModul = Modul::all();
        return view('admin.modul.index', compact('dataModul'));
    }
}
