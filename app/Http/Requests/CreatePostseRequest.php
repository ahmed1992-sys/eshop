<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class CreatePostseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;//دي لازم تكون تروو
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
            'email'=>'required',
            'phone'=>'required',
            'message'=>'required',
        ];
    }
    #[Override]
    public function messages()
    {
        return [
                 'name.required'=>'هذا الحقل مطلوب',
            'email.required'=>'هذا الحقل مطلوب',
            'phone.required'=>'هذا الحقل مطلوب',
            'message.required'=>'هذا الحقل مطلوب',
        ];
    }
}
