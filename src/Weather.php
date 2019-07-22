<?

namespace HL;

class Weather
{
    protected $forecast;
    private $url = "https://data.weather.gov.hk/weatherAPI/opendata/weather.php?dataType=fnd&lang={lang}";

    public function __construct($lang = "en")
    {

        $url = str_replace(["{lang}"], [$lang], $this->url);

        $data = json_decode(file_get_contents($url), true);

        $weatherForecast = $data["weatherForecast"];

        $this->forecast = [];

        foreach ($weatherForecast as $d) {
            $v = [];
            $v["date"] = substr($d["forecastDate"], 0, 4) . "-" . substr($d["forecastDate"], 4, 2) . "-" . substr($d["forecastDate"], 6, 2);
            $v["low"] = $d["forecastMintemp"]["value"];
            $v["high"] = $d["forecastMaxtemp"]["value"];
            $v["unit"] = $d["forecastMaxtemp"]["unit"];
            $v["forecastWind"] = $d["forecastWind"];
            $v["forecastWeather"] = $d["forecastWeather"];
            $v["forecastIcon"] = $d["ForecastIcon"];
            $this->forecast[] = $v;
        }
    }

    public function forecast()
    {
        return $this->forecast;
    }
}
