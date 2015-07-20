<?php

/*-----------------------------------------------------------------------------------*/
/*	Custom Taxonomy for Clients
/*-----------------------------------------------------------------------------------*/
function am_clients_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Client Categories', 'Taxonomy General Name', 'am_sandbox_theme' ),
		'singular_name'              => _x( 'Client Category', 'Taxonomy Singular Name', 'am_sandbox_theme' ),
		'menu_name'                  => __( 'Client Category', 'am_sandbox_theme' ),
		'all_items'                  => __( 'All Items', 'am_sandbox_theme' ),
		'parent_item'                => __( 'Parent Item', 'am_sandbox_theme' ),
		'parent_item_colon'          => __( 'Parent Item:', 'am_sandbox_theme' ),
		'new_item_name'              => __( 'New Item Name', 'am_sandbox_theme' ),
		'add_new_item'               => __( 'Add New Item', 'am_sandbox_theme' ),
		'edit_item'                  => __( 'Edit Item', 'am_sandbox_theme' ),
		'update_item'                => __( 'Update Item', 'am_sandbox_theme' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'am_sandbox_theme' ),
		'search_items'               => __( 'Search Items', 'am_sandbox_theme' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'am_sandbox_theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'am_sandbox_theme' ),
		'not_found'                  => __( 'Not Found', 'am_sandbox_theme' ),
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
	register_taxonomy( 'client_tax', array( 'client' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'am_clients_taxonomy', 0 );