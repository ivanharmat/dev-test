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

}