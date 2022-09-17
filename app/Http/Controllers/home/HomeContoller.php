<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeContoller extends Controller
{
    public function home()
    {
        return view('welcome');
    }
    public function profile()
    {
        return view('');
    }
}
