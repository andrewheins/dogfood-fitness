<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

// Serve the Vue app for registration page
Route::view('/sign-up', 'app');

// Handle user registration form submission
Route::post('/register', function (Request $request) {
    // Validate the form inputs
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    // Create a new user
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),  // Hash the password
    ]);

    // Log the user in after registration
    Auth::login($user);

    return response()->json(['message' => 'User registered successfully'], 201);
});


// Catch-all route to serve the Vue app, but send a 404 status code for unknown routes
Route::get('/{any}', function () {
    return response()->view('app', [], 404);  // Send a 404 status code if route does not exist
})->where('any', '.*');
