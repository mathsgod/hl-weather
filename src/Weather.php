<?
namespace HL;

class Weather
{
    protected $forecast;
    private $rss = [
        "hk" => "https://rss.weather.gov.hk/rss/SeveralDaysWeatherForecast_uc.xml",
        "en" => "https://rss.weather.gov.hk/rss/SeveralDaysWeatherForecast.xml",
        "cn" => "https://rss.weather.gov.hk/sc/rss/SeveralDaysWeatherForecast_uc.xml"
    ];

    public function __construct()
    {
        $r = $this->rss["en"];
        $xml = new \SimpleXMLElement(file_get_contents($r));

        $description = $xml->xpath("/rss/channel/item/description")[0];

        //preg_match_all("/Date\/Month:[\s]*([\w\W]*?)<br/", $description, $matches1);
        preg_match_all("/Temp range:[\s]*([\w\W]*?)C<br/", $description, $matches);
        $i = 0;
        foreach ($matches[1] as  $match) {
            $i++;
            $s = str_replace("\n", "", $match);
            $v = [];
            $v["date"] = date("Y-m-d", strtotime("today +$i day"));
            $range = explode("-", $s);
            $v["range"]["min"] = trim($range[0]);
            $v["range"]["max"] = trim($range[1]);

            $this->forecast[] = $v;
        }
    }

    public function forecast()
    {

        return $this->forecast;
    }
}
