<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\home\HomeContoller;
use Illuminate\Support\Facades\Route;


Route::controller(AdminController::class)->prefix('admin')->group(function (){
    //dashboard
    Route::get('/dashboard','dashboard')->name('dashboard');
});

