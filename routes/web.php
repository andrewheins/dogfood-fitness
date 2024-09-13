<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FitbitController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('welcome');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'fitbitConnected' => auth()->user()->oauthTokens()->where('provider', 'fitbit')->exists(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/fitbit/redirect', [FitbitController::class, 'redirect'])->name('fitbit.redirect');
    Route::get('/fitbit/callback', [FitbitController::class, 'callback'])->name('fitbit.callback');
    Route::post('/fitbit/disconnect', [FitbitController::class, 'disconnect'])->name('fitbit.disconnect');
});

Route::get('/terms-of-service', function () {
    return Inertia::render('TermsOfService');
})->name('terms.service');

Route::get('/privacy-policy', function () {
    return Inertia::render('PrivacyPolicy');
})->name('privacy.policy');

require __DIR__.'/auth.php';
