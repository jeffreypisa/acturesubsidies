<?php
	function wpb_cookies_tutorial2() { 
		
		
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
		    // exec your mysql queries and do else stuff...

				$someID = $_POST['post_password'];
				$thepassword = get_field('login_password', 'option');
				
				if ($someID == $thepassword) {
					setcookie('teacher', 'true', time()+3600, '/');
					header("Location: " . get_post_type_archive_link( 'teacher' ));
					die();
				}
		}
		
	} 
	add_action('init', 'wpb_cookies_tutorial2');

?>