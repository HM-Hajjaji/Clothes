<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreAdminRequest;
use App\Models\Address;
use App\Models\Setting;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisteredAdminController extends Controller
{
    public function create()
    {
        return view('');
    }

    public function store(StoreAdminRequest $request)
    {
        $user = User::create([
            'name' => Str::upper($request->name),
            'email' => Str::ucfirst($request->email),
            'sex'  => Str::ucfirst($request->sex),
            'password' => Hash::make($request->password),
            'photo'  => $request->photo,
            'slug'  => Str::slug($request->name.Str::random(15)),
            'role'  => "admin"
        ]);

        $address = Address::create([
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

        $setting = Setting::create([
            'name_website' => Str::upper($user->name_website),
            'description' => Str::ucfirst($request->description),
            'logo'  => $request->logo,
            'favicon' => $request->favicon,
            'email_website'  => Str::ucfirst($request->email_website),
            'phone_website' => $request->phone_website,
            'address_website'  => $request->address_website,
            'facebook_website'  => $request->facebook_website,
            'twitter_website'  => $request->twitter_website,
            'instagram_website'  => $request->instagram_website,
            'youtube_website'  => $request->tiktok_website,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->intended(User::$ADMIN);

    }
}
