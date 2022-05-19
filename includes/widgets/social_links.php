<?php
function social_links_widget() {
	register_widget( 'social_links_widget' );
}
add_action( 'widgets_init', 'social_links_widget' );

// Widget class
class social_links_widget extends WP_Widget {

	function social_links_widget() {
		$widget_ops = array( 'classname' => 'social_links_widget', 'description' => 'Deze widget bevat alle social media links van MijnSubsidie. Te beheren via "Website beheer / Contact & social".');
		$control_ops = array( 'id_base' => 'social_links_widget' );
		$this->WP_Widget( 'social_links_widget', 'Social links', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		global $wpdb, $theme_name;
		extract( $args );

		// Variables from the widget settings
		$title_markup = apply_filters('widget_title', $instance['title'] );
		$title = $instance['title'];

		// Before widget
		echo $before_widget;

		// Display a containing div ?>
		<?php echo $before_title . $title_markup . $after_title;
		$facebook = get_field('facebook','option');
		$twitter = get_field('twitter','option');
		$googleplus = get_field('googleplus','option');
		$youtube = get_field('youtube','option');
		?>
		<?php if($facebook || $twitter || $googleplus) { ?><ul class="social_links_widget">
			<?php if($facebook) { ?><li><a href="<?php echo $facebook; ?>" target="_blank"><i class="fa fa-facebook-square"></i> <span>Facebook</span></a></li><?php } ?>
			<?php if($twitter) { ?><li><a href="<?php echo $twitter; ?>" target="_blank"><i class="fa fa-twitter-square"></i> <span>Twitter</span></a></li><?php } ?>
			<?php if($googleplus) { ?><li><a href="<?php echo $googleplus; ?>" target="_blank"><i class="fa fa-google-plus-square"></i> <span>Google+</span></a></li><?php } ?>
			<?php if($youtube) { ?><li><a href="<?php echo $youtube; ?>" target="_blank"><i class="fa fa-youtube-square"></i> <span>YouTube</span></a></li><?php } ?>
		</ul><?php } ?>

		<?php // After widget
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	function form( $instance ) {

		$defaults = array();
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong>Titel:</strong></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
	<?php
	}
}
?>