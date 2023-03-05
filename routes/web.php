<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\{
    KategoriController,
    PengawasController
};

use App\Http\Controllers\Petugas\{
    ReviewPengaduanController
};

use App\Http\Controllers\Masyarakat\{
    PengaduanController
};

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

require __DIR__.'/auth.php';

Route::middleware('role:super_admin')->group(function () {
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/pengawas', PengawasController::class);
});

Route::middleware(['role:petugas,admin'])->group(function () {
    Route::resource('/review-pengaduan', ReviewPengaduanController::class);
    Route::get('/verifikasi-pengaduan/{id}', [ReviewPengaduanController::class, 'verifikasi'])->name('verifikasi-pengaduan');
    Route::get('/export-pdf', [ReviewPengaduanController::class, 'exportPDF'])->name('export-pdf');
    Route::get('/export-excel', [ReviewPengaduanController::class, 'exportExcel'])->name('export-excel');
});

Route::middleware('role:masyarakat')->group(function () {
    Route::resource('/pengaduan', PengaduanController::class);
});

