<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\storeRequest;
use App\Http\Resources\ProductsResource;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use App\responseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    use responseTrait;

    protected $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index( Request $request )
    {
        $products = $this->productRepository->getAllProducts($request);
        return $this->successResponse(ProductsResource::collection($products), 'retrieve product successfully', 200);
    }
    public function store( storeRequest $storeRequest )
    {
        $this->productRepository->store($storeRequest);
        return $this->successMessage( message:'product stored successfully');
    }
}
