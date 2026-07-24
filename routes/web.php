<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();

        // dd('Nama User: ' . $user->name, 'Role Usser : ' . $user->role);

        if ($user && $user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user && $user->role === 'divisi') {
            return redirect()->route('divisi.dashboard');
        }
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('Admin/AdminDashboard');
        })->name('dashboard');
    });

    Route::middleware(['role:divisi'])->prefix('divisi')->name('divisi.')->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('DivisiPage/DivsiDashboard');
        })->name('dashboard');
    });
});

require __DIR__ . '/auth.php';