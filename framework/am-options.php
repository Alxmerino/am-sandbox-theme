<?php

/*-----------------------------------------------------------------------------------*/
/*	Generates the options fiels that are used in the form
/*-----------------------------------------------------------------------------------*/

function AM_Sandbox_options() {
	// Build options array
	$options = array();

	// Test options
	// Test data
	$test_array = array(
		'one' => __('One', 'options_framework_theme'),
		'two' => __('Two', 'options_framework_theme'),
		'three' => __('Three', 'options_framework_theme'),
		'four' => __('Four', 'options_framework_theme'),
		'five' => __('Five', 'options_framework_theme')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_framework_theme'),
		'two' => __('Pancake', 'options_framework_theme'),
		'three' => __('Omelette', 'options_framework_theme'),
		'four' => __('Crepe', 'options_framework_theme'),
		'five' => __('Waffle', 'options_framework_theme')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );
		
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);



	
	$options[] = array(
		'name'		=> __('Basic Settins', 'AM_Sandbox'),
		'type'		=> 'heading'
	);

		$options[] = array(
			'name'		=> __('Text Input', 'AM_Sandbox'),
			'desc'		=> __( 'A mini description 1', 'AM_Sandbox' ),
			'id'		=> 'test_text',
			'default'	=> 'default Value',
			'type'		=> 'text'
		);

		$options[] = array(
			'name'		=> __('Text Input', 'AM_Sandbox'),
			'desc'		=> __( 'A mini description 1', 'AM_Sandbox' ),
			'id'		=> 'test_text_mini',
			'default'	=> 'default Value',
			'class'		=> 'mini', // mini, tiny, small
			'type'		=> 'text'
		);

		$options[] = array(
			'name'		=> __('Password Input', 'AM_Sandbox'),
			'desc'		=> __( 'A mini description 1', 'AM_Sandbox' ),
			'id'		=> 'test_pass',
			'default'	=> 'default Value',
			'type'		=> 'password'
		);

		$options[] = array(
			'name'		=> __('Textarea Input', 'AM_Sandbox'),
			'desc'		=> __( 'A mini description 1', 'AM_Sandbox' ),
			'id'		=> 'test_textarea',
			'default'	=> 'default Value',
			'type'		=> 'textarea'
		);

		$options[] = array(
			'name'		=> __('Select Input', 'AM_Sandbox'),
			'desc'		=> __( 'A mini description 1', 'AM_Sandbox' ),
			'id'		=> 'test_select',
			'default'	=> 'default Value',
			'class'		=> 'tiny',
			'options'	=> $test_array,
			'type'		=> 'select'
		);

		$options[] = array(
			'name'		=> __('Radio Input', 'AM_Sandbox'),
			'desc'		=> __( 'A mini description 1', 'AM_Sandbox' ),
			'id'		=> 'test_radio',
			'default'	=> 'default Value',
			'class'		=> 'tiny',
			'options'	=> $test_array,
			'type'		=> 'radio'
		);

		$options[] = array(
			'name'		=> __('Images Input', 'AM_Sandbox'),
			'desc'		=> __( 'A mini description 1', 'AM_Sandbox' ),
			'id'		=> 'test_images',
			'default'	=> 'default Value',
			'type'		=> 'images',
			'options' => array(
				'1col-fixed' => $imagepath . '1col.png',
				'2c-l-fixed' => $imagepath . '2cl.png',
				'2c-r-fixed' => $imagepath . '2cr.png')
		);

		$options[] = array(
			'name'		=> __('Checkbox Input', 'AM_Sandbox'),
			'desc'		=> __( 'A mini description 1', 'AM_Sandbox' ),
			'id'		=> 'test_check',
			'default'	=> '1',
			'type'		=> 'checkbox'
		);

		$options[] = array(
			'name'		=> __('multicheck Input', 'AM_Sandbox'),
			'desc'		=> __( 'A mini description 1', 'AM_Sandbox' ),
			'id'		=> 'test_multicheck',
			'default'	=> $multicheck_defaults,
			'type'		=> 'multicheck',
			'options'	=> $multicheck_array
		);

		$options[] = array(
			'name'		=> __('color Input', 'AM_Sandbox'),
			'desc'		=> __( 'A mini description 1', 'AM_Sandbox' ),
			'id'		=> 'test_color',
			'default'	=> '',
			'type'		=> 'color'
		);

		$options[] = array(
			'name'		=> __('upload Input', 'AM_Sandbox'),
			'desc'		=> __( 'A mini description 1', 'AM_Sandbox' ),
			'id'		=> 'test_upload',
			'type'		=> 'upload'
		);

		$options[] = array(
			'name'		=> __('typography Input', 'AM_Sandbox'),
			'desc'		=> __( 'A mini description 1', 'AM_Sandbox' ),
			'id'		=> 'test_typography',
			'default'	=> $typography_defaults,
			'type'		=> 'typography'
		);

		$options[] = array(
			'name'		=> __('Custom typography Input', 'AM_Sandbox'),
			'desc'		=> __( 'A mini description 1', 'AM_Sandbox' ),
			'id'		=> 'test_typography',
			'default'	=> $typography_defaults,
			'type'		=> 'typography',
			'options'	=> $typography_options
		);

		$options[] = array(
			'name'		=> __('background Input', 'AM_Sandbox'),
			'desc'		=> __( 'A mini description 1', 'AM_Sandbox' ),
			'id'		=> 'test_background',
			'default'	=> $background_defaults,
			'type'		=> 'background'
		);

		$options[] = array(
			'name'		=> __('editor Input', 'AM_Sandbox'),
			'desc'		=> __( 'A mini description 1', 'AM_Sandbox' ),
			'id'		=> 'test_editor',
			'default'	=> 'default Value',
			'type'		=> 'editor',
			'settings' => $wp_editor_settings
		);

		$options[] = array(
			'name'		=> __('info Input', 'AM_Sandbox'),
			'desc'		=> __( 'A mini description 1', 'AM_Sandbox' ),
			'type'		=> 'info'
		);

	return $options;
}