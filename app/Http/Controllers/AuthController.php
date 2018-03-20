<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Auth Controller
    |--------------------------------------------------------------------------
    |
    |
    */

    /**
     * index login
     */
    public function index()
    {
        return view('login');
    }

    /**
     * login
     */
    public function login(Request $request)
    {
        // On récupère les données reçu et ont les valides
        $email = $request->get('email');
        $password = $request->get('password');

        if(!isset($email) || !isset($password)) {
            echo "Vos identifiants sont incorrects.";
            return;
        }

        $userExist = User::select('id_user')->where(['email' => $email, 'password' => Hash::make($password)])->count();
        if ($userExist == 0)
        {
            echo "Vos identifiants sont incorrects.";
            return;
        }

        echo "OK";
    }
}
