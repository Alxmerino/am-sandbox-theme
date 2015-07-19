<?php

/*-----------------------------------------------------------------------------------*/
/*	Services Metaboxes
/*-----------------------------------------------------------------------------------*/

add_action( 'add_meta_boxes', 'am_services_meta' );

function am_services_meta() {

	// Member's info meta box
	$meta_box = array(
		'id'			=> 'am-service-info',
		'title'			=> __('Service Extras'),
		'description'	=> __(''),
		'page'			=> 'service',
		'context'		=> 'normal',
		'priority'		=> 'high',
		'fields'		=> array(
				// array(
				// 		'name'	=> __('Select a category'),
				// 		'desc'	=> __(''),
				// 		'id'	=> 'am_service_category',
				// 		'type'	=> 'select_post_type',
				// 		'options' => am_get_post_data(am_get_post_ids('service_category')),
				// 		// 'options' => array (
				// 		// 	'one' => array (
				// 		// 		'label' => 'Option One',
				// 		// 		'value'	=> 'one'
				// 		// 		),
				// 		// 	'two' => array (
				// 		// 		'label' => 'Option Two',
				// 		// 		'value'	=> 'two'
				// 		// 		),
				// 		// 	'three' => array (
				// 		// 		'label' => 'Option Three',
				// 		// 		'value'	=> 'three'
				// 		// 		)
				// 		// 	)
				// 	),
				array(
						'name'	=> __('Dropdown one liner:'),
						'desc'	=> '',
						'id'	=> 'am_service_one_liner',
						'type'	=> 'text',
						'std'	=> ''
					),
				array(
						'name'	=> __('Service Excerpt'),
						'desc'	=> '',
						'id'	=> 'am_service_excerpt',
						'type'	=> 'editor',
						'std'	=> ''
					),
			)
	);

	am_add_meta_box( $meta_box );

}
?>