<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\User;
use App\Classes\Api\WeatherOnlineClass;

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

        // On génère et envoie la date du jour
        date_default_timezone_set('Europe/Paris');
        setlocale(LC_TIME, 'fr_FR.utf8','fra');// OK
        $dateNowFr = ucwords(strftime("%A %d %B %Y"));

        $wo = new WeatherOnlineClass();
        $actualCond = $wo->getActualCondFr($userExist->country);
        return view('chatbot', ['user' => $aUser, 'dateNowFr'=>$dateNowFr, 'actualCond' => $actualCond]);
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
        $pSession = "sessionId=".$email;
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
