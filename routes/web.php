<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectImageController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TopController;
use Illuminate\Support\Facades\Route;


Route::controller(TopController::class)
    ->name('top.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });

Route::controller(ProjectController::class)
    ->name('projects.')
    ->prefix('projects')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{no}/show', 'show')->name('show');

        Route::middleware('auth:web')->group(function () {
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');

            Route::get('{no}/edit', 'edit')->name('edit');
            Route::post('{no}/update', 'update')->name('update');

            Route::post('{id}', 'check')->name('check');
            Route::delete('{id}', 'destroy')->name('destroy');
        });
    });
Route::controller(ProjectImageController::class)
    ->name('projects.images.')
    ->prefix('projects/images')
    ->group(function () {
        Route::get('{no}', 'show')->name('show');
        Route::get('{no}/add', 'create')->name('create');
        Route::post('{no}/add', 'add')->name('add');
        Route::delete('{no}/destroy/{imageNo}', 'destroy')->name('destroy');
    });
Route::controller(AuthController::class)
    ->name('auth.')
    ->group(function () {
        Route::get('login', 'index')->name('index');
        Route::post('login', 'login')->name('login');
        Route::post('logout', 'logout')->name('logout');
    });


Route::controller(TaskController::class)
    ->name('tasks.')
    ->prefix('tasks')
    ->middleware('auth:web')
    ->group(function () {
        Route::get('{projectId}/create', 'create')->name('create');
        Route::post('{projectId}/store', 'store')->name('store');

        Route::get('{projectId}/edit/{taskId}', 'edit')->name('edit');
        Route::post('{projectId}/update/{taskId}', 'update')->name('update');

        Route::post('{id}', 'check')->name('check');
    });
