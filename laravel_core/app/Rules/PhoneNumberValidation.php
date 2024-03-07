<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneNumberValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($value[0] == "0" && $value[1] == "7") {
            for ($i = 2; $i <= strlen($value) - 1; $i++) {
                if("0" > $value[$i] || $value[$i] > "9") 
                    return false;
            }
       } else 
            return false;
       return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '<i class="fas fa-exclamation-triangle"></i> Numarul introdus in campul <b>:attribute</b> nu este un numar de telefon valid.';
    }
}
