<?php

function my_acf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyB_RU6Io1kF50LKttWP480KBCU3RfdGTHM';
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');