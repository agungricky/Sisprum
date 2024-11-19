<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Dashboard');
})->name('Dashboard');

Route::get('/TambahRumah', function () {
    return inertia('TambahRumah');
})->name('coba');
