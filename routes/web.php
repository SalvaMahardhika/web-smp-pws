<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
})->name('beranda');

Route::get('/sejarah', function () {
    return view('sejarah');
})->name('sejarah');

Route::get('/visimisi', function () {
    return view('visimisi');
})->name('visimisi');