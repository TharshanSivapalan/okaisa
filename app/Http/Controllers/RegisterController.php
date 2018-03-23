<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * RegisterController index
     */
    public function index()
    {
        return view('register');
    }

    /**
     * RegisterController createAccount
     */
    public function createAccount(UserAddRequest $request)
    {
        // UserAddRequest a fait les validations
        // On créé l'utilisateur
        $user = new User();
        $user->last_name = "";
        $user->first_name = "";
        $user->country = "";
        $user->city = "";
        $user->phone = "";
        $user->gender = "";
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->active = 1;
        $user->first_connection = 1;
        $user->save();

        session()->put('user.email', $request->email);
        session()->put('user.first_name', "");
        session()->put('user.lastname_name', "");
        session()->put('user.gender', "");

        // On redirige vers la page de 1er connexion
        return redirect(route('profile'));

    }

}