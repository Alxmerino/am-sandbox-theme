<?php
/*-----------------------------------------------------------------------------------*/
/*	Testimonial Metaboxes
/*-----------------------------------------------------------------------------------*/

add_action( 'add_meta_boxes', 'am_testimonials_meta' );

function am_testimonials_meta() {

	// Member's info meta box
	$meta_box = array(
		'id'			=> 'am-testimonials-info',
		'title'			=> __('Testimonial\'s extra info'),
		'description'	=> __(''),
		'page'			=> 'testimonial',
		'context'		=> 'normal',
		'priority'		=> 'high',
		'fields'		=> array(
				array(
						'name'	=> __('Testimonial Link'),
						'desc'	=> '',
						'id'	=> 'am_testimonial_link',
						'type'	=> 'text',
						'std'	=> ''
					),
			)
	);

	am_add_meta_box( $meta_box );

}
?>