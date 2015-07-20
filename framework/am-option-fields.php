<?php

/*-----------------------------------------------------------------------------------*/
/*	Option Fields
/*-----------------------------------------------------------------------------------*/

/* TODO: Menu Tabs
================================================== */

/* Option Fields
================================================== */
function am_options_fields() {
	global $allowedtags;
	$AM_Sandbox_settings = get_option( 'AM_Sandbox_options' );

	// Get the unique id
	if ( isset( $AM_Sandbox_settings['id'] ) ) {
		$option_name = $AM_Sandbox_settings['id'];
	} else {
		$option_name = 'AM_Sandbox_options';
	}

	$settings = get_option( $option_name );
	$options = AM_Sandbox_options();
	$counter = 0;
	$menu = '';

	/* Loop through all options */
	foreach ($options as $option) {
		
		$counter++;
		$val = '';
		$selected_value = '';
		$checked = '';
		$output = '';

		/* Wrap all options */
		if ( $option['type'] != 'heading' && $option['type'] != 'info' ) {

			// make IDs lowercase with no spaces
			$option['id'] = preg_replace('/[^a-zA-Z0-9._\-]/', '', $option['id']);
			// section id
			$id = 'section-' . $option['id'];
			// section class
			$class = 'section ';
			if ( isset( $option['class'] ) ) {
				$class .= ' ' . $option['class'];
			}

			// Build Output
			$output .= '<div id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '">';
			if ( isset( $option['name'] ) ) {
				$output .= '<h4 class="heading">' . esc_html( $option['name'] ) . '</h4>';
			}

		}

		/* Set Default Value */
		if ( isset( $option['default'] ) ) {
			$val = $option['default'];
		}

		// Override $val if option is saved
		if ( $option['type'] != 'heading' && $option['type'] != 'info' ) {
			if ( isset( $settings[($option['id'])] ) ) {
				$val = $settings[($option['id'])];
				// Strip slash of non-array options
				if ( !is_array( $val ) ) {
					$val = stripslashes( $val );
				}
			}
		}

		/* If there is description, save it in labels */
		$value_desc = '';
		if ( isset( $option['desc'] ) ) {
			$value_desc = $option['desc'];
		}

		/* Switch through options */
		switch ($option['type']) {
			// Simple text input
			case 'text':
				$output .= '<input id="' . esc_attr( $option['id'] ) . '" class="am-input" name="' . esc_attr( $option_name . '[' . $option['id'] . ']' ) . '" type="text" value="' . esc_attr( $val ) . '" />';
				break;
			
			// Password
			case 'password':
				$output .= '<input id="' . esc_attr( $option['id'] ) . '" class="am-input" name="' . esc_attr( $option_name . '[' . $option['id'] . ']' ) . '" type="password" value="' . esc_attr( $val ) . '" />';
				break;
			
			// Textarea
			case 'textarea':
				$rows = '8';
				if ( isset( $option['settings']['rows'] ) ) {
					$custom_rows = $option['settings']['rows'];
					if ( is_numeric( $custom_rows ) ) {
						$rows = $custom_rows;
					}
				}

				$val = stripslashes( $val );
				$output .= '<textarea id="' . esc_attr( $option['id'] ) . '" class="am-input" name="' . esc_attr( $option_name ) . '[' . $option['id'] . ']" rows="' . $rows . '">' . esc_textarea( $val ) . '</textarea>';
				break;
			
			// Select 
			case 'select':
				# code...
				break;

			// Radio
			case 'radio':
				# code...
				break;

			// Images Selector
			case 'images':
				# code...
				break;

			// Checkbox
			case 'checkbox':
				# code...
				break;

			// Multicheck
			case 'multicheck':
				# code...
				break;

			// Color Picker
			case 'color':
				# code...
				break;

			// Uploader
			case 'upload':
				# code...
				break;

			// Typography
			case 'typography':
				# code...
				break;

			// Background
			case 'background':
				# code...
				break;

			// Editor
			case 'editor':
				# code...
				break;

			// Info
			case 'info':
				# code...
				break;

		}

		// Close Sections
		if ( $option['type'] != 'heading' && $option['type'] != 'info' ) {
			$output .= '</div>';
		}

		echo $output;

	}

	echo '<pre>';
	print_r($settings);
	echo "</pre>";
}