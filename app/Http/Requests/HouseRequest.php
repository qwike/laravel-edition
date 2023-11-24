<?php

namespace App\Http\Requests;

use App\Enums\UnitEnum;
use App\Rules\CountImageRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class HouseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:5|max:255',
            'capacity' => 'required|gt:0',
            'description' => 'nullable|string|max:3000',
            'price' => 'required|gt:0',
            'image' => [
                'nullable',
                'array',
                'max:5',
                app(CountImageRule::class, ['id' => $this->route('id')]),
            ],
            'image.*' =>  'nullable|mimes:jpeg,jpg,png,webp|max:2048',
            'unit' => ['required', new Enum(UnitEnum::class)],
        ];
    }
}
