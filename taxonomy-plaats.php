<?php get_header();

$term = get_queried_object();
$term_id = $term->term_id;
$taxonomy = $term->taxonomy;

$header_image = get_field('header_image', $term);
$logo = get_field('image', $term); ?>

	<div id="content" class="content with_sidebar term">

		<div id="page_header"<?php if($header_image) { echo ' style="background-image: url('.$header_image.');"'; } ?>>

			<div class="container">
				<?php if($logo) { ?><img class="term_logo" src="<?php echo $logo; ?>" alt=""><?php } ?>
				<h1 class="title" itemprop="headline">Adviseurs in de plaats <?php echo apply_filters( 'the_title', $term->name ); ?></h1>
				<h2 class="text">Een overzicht met adviseurs aangesloten bij Mijn Subsidie in de plaats <?php echo apply_filters( 'the_title', $term->name ); ?>.</h2>
			</div>

			<div id="page_header_overlay"></div>

		</div>

		<div class="container">

			<main id="main" class="main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/WebPage">

				<?php echo term_description(); ?>

				<?php $args = array(
				    'post_type' => 'specialist',
				    'plaats' => $term->slug
				);
				$query = new WP_Query( $args );

				if ($query->have_posts()) { ?>

			        <?php $i = 1; while ( $query->have_posts() ) : $query->the_post(); ?>

			        <article class="post large term <?php if($i%2 == 0) { echo ' last'; } ?>" id="post-<?php the_id(); ?>">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('post'); ?>
							<h3 class="post_title"><?php if (strlen($post->post_title) > 40) { echo substr(the_title($before = '', $after = '', FALSE), 0, 50) . '...'; } else { the_title(); } ?></h3>
							<?php the_excerpt(); ?>
							<span class="post_more<?php if ( has_post_thumbnail() ) { echo ' thumbnail'; } ?>" href="<?php the_permalink(); ?>"><span>Bekijk adviseur</span> <i class="fa fa-angle-right"></i></span>
						</a>
					</article>

			        <?php $i++; endwhile; ?>

				<?php } wp_reset_postdata(); ?>

			</main>

			<div id="sidebar" class="sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

				<div class="form_header">
					<h2>Bel mij terug</h2>
					<p>Een specialist neemt contact met u op en vertelt u over uw subsidiemogelijkheden.</p>
				</div>

				<?php echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true"]'); ?>

			</div>

		</div>

	</div>
	<!-- /#content -->

<?php get_footer(); ?>