<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class signupRequest extends FormRequest
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
            "email"    => "required|email|unique:users,email",
            "name"     => "required|min:7",
            "pass"     => "required|string|min:7"/**|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/"**/,
            "con_pass" => "required|same:pass",
        ];
    }

    public function messages()
    {
        return [
            "email.required"        => "please insert your email address.",
            "email.email"           => "your email address not valid.",
            "email.unique"          => "this email address already exists.",
            "name.required"         => "please insert your name.",
            "pass.required"         => "please insert your password.",
            "pass.string"           => "password must be string.",
            // "pass.regex"            => "password must contain uppercase, lowercase, number, and symbol.",
            "con_pass.required"     => "please insert confirmation password.",
            "con_pass.same"         => "confirmation password not match."
        ];
    }
}
