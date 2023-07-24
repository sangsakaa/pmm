<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\LaporanContrller;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\TopikController;
use App\Http\Controllers\UserManagementController;
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
Route::get('add-topik', [TopikController::class, 'add'])->middleware(['auth'])->name('add-topik');
Route::post('add-topik', [TopikController::class, 'store'])->middleware(['auth'])->name('add-topik');





Route::get('data-modul', [ModulController::class, 'index'])->middleware(['auth'])->name('data-modul');
Route::get('add-modul', [ModulController::class, 'add'])->middleware(['auth'])->name('add-modul');

Route::get('daftar-laporan', [LaporanContrller::class, 'index'])->middleware(['auth'])->name('daftar-laporan');
Route::get('laporan-pmm/{laporan}', [LaporanContrller::class, 'view'])->middleware(['auth'])->name('daftar-laporan');
Route::post('laporan-pmm/{laporan}', [LaporanContrller::class, 'Lap'])->middleware(['auth'])->name('daftar-laporan');
Route::post('daftar-laporan', [LaporanContrller::class, 'store'])->middleware(['auth'])->name('daftar-laporan');
Route::post('dashboard', [UserManagementController::class, 'CreateUserGuru'])->middleware(['auth'])->name('dashboard');
