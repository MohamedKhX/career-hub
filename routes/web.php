<?php

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

