<?php 
/*-----------------------------------------------------------------------------------*/
/*	Custom Post Type for Services
/*-----------------------------------------------------------------------------------*/

// Hook into the 'init' action
add_action( 'init', 'am_register_services' );

	function am_register_services() {

		$labels = array(
			'name'                => __( 'Services', 'am_sandbox_theme' ),
			'singular_name'       => __( 'Service', 'am_sandbox_theme' ),
			'menu_name'           => __( 'Services', 'am_sandbox_theme' ),
			'parent_item_colon'   => __( 'Parent Service:', 'am_sandbox_theme' ),
			'all_items'           => __( 'All Services', 'am_sandbox_theme' ),
			'view_item'           => __( 'View Service', 'am_sandbox_theme' ),
			'add_new_item'        => __( 'Add New Service', 'am_sandbox_theme' ),
			'add_new'             => __( 'New Service', 'am_sandbox_theme' ),
			'edit_item'           => __( 'Edit Service', 'am_sandbox_theme' ),
			'update_item'         => __( 'Update Service', 'am_sandbox_theme' ),
			'search_items'        => __( 'Search Services', 'am_sandbox_theme' ),
			'not_found'           => __( 'No Services found', 'am_sandbox_theme' ),
			'not_found_in_trash'  => __( 'No Services found in Trash', 'am_sandbox_theme' ),
		);
		$args = array(
			'label'               => __( 'Services', 'am_sandbox_theme' ),
			'description'         => __( 'Services Listing', 'am_sandbox_theme' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail', 'editor', 'excerpt', 'revisions', 'page-attributes' ),
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
		register_post_type( 'service', $args );
	}

// Include meta
include LIB . '/meta/meta-services.php';

?>