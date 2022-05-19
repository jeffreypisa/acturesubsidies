<?php
function latest_blogs_widget() {
	register_widget( 'latest_blogs_widget' );
}
add_action( 'widgets_init', 'latest_blogs_widget' );

// Widget class
class latest_blogs_widget extends WP_Widget {

	function latest_blogs_widget() {
		$widget_ops = array( 'classname' => 'latest_blogs_widget', 'description' => 'Deze widget bevat de 3 laatste blogberichten.');
		$control_ops = array( 'id_base' => 'latest_blogs_widget' );
		$this->WP_Widget( 'latest_blogs_widget', 'Laatste blogberichten', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		global $wpdb, $theme_name;
		extract( $args );

		// Variables from the widget settings
		$title_markup = apply_filters('widget_title', $instance['title'] );
		$title = $instance['title'];
		$limit = $instance['limit'];

		// Before widget
		echo $before_widget;

		// Display a containing div ?>
		<?php echo $before_title . '<a href="https://www.mijnsubsidie.com/blog/">' . $title_markup . '</a>' . $after_title;

		query_posts( 'post_type=post&posts_per_page='.$limit );
		while ( have_posts() ) : the_post(); ?>

		<article class="widget_post">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('post'); ?>
				<?php the_title('<h3 class="widget_post_title">','</h3>'); ?>
			</a>
		</article>

		<?php endwhile; wp_reset_query();

		// After widget
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['limit'] = strip_tags( $new_instance['limit'] );

		return $instance;
	}

	function form( $instance ) {

		$defaults = array();
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong>Titel:</strong></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'limit' ); ?>"><strong>Aantal berichten:</strong></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" value="<?php echo $instance['limit']; ?>" />
		</p>
	<?php
	}
}
?>
