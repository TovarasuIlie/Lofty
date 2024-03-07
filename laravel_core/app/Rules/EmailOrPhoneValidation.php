<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\MadeToMeasure;

class EmailOrPhoneValidation implements Rule
{
    private $attribute;
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
        $madeToMeasure = new MadeToMeasure();
        if($attribute == "phone-number") {
            if($madeToMeasure->where('phoneNumber', $value)->exists()) {
                $this->attribute = $attribute;
                return false;
            }
            else
                return true;
        } elseif($attribute == "email") {
            if($madeToMeasure->where('email', $value)->exists()) {
                $this->attribute = $attribute;
                return false;
            }
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if($this->attribute == "phone-number")
            return '<i class="fas fa-exclamation-triangle"></i> <b>Numarul de telefon</b> a fost utilizat intr-o alta comanda, care nu a fost finalizata.';
        elseif($this->attribute == "email")
            return '<i class="fas fa-exclamation-triangle"></i> <b>Adresa de email</b> a fost utilizat intr-o alta comanda, care nu a fost finalizata.';
    }
}
