<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class,'detail__products','detail_id','product_id');
    }

    public function product_details()
    {
        return $this->hasMany(Detail_Product::class,'detail_id');
    }
}
