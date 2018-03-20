<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helpers;
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

        $userExist = User::select('id_user', 'password')->where('email', $email)->first();
        if ($userExist == null)
        {
            echo "Vos identifiants sont incorrects.";
            return;
        }
        if (!Hash::check($password, $userExist->password))
        {
            echo "Vos identifiants sont incorrects.";
            return;
        }

        // On créé la session
        session()->put('user', $email);
        echo "OK";
    }

    /**
     * logout
     */
    public function logout(Request $request)
    {
        if(Helpers::isAuth()) {
            session()->flush();
            echo "Vous avez été déconnecté.";
        } else {
            echo "Vous êtes déjà déconnecté.";
        }
    }
}
