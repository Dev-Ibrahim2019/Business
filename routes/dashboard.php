<?php

use App\Http\Controllers\Dashboard\AboutController;
use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\MainSectionController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth'],
    'as' => 'dashboard.',
    'prefix' => 'dashboard',
], function () {

    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::group([], function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::group([], function () {
        Route::get('/home', [MainSectionController::class, 'edit'])->name('home.edit');
        Route::put('/home', [MainSectionController::class, 'update'])->name('home.update');
    });

    Route::group([], function () {
        Route::get('/about-us', [AboutController::class, 'edit'])->name('about.edit');
        Route::put('/about-us', [AboutController::class, 'update'])->name('about.update');
    });

    Route::resources([
        'services' => ServiceController::class,
        'blogs' => BlogController::class,
    ]);
});

