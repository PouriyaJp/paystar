<?php

namespace Modules\Cart\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Cart\Rules\CartRule;

class CartRequest extends FormRequest
{

    public function rules()
    {
        return [
            'cart_number' => ['required','digits:16',new CartRule()]
        ];
    }

    public function authorize()
    {
        return true;
    }
}
