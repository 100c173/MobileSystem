<?php

namespace App\Http\Requests\Mobile;

use Illuminate\Foundation\Http\FormRequest;

class MobileDescriptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() && $this->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'mobile_id'           => 'required|exists:mobiles,id',
            'design_dimensions'   => 'required|string',
            'display'             => 'required|string',
            'performance_cpu'     => 'required|string',
            'storage_desc'        => 'required|string',
            'connectivity_desc'   => 'required|string',
            'battery_desc'        => 'required|string',
            'extra_features'      => 'required|string',
            'security_privacy'    => 'required|string',
            'pros'                => 'required|string',
            'cons'                => 'required|string',
        ];
    }
}
