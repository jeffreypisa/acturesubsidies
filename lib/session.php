<?php
	
	// Set Session
	function session_init() {
		if (!session_id()) {
			session_start();
		}
	}
	
	add_action( 'init', 'session_init' );
	
	// Set cookie
	
	function set_tab_cookie() {
		
		// Forward to selected tab url
		
		$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

		if ( is_front_page() && isset($_COOKIE['tab']) && $_COOKIE['tab'] == "werkgever" ) {
			
			if ( $_GET['tab'] === 'accountant' ) {
				
			} else {
				$cookietab_page = get_field('cookietab_page', 'options');
		
				header('Location: '.$cookietab_page);
				die();
			}
		
		} 
		
		if (strpos($url,'werkgevers') !== false) {
			$_SESSION["tab"] = "werkgever";
		}
		
		elseif (!isset($_SESSION['tab'])) {
	    	$_SESSION["tab"] = "accountant";
	    }
	    
	    elseif ( $_GET['tab'] === 'werkgever' ) {
			$_SESSION["tab"] = "werkgever";
		}
		
		elseif ( $_GET['tab'] === 'accountant' ) {
			$_SESSION["tab"] = "accountant";
		} 
	
	}
	
	add_action( 'init', 'set_tab_cookie');
	
	
	
	// Add active state tab to timber
	
	add_filter( 'timber/context', function( $context ) {
		
		$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	
		if (strpos($url,'werkgevers') !== false) {
			$tab_active = 'werkgever';
		}
		
		elseif (!isset($_SESSION['tab'])) {
			$tab_active = 'accountant';
		}
		
		if ( $_SESSION['tab'] === 'werkgever' ) {
			$tab_active = 'werkgever';
		}
		
		elseif ( $_SESSION['tab'] === 'accountant' ) {
			$tab_active = 'accountant';
		} 
		
		else {
			$tab_active = $_SESSION['tab'];
		} 
		
		$context['tab_active'] = $tab_active;
		
		return $context;
	
	});