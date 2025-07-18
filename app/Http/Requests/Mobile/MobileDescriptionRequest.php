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
        //return $this->user() && $this->user()->hasRole('admin');
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
            'design_dimensions'    => 'required|string',

            'display.type'         => 'required|string',
            'display.size'         => 'required|string',
            'display.resolution'   => 'required|string',
            'display.refresh_rate' => 'required|string',

            'performance_cpu'      => 'required|string',
            'storage_desc'         => 'required|string',
            'connectivity_desc'    => 'required|string',
            'battery_desc'         => 'required|string',

            'key_features'         => 'required|array',
            'key_features.*'       => 'required|string|max:255',

            'security_privacy'     => 'required|string',
            
            'pros'                 => 'required|array',
            'pros.*'               => 'required|string|max:255',

            'cons'                 => 'required|array',
            'cons.*'               => 'required|string|max:255',
        ];
    }
}
