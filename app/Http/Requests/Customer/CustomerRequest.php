<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
            'brand_id' => 'required|exists:brands,id',
            'model' => 'required|string|max:255',
            'ram' => 'required|string|max:50',
            'storage' => 'required|string|max:50',
            'price' => ['required', 'numeric', 'gt:0'],
            'operating_system_id' => 'required|exists:operating_systems,id',
            'description' => 'nullable|string|max:255' ,
            'condition' => [
                'required',
                Rule::in([
                    'New (Sealed)',
                    'New (Open Box)',
                    'Used - Like New',
                    'Used - Good',
                    'Used - Fair',
                    'Used - Poor'
                ])
            ],
        ];
    }


}
