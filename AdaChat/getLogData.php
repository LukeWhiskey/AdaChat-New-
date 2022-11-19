<?php
	// include the google map time zone library to get results
 
	require_once ('GoogleMapsTimeZone.php');
 
	/**
	 * All queries require an API key from Google
	 * @link https://developers.google.com/maps/documentation/timezone/get-api-key
	 * */
 
	define('API_KEY', 'YOUR API KEY HERE');
 
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} 
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} 
	else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
 
	//code to get user location details using his IP address
 
	$user_ip = $ip;
 
	$url = "http://ipinfo.io/".$user_ip;
	$ip_info = json_decode(file_get_contents($url));
 
	$loc = $ip_info->loc;
	$loc_array = explode(',',$loc);
	$lat = $loc_array[0];
	$long = $loc_array[1];
 
 
	// Initialize GoogleMapsTimeZone object
	$timezone_object = new GoogleMapsTimeZone($lat, $long, GoogleMapsTimeZone::FORMAT_JSON);
 
	// Set Google API key
	$timezone_object->setApiKey(API_KEY);
 
	// Perform query 
	$timezone_data = $timezone_object->queryTimeZone();
?>