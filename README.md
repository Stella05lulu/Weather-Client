# WeatherClient

WeatherClient is a reusable PHP Composer package for fetching current weather data from the OpenWeather API. It works in standalone PHP scripts and integrates easily with CodeIgniter 4.

## Features

- Accepts API key on initialization  
- Fetches current weather for any city  
- Adds `Authorization: Bearer {API_KEY}` header automatically  
- Returns weather data as an associative array

## Installation

Install via Composer:

```bash
composer require lukundo/weather-client
```

## API Key Setup

Get your API key from [OpenWeather](https://openweathermap.org/api) and pass it when initializing the client:

```php
$client = new WeatherClient('your_api_key');
```

## Usage

### Standalone PHP

```php
require 'vendor/autoload.php';

use Lukundo\WeatherClient;

$client = new WeatherClient('your_api_key');
$weather = $client->getWeather('Ndola');
print_r($weather);
```

### CodeIgniter 4

```php
use Lukundo\WeatherClient;

public function showWeather()
{
    $client = new WeatherClient('your_api_key');
    $data['weather'] = $client->getWeather('Ndola');
    return view('weather_view', $data);
}
```

## Sample Output

```php
[
    'city' => 'Ndola',
    'temperature' => 23.5,
    'description' => 'clear sky',
    'humidity' => 60,
    'wind_speed' => 4.2
]
```

## License

MIT License

## Contributing

Feel free to open issues or submit pull requests.
