<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
        $today = Carbon::today()->toDateString();
        return [
            "phone" => "required|numeric|regex:/^0[5-7][0-9]{8}$/",
            "date" => "required|date|after_or_equal:$today",
            "time" => "required|date_format:H:i",
            "meal_id" => "required|exists:meals,id",
            'qty' => "required|numeric",
            'adress' => "required",
            'status' => "required|in:pending,confirmed,Renvoyer",
        ];
    }
}
