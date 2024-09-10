<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php
Route::get('/terms-of-service', function () {
    return view('app');  // Serve the Blade template that contains the Vue app
});

