<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JabatanController;
use App\http\Controllers\BagianController;
use App\http\Controllers\PetugasController;
use App\http\Controllers\DashboardController;
use App\http\Controllers\PetugasJumaatController;
use App\http\Controllers\KasMasukController;
use App\http\Controllers\KasKeluarController;
use App\http\Controllers\KegiatanController;
use App\http\Controllers\LaporanKasController;
use App\http\Controllers\KelolaUserController;
use App\http\Controllers\ProfilController;
use App\http\Controllers\Kegiatan2Controller;
use App\http\Controllers\PengurusController;
use App\http\Controllers\Petugasjumaat2Controller;
use App\http\Controllers\KasMasuk2Controller;
use App\http\Controllers\KasKeluar2Controller;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
//---------------routing landing page--------------
Route::get('/', function () {
    return view('landingpage.home');
});

Route::get('/home', function () {
    return view('landingpage.home');
});
Route::get('/about', function () {
    return view('landingpage.about');
});
Route::resource('kegiatan2',Kegiatan2Controller::class);

Route::get('/kontak', function () {
    return view('landingpage.kontak');
});
Route::resource('pengurus',PengurusController::class);
Route::resource('petugasjumaat2',Petugasjumaat2Controller::class);
Route::resource('kasmasuk',KasMasuk2Controller::class);
Route::resource('kaskeluar',KasKeluar2Controller::class);

//---------------routing admin page--------------
Route::get('/administrator', function () {
    return view('admin.home');
});
// chart di dasboard
Route::get('dashboard', [DashboardController::class,'index']);


Route::middleware(['peran:petugas-anggota-admin'])->group(function() {
    Route::resource('bagian', BagianController::class);
    Route::resource('kegiatan',KegiatanController::class);
    Route::resource('jabatan',JabatanController::class);
    Route::resource('petugas',PetugasController::class);
    Route::resource('kas_masuk',KasMasukController::class);
    Route::resource('kas_keluar',KasKeluarController::class);
    Route::resource('laporan_kas',LaporanKasController::class);
    Route::resource('petugasJumaat',PetugasJumaatController::class);
    Route::get('generate-pdf', [PetugasController::class,'generatePDF']);
    // export pdf dan excel Petugas
    Route::get('petugas-pdf', [PetugasController::class,'petugasPDF']);
    Route::get('petugas-excel', [PetugasController::class,'petugasExcel']);
    // export pdf dan excel petugas Jumaat
    Route::get('petugasJumaat-pdf', [PetugasJumaatController::class,'petugasJumaatPDF']);
    Route::get('petugasJumaat-excel', [PetugasJumaatController::class,'petugasJumaatExcel']);
    // export pdf dan excel Petugas
    Route::get('kas_masuk-pdf', [KasMasukController::class,'kas_masukPDF']);
    Route::get('kas_masuk-excel', [KasMasukController::class,'kas_masukExcel']);
    // export pdf dan excel Petugas
    Route::get('kas_keluar-pdf', [KasKeluarController::class,'kas_keluarPDF']);
    Route::get('kas_keluar-excel', [KasKeluarController::class,'kas_keluarExcel']);
});
Route::resource('kelola_user',KelolaUserController::class)->middleware('peran:admin');


// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('/after_register', function () {
    return view('landingpage.after_register');
});
// Route::get('/kelola_user', function () {
//     return view('admin.home');
// })->middleware('peran:admin');

Route::get('/profil', function () {
    return view('profil.profil_show');
})->middleware('auth');

Route::get('/access-denied', function () {
    return view('admin.access_denied');
})->middleware('auth');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* ==== Route Api ===== */
//----belajar rest API-----
Route::get('/api-petugas', [PetugasController::class, 'apiPetugas']);
Route::get('/api-petugas/{id}', [PetugasController::class, 'apiPetugasDetail']);