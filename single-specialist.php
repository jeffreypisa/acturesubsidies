<?php get_header();
$bureau_address = get_field('bureau_address');
$location_address = explode( "," , $bureau_address['address']);
$bureau_website = get_field('bureau_website');
$bureau_phone = get_field('bureau_phone');
$header_image = get_field('header_image');
$header_text = get_field('header_text');
$bureau_partner = get_field('bureau_partner');

$content = get_the_content();
$words = str_word_count($content);
?>

	<div id="content" class="content single_template advisor">

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div id="page_header"<?php if($header_image) { echo ' style="background-image: url('.$header_image.');"'; } ?>>
			<div class="container">
				<?php if($bureau_partner) { the_title('<h1 class="title" itemprop="headline">', ' <i class="verified fa fa-check" title="Partner van MijnSubsidie"></i></h1>'); } else { the_title('<h1 class="title" itemprop="headline">', '</h1>'); } ?>
				<?php if($header_text) { echo '<h2 class="text">'.$header_text.'</h2>'; } ?>
			</div>
			<script>

			function initialize() {

				var Latlng = new google.maps.LatLng(<?php echo $bureau_address['lat']; ?>, <?php echo $bureau_address['lng']; ?>)
				var mapOptions = {
					zoom: 17,
					center: Latlng,
					disableDefaultUI: true
				}

				var map = new google.maps.Map(document.getElementById('bureau_map'), mapOptions);

				var marker = new google.maps.Marker({
					position: Latlng,
					map: map,
					optimized: false
				});
			}

			google.maps.event.addDomListener(window, 'load', initialize);
			</script>
			<div id="bureau_map" class="google-map">
				<?php

			$locations = get_field('locations');

			if($locations) { foreach ($locations as $location ){
			$location_lat = $location['address']['lat'];
			$location_lng = $location['address']['lng'];
			$location_phone = $location['phone'];
			$location_website = $location['website'];
			$location_address = explode( ",", $location['address']['address'] );
			?>
			<div class="marker" data-lat="<?php echo $location_lat; ?>" data-lng="<?php echo $location_lng; ?>"></div>
			<?php } } ?>
			</div>
			<div id="page_header_overlay"></div>

		</div>

		<div class="single_template_content">
			<div class="container">
				<div class="row">
					<div class="column one_half">
						<div class="single_template_about">
							<h2 class="single_template_heading">Over <?php the_title(); ?></h2><br />
							<?php if($words > 100) { ?>
							<span class="single_template_about_more">Meer informatie</span>
							<?php } ?>
							<?php the_post_thumbnail('post'); ?>
							<?php the_content(); ?>
						</div>
					</div>
					<div class="column one_half">
						<div class="single_template_contact">
							<h2 class="single_template_heading">Contactgegevens</h2><br />
							<?php $locations = get_field('locations');

							$i = 1; if($locations) { foreach ($locations as $location ){
							$location_address = explode( ",", $location['address']['address'] );
							$location_phone = $location['phone'];
							$location_website = $location['website'];
							$location_email = $location['email']; ?>
							<div class="location<?php if($i%2 == 0) { echo ' last'; } ?>">
								<span class="label">Adres</span>
								<address><?php echo $location_address[0]; ?><br /><?php echo $location_address[1]; ?></address>
								<?php if($location_phone || $location_website) { ?>
								<span class="label">Contact</span>
								<ul class="contact_details">
									<?php if($location_phone) { ?><li class="phone"><i class="fa fa-phone"></i> <span><?php echo $location_phone; ?></span></li><?php } ?>
									<?php if($location_website) { ?><li class="website"><a href="<?php echo $location_website; ?>" target="_blank"><i class="fa fa-globe"></i> <span>Website</span></a></li><?php } ?>
									<?php if($location_email) { ?><li class="email"><a href="mailto:<?php echo $location_email; ?>"><i class="fa fa-envelope"></i> <span>Stuur een e-mail</span></a></li><?php } ?>
								</ul>
								<?php } ?>
							</div>
							<?php if($i%2 == 0) { echo '<div class="clear"></div>'; } ?>
							<?php $i++; } } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>

			<div class="container more_partners">
<?php $terms = get_the_terms( $post->ID, 'locatie' );
if ( !empty( $terms ) ){
    // get the first term
    $term = array_shift( $terms );
    $parent = $term->parent;
    $term2 = get_term( $parent, 'locatie' );
} ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>locatie/<?php echo $term2->slug; ?>">Bekijk meer informatie over subsidies in <?php echo $term2->name; ?><i class="fa fa-angle-right"></i></a>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>adviseurs-overzicht/">Bekijk hier het overzicht van alle aangesloten partners <i class="fa fa-angle-right"></i></a>
			</div>

			<?php $i = 1; $bureaus = get_field('related_bureaus'); if($bureaus) { ?>
			<div id="related">
				<div class="container">
					<h2>Gerelateerde bureau's</h2>
				    <?php foreach( $bureaus as $bureau) { ?>
					<article class="related_item subsidie<?php if($i%2 == 0) { echo ' last'; } ?>">
						<a href="<?php echo get_permalink($bureau); ?>">
							<h3><?php echo get_the_title($bureau); ?></h3>
							<i class="arrow fa fa-angle-right"></i>
						</a>
					</article>
					<?php if($i%2 == 0) { echo '<div class="clear"></div>'; } ?>
				    <?php $i++; } ?>
				</div>
			</div>
			<?php } ?>

		</div>

		<div class="clear"></div>

		<?php endwhile; get_template_part( 'includes/templates/call_to_action' ); ?>

	</div>
	<!-- /#content -->

<?php get_footer(); ?>