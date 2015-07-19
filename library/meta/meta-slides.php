<?php

/*-----------------------------------------------------------------------------------*/
/*	Slides Metaboxes
/*-----------------------------------------------------------------------------------*/

add_action( 'add_meta_boxes', 'am_slides_meta' );

function am_slides_meta() {

	// Member's info meta box
	$meta_box = array(
		'id'			=> 'am-slides-info',
		'title'			=> __('Slides Extra'),
		'description'	=> __('Extra line for slides'),
		'page'			=> 'slide',
		'context'		=> 'normal',
		'priority'		=> 'high',
		'fields'		=> array(
				array(
						'name'	=> __('Additional Slide info:'),
						'desc'	=> '',
						'id'	=> 'am_slide_extra',
						'type'	=> 'text',
						'std'	=> ''
					),
			)
	);

	am_add_meta_box( $meta_box );

}
?>