<?php 
/*-----------------------------------------------------------------------------------*/
/*	Custom Post Type for Case Studies
/*-----------------------------------------------------------------------------------*/

// Hook into the 'init' action
add_action( 'init', 'am_register_case' );

	function am_register_case() {

		$labels = array(
			'name'                => __( 'Case Studies', 'am_sandbox_theme' ),
			'singular_name'       => __( 'Case Study', 'am_sandbox_theme' ),
			'menu_name'           => __( 'Case Studies', 'am_sandbox_theme' ),
			'parent_item_colon'   => __( 'Parent Case Study:', 'am_sandbox_theme' ),
			'all_items'           => __( 'All Case Studies', 'am_sandbox_theme' ),
			'view_item'           => __( 'View Case Study', 'am_sandbox_theme' ),
			'add_new_item'        => __( 'Add New Case Study', 'am_sandbox_theme' ),
			'add_new'             => __( 'New Case Study', 'am_sandbox_theme' ),
			'edit_item'           => __( 'Edit Case Study', 'am_sandbox_theme' ),
			'update_item'         => __( 'Update Case Study', 'am_sandbox_theme' ),
			'search_items'        => __( 'Search Case Studies', 'am_sandbox_theme' ),
			'not_found'           => __( 'No Case Studies found', 'am_sandbox_theme' ),
			'not_found_in_trash'  => __( 'No Case Studies found in Trash', 'am_sandbox_theme' ),
		);
		$args = array(
			'label'               => __( 'Case Studies', 'am_sandbox_theme' ),
			'description'         => __( 'Case Studies Listing', 'am_sandbox_theme' ),
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
		register_post_type( 'case_study', $args );
	}

?>