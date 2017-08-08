<?php 

class Main {	

	function __construct() {
		if(ENV == 'development') {
			error_reporting(E_ALL);
			ini_set('display_errors', 1);
		} else {
			error_reporting(0);
		}
	}

	public static $itemsPerPage = ITEMS_PER_PAGE;


	/**
	* private method getShipsData
	* url call to get the ships data
	* @param int page
	* @return array
	*/
	public static function getShipsData($page = 1) {
		$url = 'http://swapi.co/api/starships/?page='.$page.'&format=json';
		$response_code = self::get_http_response_code($url);
		
		$array_data = [];
		
		if($response_code == 200) {
			$json_data = file_get_contents($url);
			$array_data = json_decode($json_data, true);
		}
		return $array_data;
	}

	/**
	* private method get_http_response_code
	* checks if url exists and returns HTTP code
	* @param string url
	* @return int
	*/
	private static function get_http_response_code($url) {
    	$headers = get_headers($url);
    	return substr($headers[0], 9, 3);
    }

    public static function getPageNum($url, $next = true, $total = 0) {
    	$page_num = 0;

    	$url_parts = (!empty($url)) ? parse_url($url) : ['query' => ''];
    	parse_str($url_parts['query'], $query);
    	$page_num = (isset($query['page'])) ? $query['page'] : 0;

    	if(empty($url) || $page_num == 0) {
    		return ($next) ? 1 : ceil($total / self::$itemsPerPage);
    	}

    	return $page_num;
    }

    /**
	* method getJsonShipsData
	* formats ships data and returns json object
	* @param array ships
	* @return json object
	*/
    public static function getJsonShipsData($ships) {
    	$shipsJson = [];
    	foreach($ships as $key => $ship) {
    		$shipsJson[$key] = [
    			'name' => (isset($ship['name'])) ? ucwords($ship['name']) : 'n/a',
    			'manufacturer' => (isset($ship['manufacturer'])) ? ucwords($ship['manufacturer']) : 'n/a',
    			'starship_class' => (isset($ship['starship_class'])) ? ucwords($ship['starship_class']) : 'n/a',
    			'hyperdrive_rating' => (isset($ship['hyperdrive_rating'])) ? $ship['hyperdrive_rating'] : 'n/a',

    			'cargo_capacity' => (isset($ship['cargo_capacity'])) ? $ship['cargo_capacity'] : 'n/a',
    			'cost_in_credits' => (isset($ship['cost_in_credits'])) ? $ship['cost_in_credits'] : 'n/a',

    			'max_atmosphering_speed' => (isset($ship['max_atmosphering_speed'])) ? $ship['max_atmosphering_speed'] : 'n/a',
    			'MGLT' => (isset($ship['MGLT'])) ? $ship['MGLT'] : 'n/a',
    		];
    		// better formatting
    		if(is_numeric($shipsJson[$key]['cargo_capacity'])) {
    			$shipsJson[$key]['cargo_capacity'] = number_format($shipsJson[$key]['cargo_capacity'], 0);
    		}
    		if(is_numeric($shipsJson[$key]['cost_in_credits'])) {
    			$shipsJson[$key]['cost_in_credits'] = number_format($shipsJson[$key]['cost_in_credits'], 0);
    		}
    		if(is_numeric($shipsJson[$key]['max_atmosphering_speed'])) {
    			$shipsJson[$key]['max_atmosphering_speed'] = number_format($shipsJson[$key]['max_atmosphering_speed'], 0);
    		}

    	}
    	return json_encode($shipsJson, true);
    }

}