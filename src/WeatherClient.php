<?php

namespace Lukundo\WeatherClient;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class WeatherClient
{
    protected string $apiKey;
    protected Client $client;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'base_uri' => 'https://api.openweathermap.org/data/2.5/',
        ]);
    }

    public function getCurrentWeather(string $city): array
    {
        try {
            $response = $this->client->get('weather', [
                'query' => [
                    'q' => $city,
                    'units' => 'metric',
                    'appid' => $this->apiKey
                ]
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            return [
                'city' => $data['name'] ?? 'Unknown',
                'temperature' => $data['main']['temp'] ?? null,
                'description' => $data['weather'][0]['description'] ?? 'No description'
            ];
        } catch (ClientException $e) {
            return [
                'error' => 'Failed to fetch weather: ' . $e->getMessage()
            ];
        }
    }
}