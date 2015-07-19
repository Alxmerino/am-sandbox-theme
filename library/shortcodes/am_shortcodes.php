<?php

/*-----------------------------------------------------------------------------------*/
/*	Hook Shortcodes to TinyMCE
/*-----------------------------------------------------------------------------------*/
add_action('init', 'am_register_shortcode_generator');

function am_register_shortcode_generator() {
   
   // Don't bother doing this stuff if the current user lacks permissions
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;
 
	// Add only in Rich Editor mode
	if ( get_user_option('rich_editing') == 'true') {
		// filter the tinyMCE buttons and add our own
		add_filter('mce_external_plugins', 'shortcode_plugin');
		add_filter('mce_buttons', 'register_button');
	}
}


/*-----------------------------------------------------------------------------------*/
/*	Register our shorcodes
/*-----------------------------------------------------------------------------------*/
function register_button($buttons) {  
	array_push($buttons, "|", "sc_generator");
	return $buttons;  
}


/*-----------------------------------------------------------------------------------*/
/*	Connect out button to the Javascript file
/*-----------------------------------------------------------------------------------*/
function shortcode_plugin($plugin_array) {  
	$plugin_array['sc_generator'] = LIB_URI . '/shortcodes/shortcodes.js';
	return $plugin_array;  
}


/*-----------------------------------------------------------------------------------*/
/*	load scripts and styles
/*-----------------------------------------------------------------------------------*/

function shortcode_scrips() {
	
	wp_enqueue_script( 'jquery-ui-sortable' );
	
}
add_action('admin_print_scripts-post-new.php', 'shortcode_scrips');
add_action('admin_print_scripts-post.php', 'shortcode_scrips');

function shortcodes_css() {
	wp_enqueue_style('shortcodes', LIB_URI . '/shortcodes/css/shortcodes.css');
}
add_action('wp_print_styles', 'shortcodes_css');