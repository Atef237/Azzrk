<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
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
            'name'      => 'required|string',
            'price'     => 'required|numeric',
            'colors'    => 'array',
            'colors.*'  => 'string',
            'sizes'     => 'array',
            'sizes.*'   => 'string',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'price.required' => 'Price is required',
            'colors.required' => 'Colors is required',
            'sizes.required' => 'Sizes is required',
        ];
    }
}
