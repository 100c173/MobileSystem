<?php

namespace App\Http\Requests\Mobile;

use Illuminate\Foundation\Http\FormRequest;

class MobileSpecificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //return $this->user() && $this->user()->hasRole('admin');
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'mobile_id' => 'required|exists:mobiles,id',
            'cpu' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'storage' => 'required|string|max:255',
            'camera' => 'required|string|max:255',
            'screen' => 'required|string|max:255',
            'battery' => 'required|string|max:255',
            'connectivity' => 'required|string|max:255',
            'security_features' => 'required|string|max:255',
        ];
    }
}
