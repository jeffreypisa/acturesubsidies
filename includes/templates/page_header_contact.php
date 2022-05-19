<?php
	$header_image = get_field('header_image');
	$header_title = get_field('header_title');
	$header_text = get_field('header_text');

	$address = get_field('address','option');
	$phone = get_field('phone','option');
	$email = get_field('email','option');
?>
<div id="page_header"<?php if($header_image) { echo ' style="background-image: url('.$header_image.');"'; } ?> class="contact">
	<div class="container">
		<?php if($header_title) { echo '<h1 class="title" itemprop="headline">'.$header_title.'</h1>'; } else { the_title('<h1 class="title" itemprop="headline">', '</h1>'); } ?>
		<?php if($header_text) { echo '<h2 class="text">'.$header_text.'</h2>'; } ?>
		<div id="contact_vcard">
			<img class="vcard_logo" src="<?php bloginfo('template_directory'); ?>/assets/img/logo_contact.png">
			<div class="vcard_content">
				<span class="address"><?php echo $address; ?></span>
				<a href="tel:<?php echo $phone; ?>" class="phone"><?php echo $phone; ?></a>
				<a href="mailto:<?php echo antispambot($email); ?>" class="mail"><?php echo antispambot($email); ?></a>
			</div>
		</div>
	</div>

	<script>

	function initialize() {
	  var myLatlng = new google.maps.LatLng(52.092976, 5.139602)
	  var wbrnd_map = 'wbrnd';
	  var featureOpts = [{"featureType":"administrative.country","elementType":"labels","stylers":[{"visibility":"off"},{"saturation":55}]},{"featureType":"all","elementType":"geometry.fill","stylers":[{"color":"#5572a8"},{"weight":2.29},{"lightness":-13}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#5572a8"},{"lightness":-35}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"off"},{"saturation":-66},{"lightness":-16}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"invert_lightness":true},{"color":"#ffffff"},{"lightness":-19}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"simplified"},{"invert_lightness":true},{"saturation":-16},{"lightness":31}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-31}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"visibility":"on"},{"invert_lightness":false},{"hue":"#1C92D1"},{"lightness":-13}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"visibility":"off"},{"weight":0.1},{"hue":"#1C92D1"},{"saturation":-1},{"lightness":26},{"gamma":0.69}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"},{"invert_lightness":true}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]}];
	  var mapOptions = {
	    zoom: 17,
	    center: myLatlng,
	    disableDefaultUI: true,
	    scrollwheel: false,
	    mapTypeControlOptions: {
	      mapTypeIds: [google.maps.MapTypeId.ROADMAP, wbrnd_map]
	    },
	    mapTypeId: wbrnd_map
	  }
	  var map = new google.maps.Map(document.getElementById('map'), mapOptions);

	  var styledMapOptions = {
	    name: 'Custom Style'
	  };

	  var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

	  map.mapTypes.set(wbrnd_map, customMapType);

	  var marker = new google.maps.Marker({
	      position: myLatlng,
	      map: map,
	      icon: '<?php bloginfo('template_directory'); ?>/assets/img/marker.png',
	      optimized: false
	  });
	}

	google.maps.event.addDomListener(window, 'load', initialize);
	</script>
	<div class="map_container">
		<div class="map_overlay"></div>
		<div id="map"></div>
	</div>
</div>