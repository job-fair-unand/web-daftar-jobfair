<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/register-sponsor', function () {
    return view('sponsor.register');
})->name('sponsor.register');

Route::get('/register-umkm', function () {
    return view('umkm.register');
})->name('umkm.register');

require __DIR__.'/auth.php';