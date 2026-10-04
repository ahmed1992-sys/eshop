<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class Doaddstudenttocourse extends FormRequest
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
            'studentID'=>'required',
             'start_date'=>'required',

        ];
    }
     public function messages()
    {
        return [
                 'studentID.required'=>'حقل  اختيار الطالب مطلوب',
                 'start_date.required'=>'  حقل بداية  بدايه الكورس مطلوب',

        ];
    }
}
