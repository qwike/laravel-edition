<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CafeEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    public function rules()
    {
        return [
            'name' => 'required|min:5|max:255',
            'description' => 'nullable|string|max:3000',
            'image' => 'nullable|mimes:jpeg,jpg,png,webp|max:2048',
        ];
    }

    public function attributes(): array
    {
        return [
            'price' => 'Начальная Стоимоть',
        ];
    }
}
