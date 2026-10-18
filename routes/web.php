<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\CertificateVerificationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - iCEEDS Official Portal
|--------------------------------------------------------------------------
*/

// Public Institutional Pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');

// Contact Form & Inquiries
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Certificate Verification Portal
Route::get('/verify', [CertificateVerificationController::class, 'index'])->name('verify');
Route::post('/verify', [CertificateVerificationController::class, 'verify'])->name('verify.submit');

// Admin Authentication Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Protected Admin Media Library
    Route::middleware('auth')->group(function () {
        Route::get('/media', [MediaController::class, 'index'])->name('admin.media');
        Route::post('/media/upload', [MediaController::class, 'upload'])->name('admin.media.upload');
        Route::put('/media/{media}', [MediaController::class, 'update'])->name('admin.media.update');
        Route::delete('/media/{media}', [MediaController::class, 'destroy'])->name('admin.media.destroy');
    });
});
