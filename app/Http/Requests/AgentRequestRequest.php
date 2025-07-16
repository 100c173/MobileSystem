<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

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
    
            'country_id'         => 'required|exists:countries,id',
            'city_id'           => 'required|exists:cities,id',
            'latitude'           => 'required|numeric|between:-90,90',
            'longitude'          => 'required|numeric|between:-180,180',
        ];
    }

    public function messages(): array
    {
        return [
            'business_name.required' => 'The business name is required.',
            'commercial_number.required' => 'The commercial number is required.',
            
            'country_id.required' => 'The country selection is required.',
            'country_id.exists' => 'The selected country is invalid.',
            'city_id.required' => 'The city selection is required.',
            'city_id.exists' => 'The selected city is invalid.',
            'latitude.required' => 'The latitude is required.',
            'latitude.between' => 'The latitude must be between -90 and 90.',
            'longitude.required' => 'The longitude is required.',
            'longitude.between' => 'The longitude must be between -180 and 180.',
        ];
    }
}
