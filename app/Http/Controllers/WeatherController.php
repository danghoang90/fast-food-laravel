<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [

            "q" => "HaNoi",

            "appid" => "api_key"

        ] );

        $data = json_decode($response->body());

        $currentTime = time();

        return view('frontend.layouts.master', compact('data', 'currentTime'));
   }
}
