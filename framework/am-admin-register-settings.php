<?php
/*-----------------------------------------------------------------------------------*/
/*	Register Settings
/*-----------------------------------------------------------------------------------*/

// TODO: SET DEFAULT SETTINGS
add_action( 'admin_init', 'am_register_theme_options' );
function am_register_theme_options() {
	
	// TODO: ADD REDIRECT IF THEME HAS BEEN ACTIVATED

	/* Get Theme/Framework info */
	$theme_data = wp_get_theme();
	$data = get_option( 'am_framework_options' );
	$data['theme_name'] = $theme_data['Name'];
	$data['theme_version'] = $theme_data['Version'];
	$data['framework_version'] = FRAMEWORK_VERSION;
	update_option( 'am_framework_options', $data );

	$am_framework_settings = get_option( 'am_framework_options' );

	// Gets unique ID or return default
	if ( isset( $am_framework_settings['id'] ) ) {
		$option_name = $am_framework_settings['id'];
	} else {
		$option_name = 'am_framework_options';
	}

	// Return option defaults if no ID is set
	if ( !get_option( $option_name ) ) {
		// am_option_defaults();
	}

	// Register Settings
	register_setting( 'am_framework_options', 'am_framework_options' );

}