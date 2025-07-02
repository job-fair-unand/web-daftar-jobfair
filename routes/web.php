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

// Guest Routes (Public)
Route::get('/perusahaan', [GuestController::class, 'showCompany'])->name('company');
Route::get('/perusahaan/{company}', [GuestController::class, 'showCompanyDetail'])->name('company.show');

Route::get('/umkm-info', [GuestController::class, 'showUmkm'])->name('business');
Route::get('/beasiswa', [GuestController::class, 'showScholarship'])->name('scholarship');
Route::get('/tentang', [GuestController::class, 'showAbout'])->name('about');
Route::get('/daftar-peserta', [GuestController::class, 'showRegistration'])->name('registration');
Route::post('/daftar-peserta', [ParticipantController::class, 'store'])->name('participant.store');

// Registration Routes (Public)
Route::prefix('register')->name('register.')->group(function () {
    Route::get('/sponsor', [SponsorController::class, 'showRegistrationForm'])->name('sponsor');
    Route::post('/sponsor', [SponsorController::class, 'store'])->name('sponsor.store');

    Route::get('/beasiswa', [ScholarshipController::class, 'showRegistrationForm'])->name('scholarship');
    Route::post('/beasiswa', [ScholarshipController::class, 'store'])->name('scholarship.store');

    Route::get('/perusahaan', [CompanyController::class, 'showRegistrationForm'])->name('company');
    Route::post('/perusahaan', [CompanyController::class, 'store'])->name('company.store');

    Route::get('/umkm', [BusinessController::class, 'showRegistrationForm'])->name('umkm');
    Route::post('/umkm', [BusinessController::class, 'store'])->name('umkm.store');
});

// Admin Routes
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

// Company Dashboard Routes (Protected)
Route::middleware(['auth', 'verified', 'role:company'])->prefix('dashboard/company')->name('company.')->group(function () {
    Route::get('/', [CompanyController::class, 'index'])->name('dashboard');
    Route::get('/pembayaran', [CompanyController::class, 'prosesPilihBooth'])->name('pembayaran');
    Route::post('/pilih-booth', [CompanyController::class, 'prosesPilihBooth'])->name('pilih-booth');
});

// Sponsor Dashboard Routes (Protected)
Route::middleware(['auth', 'verified', 'role:sponsor'])->prefix('dashboard/sponsor')->name('sponsor.')->group(function () {
    Route::get('/', function () {
        return view('sponsor.dashboard');
    })->name('dashboard');
});

// UMKM Dashboard Routes (Protected)
Route::middleware(['auth', 'verified', 'role:umkm'])->prefix('dashboard/umkm')->name('umkm.')->group(function () {
    Route::get('/', function () {
        return view('umkm.dashboard');
    })->name('dashboard');
});

// Scholarship Dashboard Routes (Protected)
// Route::middleware(['auth', 'verified', 'role:scholarship'])->prefix('dashboard/scholarship')->name('scholarship.')->group(function () {
//     Route::get('/', function () {
//         return view('scholarship.dashboard');
//     })->name('dashboard');
// });

require __DIR__.'/auth.php';