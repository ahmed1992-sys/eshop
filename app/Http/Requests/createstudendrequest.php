<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class createstudendrequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
    return [
            'name'=>'required',
                'phone'=>'required',
                    'country_id'=>'required',
                'nationalty_id'=>'required',
                'active'=>'required',
                'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }
     public function messages()
    {
        return [
                 'name.required'=>'هذا الحقل مطلوب',
                'phone.required'=>'هذا الحقل مطلوب',
                                'country_id.required'=>'هذا الحقل مطلوب',

                 'nationalty_id.required'=>'هذا الحقل مطلوب',
            'active.required'=>'هذا الحقل مطلوب',

        ];
    }
}
