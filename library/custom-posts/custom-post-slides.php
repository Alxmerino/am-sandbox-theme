<?php 
/*-----------------------------------------------------------------------------------*/
/*	Custom Post Type for Slides
/*-----------------------------------------------------------------------------------*/

// Hook into the 'init' action
add_action( 'init', 'am_register_slides' );

	function am_register_slides() {

		$labels = array(
			'name'                => __( 'Slides', 'am_sandbox_theme' ),
			'singular_name'       => __( 'Slide', 'am_sandbox_theme' ),
			'menu_name'           => __( 'Slides', 'am_sandbox_theme' ),
			'parent_item_colon'   => __( 'Parent Slide:', 'am_sandbox_theme' ),
			'all_items'           => __( 'All Slides', 'am_sandbox_theme' ),
			'view_item'           => __( 'View Slide', 'am_sandbox_theme' ),
			'add_new_item'        => __( 'Add New Slide', 'am_sandbox_theme' ),
			'add_new'             => __( 'New Slide', 'am_sandbox_theme' ),
			'edit_item'           => __( 'Edit Slide', 'am_sandbox_theme' ),
			'update_item'         => __( 'Update Slide', 'am_sandbox_theme' ),
			'search_items'        => __( 'Search slides', 'am_sandbox_theme' ),
			'not_found'           => __( 'No slides found', 'am_sandbox_theme' ),
			'not_found_in_trash'  => __( 'No slides found in Trash', 'am_sandbox_theme' ),
		);
		$args = array(
			'label'               => __( 'slides', 'am_sandbox_theme' ),
			'description'         => __( 'Slides Listing', 'am_sandbox_theme' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail' ),
			'hierarchical'        => false,
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
			'capability_type'     => 'post',
		);
		register_post_type( 'slide', $args );
	}

/*-----------------------------------------------------------------------------------*/
/*	Include meta
/*-----------------------------------------------------------------------------------*/
include LIB . '/meta/meta-slides.php';

?>