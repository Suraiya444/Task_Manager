<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout'])->name('logOut');
Route::post('login', [AuthController::class, 'login_check']);
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'register_save'])->name('register.store');

Route::middleware(['checkauth'])->group(function(){

    Route::get('/', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('customer', CustomerController::class);
    Route::resource('payment', PaymentController::class);
    Route::resource('task',TaskController::class);
});


