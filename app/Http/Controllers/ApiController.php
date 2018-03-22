<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        // On récupère le body du Request reçu
        $jsonRequest = json_decode($request->getContent(), true);
        //file_put_contents("C:\\file.txt", $request->getContent());
        if(isset($jsonRequest['result']['action'])) {
            $action = $jsonRequest['result']['action'];
        } else {
            // 400:Bad Request
            abort(400);
        }

        if($action == 'action.meteo') {
            return $this->meteo($jsonRequest);
        }
    }

    private function meteo($jsonRequest)
    {
        //On valide les paramètres reçu
        if( !isset($jsonRequest['result']['parameters']) ) {
            if( !isset($jsonRequest['result']['parameters']['date']) ) {
                abort(400);
            }
        }
        $pDate = $jsonRequest['result']['parameters']['date'];

        // On compose l'URL pour appeler l'API météo
        $baseUrl = "http://api.worldweatheronline.com";
        $serviceUrl = "/premium/v1/weather.ashx";
        $apiKey = "e3eb853cd11e4e2b90b113357182103";
        $city = "Paris";
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
                        $response = "De la neige est prévu.";
                    } else if ($rain) {
                        $response = "De la pluie est prévu.";
                    } else {
                        $response = "Il n'y a pas d'intemperies de prévu.";
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