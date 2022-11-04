<?php

use IdealTrends\dashboardIdeal\Http\Controllers\AuthController;
use IdealTrends\dashboardIdeal\Http\Controllers\HomeController;
use IdealTrends\dashboardIdeal\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticate']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', HomeController::class)->name('index');

    Route::resources([
        'users' => UserController::class
    ]);
});
