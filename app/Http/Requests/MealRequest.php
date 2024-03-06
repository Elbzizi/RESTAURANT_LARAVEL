<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MealRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            // "name" => ["required", Rule::unique("meals")->ignoreModel($this->meal) ],
            'name' => 'required|unique:meals,name', 
            "description" => "required|string|max:250",
            "price" => "numeric|required",
            "image" => "mimes:png,jpeg,jpg|max:8000",
        ];

    }
}
