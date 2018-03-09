<?
namespace HL;

class Weather
{
    protected $data;

    public function __construct()
    {
         $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
        //$yql_query = 'select * from weather.forecast where woeid in (24865698,12467924,2165352)';
        $yql_query = 'select * from weather.forecast where woeid in (2165352) and u="c"';
        $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
        // Make call with cURL
        $session = curl_init($yql_query_url);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($session);
        // Convert JSON to PHP object
         $this->data =  json_decode($json, true);
    }

    public function data()
    {
        return $this->data;
    }
    
    public function get()
    {
        return $this->data["query"]["results"]["channel"];
    }

    public function forecast()
    {
        
        $d=$this->data["query"]["results"]["channel"]["item"]["forecast"];
        return array_map(function ($a) {
            $a["date"]=date("Y-m-d", strtotime($a["date"]));
            return $a;
        }, $d);
    }
}
