<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\userController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\SubCategoryController;

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

Route::post('/category/insert', [CategoryController::class, 'category_insert'])->name('category.insert');

Route::get('/category/delete/{user_id}', [CategoryController::class, 'category_delete'])->name('category.delete');

Route::get('/category/edit/{user_id}', [CategoryController::class, 'category_edit'])->name('category.edit');

Route::post('/category/update/', [CategoryController::class, 'category_update'])->name('category.update');

Route::get('/category/restore/{restore_id}', [CategoryController::class, 'category_restore'])->name('category.restore');

Route::get('/category/permanent/delete/{delete_id}', [CategoryController::class, 'category_per_del'])->name('category.del');

Route::post('/category/checked/delete', [CategoryController::class, 'category_check_del'])->name('category.check_del');

Route::post('/category/checked/restore_all', [CategoryController::class, 'category_check_res'])->name('category.restore_all');

//subcategory
Route::get('/subcategory', [SubCategoryController::class, 'subcategory'])->name('subcategory');

Route::post('/subcategory/insert', [SubCategoryController::class, 'subcategory_store'])->name('subcategory.store');








