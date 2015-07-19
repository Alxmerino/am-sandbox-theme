<?php 
/*-----------------------------------------------------------------------------------*/
/*	Custom Post Type for Services
/*-----------------------------------------------------------------------------------*/

// Hook into the 'init' action
add_action( 'init', 'am_register_services' );

	function am_register_services() {

		$labels = array(
			'name'                => __( 'Services', 'am_boiler' ),
			'singular_name'       => __( 'Service', 'am_boiler' ),
			'menu_name'           => __( 'Services', 'am_boiler' ),
			'parent_item_colon'   => __( 'Parent Service:', 'am_boiler' ),
			'all_items'           => __( 'All Services', 'am_boiler' ),
			'view_item'           => __( 'View Service', 'am_boiler' ),
			'add_new_item'        => __( 'Add New Service', 'am_boiler' ),
			'add_new'             => __( 'New Service', 'am_boiler' ),
			'edit_item'           => __( 'Edit Service', 'am_boiler' ),
			'update_item'         => __( 'Update Service', 'am_boiler' ),
			'search_items'        => __( 'Search Services', 'am_boiler' ),
			'not_found'           => __( 'No Services found', 'am_boiler' ),
			'not_found_in_trash'  => __( 'No Services found in Trash', 'am_boiler' ),
		);
		$args = array(
			'label'               => __( 'Services', 'am_boiler' ),
			'description'         => __( 'Services Listing', 'am_boiler' ),
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