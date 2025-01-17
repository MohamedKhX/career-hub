<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomeController;
use App\Models\JobPost;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('job-details/{jobPost:id}', function (JobPost $jobPost) {
    return view('job-details', compact('jobPost'));
})->name('job-details');

Route::view('/login', 'auth.login')
    ->name('login');
require __DIR__.'/auth.php';
