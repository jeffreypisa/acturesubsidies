(function($) {

	/*
	*  new_map
	*
	*/

	function new_map( $el ) {

		// var
		var $markers = $el.find('.marker');

		// vars
		var args = {
			zoom		: 16,
			scrollwheel : false,
			mapTypeControl: false,
			center		: new google.maps.LatLng(0, 0),
			mapTypeId	: google.maps.MapTypeId.ROADMAP
		};

		// create map
		var map = new google.maps.Map( $el[0], args);

		// add a markers reference
		map.markers = [];

		// add markers
		$markers.each(function(){
	    	add_marker( jQuery(this), map );
		});

		// center map
		center_map( map );

		// return
		return map;

	}

	/*
	*  add_marker
	*
	*/

	function add_marker( $marker, map ) {

		// var
		var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

		// create marker
		var marker = new google.maps.Marker({
			position	: latlng,
			map			: map,
			icon: 'https://www.mijnsubsidie.com/wp-content/themes/mijnsubsidie/assets/img/marker_advisors.png',
			animation: google.maps.Animation.DROP
		});

		// add to array
		map.markers.push( marker );

		// if marker contains HTML, add it to an infoWindow
		if( $marker.html() )
		{
			// create info window
			var infowindow = new google.maps.InfoWindow({
				content		: $marker.html()
			});

			// show info window when marker is clicked
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open( map, this );
			});

		}

		google.maps.event.addListener(map, 'click', function() {
	        infowindow.close();
	    });

	}

	/*
	*  center_map
	*
	*/

	function center_map( map ) {

		// vars
		var bounds = new google.maps.LatLngBounds();

		// loop through all markers and create bounds
		$.each( map.markers, function( i, marker ){

			var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
			bounds.extend( latlng );

		});

		var input = document.getElementById('advisors_search');
		var autocomplete = new google.maps.places.Autocomplete(input);
		//map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

		google.maps.event.addListener(autocomplete, 'place_changed', function() {

	        // get the selected place
	        var place = this.getPlace();

	        // if there's a geometry available
	        if (place.geometry) {

	            // move the map to the position
	            map.panTo(place.geometry.location);

	            // update the zoom
	            map.setZoom(11);

	            // log the position
	            console.log(place.geometry.location.lat(),place.geometry.location.lng() )
	        }

	    })

		// only 1 marker?
		if( map.markers.length == 1 )
		{
			// set center of map
		    map.setCenter( bounds.getCenter() );
		    map.setZoom( 16 );
		}
		else
		{
			// fit to bounds
			map.fitBounds( bounds );
		}

	}

	/*
			*  document ready
			*
			*/
			var map = null;

			jQuery(document).ready(function(){

				jQuery('.google-map').each(function(){

					// create map
					map = new_map( jQuery(this) );

				});

			});

})(jQuery);
