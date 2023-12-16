<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;



Route::controller(ProjectController::class)
    ->name('top.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{title}', 'show')->name('show');
    });



Route::prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {
        Route::controller(AuthController::class)
            ->group(function () {
                Route::get('login', 'index')->name('index');
                Route::post('login', 'login')->name('login');
            });

        Route::controller(DashboardController::class)->group(function () {
            Route::get('/top', 'index')->name('index');
            Route::post('{title}', 'show')->name('show');
        });

        Route::controller(ProjectController::class)->group(function () {
        });

        Route::controller(TaskController::class)->group(function () {
        });
    });
