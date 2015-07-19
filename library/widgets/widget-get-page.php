<?php

/**
 * new WordPress Widget format
 * Wordpress 2.8 and above
 * @see http://codex.wordpress.org/Widgets_API#Developing_Widgets
 */
class AM_Get_Page_Widget extends WP_Widget {
	
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'get_page', // Base ID
			__('AM Get Page', 'am_boiler'), // Name
			array( 'description' => __( 'Display the contents of a page', 'am_boiler' ), ) // Args
		);
	}
	
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	function widget( $args, $instance ) {
		global $post;
		$title = apply_filters( 'widget_title', $instance['title'] );

		// Get selected page
		$queryArgs = array(
			'p' => $instance['page'],
			'post_type' => 'page'
		);
		$pageQuery = new WP_Query($queryArgs);

		// Display before widget content
		echo $args['before_widget'];

		// Display Widget title		
		echo ( ! empty( $title ) ) ? $args['before_title'] . $title . $args['after_title'] : __('Please select a widget title', 'am_boiler');
		?>
			<div class="widget-page">

			<?php while ($pageQuery->have_posts()) : $pageQuery->the_post();
				
				$alternateContent = get_post_meta( $post->ID, 'am_alternate_page_content_editor', true );
				$widgetLink = (empty($instance['alt_link'])) ? get_permalink( $post->ID ) : $instance['alt_link'];
				?>

				<?php if (has_post_thumbnail( $post->ID )) : ?>
				<div class="widget-post-thumbnail">
					<?php the_post_thumbnail( 'thumbnail' ); ?>
				</div>
				<?php endif; ?>
				<div class="widget-post-excerpt">
					
					<?php 
						if ( !empty($alternateContent) ) {

							echo $alternateContent;

						} else {

							the_content();

						} ?>

					<div class="read-more">
						<a href="<?php echo $widgetLink; ?>">Find out more</a>
					</div>
				</div>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

			</div>
		<?php
		// Display after widget content
		echo $args['after_widget'];

	}

	/**
	 * Deals with the settings when they are saved by the admin. Here is
	 * where any validation should be dealt with.
	 *
	 * @param array  An array of new settings as submitted by the admin
	 * @param array  An array of the previous settings
	 * @return array The validated and (if necessary) amended settings
	 **/
	function update( $new_instance, $old_instance ) {

		// update logic goes here
		$updated_instance = $new_instance;
		return $updated_instance;
	}

	/**
	 * Displays the form for this widget on the Widgets page of the WP Admin area.
	 *
	 * @param array  An array of the current settings for this widget
	 * @return void Echoes it's output
	 **/
	function form( $instance ) {
		// Set default page selected
		$page = ( isset($instance['page']) ) ? $instance['page'] : '';
		$title = ( isset( $instance[ 'title' ] ) ) ? $instance['title'] : __( 'About', 'am_boiler' );
		$altLink = ( isset( $instance[ 'alt_link' ] ) ) ? $instance['alt_link'] : __( '', 'am_boiler' );
		
		$pagesArr = get_posts( array('post_type' => 'page', 'posts_per_page' => -1) );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'page' ); ?>"><?php _e( 'Page:', 'am_boiler' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'page' ); ?>" id="<?php echo $this->get_field_id( 'page' ); ?>">
				<?php foreach ($pagesArr as $key => $value) :
					$selected = ($page == $value->ID) ? 'selected="selected"' : '';
				?>
				<option <?php echo $selected; ?> value="<?php echo $value->ID; ?>"><?php echo $value->post_title; ?></option>
			<?php endforeach; ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'alt_link' ); ?>"><?php _e( 'Alternate Link:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'alt_link' ); ?>" name="<?php echo $this->get_field_name( 'alt_link' ); ?>" type="text" value="<?php echo esc_attr( $altLink ); ?>">
		</p>

		<?php
		// display field names here using:
		// $this->get_field_id( 'option_name' ) - the CSS ID
		// $this->get_field_name( 'option_name' ) - the HTML name
		// $instance['option_name'] - the option value
	}
}
	
	add_action( 'widgets_init', create_function( '', "register_widget( 'AM_Get_Page_Widget' );" ) );

?>