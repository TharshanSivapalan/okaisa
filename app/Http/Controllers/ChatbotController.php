<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\User;

class ChatbotController extends Controller
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

        return view('chatbot', ['user' => $aUser]);
    }

    public function ajax(Request $request)
    {
        // On vérifie si l'utilisateur est authentifié
        if(!Helpers::isAuth()) {
            return redirect('/');
        }

        // On récupère la phrase et les infos de l'utilisateur
        $text = $request->input('q');
        $email = $request->session()->get('user.email');
        $gender = $request->session()->get('user.gender');
        $city = $request->session()->get('user.city');

        // On contacte DialogFlow
        $baseUrl = "http://console.dialogflow.com";
        $serviceUrl = "/api-client/demo/embedded/1264e3c4-589e-4734-991b-eaaa20000153/demoQuery";
        $pText = "q=".$text;
        $pSession = "sessionId=8d5f0004-c5b0-3ec0-67a1-593cc7e19231";
        $url = $baseUrl.$serviceUrl."?".$pText."&".$pSession;

        // On récupère les informations
        $client = new Client();
        $res = $client->request('GET', $url, []);
        $statusCode = $res->getStatusCode();

        if($statusCode != 200) {
            // On retourne la réponse à DialogFlow
            return response("Une erreur de communication est survenue.", 400)
                ->header('Content-Type', 'text/plain');
        }

        $jsonRequest = json_decode($res->getBody(), true);
        if(!isset($jsonRequest['result']['fulfillment']['speech'])) {
            // 400:Bad Request
            return response("Aucune action détecté.", 400)
                ->header('Content-Type', 'text/plain');
        }

        $speech = $jsonRequest['result']['fulfillment']['speech'];
        return $speech;
    }
}
