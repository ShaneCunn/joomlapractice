<?php
// No direct access
defined('_JEXEC') or die;

$image = null;
$humidity = null;
$wind = null;
$city = null;
$temperature = null;
$country = null;
$ip = null;
// Darkskies API Section

// Darkskies api Key
//$appID = "2457a1a06421272ba3217d68bf4f47fa";
$appID = $API['API_link'];
$lat = 53.270962;
$long = -9.062691;

//$lat = $result['lat'];
//$long = $result['longitude'];
$api_URL = "https://api.darksky.net/forecast/" . $appID . "/" . $lat . "," . $long; // set the api url
/**
 * @param $api_URL
 * @return array
 */
function GetWeatherAPI($api_URL)
{
    $processDark = curl_init($api_URL); // open the curl process and calls the
    curl_setopt($processDark, CURLOPT_USERAGENT, 1);
    curl_setopt($processDark, CURLOPT_RETURNTRANSFER, 1);
    $returnDark = curl_exec($processDark);
    $resultsDark = json_decode($returnDark, true);
    return array($processDark, $resultsDark);
}


list($processDark, $resultsDark) = GetWeatherAPI($api_URL);
//var_dump($resultsDark);
curl_close($processDark); // closes the curl init process
$temperature = round(($resultsDark['currently']['temperature'] - 32) / 1.8, 0);
$condition = $resultsDark['hourly']['summary'];
$humidity = round($resultsDark['currently']['humidity']) * 100 . "%";
$wind = round(($resultsDark['currently']['windSpeed']), 1); // round the number
$direction = $resultsDark['currently']['windBearing'];
$daily = $resultsDark['daily']['summary'];
$hourly = $resultsDark['hourly']['summary'];
$airPressure = $resultsDark['currently']['pressure'];
$icon = $resultsDark['currently']['icon'];
?>
<p>Api key: <?= $hello['darkskyAPI'] ?></p>


<p>API Url: <?= $api_URL ?></p>

<p>Today temp is: <?= $temperature ?>&deg;C</p>
<p>Summary: <?= $daily ?></p>


