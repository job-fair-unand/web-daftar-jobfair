<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\SponsorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/company/dashboard', function () {
    return view('company.dashboard');
})->name('dashboard');

// Sponsor Routes
Route::prefix('sponsor')->name('sponsor.')->group(function () {
    Route::get('/register', [SponsorController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [SponsorController::class, 'store'])->name('store');
    Route::get('/', [SponsorController::class, 'index'])->name('index');
    Route::get('/{sponsor}', [SponsorController::class, 'show'])->name('show');
    Route::delete('/{sponsor}', [SponsorController::class, 'destroy'])->name('destroy');
    Route::get('/api/packages', [SponsorController::class, 'getPackages'])->name('packages');
});

// UMKM Routes
Route::prefix('umkm')->name('umkm.')->group(function () {
    Route::get('/register', [BusinessController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [BusinessController::class, 'store'])->name('store');
    Route::get('/', [BusinessController::class, 'index'])->name('index');
    Route::get('/{business}', [BusinessController::class, 'show'])->name('show');
    Route::delete('/{business}', [BusinessController::class, 'destroy'])->name('destroy');
    Route::get('/api/types', [BusinessController::class, 'getTypes'])->name('types');
});

Route::get('/company/pembayaran', function () {
    return view('company.detail-pembayaran');
})->name('company.pembayaran');

require __DIR__.'/auth.php';