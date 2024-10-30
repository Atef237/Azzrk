<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts($request)
    {
        $page = $request->query('page', 1);
        $perPage = 50;
        /*  60 s * 12 H = 720 m * 60 s = 43200 s   */
        $products = Cache::remember("products_page_$page", 43200, function () use ( $perPage ) {
            return Product::with('colors','sizes')->paginate($perPage);
        });
        return $products;
    }


    public function store($request)
    {
        $product = Product::create($request->only('name', 'price'));
        if ($request->hasFile('images')) {
            $product->addMediaFromRequest('images')->toMediaCollection('products');
        }

        if ($request->has('colors')) {
            $colors = array_map(function ($color) {
                return ['color' => $color];
            }, $request->colors);
            $product->colors()->createMany($colors);
        }

        if ($request->has('sizes')) {
            $sizes = array_map(function ($size) {
                return ['size' => $size];
            }, $request->sizes);
            $product->sizes()->createMany($sizes);
        }
    }
}
