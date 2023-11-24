<?php

namespace App\Http\Requests\Api;

use App\Enums\OrderTypeEnum;
use App\Rules\CaptchaValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class FormCreateRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
    private ?string $table = null;
    protected function prepareForValidation(): void
    {
        foreach (OrderTypeEnum::cases() as $case)
        {
            if($case->name === $this->input('orderable_type')) {
                $this->table = $case->name;
                $this->merge(['orderable_type' => $case->value]);
                break;
            }
        }
    }

    public function rules(): array
    {
        return [
            'orderable_type' => [
                'required',
                new Enum(OrderTypeEnum::class),
            ],
            'orderable_id' => 'required|exists:'.$this->table.',id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^\\+7\d{10}$/',
            'comment' => 'nullable|string|max:3000',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }
}
