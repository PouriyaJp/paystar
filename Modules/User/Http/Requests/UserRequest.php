<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function rules()
    {
        return [
            'first_name' => 'required|max:120|min:1|regex:/^[ا-یa-zA-Z-ِِِِِِء-ي ]+$/u',
            'last_name' => 'required|max:120|min:1|regex:/^[ا-یa-zA-Z-ِِِِِِء-ي ]+$/u',
            'mobile' => ['required','digits:11','unique:users'],
            'email' => ['required','string','email','unique:users']
        ];
    }

    public function authorize()
    {
        return true;
    }
}
