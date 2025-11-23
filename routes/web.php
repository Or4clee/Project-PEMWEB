<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ObatController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\StokFarmasiController;

Route::prefix('farmasi')->group(function () {
    Route::resource('obat', ObatController::class)->except(['show']);

    Route::get('resep', [ResepController::class, 'index'])->name('resep.index');
    Route::get('resep/create', [ResepController::class, 'create'])->name('resep.create');
    Route::post('resep', [ResepController::class, 'store'])->name('resep.store');
    Route::get('resep/{id}', [ResepController::class, 'show'])->name('resep.show');
    Route::get('stok', [StokFarmasiController::class, 'index'])->name('stok.index');
});





