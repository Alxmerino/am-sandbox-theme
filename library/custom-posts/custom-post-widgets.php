<?php 
/*-----------------------------------------------------------------------------------*/
/*	Custom Post Type for Widgets
/*-----------------------------------------------------------------------------------*/

// Hook into the 'init' action
add_action( 'init', 'am_register_widgets' );

	function am_register_widgets() {

		$labels = array(
			'name'                => __( 'Widgets', 'am_boiler' ),
			'singular_name'       => __( 'Widget', 'am_boiler' ),
			'menu_name'           => __( 'Widgets', 'am_boiler' ),
			'parent_item_colon'   => __( 'Parent Widget:', 'am_boiler' ),
			'all_items'           => __( 'All Widgets', 'am_boiler' ),
			'view_item'           => __( 'View Widget', 'am_boiler' ),
			'add_new_item'        => __( 'Add New Widget', 'am_boiler' ),
			'add_new'             => __( 'New Widget', 'am_boiler' ),
			'edit_item'           => __( 'Edit Widget', 'am_boiler' ),
			'update_item'         => __( 'Update Widget', 'am_boiler' ),
			'search_items'        => __( 'Search Widgets', 'am_boiler' ),
			'not_found'           => __( 'No Widgets found', 'am_boiler' ),
			'not_found_in_trash'  => __( 'No Widgets found in Trash', 'am_boiler' ),
		);
		$args = array(
			'label'               => __( 'Widgets', 'am_boiler' ),
			'description'         => __( 'Widgets Listing', 'am_boiler' ),
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