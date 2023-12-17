<?php

use App\Http\Controllers\ControlPanel\DashboardController;
use App\Http\Controllers\ControlPanel\SignUpController;
use App\Http\Controllers\ControlPanel\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('control-panel')->group(function () {
    Route::get('/login', [\App\Http\Controllers\ControlPanel\LoginController::class, 'index'])->name('controlPanel.login');
    Route::post('/login', [\App\Http\Controllers\ControlPanel\LoginController::class, 'login'])->name('controlPanel.login.post');
    Route::get('/logout', [\App\Http\Controllers\ControlPanel\LoginController::class, 'logout'])->name('controlPanel.logout');

    Route::get('/signup', [SignUpController::class, 'index'])->name('controlPanel.signup');
    Route::post('/signup', [SignUpController::class, 'signUp'])->name('controlPanel.signup.post');

    Route::get('/user-profile', [UserController::class, 'index'])->name('controlPanel.userProfile');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('controlPanel.dashboard');
});
