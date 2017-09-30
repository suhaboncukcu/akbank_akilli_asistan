<?php
namespace App\Logic\Places;

use Cake\Core\Configure;
use Mills\GooglePlaces\googlePlaces;



/**
* 
*/
class Api
{
	
	private $apiKey = '';

	/**
	 * { function_description }
	 */
	function __construct()
	{
		$this->apiKey = Configure::read('places.API_KEY');
	}

	/**
	 * { function_description }
	 *
	 * @param      <type>        $lat    The lat
	 * @param      <type>        $lng    The lng
	 *
	 * @return     googlePlaces  ( description_of_the_return_value )
	 */
	public function test($lat, $lng)
	{
		$googlePlaces = new googlePlaces($this->apiKey);

		
		$googlePlaces->setLocation($lat . ',' . $lng);
		$googlePlaces->setTypes('restaurant|store|gas_station');

		$googlePlaces->setRadius(5000);
		$results = $googlePlaces->search(); 

		return $results;
	}
}