<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemOrder extends Model
{
    protected $fillable = ['order_id', 'product_id','product_price', 'quantity', 'total'];
}
