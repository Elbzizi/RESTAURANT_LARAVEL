<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=>"String|required|unique:maels|max:150|min:50",
            "description"=>"required|text|max:250|min:50",
            "price"=>"numeric|required",
            "image"=>"required|mimse:png,jpeg,jpg|max:150",
        ];
    }
}
