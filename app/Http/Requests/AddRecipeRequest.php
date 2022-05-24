<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRecipeRequest extends FormRequest
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
            "name" => "bail|required|regex:/^[\s\S.]*$/",
            "description" => "bail|required|regex:/^[\s\S.]*$/",
            "image" => "bail|required|image|max:2048",
            "category_id" => "bail|required",
            "step" => "bail|required",
            "ingredient_name" => "required",
            "ingredient_amount" => "required",
            "nutrition_name" => "required",
            "nutrition_amount" => "required",
            "servings" => "bail|required|integer|between:1,100",
            "cook_time" => "bail|required|integer|between:1,300",
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Title is required",
            "name.regex" => "Invalid title",
            "cateogry_id.required" => "You need to select atleast 1 category",
            "cateogry.regex" => "Invalid category",
            "image.image" => "File you have inserted is not image",
            "image.mimes" => "Invalid image format, you need to upload .png, .jpg or .jpeg format",
            "image.max" => "Image must be under 2MB",
            "step.required" => "You need to add atleast 1 step",
            "ingredient_name.required" => "You need to add atleast 1 ingredient",
            "ingredient_amount.required" => "You need to add atleast 1 ingredient amount",
            "nutrition_name.required" => "You need to add atleast 1 nutrition",
            "nutrition_amount.required" => "You need to add atleast 1 nutrition amount",
            "servings" => "Invalid servings",
            "cook_time" => "Invalid cooking time"
        ];
    }
}
