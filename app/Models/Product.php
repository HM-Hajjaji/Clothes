<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class,'product_id');
    }

    public function details()
    {
        return $this->belongsToMany(Detail::class,'detail__products','product_id','detail_id');
    }
    public function details_product()
    {
        return $this->hasMany(Detail_Product::class,'product_id');
    }
}
