<?php 
/*-----------------------------------------------------------------------------------*/
/*	Custom Post Type for Widgets
/*-----------------------------------------------------------------------------------*/

// Hook into the 'init' action
add_action( 'init', 'am_register_widgets' );

	function am_register_widgets() {

		$labels = array(
			'name'                => __( 'Widgets', 'am_sandbox_theme' ),
			'singular_name'       => __( 'Widget', 'am_sandbox_theme' ),
			'menu_name'           => __( 'Widgets', 'am_sandbox_theme' ),
			'parent_item_colon'   => __( 'Parent Widget:', 'am_sandbox_theme' ),
			'all_items'           => __( 'All Widgets', 'am_sandbox_theme' ),
			'view_item'           => __( 'View Widget', 'am_sandbox_theme' ),
			'add_new_item'        => __( 'Add New Widget', 'am_sandbox_theme' ),
			'add_new'             => __( 'New Widget', 'am_sandbox_theme' ),
			'edit_item'           => __( 'Edit Widget', 'am_sandbox_theme' ),
			'update_item'         => __( 'Update Widget', 'am_sandbox_theme' ),
			'search_items'        => __( 'Search Widgets', 'am_sandbox_theme' ),
			'not_found'           => __( 'No Widgets found', 'am_sandbox_theme' ),
			'not_found_in_trash'  => __( 'No Widgets found in Trash', 'am_sandbox_theme' ),
		);
		$args = array(
			'label'               => __( 'Widgets', 'am_sandbox_theme' ),
			'description'         => __( 'Widgets Listing', 'am_sandbox_theme' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', ),
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
		register_post_type( 'widget_box', $args );
	}

?>