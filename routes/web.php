<?php

use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\LandingPageController;
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

Route::get('/', function () {
    return view('welcome');
}); // to register as a user and login to dashboard

// landing page website
Route::get('/site', [LandingPageController::class, 'show'])->name('landing-page');

// contact us
Route::get('contact', [ContactController::class, 'create']);
Route::post('contact', [ContactController::class, 'store'])->name('contact');


require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
