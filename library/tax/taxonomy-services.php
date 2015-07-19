<?php

/*-----------------------------------------------------------------------------------*/
/*	Custom Taxonomy for Services
/*-----------------------------------------------------------------------------------*/
function am_services_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Services Categories', 'Taxonomy General Name', 'am_boiler' ),
		'singular_name'              => _x( 'Services Category', 'Taxonomy Singular Name', 'am_boiler' ),
		'menu_name'                  => __( 'Services Category', 'am_boiler' ),
		'all_items'                  => __( 'All Items', 'am_boiler' ),
		'parent_item'                => __( 'Parent Item', 'am_boiler' ),
		'parent_item_colon'          => __( 'Parent Item:', 'am_boiler' ),
		'new_item_name'              => __( 'New Item Name', 'am_boiler' ),
		'add_new_item'               => __( 'Add New Item', 'am_boiler' ),
		'edit_item'                  => __( 'Edit Item', 'am_boiler' ),
		'update_item'                => __( 'Update Item', 'am_boiler' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'am_boiler' ),
		'search_items'               => __( 'Search Items', 'am_boiler' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'am_boiler' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'am_boiler' ),
		'not_found'                  => __( 'Not Found', 'am_boiler' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'service_tax', array( 'service' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'am_services_taxonomy', 0 );