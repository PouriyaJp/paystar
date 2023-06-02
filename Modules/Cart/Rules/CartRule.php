<?php

namespace Modules\Cart\Rules;

use Illuminate\Contracts\Validation\Rule;

class CartRule implements Rule
{

    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        $cardNumber = str_replace(' ', '', $value); // حذف فاصله‌ها از شماره کارت
        $cardDigits = str_split($cardNumber);

        $sum = 0;
        $length = count($cardDigits);
        for ($i = $length - 1; $i >= 0; $i--) {
            $digit = intval($cardDigits[$i]);

            if ($i % 2 == $length % 2) {
                $digit *= 2;

                if ($digit > 9) {
                    $digit -= 9;
                }
            }

            $sum += $digit;
        }
        // اعتبارسنجی شماره کارت
        if ($sum % 10 === 0) {
            return true; // شماره کارت معتبر است
        } else {
            return false; // شماره کارت نامعتبر است
        }

        $cardNumber = $value;
        if (passes($cardNumber)) {
            echo "شماره کارت معتبر است";
        } else {
            echo "شماره کارت نامعتبر است";
        }

    }

    public function message()
    {
        return 'The validation error message.';
    }
}
