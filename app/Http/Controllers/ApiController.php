<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\User;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        // On récupère le body du Request reçu
        $jsonRequest = json_decode($request->getContent(), true);
        if(isset($jsonRequest['result']['action'])) {
            $action = $jsonRequest['result']['action'];
        } else {
            // 400:Bad Request
            return response("{\"error\":\"Aucune action détecté.\"}", 400)
                ->header('Content-Type', 'application/json');
        }

        $email = $jsonRequest['sessionId'];
        $userExist = User::select()->where('email', $email)->first();
        if($userExist==null) {
            return response("{\"error\":\"Aucun compte n'a été trouvé pour cette identifiant.\"}", 400)
                ->header('Content-Type', 'application/json');
        }

        $aUser = [];
        $aUser['email'] = $userExist->email;
        $aUser['gender'] = $userExist->gender;
        $aUser['city'] = $userExist->city;

        // Intent météo
        if($action == 'action.meteo') {
            return $this->weather($jsonRequest, $aUser);
        }

        // Intent Habille
        if($action == 'Habiller.Habiller-no') {
            return $this->dressNo($jsonRequest, $aUser);
        }
        if($action == 'Habiller.Habiller-yes.professionnel') {
            return $this->dressYesPro($jsonRequest, $aUser);
        }
        if($action == 'Habiller.Habiller-yes.night') {
            return $this->dressYesNight($jsonRequest, $aUser);
        }
        if($action == 'Habiller.Habiller-yes.mariage') {
            return $this->dressYesWed($jsonRequest, $aUser);
        }
        if($action == 'Habiller.Habiller-yes.personnel') {
            return $this->dressYesPerso($jsonRequest, $aUser);
        }

    }

    private function dressNo($jsonRequest, $aUser)
    {
        //On valide les paramètres reçu
        if( !isset($jsonRequest['result']['contexts']) ) {
            return response("{\"error\":\"Paramètres manquant.\"}", 400)
                ->header('Content-Type', 'application/json');
        }

        foreach($jsonRequest['result']['contexts'] as $context) {
            if(stripos($context['name'], 'habiller-followup') !== false) {
                $gender = $context['parameters']['genre'];
                break;
            }
        }

        if(isset($aUser['gender'])) {
            $gender = $aUser['gender'];
        }

        if(stripos($gender, 'H') !== false) {
            $response = "Je peux vous conseiller un pantalon.";
        } else if(stripos($gender, 'F') !== false) {
            $response = "Je peux vous conseiller une robe.";
        } else {
            $response = "Je peux vous conseiller un autre chose.";
        }

        $resChat = "{
              \"speech\": \"".$response."\",
              \"displayText\": \"".$response."\"
            }";
        // On retourne la réponse à DialogFlow
        return response($resChat, 200)
            ->header('Content-Type', 'application/json');
    }

    private function dressYesPro($jsonRequest, $aUser)
    {
        //On valide les paramètres reçu
        if( !isset($jsonRequest['result']['contexts']) ) {
            return response("{\"error\":\"Paramètres manquant.\"}", 400)
                ->header('Content-Type', 'application/json');
        }

        foreach($jsonRequest['result']['contexts'] as $context) {
            if(stripos($context['name'], 'habiller-followup') !== false) {
                $gender = $context['parameters']['genre'];
            }
        }

        if(isset($aUser['gender'])) {
            $gender = $aUser['gender'];
        }

        if(stripos($gender, 'H') !== false) {
            $response = "Je peux vous conseiller un costume.";
        } else if(stripos($gender, 'F') !== false) {
            $response = "Pour votre rendez-vous je peux vous conseiller une tenue simple, avec un chemisier, une veste et un pantalon cigarette.";
        } else {
            $response = "Je peux vous conseiller un autre chose.";
        }

        $resChat = "{
              \"speech\": \"".$response."\",
              \"displayText\": \"".$response."\"
            }";
        // On retourne la réponse à DialogFlow
        return response($resChat, 200)
            ->header('Content-Type', 'application/json');
    }

    private function dressYesNight($jsonRequest, $aUser)
    {
        //On valide les paramètres reçu
        if( !isset($jsonRequest['result']['contexts']) ) {
            return response("{\"error\":\"Paramètres manquant.\"}", 400)
                ->header('Content-Type', 'application/json');
        }

        foreach($jsonRequest['result']['contexts'] as $context) {
            if(stripos($context['name'], 'habiller-followup') !== false) {
                $gender = $context['parameters']['genre'];
            }
        }

        if(isset($aUser['gender'])) {
            $gender = $aUser['gender'];
        }

        if(stripos($gender, 'H') !== false) {
            $response = "Je vous conseille de porter un smoking.";
        } else if(stripos($gender, 'F') !== false) {
            $response = "Je vous conseille une robe rouge.";
        } else {
            $response = "Je peux vous conseiller un autre chose.";
        }

        $resChat = "{
              \"speech\": \"".$response."\",
              \"displayText\": \"".$response."\"
            }";
        // On retourne la réponse à DialogFlow
        return response($resChat, 200)
            ->header('Content-Type', 'application/json');
    }

    private function dressYesWed($jsonRequest, $aUser)
    {
        //On valide les paramètres reçu
        if( !isset($jsonRequest['result']['contexts']) ) {
            return response("{\"error\":\"Paramètres manquant.\"}", 400)
                ->header('Content-Type', 'application/json');
        }

        foreach($jsonRequest['result']['contexts'] as $context) {
            if(stripos($context['name'], 'habiller-followup') !== false) {
                $gender = $context['parameters']['genre'];
            }
        }

        if(isset($aUser['gender'])) {
            $gender = $aUser['gender'];
        }

        if(stripos($gender, 'H') !== false) {
            $response = "Je vous conseille de porter un costume.";
        } else if(stripos($gender, 'F') !== false) {
            $response = "Je vous conseille une robe rose.";
        } else {
            $response = "Je peux vous conseiller un autre chose.";
        }

        $resChat = "{
              \"speech\": \"".$response."\",
              \"displayText\": \"".$response."\"
            }";
        // On retourne la réponse à DialogFlow
        return response($resChat, 200)
            ->header('Content-Type', 'application/json');
    }

    private function weather($jsonRequest, $aUser)
    {
        //On valide les paramètres reçu
        if( !isset($jsonRequest['result']['parameters'])
            || !isset($jsonRequest['result']['parameters']['date']) ) {
            return response("{\"error\":\"Paramètres manquant.\"}", 400)
                ->header('Content-Type', 'application/json');
        }
        $pDate = $jsonRequest['result']['parameters']['date'];


        // On compose l'URL pour appeler l'API météo
        $baseUrl = "http://api.worldweatheronline.com";
        $serviceUrl = "/premium/v1/weather.ashx";
        $apiKey = "e3eb853cd11e4e2b90b113357182103";
        $city = $aUser['city'];
        $url = $baseUrl.$serviceUrl."?key=".$apiKey."&q=".$city."&format=json&num_of_days=3";

        // On récupère les informations météo
        $client = new Client();
        $res = $client->request('GET', $url, []);
        $statusCode = $res->getStatusCode();

        if($statusCode != 200) {
            $response = "La météo n'est pas accessible pour le moment.";
            $resChat = "{
              \"speech\": \"".$response."\",
              \"displayText\": \"".$response."\"
            }";
            // On retourne la réponse à DialogFlow
            return response($resChat, 200)
                ->header('Content-Type', 'application/json');
        }


        // On prévoit le plus mauvais temps de la journée
        $jsonWeather = json_decode($res->getBody(), true);
        $rain = false;
        $snow = false;
        if(!isset($jsonWeather['data']['weather'])) {
            $response = "La météo n'est pas accessible pour le moment.";
        } else {
            $weather = $jsonWeather['data']['weather'];
            // On cherche la journée demandé
            foreach ($weather as $day) {
                if ($day['date'] == $pDate) {
                    $hourly = $day['hourly'];
                    // On cherche le plus mauvais temps par heure
                    foreach ($hourly as $hour) {
                        $valueDesc = $hour['weatherDesc'][0]['value'];
                        if(stripos($valueDesc, 'rain') != false ||
                            stripos($valueDesc, 'dizzle') != false) {
                            $rain = true;
                        } else if (stripos($valueDesc, 'snow') != false) {
                            $snow = true;
                        }
                    }
                    if($snow) {
                        $response = "De la neige est prévu dans la ville de ".$city.".";
                    } else if ($rain) {
                        $response = "De la pluie est prévu dans la ville de ".$city.". Je vous recommande de prendre un parapluie.";
                    } else {
                        $response = "Il n'y a pas d'intemperies de prévu dans la ville de ".$city.".";
                    }
                    break;
                }
            }
        }

        if(!isset($response)) {
            $response = "Je n'ai pas encore la météo pour la date demandé.";
        }

        $resChat = "{
              \"speech\": \"".$response."\",
              \"displayText\": \"".$response."\"
            }";
        // On retourne la réponse à DialogFlow
        return response($resChat, 200)
            ->header('Content-Type', 'application/json');
    }
}