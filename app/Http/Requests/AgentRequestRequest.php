<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentRequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'business_name'      => 'required|string|max:255',
            'commercial_number'  => 'required|string|max:50',
            'address'            => 'required|string|max:255',
            'latitude'           => 'required|numeric|between:-90,90',
            'longitude'          => 'required|numeric|between:-180,180',
            'notes'              => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
{
    return [
        'business_name.required' => 'The business name is required.',
        'commercial_number.required' => 'The commercial number is required.',
        'address.required' => 'The address is required.',
        'latitude.required' => 'The latitude is required.',
        'latitude.between' => 'The latitude must be between -90 and 90.',
        'longitude.required' => 'The longitude is required.',
        'longitude.between' => 'The longitude must be between -180 and 180.',
    ];
}
}
