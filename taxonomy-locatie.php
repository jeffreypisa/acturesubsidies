<?php get_header();

$term = get_queried_object();
$term_id = $term->term_id;
$term_slug = $term->slug;
$taxonomy = $term->taxonomy;

$children = get_terms( $term->taxonomy, array(
	'parent'    => $term->term_id,
	'hide_empty' => false
));

$header_image = get_field('header_image', $term);
$logo = get_field('image', $term); ?>

	<div id="content" class="content with_sidebar term">

		<div id="page_header"<?php if($header_image) { echo ' style="background-image: url('.$header_image.');"'; } ?>>

			<div class="container">
				<?php if($logo) { ?><img class="term_logo" src="<?php echo $logo; ?>" alt=""><?php } ?>
				<h1 class="title" itemprop="headline">Subsidies in <?php echo apply_filters( 'the_title', $term->name ); ?></h1>
				<h2 class="text">Een overzicht van de subsidiemogelijkheden en adviseurs in <?php echo apply_filters( 'the_title', $term->name ); ?>.</h2>

			</div>

			<div id="page_header_overlay"></div>

		</div>

		<div class="container">

			<main id="main" class="main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/WebPage">

				<?php echo term_description(); ?>

				<?php $args = array(
				    'post_type' => 'specialist',
				    'posts_per_page' => 6,
				    'locatie' => $term->slug
				);
				$query = new WP_Query( $args );

				if ($query->have_posts()) { ?>

			        <?php $i = 1; while ( $query->have_posts() ) : $query->the_post(); ?>

			        <article class="post large term<?php if($i%2 == 0) { echo ' last'; } if(has_post_thumbnail()) { echo ' thumbnail'; } ?>" id="post-<?php the_id(); ?>">
						<a href="<?php the_permalink(); ?>">
							<?php if(has_post_thumbnail()) { the_post_thumbnail('post'); } ?>
							<h3 class="post_title"><?php if (strlen($post->post_title) > 40) { echo substr(the_title($before = '', $after = '', FALSE), 0, 50) . '...'; } else { the_title(); } ?></h3>
							<span class="post_more<?php if ( has_post_thumbnail() ) { echo ' thumbnail'; } ?>" href="<?php the_permalink(); ?>"><span>Bekijk adviseur</span> <i class="fa fa-angle-right"></i></span>
						</a>
					</article>

			        <?php $i++; endwhile; ?>

				<?php } wp_reset_postdata(); ?>

				<div class="clear"></div>

				<a class="more_partners" href="<?php echo esc_url( home_url( '/' ) ); ?>adviseurs-overzicht/">Bekijk hier het overzicht van alle aangesloten partners <i class="fa fa-angle-right"></i></a>

			</main>

			<div id="sidebar" class="sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

				<div class="form_header">
					<h2>Bel mij terug</h2>
					<p>Een specialist neemt contact met u op en vertelt u over uw subsidiemogelijkheden.</p>
				</div>

				<?php echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true"]'); ?>

				<?php query_posts( 'post_type=post&posts_per_page=3&tag='.$term_slug ); if ( have_posts() ) : ?>
				<h3 class="related_blogs_heading">Gerelateerde blogs</h3>
				<ul class="related_blogs">
				<?php while ( have_posts() ) : the_post(); ?>
					<li><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-right"></i> <span><?php the_title(); ?></span></a></li>
				<?php endwhile; ?>
				</ul>
				<?php endif; wp_reset_query(); wp_reset_postdata(); ?>

			</div>

			<div class="clear"></div>

		</div>

		<?php $termz = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
		$rootId = end( get_ancestors( $term_id, 'locatie' ) );
		$root = get_term( $rootId, 'locatie' ); ?>
		<div id="related_locations">

		<div class="container">

			<h2>Gerelateerde gemeentes <?php if ($termz->parent == 0) { ?>(<a href="<?php echo esc_url( home_url( '/' ) ); ?>provincies"><?php echo apply_filters( 'the_title', $termz->name ); ?></a>)<?php } else { ?>(<a href="<?php echo esc_url( home_url( '/' ) ); ?>provincies"><?php echo $root->name; ?></a>)<?php } ?></h2>
			<ul>
			<?php if ($termz->parent == 0) {
			wp_list_categories('taxonomy=locatie&depth=1&show_count=0&hide_empty=1&title_li=&child_of=' . $termz->term_id);
			} else {
			wp_list_categories('taxonomy=locatie&show_count=0&hide_empty=1&title_li=&child_of=' . $termz->parent);
			}
			?>
			<li class="cat-item more"><a href="<?php echo esc_url( home_url( '/' ) ); ?>provincies">Bekijk andere provincies</a></li>
			</ul>

		</div>

		</div>

	</div>
	<!-- /#content -->

<?php get_footer(); ?>