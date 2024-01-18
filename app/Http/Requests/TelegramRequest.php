<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TelegramRequest extends FormRequest
{
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    public function rules(): array
    {
        return [
            'chat_id' => 'required|min:5|max:255',
            'name' => 'required|min:5|max:255',
        ];
    }

    public function attributes(): array
    {
        return [
            'chat_id' => 'required|min:5|max:255',
            'name' => 'required|min:5|max:255',
        ];
    }
}
