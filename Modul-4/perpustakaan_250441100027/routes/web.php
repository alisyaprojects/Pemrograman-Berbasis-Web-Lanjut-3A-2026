<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');

Route::get('/buku-kartu', [BukuController::class, 'kartu'])->name('buku.kartu');

Route::get('/buku/{id}', [BukuController::class, 'show'])->name('buku.show');