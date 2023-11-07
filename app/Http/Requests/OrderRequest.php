<?php

namespace App\Http\Requests;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class OrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    public function rules(): array
    {
        return [
            'comment_admin' => 'nullable|string|max:3000',
            'status' => ['required', new Enum(StatusEnum::class)],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'имя',
        ];
    }
}
