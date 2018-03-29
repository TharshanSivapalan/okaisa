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
            'email'                 => 'required|email|max:320|unique:users,email',
            'password'              => 'required|
                                           min:6|
                                           max:32|
                                           regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/|
                                           confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required'                => "L'e-mail est requis.",
            'password.required'             => "Le mot de passe est requis.",
            'password.regex'                => "Le mot de passe ne respecte pas les critères de sécurités.",
            'password.confirmed'            => "Les mots de passes ne sont pas identiques.."
        ];
    }
}
