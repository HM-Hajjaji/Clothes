<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
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
        ];
    }
}
