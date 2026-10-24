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
Route::get('/courses', [PageController::class, 'courses'])->name('courses');
Route::get('/courses/download-catalog-pdf', [PageController::class, 'downloadCourseListPdf'])->name('courses.download-pdf');
Route::get('/courses/download-unified-fee-schedule', [PageController::class, 'downloadCourseListPdf'])->name('courses.download-unified-fee-schedule');
Route::get('/courses/{slug}/download-syllabus', [PageController::class, 'downloadSyllabusPdf'])->name('courses.download-syllabus');
Route::get('/attestation/download-sample-pdf', [PageController::class, 'downloadAttestationSamplePdf'])->name('attestation.download-sample');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');

// Academic Departments: Philosophy & Theology
Route::prefix('departments')->name('departments.')->group(function () {
    Route::get('/philosophy-theology', [\App\Http\Controllers\DepartmentController::class, 'index'])->name('philosophy-theology');
    Route::get('/philosophy', [\App\Http\Controllers\DepartmentController::class, 'philosophy'])->name('philosophy');
    Route::get('/theology', [\App\Http\Controllers\DepartmentController::class, 'theology'])->name('theology');
    Route::get('/philosophy/psychology', [\App\Http\Controllers\DepartmentController::class, 'psychology'])->name('philosophy.psychology');
    Route::get('/philosophy/sociology', [\App\Http\Controllers\DepartmentController::class, 'sociology'])->name('philosophy.sociology');
    Route::get('/theology/islamic-studies', [\App\Http\Controllers\DepartmentController::class, 'islamicStudies'])->name('theology.islamic');
    Route::get('/theology/christian-studies', [\App\Http\Controllers\DepartmentController::class, 'christianStudies'])->name('theology.christian');
    Route::get('/theology/hindutva-studies', [\App\Http\Controllers\DepartmentController::class, 'hindutvaStudies'])->name('theology.hindutva');
});

// Public Media & Documents Route Fallback (Ensures clean serving even without symlinks)
Route::get('/storage/media/{year}/{month}/{file}', function ($year, $month, $file) {
    $filePath = public_path("storage/media/{$year}/{$month}/{$file}");
    if (file_exists($filePath)) {
        return response()->file($filePath);
    }
    $storagePath = storage_path("app/public/media/{$year}/{$month}/{$file}");
    if (file_exists($storagePath)) {
        return response()->file($storagePath);
    }
    $docPath = public_path("documents/{$file}");
    if (file_exists($docPath)) {
        return response()->file($docPath);
    }
    abort(404);
})->where('file', '.*')->name('media.serve');


// Contact Form & Inquiries
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Certificate Verification Portal
Route::get('/verify', [CertificateVerificationController::class, 'index'])->name('verify');
Route::post('/verify', [CertificateVerificationController::class, 'verify'])->name('verify.submit');

// iCEEDS ATC (Authorized Training Centre) Registration Portal
Route::get('/atc-registration', [\App\Http\Controllers\AtcRegistrationController::class, 'create'])->name('atc.create');
Route::post('/atc-registration', [\App\Http\Controllers\AtcRegistrationController::class, 'store'])->name('atc.store');
Route::get('/atc-form', function () {
    return redirect()->route('atc.create');
});
Route::get('/atc/files/{registration}', [\App\Http\Controllers\AtcRegistrationController::class, 'serveFile'])->name('atc.file');

// Testimonials Portal (Public Reviews & Submissions)
Route::get('/testimonials', [\App\Http\Controllers\TestimonialController::class, 'index'])->name('testimonials.index');
Route::get('/reviews', function () {
    return redirect()->route('testimonials.index');
})->name('testimonials');
Route::post('/testimonials', [\App\Http\Controllers\TestimonialController::class, 'store'])->name('testimonials.store');

// Knowledge Base & Institutional Blog
Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [\App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');

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

        // ATC (Authorized Training Centre) Applications
        Route::get('/atc-applications', [\App\Http\Controllers\Admin\AtcRegistrationController::class, 'index'])->name('admin.atc.index');
        Route::get('/atc-applications/export', [\App\Http\Controllers\Admin\AtcRegistrationController::class, 'exportCsv'])->name('admin.atc.export');
        Route::get('/atc-applications/{registration}', [\App\Http\Controllers\Admin\AtcRegistrationController::class, 'show'])->name('admin.atc.show');
        Route::put('/atc-applications/{registration}', [\App\Http\Controllers\Admin\AtcRegistrationController::class, 'update'])->name('admin.atc.update');
        Route::delete('/atc-applications/{registration}', [\App\Http\Controllers\Admin\AtcRegistrationController::class, 'destroy'])->name('admin.atc.destroy');

        // Testimonial Moderation & Approvals
        Route::get('/testimonials', [\App\Http\Controllers\Admin\TestimonialController::class, 'index'])->name('admin.testimonials.index');
        Route::post('/testimonials/{testimonial}/toggle-approval', [\App\Http\Controllers\Admin\TestimonialController::class, 'toggleApproval'])->name('admin.testimonials.toggle-approval');
        Route::post('/testimonials/{testimonial}/toggle-featured', [\App\Http\Controllers\Admin\TestimonialController::class, 'toggleFeatured'])->name('admin.testimonials.toggle-featured');
        Route::delete('/testimonials/{testimonial}', [\App\Http\Controllers\Admin\TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');

        // Blog & Knowledge Articles Management
        Route::get('/blogs', [\App\Http\Controllers\Admin\BlogController::class, 'index'])->name('admin.blog.index');
        Route::get('/blogs/create', [\App\Http\Controllers\Admin\BlogController::class, 'create'])->name('admin.blog.create');
        Route::post('/blogs', [\App\Http\Controllers\Admin\BlogController::class, 'store'])->name('admin.blog.store');
        Route::get('/blogs/{blog}/edit', [\App\Http\Controllers\Admin\BlogController::class, 'edit'])->name('admin.blog.edit');
        Route::put('/blogs/{blog}', [\App\Http\Controllers\Admin\BlogController::class, 'update'])->name('admin.blog.update');
        Route::delete('/blogs/{blog}', [\App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('admin.blog.destroy');

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

        // Contact Inquiries Desk
        Route::get('/inquiries', [\App\Http\Controllers\Admin\InquiryController::class, 'index'])->name('admin.inquiries.index');
        Route::get('/inquiries/{inquiry}', [\App\Http\Controllers\Admin\InquiryController::class, 'show'])->name('admin.inquiries.show');
        Route::delete('/inquiries/{inquiry}', [\App\Http\Controllers\Admin\InquiryController::class, 'destroy'])->name('admin.inquiries.destroy');
    });
});

