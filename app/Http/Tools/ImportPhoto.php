<?php

namespace App\Http\Tools;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImportPhoto
{
    public static function photo($photo,$path,$w,$h)
    {
        $phto_name = time()."_".Str::random(7).$photo->getClientOriginalName();
        $logo = Image::make($photo)->resize($w,$h);
        Storage::disk('public')->putFileAs($path,$logo->__toString(),$phto_name);

    }
}
