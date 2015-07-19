<?php

/**
 * Adds Testimonials_list_Widget widget.
 */
class Testimonials_list_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'testimonials_list', // Base ID
			__('AM List Testimonials', 'am_boiler'), // Name
			array( 'description' => __( 'Widget to display a list of testimonials', 'am_boiler' ), ) // Args
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
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		// Get post args
		$query_args = array(
			'post_type'			=> 'testimonial',
			'order'				=> $instance['order'],
			'orderby'			=> $instance['orderby'],
			'posts_per_page'	=> $instance['testimonial_count']
		);
		$query = new WP_Query( $query_args );

		// Display before widget content
		echo $args['before_widget'];
		
		// Display Widget title		
		echo ( ! empty( $title ) ) ? $args['before_title'] . $title . $args['after_title'] : __('Please select a widget title', 'am_boiler');

		// Render widget content?>
		<div class="testimonials-wrapper">
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<div class="testimonial">
				<hr>
				<?php if ( has_post_thumbnail( $query->post->ID ) ) : ?>
					<div class="testimonial-photo">
						<?php the_post_thumbnail( 'testimonial-thumb' ); ?>
					</div>
				<?php endif; ?>
				<div class="testimonial-content">
					<?php the_content(); ?>
				</div>
				<h4 class="testimonial-title"> - <?php the_title(); ?></h4>
			</div>
		<?php endwhile; ?>
		</div>

		<?php
		// Reset post query
		wp_reset_postdata();

		// Display after widget content
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		// Set the title of the widget
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = __( 'Testimonials', 'am_boiler' );
		}

		// Set how many testimonials to display
		if ( isset( $instance[ 'testimonial_count' ] ) ) {
			$testimonial_count = $instance[ 'testimonial_count' ];
		} else {
			$testimonial_count = 2;
		}

		// Set the order to display testimonials
		if ( isset( $instance[ 'order' ] ) ) {
			$order = $instance[ 'order' ];
		} else {
			$order = 'DESC';
		}

		$orderArr = array(
			'ASC' => 'Ascending',
			'DESC' => 'Descending'
		);

		// Set the orderby to display testimonials
		if ( isset( $instance[ 'orderby' ] ) ) {
			$orderby = $instance[ 'orderby' ];
		} else {
			$orderby = 'rand';
		}

		$orderbyArr = array(
			'rand' => 'Random',
			'date' => 'Date',
			'title' => 'Title',
		);

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'testimonial_count' ); ?>"><?php _e( 'Testimonial Numer:', 'am_boiler' ); ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'testimonial_count' ); ?>" name="<?php echo $this->get_field_name( 'testimonial_count' ); ?>" value="<?php echo esc_attr( $testimonial_count ); ?>" >
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php _e( 'Display order:', 'am_boiler' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'order' ); ?>" id="<?php echo $this->get_field_id( 'order' ); ?>">
			<?php foreach ($orderArr as $key => $value) : 
				$selected = ($key == $order) ? 'selected="selected"' : '';
			?>
				<option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
			<?php endforeach;?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php _e( 'Display orderby:', 'am_boiler' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'orderby' ); ?>" id="<?php echo $this->get_field_id( 'orderby' ); ?>">
			<?php foreach ($orderbyArr as $key => $value) : 
				$selected = ($key == $orderby) ? 'selected="selected"' : '';
			?>
				<option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
			<?php endforeach;?>
			</select>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		// $instance = array();
		// $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		// update logic goes here
		$updated_instance = $new_instance;
		return $updated_instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_testimonials_list_widget() {
    register_widget( 'Testimonials_list_Widget' );
}
add_action( 'widgets_init', 'register_testimonials_list_widget' );

?>