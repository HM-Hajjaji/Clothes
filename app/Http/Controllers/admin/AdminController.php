<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['admin','auth']);
    }

    public function dashboard()
    {
        return view('dashboard');
    }
    public function profile()
    {
        return view('');
    }
}
