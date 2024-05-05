<?php

use App\Http\Controllers\Article\EditorController;
use App\Http\Controllers\Article\ReaderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Project\ProjectImageController;
use App\Http\Controllers\Project\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('top');
})->name('top');

Route::controller(AuthController::class)
    ->name('auth.')
    ->group(function () {
        Route::get('login', 'index')->name('index');
        Route::post('login', 'login')->name('login');
        Route::post('logout', 'logout')->name('logout');
    });

Route::prefix('projects')
    ->name('projects.')
    ->group(function () {
        Route::controller(ProjectController::class)->group(function () {
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

            Route::controller(ProjectImageController::class)
                ->name('images.')
                ->prefix('images')
                ->group(function () {
                    Route::get('{no}', 'show')->name('show');
                    Route::get('{no}/add', 'create')->name('create');
                    Route::post('{no}/add', 'add')->name('add');
                    Route::delete('{no}/destroy/{imageNo}', 'destroy')->name('destroy');
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
        });
    });


Route::prefix('blog')
    ->name('blog.')
    ->group(function () {
        Route::controller(ReaderController::class)
            ->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('{id}', 'show')->name('show');
            });

        Route::controller(EditorController::class)
            ->prefix('editor')
            ->name('editor.')
            ->middleware('auth:web')
            ->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::post('update/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'destroy')->name('delete');
            });
    });
