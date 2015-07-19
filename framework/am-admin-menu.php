<?php 

/*-----------------------------------------------------------------------------------*/
/*	Add Framework to Dashboard
/*-----------------------------------------------------------------------------------*/
add_action( 'admin_menu', 'am_admin_menu' );
function am_admin_menu() {
	// Get Theme/Framework info
	$theme_data = wp_get_theme();

	/* TODO: ADD PROPER ICON */
	$dash_icon = FRAMEWORK_URL . '/images/favicon.png';

	// Theme Options Page
	add_object_page( 
		$theme_data['Name'], 
		$theme_data['Name'], 
		'update_core', 
		'amframework', 
		'am_options_page', 
		$dash_icon );
	add_submenu_page( 
		'amframework',
		__( 'Theme Options', 'am_framework' ),
		__( 'Theme Options', 'am_framework' ),
		'update_core',
		'amframework',
		'am_options_page' );

	/* TODO: ADD THEME UPDATES/XML LOG */
	// Theme Updates
	add_submenu_page( 
		'amframework',
		__('Theme Updates', 'am_framework'),
		__('Theme Updates', 'am_framework'),
		'update_core',
		'amframework-update',
		'am_theme_update_page' );


}