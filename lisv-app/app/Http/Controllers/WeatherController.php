<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    //
    public function show(){
        $client = new Client(['base_uri' => 'api.openweathermap.org/data/2.5/forecast']); //GuzzleHttp\Client
        $response = $client->request('GET', '?q=London,us&appid=8308a0579530d6c50d4c3257b5a16d2f&mode=json');
        $obj = json_decode($response->getBody());
        $main = $obj->list[0]->main;
        // var_dump($main);
        $array = array($main);
        var_dump($array[0]);
        return view('weather')->with("array",$array);
        // 

    }
}
