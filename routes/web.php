<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ScholarshipController;

Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/perusahaan', [GuestController::class, 'showCompany'])->name('company');
Route::get('/umkm-info', [GuestController::class, 'showUmkm'])->name('business');
Route::get('/beasiswa', [GuestController::class, 'showScholarship'])->name('scholarship');
Route::get('/tentang', [GuestController::class, 'showAbout'])->name('about');
Route::get('/daftar-peserta', [GuestController::class, 'showRegistration'])->name('registration');
Route::post('/daftar-peserta', [ParticipantController::class, 'store'])->name('participant.store');

Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/perusahaan', [AdminController::class, 'showCompany'])->name('company');
    Route::get('/perusahaan/{company}/detail', [AdminController::class, 'getCompanyDetail'])->name('company.detail');
    Route::delete('/perusahaan/{company}', [AdminController::class, 'deleteCompany'])->name('company.delete');
    
    Route::get('/umkm', [AdminController::class, 'showUmkm'])->name('umkm');
    Route::get('/umkm/{business}/detail', [AdminController::class, 'getBusinessDetail'])->name('umkm.detail');

    Route::get('/sponsor', [AdminController::class, 'showSponsor'])->name('sponsor');
    Route::get('/sponsor/{sponsor}/detail', [AdminController::class, 'getSponsorDetail'])->name('sponsor.detail');

    Route::get('/beasiswa', [AdminController::class, 'showScholarship'])->name('scholarship');
    Route::get('/beasiswa/{scholarship}/detail', [AdminController::class, 'getScholarshipDetail'])->name('scholarship.detail');
    
    Route::get('/peserta', [AdminController::class, 'showParticipant'])->name('participant');
    Route::get('/peserta/{participant}/detail', [AdminController::class, 'getParticipantDetail'])->name('participant.detail');
    Route::post('/peserta', [AdminController::class, 'storeParticipant'])->name('participant.store');
    Route::delete('/peserta/{participant}', [AdminController::class, 'deleteParticipant'])->name('participant.delete');
});

Route::middleware(['auth', 'verified', 'role:company'])->prefix('perusahaan')->name('company.')->group(function () {
    Route::get('/dashboard', function () {
        return view('company.dashboard');
    })->name('dashboard');
    Route::get('/pembayaran', function () {
        return view('company.detail-pembayaran');
    })->name('pembayaran');

    Route::post('/pilih-booth', [CompanyController::class, 'prosesPilihBooth'])->name('pilih-booth');
});

Route::prefix('sponsor')->name('sponsor.')->group(function () {
    Route::get('/register', [SponsorController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [SponsorController::class, 'store'])->name('store');
});

Route::prefix('beasiswa')->name('scholarship.')->group(function () {
    Route::get('/register', [ScholarshipController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [ScholarshipController::class, 'store'])->name('store');
});

Route::prefix('perusahaan')->name('company.')->group(function () {
    Route::get('/register', [CompanyController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [CompanyController::class, 'store'])->name('store');
});

// Sponsor Routes
Route::middleware(['auth', 'verified', 'role:sponsor'])->prefix('sponsor')->name('sponsor.')->group(function () {
    Route::get('/dashboard', function () {
        return view('sponsor.dashboard');
    })->name('dashboard');
});

Route::prefix('umkm')->name('umkm.')->group(function () {
    Route::get('/register', [BusinessController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [BusinessController::class, 'store'])->name('store');
});

// UMKM Routes
Route::middleware(['auth', 'verified', 'role:umkm'])->prefix('umkm')->name('umkm.')->group(function () {
    Route::get('/dashboard', function () {
        return view('umkm.dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';