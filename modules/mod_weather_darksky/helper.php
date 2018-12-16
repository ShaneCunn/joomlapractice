<?php

/**
 * Helper class for Hello World! module
 *
 * @package    Joomla.Tutorials
 * @subpackage Modules
 * @link http://docs.joomla.org/J3.x:Creating_a_simple_module/Developing_a_Basic_Module
 * @license        GNU/GPL, see LICENSE.php
 * mod_helloworld is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
class ModHelloWorldHelper
{
    /**
     * Retrieves the hello message
     *
     * @param   array $params An object containing the module parameters
     *
     * @access public
     */
    public static function getHello($params)
    {
        // Obtain a database connection
        $db = JFactory::getDbo();
// Retrieve the shout
        $query = $db->getQuery(true)
            ->select('darkskyAPI, lat, longitude')
            ->from($db->quoteName('#__weather_darksky'));
        //  ->where('darkskyAPI = ' . $db->Quote('en-GB'));
// //Prepare the query
        $db->setQuery($query);
// Load the row.
        // $result = $db->loadResult();
        $result = $db->loadAssoc();
        return $result;

    }


    public static function getData(&$params)
    {
        $APIParams = array();
        $APIParams['API_link'] = $params->get('API_link');
       // $APIParams['Lat_link'] = $params->get('Lat_link');
      //  $APIParams['Long_link'] = $params->get('Long_link');
        return $APIParams;
    }

}
