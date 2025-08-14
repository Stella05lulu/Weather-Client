<?php

require __DIR__ . '/vendor/autoload.php'; // ✅ Load Composer autoloader

use Lukundo\WeatherClient\WeatherClient; // ✅ Capital "L" to match namespace

class Weather
{
    public function index()
    {
        $weather = new WeatherClient('2269dfce1139836fa87083cb17da8f9f');
        $data = $weather->getCurrentWeather('Ndola');

        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}

$controller = new Weather();
$controller->index();