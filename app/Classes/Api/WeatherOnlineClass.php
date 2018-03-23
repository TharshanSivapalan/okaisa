<?php

namespace App\Classes\Api;

use GuzzleHttp\Client;

class WeatherOnlineClass
{
    // On compose l'URL pour appeler l'API météo
    private $baseUrl = "http://api.worldweatheronline.com";
    private $serviceUrl = "/premium/v1/weather.ashx";
    private $apiKey = "e3eb853cd11e4e2b90b113357182103";

    public function getActualCondFr($city)
    {
        // On génère l'URL
        $url = $this->baseUrl.$this->serviceUrl."?key=".$this->apiKey."&q=".$city."&format=json&num_of_days=1";

        // On récupère les informations météo
        $client = new Client();
        $res = $client->request('GET', $url, []);
        $statusCode = $res->getStatusCode();

        if($statusCode != 200) {
            return null;
        }

        // On décode le JSON en Array
        $jsonWeather = json_decode($res->getBody(), true);
        $info = [];
        $info['pngUrl'] = $jsonWeather['data']['current_condition'][0]['weatherIconUrl'][0]['value'];

        // On cherche la traduction française
        $enCondition = $jsonWeather['data']['current_condition'][0]['weatherDesc'][0]['value'];
        echo $enCondition;
        $info['frCondition'] = "Inconnu";
        for($i=0; $i<count($this->enConditions); $i++) {
            if(strcasecmp($this->enConditions[$i],$enCondition)==0) {
                $info['frCondition'] = $this->frConditions[$i];
                break;
            }
        }

        return $info;
    }


    // Correspondance Eng<=>Fre du temps
    private $enConditions = ["Moderate or heavy snow in area with thunder",
        "Patchy light snow in area with thunder",
        "Moderate or heavy rain in area with thunder",
        "Patchy light rain in area with thunder",
        "Moderate or heavy showers of ice pellets",
        "Light showers of ice pellets",
        "Moderate or heavy snow showers",
        "Light snow showers",
        "Moderate or heavy sleet showers",
        "Light sleet showers",
        "Torrential rain shower",
        "Moderate or heavy rain shower",
        "Light rain shower",
        "Ice pellets",
        "Heavy snow",
        "Patchy heavy snow",
        "Moderate snow",
        "Patchy moderate snow",
        "Light snow",
        "Patchy light snow",
        "Moderate or heavy sleet",
        "Light sleet",
        "Moderate or Heavy freezing rain",
        "Light freezing rain",
        "Heavy rain",
        "Heavy rain at times",
        "Moderate rain",
        "Moderate rain at times",
        "Light rain",
        "Patchy light rain",
        "Heavy freezing drizzle",
        "Freezing drizzle",
        "Light drizzle",
        "Patchy light drizzle",
        "Freezing fog",
        "Fog",
        "Blizzard",
        "Blowing snow",
        "Thundery outbreaks in nearby",
        "Patchy freezing drizzle nearby",
        "Patchy sleet nearby",
        "Patchy snow nearby",
        "Patchy rain nearby",
        "Mist",
        "Overcast",
        "Cloudy",
        "Partly Cloudy",
        "Clear/Sunny"];

    private $frConditions = ["Neige modérée ou lourde dans la zone avec le tonnerre",
        "Neige légère dans la zone avec le tonnerre",
        "Pluie modérée ou forte dans la zone avec le tonnerre",
        "Pluie légère légère dans la région avec le tonnerre",
        "Douches modérées ou fortes de boulettes de glace",
        "Légères averses de boulettes de glace",
        "Averses de neige modérées ou fortes",
        "Légère chute de neige",
        "Douches modérées ou lourdes",
        "Douches de grésil léger",
        "Tête de pluie torrentielle",
        "Douche de pluie modérée ou forte",
        "Douche de pluie légère",
        "Granules de glace",
        "Beaucoup de neige",
        "Neige abondante",
        "Neige modérée",
        "Chutes de neige modérées",
        "Neige légère",
        "Neige légère",
        "Grésil modéré ou lourd",
        "Grésil léger",
        "Pluie verglaçante modérée ou forte",
        "Pluie verglaçante légère",
        "Forte pluie",
        "De fortes pluies par moments",
        "Pluie modérée",
        "Pluie modérée par moments",
        "Pluie légère",
        "Pluie légère légère",
        "Bruine verglaçante lourde",
        "Bruine verglaçante",
        "Bruine légère",
        "Bruine légère",
        "Brouillard givrant",
        "Brouillard",
        "Blizzard",
        "Poudrerie",
        "Flambées de Thundery à proximité",
        "Bruine verglaçante à proximité",
        "Grésil à proximité",
        "Chute de neige à proximité",
        "Pluie éparse à proximité",
        "Brouillard",
        "Couvert",
        "Nuageux",
        "Partiellement nuageux",
        "Clair / Ensoleillé"];


}
