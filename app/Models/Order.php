<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['order_total','coupon_value','coupon_percentage_value','order_total_after_coupon','user_id'];
}
