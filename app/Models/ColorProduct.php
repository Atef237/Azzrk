<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorProduct extends Model
{
    use HasFactory;
    //
    protected $fillable = ['color', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
