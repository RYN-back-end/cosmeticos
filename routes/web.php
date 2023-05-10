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
Route::get('contact-us', [HomeController::class,'contactUs'])->name('contactUs');
Route::post('postContactUs', [HomeController::class,'postContactUs'])->name('postContactUs');
Route::post('postSubscribe', [HomeController::class,'postSubscribe'])->name('postSubscribe');
Route::get('productDetails/{title}', [HomeController::class,'productDetails'])->name('productDetails');




Route::get('/clear/route', function (){
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    return 'Optimize Cleared Successfully';
});
