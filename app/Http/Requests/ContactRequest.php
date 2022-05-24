<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            "subject" => "bail|required|regex:/^[\dA-z.\s]{2,255}$/",
            "name" => "bail|required|regex:/^[A-z\d\s]{2,255}$/",
            "email" => "bail|required|email",
            "message" => 'required|regex:/^[\s\S.]*$/',
        ];
    }
}
