<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreAdminRequest;
use App\Http\Tools\ImportPhoto;
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
        return view('admin-register');
    }

    public function store(StoreAdminRequest $request)
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
            'role'  => "admin"
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

        $setting = Setting::create([
            'name_website' => Str::upper($user->name_website),
            'description' => Str::ucfirst($request->description),
            'logo'  => ImportPhoto::photo($request->file('logo'),'Photos/WebSite',400,400),
            'favicon' =>ImportPhoto::photo($request->file('favicon'),'Photos/WebSite',100,100),
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
