<?php

use App\Http\Controllers\CertificateVerificationController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/verify/{code}', [CertificateVerificationController::class, 'apiVerify'])
        ->where('code', '.*')
        ->name('api.v1.verify');
});
