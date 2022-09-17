<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }
    public function detail_product()
    {
        return $this->belongsTo(Detail_Product::class,'detail_product_id');
    }
}
