<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class signinRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "email" => "required",
            "pass"  => "required",
        ];
    }

    public function messages()
    {
        return [
            "email.required" => "please insert your email address.",
            "pass.required"  => "please insert your password.",
        ];
    }
}
