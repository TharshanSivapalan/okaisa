<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * index login
     */
    public function index()
    {
        // On vérifie si l'utilisateur est authentifié
        if(!Helpers::isAuth()) {
            return redirect('/');
        }

        $email = session()->get('user.email');
        $userExist = User::select()->where('email', $email)->first();
        $aUser = [];
        $aUser['email'] = $userExist->email;
        $aUser['last_name'] = $userExist->last_name;
        $aUser['first_name'] = $userExist->first_name;
        $aUser['gender'] = $userExist->gender;
        $aUser['phone'] = $userExist->phone;
        $aUser['country'] = $userExist->country;
        $aUser['city'] = $userExist->city;
        //$aUser['email'] = $userExist->email;

        return view('profile', ['user' => $aUser]);
    }

    /**
     * index login
     */
    public function update(UserUpdateRequest $request)
    {
        if(!Helpers::isAuth()) {
            return redirect('/');
        }

        $email = session()->get('user.email');
        // On récupère les données de l'utilisateur
        $userExist = User::select('id_user', 'password')->where('email', $email)->first();
        if($userExist == null) {
            return "0";
        }

        $userExist->last_name = $request->last_name;
        $userExist->first_name = $request->first_name;
        $userExist->gender = $request->gender;
        $userExist->phone = $request->phone;
        $userExist->country = $request->country;
        $userExist->city = $request->city;
        $userExist->save();

        return redirect('profile');
    }
}
