<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'gender'                => 'max:255',
            //'email'                 => 'required|email|max:320|unique:users,email',
            'password'              => 'max:255'
        ];
    }

    public function messages()
    {
        return [
            'email.required'                => "L'e-mail est requis.",
            'password.required'             => "Le mot de passe est requis.",
            'password.confirmed'            => "Les mots de passes ne sont pas identiques.."
        ];
    }
}
