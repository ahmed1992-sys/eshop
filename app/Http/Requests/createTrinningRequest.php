<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class createTrinningRequest extends FormRequest
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
            'courses_id'=>'required',
                'price'=>'required',
                    'start_date'=>'required',
                'end_date'=>'required',

        ];
    }
     public function messages()
    {
        return [
                 'courses_id.required'=>'حقل الكورس مطوب',
                'price.required'=>' حقل  السعر مطلوب',
                 'start_date.required'=>'  حقل بداية الكورس مطلوب',

                 'end_date.required'=>'حقل انتهاء الكورس مطلوب',

        ];
    }
}
