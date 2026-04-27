<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EskulController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use App\Models\Guru;

// =======================
// 🔥 SEMUA ROUTE DIPASANG MIDDLEWARE
// =======================
Route::middleware(['cek.status'])->group(function () {

    // =======================
    // PUBLIK
    // =======================
    Route::get('/', function () {

        $ekstrakurikuler = Ekstrakurikuler::with('guru')->get();

        if (session('login') && in_array(session('role'), ['admin', 'super_admin'])) {
            $berita = Berita::orderBy('tanggal', 'desc')->get();
        } else {
            $berita = Berita::where('status', 1)
                            ->orderBy('tanggal', 'desc')
                            ->get();
        }

        $guru = Guru::all();

        return view('beranda', compact('ekstrakurikuler', 'berita', 'guru'));
    })->name('beranda');

    Route::get('/sejarah', fn() => view('sejarah'))->name('sejarah');
    Route::get('/visimisi', fn() => view('visimisi'))->name('visimisi');
    Route::get('/galeri', fn() => view('galeri'))->name('galeri');
    Route::get('/kontak', fn() => view('kontak'))->name('kontak');

    // =======================
    // LOGIN & PROFILE
    // =======================
    Route::get('/auth-smp-admin-2026', [LoginController::class, 'index'])->name('login.admin');
    Route::post('/auth-smp-admin-2026', [LoginController::class, 'login'])->name('login.process');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/profile/update', [LoginController::class, 'updateProfile'])->name('profile.update');

    // =======================
    // CRUD SISWA
    // =======================
    Route::get('/data-siswa', [SiswaController::class, 'index'])->name('data.siswa');
    Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::post('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/delete/{id}', [SiswaController::class, 'destroy'])->name('siswa.delete');

    // =======================
    // CRUD GURU
    // =======================
    Route::get('/data-guru', [GuruController::class, 'index'])->name('data.guru');
    Route::post('/guru/store', [GuruController::class, 'store'])->name('guru.store');
    Route::post('/guru/update/{id}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/delete/{id}', [GuruController::class, 'destroy'])->name('guru.delete');

    // =======================
    // CRUD USER
    // =======================
    Route::get('/kelola-akun', [UserController::class, 'index'])->name('kelola.akun');
    Route::post('/kelola-akun', [UserController::class, 'store'])->name('user.store');
    Route::post('/kelola-akun/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/kelola-akun/{id}', [UserController::class, 'destroy'])->name('user.delete');
    Route::post('/update-status/{id}', [UserController::class, 'updateStatus'])->name('user.status');

    // =======================
    // CRUD BERITA
    // =======================
    Route::post('/berita/store', [BeritaController::class, 'store'])->name('berita.store');
    Route::post('/berita/{id}/update', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    // 🔥 TOGGLE ON/OFF BERITA
    Route::post('/berita/{id}/toggle', [BeritaController::class, 'toggle'])->name('berita.toggle');

    // =======================
    // CRUD EKSTRAKURIKULER
    // =======================
    Route::post('/ekstrakurikuler/store', [EskulController::class, 'store'])->name('eskul.store');
    Route::post('/ekstrakurikuler/{id}/update', [EskulController::class, 'update'])->name('eskul.update');
    Route::delete('/ekstrakurikuler/{id}', [EskulController::class, 'destroy'])->name('eskul.destroy');

    // =======================
    // STRUKTUR ORGANISASI
    // =======================
    Route::get('/struktur-organisasi', [OrganisasiController::class, 'index'])->name('struktur');
    Route::post('/struktur/update', [OrganisasiController::class, 'update'])->name('struktur.update');
    Route::delete('/struktur/delete', [OrganisasiController::class, 'destroy'])->name('struktur.delete');

    // =======================
    // LOGIN VIEW
    // =======================
    Route::view('/login', 'login')->name('login');

    // =======================
    // DETAIL BERITA
    // =======================
    Route::get('/berita/{id}', function ($id) {
        $berita = Berita::findOrFail($id);
        return view('detail-berita', compact('berita'));
    })->name('berita.detail');

    // =======================
    // DETAIL ESKUL
    // =======================
    Route::get('/ekstrakurikuler/{id}', function ($id) {
        $eskul = Ekstrakurikuler::with('guru')->findOrFail($id);
        return view('detail-eskul', compact('eskul'));
    })->name('eskul.detail');


    // Rute untuk melihat galeri (bisa diakses siapa saja)
    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
    // Rute untuk aksi CRUD (Asumsi Anda sudah menggunakan middleware auth/login)
    Route::post('/galeri/store', [GaleriController::class, 'store']);
    Route::put('/galeri/update/{id}', [GaleriController::class, 'update']);
    Route::delete('/galeri/delete/{id}', [GaleriController::class, 'destroy']);

});