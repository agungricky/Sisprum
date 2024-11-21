<?php

use App\Http\Controllers\RumahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Dashboard');
})->name('Dashboard');

Route::get('/TambahRumah', [RumahController::class, 'create'])->name('TambahRumah');
Route::post('/TambahRumah', [RumahController::class, 'store'])->name('TambahRumah.store');
