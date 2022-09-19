<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeContoller extends Controller
{
    public function home()
    {
        $admin_count = User::all()->where('role','admin')->count();
        if ($admin_count < 1)
        {
            return redirect()->route('admin-register');
        }
        return view('home');
    }
}
