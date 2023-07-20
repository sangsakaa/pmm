<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\TopikController;
use App\Models\Topik;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('data-guru', [GuruController::class, 'index'])->middleware(['auth'])->name('data-guru');

Route::get('data-topik', [TopikController::class, 'index'])->middleware(['auth'])->name('data-topik');
Route::get('data-modul', [ModulController::class, 'index'])->middleware(['auth'])->name('data-modul');
