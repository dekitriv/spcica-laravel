<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "email" => "bail|required|email",
            "password" => "bail|required|regex:/^[\s\S.]{4,255}$/",
            "first_name" => "bail|required|regex:/^[A-zŠĐČĆŽšđžćč]+$/u",
            "last_name" => "bail|required|regex:/^[A-zŠĐČĆŽšđžćč]+$/u",
        ];
    }

    public function messages()
    {
        return [
            "email.required" => "Email is required",
            "email.email" => "Invalid email format",
            "password.required" => "Password is required",
            "password.regex" => "Password is too weak",
            "first_name.required" => "First name is required",
            "first_name.regex" => "Invalid name format",
            "last_name.required" => "Last name is required",
            "last_name.regex" => "Invalid name format",
        ];
    }
}
