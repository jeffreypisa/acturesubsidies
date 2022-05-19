<?php
	
	// Set cookie
	
	function set_tab_cookie() {
	
		$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	
		if (strpos($url,'werkgevers') !== false) {
			setcookie('tab', 'werkgever', time()+31556926, '/');
		}
		
		elseif (!isset($_COOKIE['tab'])) {
	    	setcookie('tab', 'accountant', time()+31556926, '/');
	    }
    
    	elseif ( $_GET['tab'] === 'werkgever' ) {
			setcookie('tab', 'werkgever', time()+31556926, '/');
		}
		
		elseif ( $_GET['tab'] === 'accountant' ) {
			setcookie('tab', 'accountant', time()+31556926, '/');
		} 
			
	}
	
	add_action( 'init', 'set_tab_cookie');
	
	
	
	// Add active state tab to timber
	
	add_filter( 'timber/context', function( $context ) {
	
		$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
				
		if (!isset($_COOKIE['tab'])) {
			$tab_active = 'accountant';
		}
		
		if ( $_GET['tab'] === 'werkgever' ) {
			$tab_active = 'werkgever';
		}
		
		elseif ( $_GET['tab'] === 'accountant' ) {
			$tab_active = 'accountant';
		} 
		
		elseif (strpos($url,'werkgevers') !== false) {
			$tab_active = 'werkgever';
		}
		
		else {
			$tab_active = $_COOKIE['tab'];
		} 
		
		$context['tab_active'] = $tab_active;
		
		return $context;
	
	});