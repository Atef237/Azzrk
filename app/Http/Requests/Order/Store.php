<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'products'                  => 'required|array',
            'products.*.product_id'     => 'required|exists:products,id',
            'products.*.quantity'       => 'required|integer|min:1',
            'products.*.product_price'  => 'required|numeric',
            'coupon'                    => 'nullable|string|exists:coupons,name',
        ];
    }
}
