<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Default route redirects to the login page if the user is not authenticated
Route::get('/', function () {
    if (session()->has('userId')) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

// Authentication routes
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logOut');
Route::post('login', [AuthController::class, 'login_check']);
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'register_save'])->name('register.store');

// Protected routes - only accessible if the user is authenticated
Route::middleware(['checkauth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('task', TaskController::class);
});
