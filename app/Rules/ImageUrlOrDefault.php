<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ImageUrlOrDefault implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $defaultImagePath = '/images/default-img.webp';

        if ($value !== $defaultImagePath && !filter_var($value, FILTER_VALIDATE_URL)) {
            $fail('The :attribute must be a valid URL or the default image path.');
        }
    }
}
