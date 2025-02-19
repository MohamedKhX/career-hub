<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomeController;
use App\Models\JobPost;
use App\Notifications\AcceptedApplicationNotification;
use App\Notifications\RejectedApplicationNotification;
use Illuminate\Support\Facades\Route;

if(auth()->user()) {
    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    Route::get('job-details/{jobPost:id}', function (JobPost $jobPost) {
        return view('job-details', compact('jobPost'));
    })->name('job-details');
} else {
    Route::get('/', [HomeController::class, 'index'])
        ->name('home')
        ->middleware(['auth', 'verified']);

    Route::get('job-details/{jobPost:id}', function (JobPost $jobPost) {
        return view('job-details', compact('jobPost'));
    })
        ->name('job-details')
        ->middleware(['auth', 'verified']);;
}


Route::get('notifications', function () {
    $user = auth()->user();
    $notifications = $user->notifications;
    $notifications = $notifications->whereIn('type', [AcceptedApplicationNotification::class, RejectedApplicationNotification::class]);
    return view('notifications', [
        'notifications' => $notifications
    ]);
})->name('notifications');


Route::get('test', function() {
    Mail::to('muhamedkhx2@gmail.com');
});

require __DIR__.'/auth.php';
