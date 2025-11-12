<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Filter implements ValidationRule
{
    protected $nameFilter;
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function __construct($nameFilter)
    {
        $this->nameFilter = $nameFilter;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(in_array($value,$this->nameFilter))
        {
            $fail('The :attribute is forbidden ');
        }
    }
}
