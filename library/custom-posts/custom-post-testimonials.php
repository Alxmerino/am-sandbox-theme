<?php 
/*-----------------------------------------------------------------------------------*/
/*	Custom Post Type for Testimonials
/*-----------------------------------------------------------------------------------*/

// Hook into the 'init' action
add_action( 'init', 'am_register_testimonials' );

	function am_register_testimonials() {

		$labels = array(
			'name'                => __( 'Testimonials', 'am_sandbox_theme' ),
			'singular_name'       => __( 'Testimonial', 'am_sandbox_theme' ),
			'menu_name'           => __( 'Testimonials', 'am_sandbox_theme' ),
			'parent_item_colon'   => __( 'Parent Testimonial:', 'am_sandbox_theme' ),
			'all_items'           => __( 'All Testimonials', 'am_sandbox_theme' ),
			'view_item'           => __( 'View Testimonial', 'am_sandbox_theme' ),
			'add_new_item'        => __( 'Add New Testimonial', 'am_sandbox_theme' ),
			'add_new'             => __( 'New Testimonial', 'am_sandbox_theme' ),
			'edit_item'           => __( 'Edit Testimonial', 'am_sandbox_theme' ),
			'update_item'         => __( 'Update Testimonial', 'am_sandbox_theme' ),
			'search_items'        => __( 'Search testimonials', 'am_sandbox_theme' ),
			'not_found'           => __( 'No testimonials found', 'am_sandbox_theme' ),
			'not_found_in_trash'  => __( 'No testimonials found in Trash', 'am_sandbox_theme' ),
		);
		$args = array(
			'label'               => __( 'testimonials', 'am_sandbox_theme' ),
			'description'         => __( 'Testimonials Listing', 'am_sandbox_theme' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail', 'editor', 'excerpt', 'revisions', ),
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
		register_post_type( 'testimonial', $args );
	}

// Include meta
// include LIB . '/meta/meta-testimonials.php';

// Include Taxonomy
include LIB . '/tax/taxonomy-testimonials.php';

?>