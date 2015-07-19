<?php

/*-----------------------------------------------------------------------------------*/
/*	Testimonial Metaboxes
/*-----------------------------------------------------------------------------------*/

add_action( 'add_meta_boxes', 'am_clients_meta' );

function am_clients_meta() {

	// Clients's info meta box
	$meta_box = array(
		'id'			=> 'am-clients-info',
		'title'			=> __('Client extra info'),
		'description'	=> __('Extra information for clients'),
		'page'			=> 'client',
		'context'		=> 'normal',
		'priority'		=> 'high',
		'fields'		=> array(
				array(
						'name'	=> __('Client website url:'),
						'desc'	=> '',
						'id'	=> 'am_client_url',
						'type'	=> 'text',
						'std'	=> ''
					),
			)
	);
	
	am_add_meta_box( $meta_box );

	// Alternate thumbnail
	$meta_box = array(
		'id'			=> 'am-clients-alt-thumb',
		'title'			=> __('Alternate Thumbnail'),
		'description'	=> __('Replaces the default fatured image'),
		'page'			=> 'client',
		'context'		=> 'side',
		'priority'		=> 'default',
		'fields'		=> array(
				array(
						'name'	=> __(''),
						'desc'	=> '',
						'id'	=> 'am_client_alt',
						'type'	=> 'images',
						'std'	=> 'Select Image'
					),
			)
	);

	am_add_meta_box( $meta_box );

}
?>