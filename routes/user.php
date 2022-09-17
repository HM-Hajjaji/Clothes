<?php

use App\Http\Controllers\home\HomeContoller;
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

Route::controller(HomeContoller::class)->group(function (){
    //home
    Route::get('/','home');
    //profile
    Route::get('/profile','profile')->middleware('auth')->name('profile');
});

require __DIR__.'/auth.php';
