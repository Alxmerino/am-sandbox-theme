<?php

/**
 * new WordPress Widget format
 * Wordpress 2.8 and above
 * @see http://codex.wordpress.org/Widgets_API#Developing_Widgets
 */
class AM_HTML_Text_Widget extends WP_Widget {

    /**
     * Constructor
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'am_html_text', // Base ID
			__('AM HTML Text', 'am_boiler'), // Name
			array( 'description' => __( 'WP editor for HTML text', 'am_boiler' ), ) // Args
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
        $title = apply_filters( 'widget_title', $instance['title'] );

        // Display before widget content
        echo $args['before_widget'];
        
        // Display Widget title     
        echo ( ! empty( $title ) ) ? $args['before_title'] . $title . $args['after_title'] : __('Please select a widget title', 'am_boiler');
        ?>

        <div class="widget-html-text">
            <?php echo wpautop( $instance['html_content'] ); ?>
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
        $title = ( isset( $instance[ 'title' ] ) ) ? $instance[ 'title' ] : '';
        $html_content = ( isset( $instance[ 'html_content' ] ) ) ? $instance[ 'html_content' ] : __('Insert content here', 'am_boiler');
        $editor_settings = array(
        	// 'teeny' => true,
        );
        ?>

        <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'html_content' ); ?>"></label>
			<div>
                <?php wp_editor( $html_content, $this->get_field_name( 'html_content' ) ); ?>
			</div>
		</p>

		<?php
        // display field names here using:
        // $this->get_field_id( 'option_name' ) - the CSS ID
        // $this->get_field_name( 'option_name' ) - the HTML name
        // $instance['option_name'] - the option value
    }
}

add_action( 'widgets_init', create_function( '', "register_widget( 'AM_HTML_Text_Widget' );" ) );

?>