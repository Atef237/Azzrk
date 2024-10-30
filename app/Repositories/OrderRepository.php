<?php

namespace App\Repositories;

use App\Models\Coupon;
use App\Models\ItemOrder;
use App\Models\Order;

class OrderRepository
{

    public function createOrder($request)
    {
        $order = Order::create([
            'user_id' => Auth()->id(),
            'order_total' => 0, // Initialize order_total to 0
        ]);

        $sumOfTotals = 0;

        foreach ($request->products as $product) {
            $total = $product['quantity'] * $product['product_price'];
            $sumOfTotals += $total;
            ItemOrder::create([
                'order_id'      => $order->id,
                'product_id'    => $product['product_id'],
                'quantity'      => $product['quantity'],
                'product_price' => $product['product_price'],
                'total'         => $total,
            ]);
        }

        $data = [];
        if ($request->has('coupon')) {
            $coupon = Coupon::where('name', $request->coupon)->first();
            if ($coupon && $coupon->Usage_limit > 0) {
                $discountAmount = $coupon->discount_percentage;
                $couponPercentageValue = number_format(($discountAmount * $sumOfTotals) / 100, 2, '.', '');
                $orderTotalAfterCoupon = number_format($sumOfTotals - $couponPercentageValue, 2, '.', '');

                $data = [
                    'order_total_after_coupon' => $orderTotalAfterCoupon,
                    'coupon_value' => $discountAmount,
                    'coupon_percentage_value' => $couponPercentageValue,
                ];
                $coupon->decrement('Usage_limit');
            }
        }
        $order->update(array_merge($data, ['order_total' => $sumOfTotals]));
    }
}
