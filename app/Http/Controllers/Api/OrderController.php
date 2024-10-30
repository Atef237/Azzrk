<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\Store;
use App\Models\Coupon;
use App\Models\ItemOrder;
use App\Models\Order;
use App\Models\Product;
use App\Repositories\OrderRepository;
use App\responseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    use responseTrait;

    protected $orderRepository;
    public function __construct( OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }


    public function store(Store $request)
    {
        $this->orderRepository->createOrder($request);
        return $this->successMessage('Order created successfully', 200);
    }

}
