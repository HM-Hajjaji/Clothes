<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
//        regex:/(\+212|0)([ \-_/]*)(\d[ \-_/]*){9}
//        |regex:/(\+212|0)([ \-_/]*)(\d[ \-_/]*){9}
        return [
            'name' => ['required', 'string', 'max:255'],
            'sex' => ['required','in:male,female','string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'password_confirmation' => 'required_with:password|same:password|min:8',
            'country' =>  ['required', 'string', 'max:255'],
            'phone' => 'unique:addresses|required|numeric',
            'city' => ['required', 'string', 'max:255'],
            'address' => 'required|min:3|max:1000',
            'code_postal' => 'required|numeric',
            'facebook' => 'url|nullable',
            'twitter' => 'url|nullable',
            'instagram' => 'url|nullable',
            'name_website' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:3','max:3000'],
            'logo' => 'image|mimes:jpg,png,jpeg,gif,svg|required|max:2048',
            'favicon' => 'image|mimes:jpg,png,icon|required|max:2048',
            'email_website' => ['required', 'string', 'email', 'max:255'],
            'phone_website' => 'required|numeric',
            'address_website' => 'required|min:3|max:1000',
            'facebook_website' => 'url|nullable',
            'twitter_website' => 'url|nullable',
            'tiktok_website' => 'url|nullable',
            'youtube_website' => 'url|nullable',
            'instagram_website' => 'url|nullable',
        ];
    }
}
