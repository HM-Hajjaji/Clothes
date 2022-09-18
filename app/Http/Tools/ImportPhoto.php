<?php

namespace App\Http\Tools;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImportPhoto
{
    public static function photo($photo,$path,$w,$h)
    {
        $photo_name = time()."_".Str::random(7).$photo->getClientOriginalName();
        $logo = Image::make($photo)->resize($w,$h)->save(public_path('storage/'.$path.'/'.$photo_name));
        return $path.'/'.$photo_name;
    }

    public static function photo_update($photo,$path,$w,$h,$last)
    {
        ImportPhoto::photo_remove($last);
        $photo_name = time()."_".Str::random(7).$photo->getClientOriginalName();
        $logo = Image::make($photo)->resize($w,$h)->save(public_path('storage/'.$path.'/'.$photo_name));
        return $path.'/'.$photo_name;
    }

    public static function photo_remove($photo)
    {
        Storage::disk('public')->delete($photo);
    }
}
