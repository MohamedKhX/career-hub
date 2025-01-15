<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('job-details', 'job-details')->name('job-details');
Route::view('/login', 'auth.login')->name('login');
