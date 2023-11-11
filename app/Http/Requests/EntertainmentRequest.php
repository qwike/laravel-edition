<?php

namespace App\Http\Requests;

use App\Enums\UnitEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class EntertainmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:5|max:255',
            'description' => 'nullable|string|max:3000',
            'price' => 'required|gte:0',
            'image' => 'nullable|mimes:jpeg,jpg,png,webp|max:2048',
            'unit' => ['required', new Enum(UnitEnum::class)],
        ];
    }
}
