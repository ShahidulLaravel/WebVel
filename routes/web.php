<?php

use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

// front end controller controller
Route::get('/', [FrontEndController::class, 'index'])->name('frontHome');
// home / dashboard controller 
Route::get('/home', [HomeController::class, 'index'])->name('dashboard');

Auth::routes();


// users controller
Route::get('/users', [userController::class, 'users'])->name('users')->middleware('auth');

Route::get('user/delete/{user_id}', [userController::class, 'userDelete'])->name('user.delete');
