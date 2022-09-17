<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function detail()
    {
        return $this->belongsTo(Detail::class,'detail_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Detail_Product::class,'detail__orders','detail_product_id','order_id');
    }
    public function details_order()
    {
        return $this->hasMany(Detail_Order::class,'detail_product_id');
    }
}
