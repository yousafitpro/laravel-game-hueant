<?php

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('Dashboard/')
    ->middleware(['auth'])
    ->group(function ($router) {
        Route::get('/',[App\Http\Controllers\DashboardController::class, 'index'])->name('Dashboard.index');
    });
// user
Route::prefix('user/')
    ->middleware(['auth'])
    ->group(function ($router) {
        Route::get('update-profile',[App\Http\Controllers\userController::class, 'showProfile'])->name('user.showProfile');
        Route::post('update-profile',[App\Http\Controllers\userController::class, 'updateProfile'])->name('user.showProfile');
        Route::post('reset-password',[App\Http\Controllers\userController::class, 'resetPassword'])->name('user.resetPassword');

    });
