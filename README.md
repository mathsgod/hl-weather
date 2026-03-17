![PHP Composer](https://github.com/mathsgod/hl-weather/workflows/PHP%20Composer/badge.svg)

# hl-weather

A PHP library for fetching Hong Kong weather forecasts from the [Hong Kong Observatory Open Data API](https://data.weather.gov.hk/weatherAPI/doc/HKO_Open_Data_API_Documentation.pdf).

## Requirements

- PHP >= 5.6
- Composer

## Installation

```bash
composer require mathsgod/hl-weather
```

## Usage

```php
use HL\Weather;

// English (default)
$w = new Weather();
print_r($w->forecast());

// Traditional Chinese
$w = new Weather('tc');
print_r($w->forecast());

// Simplified Chinese
$w = new Weather('sc');
print_r($w->forecast());
```

### forecast() return format

Each entry in the returned array contains:

| Key | Description |
|-----|-------------|
| `date` | Date in `YYYY-MM-DD` format |
| `low` | Minimum temperature |
| `high` | Maximum temperature |
| `unit` | Temperature unit (e.g. `C`) |
| `forecastWind` | Wind description |
| `forecastWeather` | Weather description |
| `forecastIcon` | Weather icon code |

Returns 9 days of forecast data.

## Testing

```bash
composer test
```

## License

Proprietary

