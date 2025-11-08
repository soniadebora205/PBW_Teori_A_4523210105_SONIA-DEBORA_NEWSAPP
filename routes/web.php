<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KomentarController;

// ROUTE UNTUK LANDING PAGE
Route::get('/', [BeritaController::class, 'index'])->name('berita.index');

// ROUTE UNTUK MENAMPILKAN DETAIL BERITA BERDASARKAN ID NEWS YANG DIAKSES
Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');

// ROUTE UNTUK MENYIMPAN KOMENTAR
Route::post('/komentar', [KomentarController::class, 'store'])->name('form.komentar');