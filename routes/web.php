<?php

use App\Http\Controllers\Site\HomeController;
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


Route::get('/', [HomeController::class,'index'])->name('/');

## contact us
Route::get('contact-us', [HomeController::class,'contactUs'])->name('contactUs');
Route::post('postContactUs', [HomeController::class,'postContactUs'])->name('postContactUs');
Route::post('postSubscribe', [HomeController::class,'postSubscribe'])->name('postSubscribe');

## Products
Route::get('products', [HomeController::class,'productPage'])->name('productPage');
Route::get('productDetails/{title}', [HomeController::class,'productDetails'])->name('productDetails');

## Blogs
Route::get('blogs', [HomeController::class,'blogs'])->name('blogs');
Route::get('blogDetails/{id}', [HomeController::class,'blogDetails'])->name('blogDetails');


// about page
Route::get('about', [HomeController::class,'about'])->name('about');




Route::get('/clear/route', function (){
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    return 'Optimize Cleared Successfully';
});
