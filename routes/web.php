<?php

use Illuminate\Support\Facades\Route;

//ini untuk pindah tiap halaman bro
Route::get('/', function () {
    return view('beranda');
})->name('beranda');

Route::get('/sejarah', function () {
    return view('sejarah');
})->name('sejarah');

Route::get('/visimisi', function () {
    return view('visimisi');
})->name('visimisi');

Route::get('/galeri', function () {
    return view('galeri');
})->name('galeri');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::get('/data-siswa', function () {
    return view('datasiswa');
})->name('data.siswa');

Route::get('/data-guru', function () {
    return view('dataguru');
})->name('data.guru');

Route::get('/struktur-organisasi', function () {
    return view('strukturorg');
})->name('struktur');


//coba halaman login
Route::get('/auth-smp-admin-2026', function () {
    return view('login.login');
})->name('login.admin');


//fungsi login
use App\Http\Controllers\Login\LoginController;

Route::get('/auth-smp-admin-2026', [LoginController::class, 'index']);
Route::post('/auth-smp-admin-2026', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);