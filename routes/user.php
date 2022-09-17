<?php

use App\Http\Controllers\home\HomeContoller;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;


Route::controller(UserController::class)->prefix("user")->group(function (){
    //profile
    Route::get('/profile','profile')->middleware('auth')->name('user-profile');
});

