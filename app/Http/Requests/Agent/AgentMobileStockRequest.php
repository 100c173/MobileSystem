<?php

namespace App\Http\Requests\Agent;

use Illuminate\Foundation\Http\FormRequest;

class AgentMobileStockRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'price' => ['required', 'numeric', 'gt:0'],
            'quantity' => ['required', 'integer', 'gt:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a number.',
            'price.gt' => 'The price must be greater than 0.',

            'quantity.required' => 'The quantity is required.',
            'quantity.integer' => 'The quantity must be an integer.',
            'quantity.gt' => 'The quantity must be greater than 0.',
        ];
    }
}
