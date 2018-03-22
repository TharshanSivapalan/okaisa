<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;

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
        return view('profile');
    }
}
