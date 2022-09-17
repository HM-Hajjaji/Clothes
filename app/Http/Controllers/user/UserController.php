<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['user','auth']);
    }

    public function profile()
    {
        return view('');
    }
}
