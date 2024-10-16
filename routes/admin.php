<?php

use App\Http\Controllers\admin\company\CompanyController;
use App\Http\Controllers\admin\LevelController;
use App\Http\Controllers\admin\SubscripeController;
use App\Http\Controllers\admin\UsersController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::prefix('control')->group(function () {
        Route::get('/', function () {
            return view('admin.index');
        })->name('admin');
Route::resource('users',UsersController::class);
Route::resource('levels',LevelController::class);
Route::resource('subscriptions',SubscripeController::class);
Route::resource('companies',CompanyController::class);
    });
});





?>
