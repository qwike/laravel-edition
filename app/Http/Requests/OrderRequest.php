<?php

namespace App\Http\Requests;

use App\Enums\OrderTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:5|max:255',
            'phone' => 'required',
            'comment' => 'nullable|string|max:3000',
            'comment_admin' => 'nullable|string|max:3000',
            'status' => [new Enum(OrderTypeEnum::class)],
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'orderable_type' => 'Тип',
            'name' => 'Имя',
            'phone' => 'Номер телефона',
            'comment' => 'Комментарий',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
