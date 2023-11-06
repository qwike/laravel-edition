<?php

namespace App\Rules;

use App\Repositories\MediaRepository;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CountImageRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function __construct(
        protected ?int $id,
        protected MediaRepository $mediaRepository,
    ) {}

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->id) {
            return;
        }
        $countMedia = $this->mediaRepository->getCountImagesHouse($this->id);
        $countMedia += count(array_filter($value));
        if ($countMedia > 5) {
            $fail('Можно загрузить до 5 изображений');
        }
    }
}
