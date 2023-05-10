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
    return view('Site.index');
});



Route::get('/clear/route', function (){
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    return 'Optimize Cleared Successfully';
});
