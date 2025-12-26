<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\penyimpanan;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\LandingPageController;

// === LOGIN (Sekarang tanpa OTP) ===
Route::get('/', [LandingPageController::class, 'index'])->name('index'); 

Route::get('/login', [LoginController::class, 'show_login'])->name('login');

Route::post('/login-process', [LoginController::class, 'login_validate'])->name('login.validate');

// === REGISTER (Sekarang ada OTP) ===
Route::get('/register', [RegisterController::class, 'show_register'])->name('register');
Route::post('/register-process', [RegisterController::class, 'register_validate'])->name('register.validate');

// === Route OTP (Dipindahkan ke RegisterController) ===
Route::get('/otp-verification', [RegisterController::class, 'show_otp_form'])->name('otp.form');
Route::post('/otp-verification', [RegisterController::class, 'verify_otp'])->name('otp.verify');

// OTP PASSWORD
Route::get('/forgot-password', [LupaPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [LupaPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/forgot-password/otp', [LupaPasswordController::class, 'showOtpForm'])->name('password.otp');
Route::post('/forgot-password/otp', [LupaPasswordController::class, 'verifyOtp'])->name('password.verify');

Route::get('/reset-password', [LupaPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [LupaPasswordController::class, 'resetPassword'])->name('password.update');

// === Middleware Auth ===
Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard'); // Saya rapikan sedikit
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/ShowProfile', [ProfileController::class, 'show_profile'])-> name('Show.Profile');
    Route::get('/Edit-Profile', [ProfileController::class, 'show_edit'])-> name('Edit-Profile');
    Route::post('/dashboard/{username}/edit', [ProfileController::class, 'edited'])->name('Edit-Profile');
    Route::get('/secure', [ProfileController::class, 'show_secure'])-> name('secure');
    Route::post('change-password', [ProfileController::class, 'change_password'])-> name('change-password');

    // Route Inventory Kamu
    Route::get('/penyimpanan', [penyimpanan::class, 'index'])->name('penyimpanan.index');
    Route::get('/ambil-item', [penyimpanan::class, 'create'])->name('get.item');
    Route::post('/simpan-penyimpanan', [penyimpanan::class, 'store'])->name('penyimpanan.store');
    Route::get('/penyimpanan/{id}/edit', [penyimpanan::class, 'edit'])->name('penyimpanan.edit');
    Route::put('/penyimpanan/{id}', [penyimpanan::class, 'update'])->name('penyimpanan.update');
    Route::delete('/penyimpanan/{id}', [penyimpanan::class, 'destroy'])->name('penyimpanan.destroy');
    Route::get('/penyimpanan/riwayat', [penyimpanan::class, 'history'])->name('penyimpanan.history');

    Route::get('/items', [ItemController::class, 'index'])->name('item.index');
    Route::get('/Riwayat_items', [ItemController::class, 'riwayat_index'])->name('item.riwayat_index');
    Route::post('/items/{id}/restore', [ItemController::class, 'Restore'])->name('item.restore');
    
    Route::get('/item/{id}/edit', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('/item/{id}', [ItemController::class, 'update'])->name('item.update');
    Route::delete('/item/{id}', [ItemController::class, 'destroy'])->name('item.destroy');

    Route::get('/tambah-item', [KategoriController::class, 'create'])->name('item.tambah');
    Route::post('/simpan-item', [ItemController::class, 'store'])->name('item.store');
});