<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\userController;
use App\Http\Controllers\FrontEndController;

// front end controller controller
Route::get('/', [FrontEndController::class, 'index'])->name('frontHome');
// home / dashboard controller 
Route::get('/home', [HomeController::class, 'index'])->name('dashboard');

Auth::routes();

// users controller Route grouping 

 Route::get('/users', [userController::class, 'users'])->name('users')->middleware('auth');

Route::controller(userController::class)->prefix('user')->name('user.')->group(function(){ 

    Route::get('/edit/{user}', 'userEdit')->name('edit')->middleware('auth');
    Route::put('/update/{user}', 'userUpdate')->name('update')->middleware('auth');
    Route::delete('/delete/{user}', 'userDelete')->name('delete')->middleware('auth');

});

