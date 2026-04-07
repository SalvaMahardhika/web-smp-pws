<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\GuruController;

/* =========================
   HALAMAN PUBLIC
========================= */

Route::get('/', fn() => view('beranda'))->name('beranda');
Route::get('/sejarah', fn() => view('sejarah'))->name('sejarah');
Route::get('/visimisi', fn() => view('visimisi'))->name('visimisi');
Route::get('/galeri', fn() => view('galeri'))->name('galeri');
Route::get('/kontak', fn() => view('kontak'))->name('kontak');
Route::get('/data-siswa', fn() => view('datasiswa'))->name('data.siswa');
Route::get('/struktur-organisasi', fn() => view('strukturorg'))->name('struktur');

/* =========================
   DATA GURU
========================= */

Route::get('/data-guru', [GuruController::class, 'index'])->name('data.guru');

Route::post('/guru/store', [GuruController::class, 'store'])->name('guru.store');
Route::post('/guru/update/{id}', [GuruController::class, 'update'])->name('guru.update');
Route::delete('/guru/delete/{id}', [GuruController::class, 'destroy'])->name('guru.delete');

/* =========================
   LOGIN SYSTEM
========================= */

Route::get('/auth-smp-admin-2026', [LoginController::class, 'index'])->name('login.admin');
Route::post('/auth-smp-admin-2026', [LoginController::class, 'login'])->name('login.process');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

/* =========================
   UPDATE PROFILE (INI YANG KAMU KURANG)
========================= */

Route::post('/profile/update', [LoginController::class, 'updateProfile'])->name('profile.update');