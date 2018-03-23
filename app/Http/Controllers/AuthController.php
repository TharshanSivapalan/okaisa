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
    /*public function index()
    {
        return view('login');
    }*/

    /**
     * login
     */
    public function login(Request $request)
    {
        // On récupère les données reçu et ont les valides
        $email = $request->get('email');
        $password = $request->get('password');

        if(!isset($email) || !isset($password)) {
            return redirect()->back()->with("message", "Vos identifiants sont incorrect.");
        }

        $userExist = User::select('id_user', 'password')->where('email', $email)->first();
        if ($userExist == null)
        {
            return redirect()->back()->with("message", "Vos identifiants sont incorrect.");
        }
        if (!Hash::check($password, $userExist->password))
        {
            return redirect()->back()->with("message", "Vos identifiants sont incorrect.");
        }

        // On créé la session
        session()->put('user.email', $email);
        session()->put('user.first_name', $userExist->first_name);
        session()->put('user.lastname_name', $userExist->last_name);
        session()->put('user.gender', $userExist->gender);
        return redirect(route('profile'));
    }

    /**
     * logout
     */
    public function logout(Request $request)
    {
        if(Helpers::isAuth()) {
            session()->flush();
        }
        return redirect('/');
    }

    /**
     * logout
     */
    public function passwordLost(Request $request)
    {
        return view('password_lost');
    }
}
