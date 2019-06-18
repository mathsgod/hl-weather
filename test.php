<?
use HL\Weather;

require_once("vendor/autoload.php");


$w = new Weather();
print_r($w->forecast());
