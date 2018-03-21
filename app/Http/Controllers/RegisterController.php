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
        $user = new User();
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->active = 1;
        echo $user->save();

    }

}