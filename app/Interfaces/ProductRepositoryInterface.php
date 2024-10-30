<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    //

    public function getAllProducts($request);
    public function store($request);
}
