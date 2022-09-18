<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreUserRequest;
use App\Http\Tools\ImportPhoto;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }


    public function store(StoreUserRequest $request)
    {
        $path = "";
        if ($request->hasFile('photo'))
        {
            $path = ImportPhoto::photo($request->file('photo'),'Photos/Users',400,400);
            /*$path = $request->file('photo')->storeAs('Photos/Users',$request->file('photo')->getClientOriginalName(),'public');*/
        }
        $user = User::create([
            'name' => Str::upper($request->name),
            'email' => Str::ucfirst($request->email),
            'sex'  => Str::ucfirst($request->sex),
            'password' => Hash::make($request->password),
            'photo'  => $path,
            'slug'  => Str::slug($request->name.Str::random(15)),
        ]);
        $user->address()->create([
            'user_id' => $user->id,
            'country' => Str::ucfirst($request->country),
            'phone'  => $request->phone,
            'city' => Str::ucfirst($request->city),
            'slug'  => Str::slug($request->country.Str::random(15)),
            'address'  => Str::ucfirst($request->address),
            'code_postal' => $request->code_postal,
            'facebook'  => $request->facebook,
            'twitter'  => $request->twitter,
            'instagram'  => $request->instagram
        ]);

        event(new Registered($user));

        Auth::login($user);

        if (Auth::user()->role == "admin")
        {
            return redirect()->route(User::$ADMIN);
        }
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
