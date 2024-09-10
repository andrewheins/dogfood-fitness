<?php

use Illuminate\Support\Facades\Route;

// routes/web.php
Route::get('/terms-of-service', function () {
    return view('app');
});

Route::get('/privacy-policy', function () {
    return view('app');  // Serve the same Blade view for both pages
});

Route::get('/{any}', function () {
    return view('app'); // Render the main Blade template
})->where('any', '.*');  // This will match all routes

