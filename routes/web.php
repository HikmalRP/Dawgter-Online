<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelolaDokterController;
use App\Http\Controllers\KelolaPasienController;
use App\Http\Controllers\KelolaPoliController;
use App\Http\Controllers\MemeriksaController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PeriksaController;
use Illuminate\Support\Facades\Route;

// Route Menu Utama
Route::get('/', function () {
    return view('landing_page');
});

// Route Auth
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Route Admin
Route::get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard')->middleware('role:admin', 'auth');

Route::get('/admin/mengelola_dokter', [KelolaDokterController::class, 'index'])->middleware('role:admin', 'auth');
Route::get('/admin/mengelola_dokter/create', [KelolaDokterController::class, 'create'])->middleware('role:admin', 'auth');
Route::post('/admin/mengelola_dokter', [KelolaDokterController::class, 'store'])->middleware('role:admin', 'auth');
Route::get('/admin/mengelola_dokter/{id}/edit', [KelolaDokterController::class, 'edit'])->middleware('role:admin', 'auth');
Route::put('/admin/mengelola_dokter/{id}', [KelolaDokterController::class, 'update'])->middleware('role:admin', 'auth');
Route::delete('/admin/mengelola_dokter/{id}', [KelolaDokterController::class, 'destroy'])->middleware('role:admin', 'auth');

Route::get('/admin/mengelola_pasien', [KelolaPasienController::class, 'index'])->middleware('role:admin', 'auth');
Route::get('/admin/mengelola_pasien/create', [KelolaPasienController::class, 'create'])->middleware('role:admin', 'auth');
Route::post('/admin/mengelola_pasien', [KelolaPasienController::class, 'store'])->middleware('role:admin', 'auth');
Route::get('/admin/mengelola_pasien/{id}/edit', [KelolaPasienController::class, 'edit'])->middleware('role:admin', 'auth');
Route::put('/admin/mengelola_pasien/{id}', [KelolaPasienController::class, 'update'])->middleware('role:admin', 'auth');
Route::delete('/admin/mengelola_pasien/{id}', [KelolaPasienController::class, 'destroy'])->middleware('role:admin', 'auth');

Route::get('/admin/mengelola_poli', [KelolaPoliController::class, 'index'])->middleware('role:admin', 'auth');
Route::get('/admin/mengelola_poli/create', [KelolaPoliController::class, 'create'])->middleware('role:admin', 'auth');
Route::post('/admin/mengelola_poli', [KelolaPoliController::class, 'store'])->middleware('role:admin', 'auth');
Route::get('/admin/mengelola_poli/{id}/edit', [KelolaPoliController::class, 'edit'])->middleware('role:admin', 'auth');
Route::put('/admin/mengelola_poli/{id}', [KelolaPoliController::class, 'update'])->middleware('role:admin', 'auth');
Route::delete('/admin/mengelola_poli/{id}', [KelolaPoliController::class, 'destroy'])->middleware('role:admin', 'auth');

Route::get('/admin/obat', [ObatController::class, 'index'])->middleware('role:admin', 'auth');
Route::get('/admin/obat/create', [ObatController::class, 'create'])->middleware('role:admin', 'auth');
Route::post('/admin/obat', [ObatController::class, 'store'])->middleware('role:admin', 'auth');
Route::get('/admin/obat/{id}/edit', [ObatController::class, 'edit'])->middleware('role:admin', 'auth');
Route::put('/admin/obat/{id}', [ObatController::class, 'update'])->middleware('role:admin', 'auth');
Route::delete('/admin/obat/{id}', [ObatController::class, 'destroy'])->middleware('role:admin', 'auth');

// Route Dokter
Route::get('/dokter/dashboard', function () {
    return view('dokter.index');
})->name('dokter.dashboard')->middleware('role:dokter', 'auth');

Route::get('/dokter/memeriksa', [MemeriksaController::class, 'index'])->middleware('role:dokter', 'auth');
Route::get('/dokter/memeriksa/{id}/create', [MemeriksaController::class, 'create'])->middleware('role:dokter', 'auth');
Route::post('/dokter/memeriksa', [MemeriksaController::class, 'store'])->middleware('role:dokter', 'auth');
Route::get('/dokter/memeriksa/{id}/edit', [MemeriksaController::class, 'edit'])->middleware('role:dokter', 'auth');
Route::put('/dokter/memeriksa/{id}', [MemeriksaController::class, 'update'])->middleware('role:dokter', 'auth');

Route::get('/dokter/obat', [ObatController::class, 'index'])->middleware('role:dokter', 'auth');
Route::get('/dokter/obat/create', [ObatController::class, 'create'])->middleware('role:dokter', 'auth');
Route::post('/dokter/obat', [ObatController::class, 'store'])->middleware('role:dokter', 'auth');
Route::get('/dokter/obat/{id}/edit', [ObatController::class, 'edit'])->middleware('role:dokter', 'auth');
Route::put('/dokter/obat/{id}', [ObatController::class, 'update'])->middleware('role:dokter', 'auth');
Route::delete('/dokter/obat/{id}', [ObatController::class, 'destroy'])->middleware('role:dokter', 'auth');

// Route Pasien
Route::get('/pasien/dashboard', function () {
    return view('pasien.index');
})->name('pasien.dashboard')->middleware('role:pasien', 'auth');

Route::get('/pasien/periksa', [PeriksaController::class, 'index'])->middleware('role:pasien', 'auth');
//Route::get('/pasien/periksa/create', [PeriksaController::class, 'create'])->middleware('role:pasien', 'auth');
Route::post('/pasien/periksa', [PeriksaController::class, 'store'])->middleware('role:pasien', 'auth');
