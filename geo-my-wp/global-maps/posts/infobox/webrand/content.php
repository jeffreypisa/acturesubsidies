<?php
/**
 * Global Maps "Default" Template for infobox.
 *
 * The information on this file will be displayed within infobox.
 * There are 2 args for you to use:
 * $gmw  - the form being used ( array )
 * $post - the post being displayed ( object )
 *
 * You could but It is not recomemnded to edit this file directly as your changes will be overridden on the next update of the plugin.
 * Instead you can copy-paste this template ( the folder contains this file and the stylesheet ) into the theme's or child theme's folder and do your changes there.
 *
 * The folder will need to be placed under:
 * your-theme's-or-child-theme's-folder/geo-my-wp/global-maps/posts/infobox/
 *
 * Once the template folder is in the theme's folder you will be able to choose it when editing the Global Map form.
 * It will show in the themes dropdown menu as "custom: tempalte name".
 */
?>
<div class="template-content-wrapper">

	<?php do_action( 'gmaps_gmpt_ib_template_start', $post, $gmw ); ?>

	<?php echo gmw_get_close_button( $post, $gmw, 'dashicons-no', 'ib' ) ?>

	<?php do_action( 'gmaps_gmpt_ib_template_before_title', $post, $gmw ); $logo = get_the_post_thumbnail( $post->ID, 'full' );  ?>

	<?php if($logo) { ?>
	<div class="logo">
		<?php echo $logo; ?>
	</div>
	<?php } ?>

	<div class="gmaps_gmpt_contents">

	<h3>
		<?php echo $post->post_title; ?>
	</h3>

	<?php do_action( 'gmaps_gmpt_ib_template_before_address', $post, $gmw ); ?>

    <!-- address -->
	<?php if ( !empty( $gmw['info_window']['address'] ) ) { ?>

		<?php do_action( 'gmaps_gmpt_ib_template_before_address', $post, $gmw ); ?>

	    <div class="address-wrapper">
	    	<span class="address"><?php gmw_location_address( $post, $gmw ); ?></span>
	    </div>
    <?php } ?>

	<!-- contact information -->
    <?php if ( !empty( $gmw['info_window']['additional_info'] ) ) { ?>

    	<?php do_action( 'gmaps_gmpt_ib_template_before_contact info', $post, $gmw ); ?>

	   	<div class="contact-info">
    		<?php gmw_additional_info( $post, $gmw, $gmw['info_window']['additional_info'], $gmw['labels']['info_window'], 'ul' ); ?>
    	</div>
    <?php } ?>

    <?php do_action( 'gmaps_gmpt_ib_template_end', $post, $gmw ); ?>

	</div>

</div>