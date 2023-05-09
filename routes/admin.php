<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => 'admin'], function () {
    #### Auth ####
    Route::get('login', [AuthController::class, 'index'])->name('admin.loginPage');
    Route::post('login', [AuthController::class, 'doLogin'])->name('admin.doLogin');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    #### Auth ####
    Route::get('logout', 'AuthController@logout')->name('admin.logout');

    #### Home ####
    Route::view('/', 'Admin/index')->name('adminHome');

    #### Admins ####
    Route::resource('admins', AdminController::class);

    #### Products ####
    Route::resource('products', ProductController::class);
    Route::DELETE('products.deleteImage/{id}', [ProductController::class,'deleteImage'])->name('products.deleteImage');
    Route::POST('addComment', [ProductController::class,'addComment'])->name('addComment');
    Route::DELETE('products.deleteComment/{id}', [ProductController::class,'deleteComment'])->name('products.deleteComment');

});

