<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JabatanController;
use App\http\Controllers\BagianController;
use App\http\Controllers\PetugasController;
use App\http\Controllers\DashboardController;
use App\http\Controllers\PetugasJumaatController;
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



//---------------routing admin page--------------
Route::get('/administrator', function () {
    return view('admin.home');
});

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
// chart di dasboard
Route::get('dashboard', [DashboardController::class,'index']);