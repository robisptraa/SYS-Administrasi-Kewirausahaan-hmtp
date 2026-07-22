<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('Admin/Dashboard');
        })->name('dashboard');
    });

    Route::middleware(['role:divisi'])->prefix('divisi')->name('divisi.')->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('Divisi/Dashboard');
        })->name('dashboard');
    });
});
require __DIR__.'/auth.php';