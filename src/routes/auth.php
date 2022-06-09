<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\GoogleSocialiteController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('/admin/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/admin/auth/google', [GoogleSocialiteController::class, 'redirectToGoogle'])
        ->name('googleAuth');
    Route::get('/admin/google/callback', [GoogleSocialiteController::class, 'handleCallback'])
        ->name('googleCallback');
});

Route::middleware('auth')->group(function () {
    Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
