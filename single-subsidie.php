<?php get_header(); ?>

	<div id="content" class="content single_template">

		<?php if ( have_posts() ) while ( have_posts() ) : the_post();

		get_template_part( 'includes/templates/page_header_subsidie' );

		$themas = get_the_terms($post->ID, 'thema');
		$geos = get_the_terms($post->ID, 'geo');
		?>

		<div id="subsidie_content">
			<div class="container">
				<div class="row">
					<div class="column three_fourth">
						<div class="subsidie_details">
							<div class="subsidie_detail subsidie_prijs">
								<i class="icon-euro"></i>
								<span class="label">Bedrag</span>
								<span class="value"><?php the_field('subsidie_price'); ?></span>
							</div>
							<div class="subsidie_detail subsidie_thema">
								<i class="icon-thema"></i>
								<span class="label">Thema</span>
								<span class="value"><?php $all_themas = array(); foreach ($themas as $thema) { $all_themas[] = $thema->name;} $show_themas = join( ", ", $all_themas ); ?> <?php echo $show_themas; ?></span>
							</div>
							<div class="subsidie_detail subsidie_moeilijkheidsgraad">
								<i class="icon-moeilijkheidsgraad"></i>
								<span class="label">Moeilijkheidsgraad aanvragen</span>
								<span class="value stars">
									<?php if ( has_term('one', 'moeilijkheidsgraad', $post ) )  { ?><i class="fa fa-star"></i><?php } elseif ( has_term('two', 'moeilijkheidsgraad', $post ) )  { ?><i class="fa fa-star"></i><i class="fa fa-star"></i><?php } elseif ( has_term('three', 'moeilijkheidsgraad', $post ) )  { ?><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><?php } elseif ( has_term('four', 'moeilijkheidsgraad', $post ) )  { ?><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><?php } elseif ( has_term('five', 'moeilijkheidsgraad', $post ) )  { ?><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><?php } ?>
								</span>
							</div>
						</div>
					</div>
					<div class="column one_fourth">
						<div class="subsidie_geo">
							<i class="icon-geo"></i>
							<span class="label">Geo categorie</span>
							<span class="value"><?php $all_geos = array(); foreach ($geos as $geo) { $all_geos[] = $geo->name;} $show_geos = join( ", ", $all_geos ); ?> <?php echo $show_geos; ?></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="column one_half">
						<div class="subsidie_excerpt">
							<h3>Algemene omschrijving</h3>
							<?php the_field('subsidie_excerpt'); ?>
						</div>
					</div>
					<div class="column one_half">
						<div class="subsidie_dates">
							<div class="column one_half">
								<i class="icon-dates"></i>
								<span class="value">Ingangsdatum: <?php the_field('subsidie_start_date'); ?></span>
							</div>
							<div class="column one_half">
								<i class="icon-dates"></i>
								<span class="value">Uitgangsdatum: <?php the_field('subsidie_end_date'); ?></span>
							</div>
						</div>
						<div class="subsidie_cta">
							<h3><?php the_field('subsidie_cta_title'); ?></h3>
							<a href="<?php the_field('subsidie_cta_btn_link'); ?>" class="button"><?php the_field('subsidie_cta_btn_text'); ?></a>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<?php $orig_post = $post;
		    global $post;
		    $tags = wp_get_post_tags($post->ID);

		    if ($tags) {
		    $tag_ids = array();
		    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

		    $args = array(
			    'post_type'				=> 'subsidie',
			    'tag__in' 				=> $tag_ids,
			    'post__not_in' 			=> array($post->ID),
			    'posts_per_page'		=> 2,
			    'ignore_sticky_posts'	=> 1
		    );

		    $my_query = new wp_query( $args );

			if( $my_query->have_posts() ) { $themas = get_the_terms($post->ID, 'thema'); ?>

			<div id="related">
				<div class="container">
					<h2>Gerelateerde subsidies</h2>
					<?php $i = 1; while( $my_query->have_posts() ) {
				    $my_query->the_post(); $themas = get_the_terms($post->ID, 'thema'); ?>
					<article class="related_item subsidie<?php if($i%2 == 0) { echo ' last'; } ?>">
						<a href="<?php the_permalink(); ?>">
							<h3><?php the_title(); ?> subsidie</h3>
							<i class="icon icon-thema"></i> <span><?php $all_themas = array(); foreach ($themas as $thema) { $all_themas[] = $thema->name;} $show_themas = join( ", ", $all_themas ); ?> <?php echo $show_themas; ?></span>
							<i class="arrow fa fa-angle-right"></i>
						</a>
					</article>
				    <?php $i++; } ?>
				</div>
			</div>

			<?php }
		    }
		    $post = $orig_post;
		    wp_reset_query(); ?>
		</div>

		<div class="clear"></div>

		<div class="container">

			<main id="main" class="main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/WebPage">

				<h2 class="heading">Meer over <?php the_title(); ?></h2>

				<?php the_content(); ?>

			</main>

		</div>

		<?php endwhile; get_template_part( 'includes/templates/call_to_action' ); ?>

	</div>
	<!-- /#content -->

<?php get_footer(); ?>