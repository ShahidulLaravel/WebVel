<?php

use App\Http\Controllers\CategoryController;
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

// users controller 

Route::get('/users', [userController::class, 'users'])->name('users')->middleware('auth');
Route::get('/user/delete/{user_id}', [userController::class, 'userDelete'])->name('user.delete')->middleware('auth');
Route::get('/user/edit_profile', [userController::class, 'edit_profile'])->name('user.edit');
Route::post('/user/update_info', [userController::class, 'update_info'])->name('update.profile.info');
Route::post('/user/update_password', [userController::class, 'update_password'])->name('update.password');
Route::post('/user/update_image', [userController::class, 'update_image'])->name('update.image');

//Category
Route::get('/category', [CategoryController::class, 'category'])->name('category');

Route::post('/category/store', [CategoryController::class, 'category_store'])->name('category.store');

Route::get('/category/delete/{user_id}', [CategoryController::class, 'category_delete'])->name('category.delete');






