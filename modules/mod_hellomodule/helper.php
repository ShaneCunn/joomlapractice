<?php
/**
 * Created by PhpStorm.
 * User: shane
 * Date: 14/12/2018
 * Time: 09:04
 */
/***
 * @package Joomla.Site
 * @subpackage mod_hellomodule
 * @copyright Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license GNU General Public License version 2 or later; see LICENSE.txt
 ***/
defined('_JEXEC') or die;


// Darkskies API Section

// Darkskies api Key
$appID = "2457a1a06421272ba3217d68bf4f47fa";

$lat = 53.270962;
$long = -9.062691;
$api_URL = "https://api.darksky.net/forecast/" . $appID . "/" . $lat . "," . $long; // set the api url
/**
 * @param $api_URL
 * @return array
 */
function GetAPI($api_URL)
{
    $processDark = curl_init($api_URL); // open the curl process and calls the
    curl_setopt($processDark, CURLOPT_USERAGENT, 1);
    curl_setopt($processDark, CURLOPT_RETURNTRANSFER, 1);
    $returnDark = curl_exec($processDark);
    $resultsDark = json_decode($returnDark, true);
    return array($processDark, $resultsDark);
}

list($processDark, $resultsDark) = GetAPI($api_URL);
//var_dump($resultsDark);
curl_close($processDark); // closes the curl init process
$temperature = round(($resultsDark['currently']['temperature'] - 32) / 1.8, 0);
$condition = $resultsDark['hourly']['summary'];
$humidity = ($resultsDark['currently']['humidity']) * 100 . "%";
$wind = round(($resultsDark['currently']['windSpeed']), 1); // round the number
$direction = $resultsDark['currently']['windBearing'];
$daily = $resultsDark['daily']['summary'];
$hourly = $resultsDark['hourly']['summary'];
$airPressure = $resultsDark['currently']['pressure'];
$icon = $resultsDark['currently']['icon'];
?>
<p>Let's put a greeting here</p>
<p>Today temp is: <?= $temperature ?>&deg;C</p>
<p>Summary: <?= $daily ?></p>
