<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',  // Name is required, string, max 255 characters
            'description' => 'nullable|string',  // Description is optional
            'price' => 'required|numeric|min:0',  // Price is required, must be a number, and cannot be negative
            // 'quantity' => 'required|integer|min:0',  // Quantity is required, must be an integer, and cannot be negative
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The product name is required.',
            'price.required' => 'The product price is required.',
            'price.numeric' => 'The product price must be a number.',
            'price.min' => 'The product price must be at least 0.',
            'quantity.required' => 'The product quantity is required.',
            'quantity.integer' => 'The product quantity must be an integer.',
            'quantity.min' => 'The product quantity cannot be negative.',
        ];
    }
}
