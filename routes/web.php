<?php

use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\RumahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Dashboard');
})->name('Dashboard');

Route::get('/coba', function () {
    return inertia('coba');
});

Route::get('/DataRumah', [RumahController::class, 'index'])->name('DataRumah');
Route::get('/TambahRumah', [RumahController::class, 'create'])->name('TambahRumah');
Route::post('/TambahRumah', [RumahController::class, 'store'])->name('TambahRumah.store');
Route::delete('/rumah/{id}', [RumahController::class, 'destroy'])->name('rumah.destroy');
Route::get('/users/{id}/edit', [RumahController::class, 'edit'])->name('users.edit');
Route::patch('/users/{id}', [RumahController::class, 'update'])->name('users.update');

Route::get('/Penghuni', [PenghuniController::class, 'index'])->name('dataPenghuni.index');
Route::delete('/penghuni/{id}', [PenghuniController::class, 'destroy'])->name('penghuni.destroy');
Route::put('/penghuni/{id}', [PenghuniController::class, 'update'])->name('penghuni.update');


