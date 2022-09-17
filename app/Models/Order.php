<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function details_product()
    {
        return $this->belongsToMany(Order::class,'detail__orders','order_id','detail_product_id');
    }

    public function details_order()
    {
        return $this->hasMany(Detail_Order::class,'order_id');
    }

    public function getRouteKey()
    {
        return 'slug';
    }
}
