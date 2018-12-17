<?php
/**
 * Hello World! Module Entry Point
 *
 * @package    Joomla.Tutorials
 * @subpackage Modules
 * @license    GNU/GPL, see LICENSE.php
 * @link       http://docs.joomla.org/J3.x:Creating_a_simple_module/Developing_a_Basic_Module
 * mod_helloworld is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

// No direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

// Instantiate global document object
$doc = JFactory::getDocument();


$hello = modHelloWorldHelper::getHello($params);

$API = modHelloWorldHelper::getData($params);
$apiKey = $API['google_link'];
$js = <<<JS
jQuery(document).ready(function($){
  console.log( "document loaded" );
  
 
  var GOOGLE_MAP_KEY = '$apiKey';
  function ipLookUp () {
  $.ajax('https://ip-api.com/json')
  .then(
      function success(response) {
          console.log('User\'s Location Data is ', response);
          console.log('User\'s Country', response.country);
          getAddress(response.lat, response.lon)
},

      function fail(data, status) {
          console.log('Request failed.  Returned status of',
                      status);
      }
  );
}
ipLookUp()
  function getAddress (latitude, longitude) {
  $.ajax('https://maps.googleapis.com/maps/api/geocode/json?' +
          'latlng=' + latitude + ',' + longitude + '&key=' + 
          GOOGLE_MAP_KEY)
  .then(
    function success (response) {
      console.log('User\'s Address Data is ', response)
    },
    function fail (status) {
      console.log('Request failed.  Returned status of',
                  status)
    }
   )
}


if ("geolocation" in navigator) {
  // check if geolocation is supported/enabled on current browser
  navigator.geolocation.getCurrentPosition(
   function success(position) {
     // for when getting location is a success
     console.log('latitude', position.coords.latitude, 
                 'longitude', position.coords.longitude);
     getAddress(position.coords.latitude, 
                position.coords.longitude)
   },
  function error(error_message) {
    // for when getting location results in an error
    console.error('An error has occured while retrieving' +
                  'location', error_message)
    ipLookUp()
  });}
  else {
      // geolocation is not supported
  // get your location some other way
  console.log('geolocation is not enabled on this browser')
  ipLookUp()
  }
  
});
       
 

JS;

$doc->addScriptDeclaration($js);
require JModuleHelper::getLayoutPath('mod_weather_darksky');
