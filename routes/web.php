<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/control', function () {
    return view('admin.index');
})->name('admin');
Route::get('/form', function () {
    return view('admin.form');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
require_once __DIR__.'/admin.php';
