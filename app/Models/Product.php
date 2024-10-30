<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    //
    protected $fillable = ['name', 'price'];
    public function colors()
    {
        return $this->hasMany(ColorProduct::class);
    }

    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }
}
