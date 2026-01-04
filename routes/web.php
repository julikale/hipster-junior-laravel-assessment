<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController as AdminAuth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Customer\AuthController as CustomerAuth;

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

Route::get('/', function () {
    return view('welcome');
});

/* Admin Routes */
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuth::class, 'showLogin'])->name('admin.login');
    Route::get('register', [AdminAuth::class, 'showRegister'])->name('admin.register');
    Route::post('register', [AdminAuth::class, 'register']);
    Route::post('login', [AdminAuth::class, 'login']);

    Route::middleware('auth:admin')->group(function () {
        //Route::get('dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
        Route::get('dashboard', [DashboardController::class, 'dashboard'])
            ->name('admin.dashboard');
        Route::post('logout', [AdminAuth::class, 'logout'])->name('admin.logout');
    });
});


Route::prefix('customer')->group(function () {

    Route::get('register', [CustomerAuth::class, 'showRegister'])
        ->name('customer.register');

    Route::post('register', [CustomerAuth::class, 'register']);

    Route::get('login', [CustomerAuth::class, 'showLogin'])
        ->name('customer.login');

    Route::post('login', [CustomerAuth::class, 'login']);

    Route::middleware('auth:customer')->group(function () {
        Route::get('dashboard', fn () => view('customer.dashboard'))
            ->name('customer.dashboard');

        Route::post('logout', [CustomerAuth::class, 'logout'])
            ->name('customer.logout');
    });
});