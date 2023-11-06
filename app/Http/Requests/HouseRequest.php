<?php

namespace App\Http\Requests;

use App\Rules\CountImageRule;
use Illuminate\Foundation\Http\FormRequest;

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
            'description' => 'nullable|string|max:3000',
            'price' => 'required|gt:0',
            'image' => [
                'nullable',
                'array',
                'max:5',
                app(CountImageRule::class, ['id' => $this->route('id')]),
            ],
            'image.*' =>  'nullable|mimes:jpeg,jpg,png,webp|max:2048',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Наименование',
            'description' => 'Описание',
            'price' => 'Цена',
            'image' => 'Изображение',
        ];
    }
}
