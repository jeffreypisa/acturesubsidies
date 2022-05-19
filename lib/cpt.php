<?php 
  function create_posttype() {
      
      register_post_type( 'klantverhalen',
	  	// CPT Options
	  		array(
	  			'labels' => array(
	  				'name'                  => __( 'Klantverhalen' ),
	  				'singular_name'         => __( 'Verhaal' ),
	      		'all_items'             => __( 'Alle verhalen' ),
	      		'add_new_item'          => __( 'Nieuwe verhaal toevoegen' ),
	      		'new_item'              => __( 'Nieuwe verhaal' ),
	          'add_new'               => __( 'Nieuwe verhaal' ),
	      		'edit_item'             => __( 'Bewerk verhaal' ),
	      		'update_item'           => __( 'Update verhaal' ),
	      		'view_item'             => __( 'Bekijk verhaal' ),
	      		'search_items'          => __( 'Zoek verhaal' ),
	  			),
	  			'menu_icon'               => 'dashicons-thumbs-up',
					'public'                  => true,
	  			'has_archive'             => false,
	  			'show_in_rest' 						=> true,
	  			'rewrite'                 => array('slug' => 'klantverhalen'),
	  			'supports'                => array( 'title', 'editor', 'thumbnail' ),
	  		)
	  	);  
	  		
	  	register_post_type( 'features',
	  	// CPT Options
	  		array(
	  			'labels' => array(
	  				'name'                  => __( 'Feature' ),
	  				'singular_name'         => __( 'Feature' ),
	      		'all_items'             => __( 'Alle features' ),
	      		'add_new_item'          => __( 'Nieuwe feature toevoegen' ),
	      		'new_item'              => __( 'Nieuwe feature' ),
	          'add_new'               => __( 'Nieuwe feature' ),
	      		'edit_item'             => __( 'Bewerk feature' ),
	      		'update_item'           => __( 'Update feature' ),
	      		'view_item'             => __( 'Bekijk feature' ),
	      		'search_items'          => __( 'Zoek feature' ),
	  			),
	  			'menu_icon'               => 'dashicons-image-filter',
					'public'                  => true,
	  			'has_archive'             => false,
	  			'show_in_rest' 						=> true,
	  			'rewrite'                 => array('slug' => 'features'),
	  			'supports'                => array( 'title', 'editor', 'thumbnail' ),
	  		)
	  	);
	  	
	  	register_post_type( 'integraties',
	  	// CPT Options
	  		array(
	  			'labels' => array(
	  				'name'                  => __( 'Integraties' ),
	  				'singular_name'         => __( 'Integratie' ),
	      		'all_items'             => __( 'Alle integraties' ),
	      		'add_new_item'          => __( 'Nieuwe integratie toevoegen' ),
	      		'new_item'              => __( 'Nieuwe integratie' ),
	          'add_new'               => __( 'Nieuwe integratie' ),
	      		'edit_item'             => __( 'Bewerk integratie' ),
	      		'update_item'           => __( 'Update integratie' ),
	      		'view_item'             => __( 'Bekijk integratie' ),
	      		'search_items'          => __( 'Zoek integratie' ),
	  			),
	  			'menu_icon'               => 'dashicons-share',
					'public'                  => true,
	  			'has_archive'             => false,
	  			'show_in_rest' 						=> true,
	  			'rewrite'                 => array('slug' => 'integraties'),
	  			'supports'                => array( 'title', 'editor', 'thumbnail' ),
	  		)
	  	);
	  	
	  	register_post_type( 'vacatures',
	  	// CPT Options
	  		array(
	  			'labels' => array(
	  				'name'                  => __( 'Vacatures' ),
	  				'singular_name'         => __( 'Vacature' ),
	      		'all_items'             => __( 'Alle vacatures' ),
	      		'add_new_item'          => __( 'Nieuwe vacature toevoegen' ),
	      		'new_item'              => __( 'Nieuwe vacature' ),
	          'add_new'               => __( 'Nieuwe vacature' ),
	      		'edit_item'             => __( 'Bewerk vacature' ),
	      		'update_item'           => __( 'Update vacature' ),
	      		'view_item'             => __( 'Bekijk vacature' ),
	      		'search_items'          => __( 'Zoek vacature' ),
	  			),
	  			'menu_icon'               => 'dashicons-id-alt',
					'public'                  => true,
	  			'has_archive'             => false,
	  			'show_in_rest' 						=> true,
	  			'rewrite'                 => array('slug' => 'career'),
	  			'supports'                => array( 'title', 'editor', 'thumbnail' ),
	  		)
	  	);
	  	
	  	register_post_type( 'kennisbank',
	  		// CPT Options
	  		array(
	  			'labels' => array(
	  				'name'                  => __( 'Kennisbank' ),
	  				'singular_name'         => __( 'Artikel' ),
	      		'all_items'             => __( 'Alle artikelen' ),
	      		'add_new_item'          => __( 'Nieuw artikel toevoegen' ),
	      		'new_item'              => __( 'Nieuw artikel' ),
	          'add_new'               => __( 'Nieuw artikel' ),
	      		'edit_item'             => __( 'Bewerk artikel' ),
	      		'update_item'           => __( 'Update artikel' ),
	      		'view_item'             => __( 'Bekijk verhaal' ),
	      		'search_items'          => __( 'Zoek artikel' ),
	  			),
	  			'menu_icon'               => 'dashicons-welcome-learn-more',
					'public'                  => true,
	  			'has_archive'             => false,
	  			'show_in_rest' 						=> true,
	  			'rewrite' 								=> array( 'slug' => 'kennisbank/%kennisbank_cat%', 
																					'with_front' 	=> false ),
	  			'supports'                => array( 'title', 'editor', 'thumbnail' ),
	  		)
	  	); 
	  	
		  register_post_type( 'sectoren',
			// CPT Options
			array(
				'labels' => array(
					'name'                  => __( 'Sectoren' ),
					'singular_name'         => __( 'Sector' ),
				'all_items'             => __( 'Alle sectoren' ),
				'add_new_item'          => __( 'Nieuwe sector toevoegen' ),
				'new_item'              => __( 'Nieuwe sector' ),
			'add_new'               => __( 'Nieuwe sector' ),
				'edit_item'             => __( 'Bewerk sector' ),
				'update_item'           => __( 'Update sector' ),
				'view_item'             => __( 'Bekijk sector' ),
				'search_items'          => __( 'Zoek sector' ),
				),
				'menu_icon'               => 'dashicons-admin-site-alt3',
				  'public'                  => true,
				'has_archive'             => false,
				'show_in_rest' 						=> true,
				'rewrite' 								=> array( 'slug' => 'werkgevers/sectoren', 
				'with_front' 	=> false ),
				'supports'                => array( 'title', 'editor', 'thumbnail' ),
			)
		); 
		
	  	register_post_type( 'changelog',
	  		// CPT Options
	  		array(
	  			'labels' => array(
	  				'name'                  => __( 'Changelog' ),
	  				'singular_name'         => __( 'Versie' ),
	      		'all_items'             => __( 'Alle versies' ),
	      		'add_new_item'          => __( 'Nieuwe versie toevoegen' ),
	      		'new_item'              => __( 'Nieuwe versie' ),
	          'add_new'               => __( 'Nieuwe versie' ),
	      		'edit_item'             => __( 'Bewerk versie' ),
	      		'update_item'           => __( 'Update versie' ),
	      		'view_item'             => __( 'Bekijk versie' ),
	      		'search_items'          => __( 'Zoek versie' ),
	  			),
	  			'menu_icon'               => 'dashicons-list-view',
					'public'                  => true,
	  			'has_archive'             => false,
	  			'show_in_rest' 						=> true,
	  			'rewrite' 								=> array( 'slug' => 'changelog/%changelog_cat%', 
																					'with_front' 	=> false ),
	  			'supports'                => array( 'title', 'editor' ),
	  		)
	  	); 
    		
  }

  // Hooking up our function to theme setup
  add_action( 'init', 'create_posttype' ); 
  
	function add_custom_rewrite_rule() {
	
	    // First, try to load up the rewrite rules. We do this just in case
	    // the default permalink structure is being used.
	    if( ($current_rules = get_option('rewrite_rules')) ) {
	
	        // Next, iterate through each custom rule adding a new rule
	        // that replaces 'movies' with 'films' and give it a higher
	        // priority than the existing rule.
	        foreach($current_rules as $key => $val) {
	            if(strpos($key, 'posts') !== false) {
	                add_rewrite_rule(str_ireplace('posts', 'blog', $key), $val, 'top');   
	            } // end if
	        } // end foreach
	
	    } // end if/else
	
	    // ...and we flush the rules
	    flush_rewrite_rules();
	
	} // end add_custom_rewrite_rule
	add_action('init', 'add_custom_rewrite_rule');
?>