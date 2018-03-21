<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'last_name'             => 'max:120',
            'first_name'            => 'max:120',
            'phone'                 => 'max:13',
            'country'               => 'max:255',
            'city'                  => 'max:255',
            'need'                  => 'required',
            'email'                 => 'required|email|confirmed|max:320|unique:users,email',
            'email_confirmation'    => 'required',
            'password'              => 'required|confirmed|max:255',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required'                => "L'e-mail est requis.",
            'password.required'             => "Le mot de passe est requis.",
        ];
    }
}
