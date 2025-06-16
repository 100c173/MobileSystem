<?php

namespace App\Http\Requests\Mobile;

use Illuminate\Foundation\Http\FormRequest;

class MobileImageRequest extends FormRequest
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
            'url'       => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
            'is_primary' => 'boolean',
            'caption' => 'nullable|string|max:1000',
        ];
    }
}
