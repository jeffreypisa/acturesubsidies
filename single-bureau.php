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

	<div id="content" class="content single_template">

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div id="page_header"<?php if($header_image) { echo ' style="background-image: url('.$header_image.');"'; } ?>>
			<div class="container">
				<?php if($bureau_partner) { the_title('<h1 class="title" itemprop="headline">', ' <i class="verified fa fa-check" title="Partner van MijnSubsidie"></i></h1>'); } else { the_title('<h1 class="title" itemprop="headline">', '</h1>'); } ?>
				<?php if($header_text) { echo '<h2 class="text">'.$header_text.'</h2>'; } ?>
			</div>
			<div id="bureau_map" class="google-map">
				<div class="marker" data-lat="<?php echo $bureau_address['lat']; ?>" data-lng="<?php echo $bureau_address['lng']; ?>"></div>
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
						<div class="single_template_subsidies">
							<h2 class="single_template_heading">Kan u helpen met:</h2>
							<ul>
								<?php $subsidies = get_field('bureau_subsidies'); foreach( $subsidies as $subsidie) { ?>
								<li><a href="<?php echo get_permalink($subsidie); ?>"><?php echo get_the_title($subsidie); ?></a></li>
								<?php } ?>
							</ul>
						</div>
						<div class="single_template_contact">

							<h2 class="single_template_heading">Contactgegevens</h2><br />

							<div class="location">
								<span class="label">Adres</span>
								<address><?php echo $location_address[0]; ?><br /><?php echo $location_address[1]; ?></address>
								<?php if($bureau_phone || $bureau_website) { ?>
								<span class="label">Contact</span>
								<ul class="contact_details">
									<?php if($bureau_phone) { ?><li class="phone"><i class="fa fa-phone"></i> <span><?php echo $bureau_phone; ?></span></li><?php } ?>
									<?php if($bureau_website) { ?><li class="website"><a href="<?php echo $bureau_website; ?>" target="_blank"><i class="fa fa-globe"></i> <span>Website</span></a></li><?php } ?>
								</ul>
								<?php } ?>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<?php $orig_post = $post;
		    global $post;
		    $tags = wp_get_post_tags($post->ID);

		    if ($tags) {
		    $tag_ids = array();
		    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

		    $args = array(
			    'post_type'				=> 'bureau',
			    'tag__in' 				=> $tag_ids,
			    'post__not_in' 			=> array($post->ID),
			    'posts_per_page'		=> 2,
			    'ignore_sticky_posts'	=> 1
		    );

		    $my_query = new wp_query( $args );

			if( $my_query->have_posts() ) { $themas = get_the_terms($post->ID, 'thema'); ?>


			<div id="related">
				<div class="container">
					<h2>Gerelateerde bureau's</h2>
					<?php $i = 1; while( $my_query->have_posts() ) {
				    $my_query->the_post(); ?>
					<article class="related_item subsidie<?php if($i%2 == 0) { echo ' last'; } ?>">
						<a href="<?php the_permalink(); ?>">
							<h3><?php the_title(); ?></h3>
							<i class="arrow fa fa-angle-right"></i>
						</a>
					</article>
					<?php if($i%2 == 0) { echo '<div class="clear"></div>'; } ?>
				    <?php $i++; } ?>
				</div>
			</div>

			<?php }
		    }
		    $post = $orig_post;
		    wp_reset_query(); ?>
		</div>

		<div class="clear"></div>

		<?php endwhile; get_template_part( 'includes/templates/call_to_action' ); ?>

	</div>
	<!-- /#content -->

<?php get_footer(); ?>