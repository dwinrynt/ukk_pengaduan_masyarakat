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
    DashboardMasyarakatController,
    PengaduanController
};

use App\Models\{
    Kategori,
    Masyarakat,
    Petugas,
    Pengaduan,
    User
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
    // super_admin
if(auth()->user()->role == 'super_admin'){
    $user         = User::select('id')->where('id', '>', '1')->count('id');
    $kategori     = Kategori::select('id')->count('id');
    $pengaduanAll = Pengaduan::select('id')->count('id');
    $pengaduanKategori  = Kategori::all()->map(function ($item)  {
        $item['jumlah']  = Pengaduan::where('kategori_id', $item->id)->count();
        return $item;
    });
    return view('dashboard', compact('user', 'kategori', 'pengaduanAll', 'pengaduanKategori'));

    // admin & petugas
}elseif(auth()->user()->role == 'admin' || auth()->user()->role == 'petugas'){
    $petugas = Petugas::where('id', auth()->user()->petugas->id)->first();
    $petugas['nama_petugas']  = $petugas->nama_petugas;
    $petugas['telp']          = $petugas->telp;
    $petugas['jenis_kelamin'] = $petugas->jenis_kelamin;
    return view('dashboard', compact('petugas'));

    // masyarakat
}elseif(auth()->user()->role == 'masyarakat'){
    $masyarakat = Masyarakat::where('id', Auth()->user()->masyarakat->id)->first();
    $masyarakat['nama']          = $masyarakat->nama ?? '-';
    $masyarakat['nik']           = $masyarakat->nik ?? '-';
    $masyarakat['telp']          = $masyarakat->telp ?? '-';
    $masyarakat['jenis_kelamin'] = $masyarakat->jenis_kelamin ?? '-';
    return view('dashboard', compact('masyarakat'));
}
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
    // Route::get('change-password/{id}', [DashboardMasyarakatController::class, 'changePassword'])->name('change-password');
});

