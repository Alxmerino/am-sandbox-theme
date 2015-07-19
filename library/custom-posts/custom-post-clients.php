<?php 
/*-----------------------------------------------------------------------------------*/
/*	Custom Post Type for Clients
/*-----------------------------------------------------------------------------------*/

// Hook into the 'init' action
add_action( 'init', 'am_register_clients' );

	function am_register_clients() {

		$labels = array(
			'name'                => __( 'Clients', 'am_boiler' ),
			'singular_name'       => __( 'Client', 'am_boiler' ),
			'menu_name'           => __( 'Clients', 'am_boiler' ),
			'parent_item_colon'   => __( 'Parent Client:', 'am_boiler' ),
			'all_items'           => __( 'All Clients', 'am_boiler' ),
			'view_item'           => __( 'View Client', 'am_boiler' ),
			'add_new_item'        => __( 'Add New Client', 'am_boiler' ),
			'add_new'             => __( 'New Client', 'am_boiler' ),
			'edit_item'           => __( 'Edit Client', 'am_boiler' ),
			'update_item'         => __( 'Update Client', 'am_boiler' ),
			'search_items'        => __( 'Search Clients', 'am_boiler' ),
			'not_found'           => __( 'No Clients found', 'am_boiler' ),
			'not_found_in_trash'  => __( 'No Clients found in Trash', 'am_boiler' ),
		);
		$args = array(
			'label'               => __( 'Clients', 'am_boiler' ),
			'description'         => __( 'Clients Listing', 'am_boiler' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail', 'editor', ),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		register_post_type( 'client', $args );
	}

// Include meta
include LIB . '/meta/meta-clients.php';

// Include Taxonomy
include LIB . '/tax/taxonomy-clients.php';

?>