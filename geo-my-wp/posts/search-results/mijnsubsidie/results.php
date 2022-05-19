<?php
/**
 * Posts locator "mijnsubsidie" search results template file.
 *
 * The information on this file will be displayed as the search results.
 *
 * The function pass 2 args for you to use:
 * $gmw  - the form being used ( array )
 * $post - each post in the loop
 *
 * You could but It is not recomemnded to edit this file directly as your changes will be overridden on the next update of the plugin.
 * Instead you can copy-paste this template ( the "default" folder contains this file and the "css" folder )
 * into the theme's or child theme's folder of your site and apply your changes from there.
 *
 * The template folder will need to be placed under:
 * your-theme's-or-child-theme's-folder/geo-my-wp/posts/search-results/
 *
 * Once the template folder is in the theme's folder you will be able to choose it when editing the posts locator form.
 * It will show in the "Search results" dropdown menu as "Custom: default".
 */
?>
<!--  Main results wrapper - wraps the paginations, map and results -->
<div class="gmw-results-wrapper gmw-results-wrapper-<?php echo $gmw['ID']; ?> gmw-pt-default-results-wrapper">

	<?php do_action( 'gmw_search_results_start' , $gmw, $post ); ?>

	 <!-- GEO my WP Map -->
    <?php
    if ( $gmw['search_results']['display_map'] == 'results' ) {
        gmw_results_map( $gmw );
    }
    ?>

	<div class="clear"></div>

	<?php do_action( 'gmw_search_results_before_loop' , $gmw, $post ); ?>







		<?php $i = 1; while ( $gmw_query->have_posts() ) : $gmw_query->the_post(); ?>

			<div id="specialist-<?php the_ID(); ?>" class="home_specialist">

				<?php do_action( 'gmw_search_results_loop_item_start' , $gmw, $post ); ?>

                <!-- Specialist name -->
                <a href="<?php the_permalink(); ?>"><h3 class="specialist_name"><?php the_title(); ?> <span class="specialist_radius">(<?php gmw_distance_to_location( $post, $gmw ); ?>)</span></h3></a>

				<?php do_action( 'gmw_search_results_before_address', $post, $gmw ); ?>

                <!-- Specialist address --><?php echo isset($_GET['wppl_address'][0]); ?>
                <div class="specialist_address">
			    	<span class="fa fa-map-marker address-icon"></span>
			    	<span class="wppl-address"><?php gmw_location_address( $post, $gmw['search_results']['address_fields']['city'] ); ?></span>
			    </div>

                <!-- Specialist contact -->
                <?php if ( !empty( $gmw['search_results']['additional_info'] ) ) { ?>
		    	<?php do_action( 'gmw_search_results_before_contact_info', $post, $gmw ); ?>
			   	<div class="specialist_contact">
		    		<?php gmw_additional_info( $post, $gmw, $gmw['search_results']['additional_info'], $gmw['labels']['search_results']['contact_info'], 'ul' ); ?>
		    	</div>
			    <?php } ?>

                <?php do_action( 'gmw_search_results_loop_item_end' , $gmw, $post ); ?>

            </div> <!--  single- wrapper ends -->

            <?php if($i%3 == 0) { echo '<div class="clear"></div>'; } ?>

        <?php $i++; endwhile; ?>
        <!--  end of the loop -->

</div> <!-- output wrapper -->