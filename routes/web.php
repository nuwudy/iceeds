<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\UserController;
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

// Admin Authentication & Operations
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::get('/login-alias', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Protected Admin & Staff Workspace
    Route::middleware('auth')->group(function () {
        // Main Dashboard Overview
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        // Certificate Management (Add, Edit, Delete, Search)
        Route::get('/certificates', [CertificateController::class, 'index'])->name('admin.certificates.index');
        Route::post('/certificates', [CertificateController::class, 'store'])->name('admin.certificates.store');
        Route::put('/certificates/{certificate}', [CertificateController::class, 'update'])->name('admin.certificates.update');
        Route::delete('/certificates/{certificate}', [CertificateController::class, 'destroy'])->name('admin.certificates.destroy');

        // User & Staff Management (Admins & Approved Users)
        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::post('/users/{user}/toggle-approval', [UserController::class, 'toggleApproval'])->name('admin.users.toggle-approval');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

        // Media Library
        Route::get('/media', [MediaController::class, 'index'])->name('admin.media');
        Route::post('/media/upload', [MediaController::class, 'upload'])->name('admin.media.upload');
        Route::put('/media/{media}', [MediaController::class, 'update'])->name('admin.media.update');
        Route::delete('/media/{media}', [MediaController::class, 'destroy'])->name('admin.media.destroy');
    });
});
