<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SumselController;
use App\Http\Controllers\Sumsel1Controller;

Route::get('/', function () {
    return view('profilesumsel');
});

Route::get('/populasi', [SumselController::class, 'index'])->name('populasi');

Route::get('/jumlah_restoran', [SumselController::class, 'Resto'])->name('jumlah_restoran');

// Menambahkan nama rute untuk 'ekonomi'
Route::get('/ekonomi', [SumselController::class, 'GDP'])->name('ekonomi');

// Menambahkan nama rute untuk 'beragama_islam'
Route::get('/beragama_islam', [SumselController::class, 'beragama_islam'])->name('beragama_islam');

// Menambahkan nama rute untuk 'jumlah_kejahatan'
Route::get('/jumlah_kejahatan', [SumselController::class, 'jumlah_kejahatan'])->name('jumlah_kejahatan');

// Nama rute untuk 'sumsel'
Route::get('/sumsel', [SumselController::class, 'index'])->name('sumsel');