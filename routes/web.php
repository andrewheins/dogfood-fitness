<?php

use Illuminate\Support\Facades\Route;

// routes/web.php
Route::get('/', function () {
    return view('app');
});

Route::get('/terms-of-service', function () {
    return view('app');
});

Route::get('/privacy-policy', function () {
    return view('app');  // Serve the same Blade view for both pages
});

// Catch-all route to serve the Vue app, but send a 404 status code for unknown routes
Route::get('/{any}', function () {
    return response()->view('app', [], 404);  // Send a 404 status code if route does not exist
})->where('any', '.*');
