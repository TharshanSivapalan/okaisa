<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class ApiController extends Controller
{
    /**
     * RegisterController index
     */
    public function index()
    {
        return view('register');
    }

    public function meteo()
    {
        // On compose l'URL pour appeler l'API météo
        $baseUrl = "http://api.worldweatheronline.com";
        $serviceUrl = "/premium/v1/weather.ashx";
        $apiKey = "e3eb853cd11e4e2b90b113357182103";
        $city = "Paris";
        $url = $baseUrl.$serviceUrl."?key=".$apiKey."&q=".$city."&format=json&num_of_days=0";

        $client = new Client();
        $res = $client->request('GET', $url, []);
        $statusCode = $res->getStatusCode();

        if($statusCode != 200) {
            echo $statusCode;
            return;
        }
        $response = json_decode($res->getBody(), true);
        echo "</br>";
       // echo $res->getBody();
        var_dump($response);
        echo "</br>";

    }
}