<?php 
/*-----------------------------------------------------------------------------------*/
/*	Custom Post Type for Clients
/*-----------------------------------------------------------------------------------*/

// Hook into the 'init' action
add_action( 'init', 'am_register_clients' );

	function am_register_clients() {

		$labels = array(
			'name'                => __( 'Clients', 'am_sandbox_theme' ),
			'singular_name'       => __( 'Client', 'am_sandbox_theme' ),
			'menu_name'           => __( 'Clients', 'am_sandbox_theme' ),
			'parent_item_colon'   => __( 'Parent Client:', 'am_sandbox_theme' ),
			'all_items'           => __( 'All Clients', 'am_sandbox_theme' ),
			'view_item'           => __( 'View Client', 'am_sandbox_theme' ),
			'add_new_item'        => __( 'Add New Client', 'am_sandbox_theme' ),
			'add_new'             => __( 'New Client', 'am_sandbox_theme' ),
			'edit_item'           => __( 'Edit Client', 'am_sandbox_theme' ),
			'update_item'         => __( 'Update Client', 'am_sandbox_theme' ),
			'search_items'        => __( 'Search Clients', 'am_sandbox_theme' ),
			'not_found'           => __( 'No Clients found', 'am_sandbox_theme' ),
			'not_found_in_trash'  => __( 'No Clients found in Trash', 'am_sandbox_theme' ),
		);
		$args = array(
			'label'               => __( 'Clients', 'am_sandbox_theme' ),
			'description'         => __( 'Clients Listing', 'am_sandbox_theme' ),
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