<?php

/*-----------------------------------------------------------------------------------*/
/*	Actions
/*-----------------------------------------------------------------------------------*/

	/* Custom menus function
	================================================== */
	function am_register_custom_menus() {
	  register_nav_menus(
	    array( 
	    	'main-menu' => __( 'Main Menu', 'am_sandbox_theme' )
	    	)
	  );
	}
	
	/* Sidebars function
	================================================== */
	function am_register_sidebar() {

		register_sidebar( array(
			'name' => __( 'Home middle-left widget area', 'am_sandbox_theme' ),
			'id' => 'home1-widget-area',
			'description' => __( 'Home\'s middle-left widget area', 'am_sandbox_theme' ),
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title"><span>',
			'after_title' => '</span></h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Home middle-rigth widget area', 'am_sandbox_theme' ),
			'id' => 'home2-widget-area',
			'description' => __( 'Home\'s middle-rigth widget area', 'am_sandbox_theme' ),
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title"><span>',
			'after_title' => '</span></h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Home bottom widget area', 'am_sandbox_theme' ),
			'id' => 'home3-widget-area',
			'description' => __( 'Home\'s bottom widget area', 'am_sandbox_theme' ),
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title"><span>',
			'after_title' => '</span></h3>',
		) );

		// Area 1, located at the top of the sidebar.
		register_sidebar( array(
			'name' => __( 'Sidebar Widget Area', 'am_sandbox_theme' ),
			'id' => 'primary-widget-area',
			'description' => __( 'The primary widget area', 'am_sandbox_theme' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title"><span>',
			'after_title' => '</span></h3>',
		) );
	}

	/* javascript enqueue function */
	function am_load_javascript() {
		//Register external plugins
		wp_register_script('plugins', JSPATH . '/vendor/plugins.js', '', '1.0', true);
		// Register all scripts
		wp_register_script('main', JSPATH . '/main.js', array('jquery'), '1.0', true );
		// Google maps for maplace
		wp_register_script('google-maps', 'http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&', array('jquery'), '3.7', true );

		// Localized Scripts
		// Slides Array
		wp_localize_script( 'main', 'am_slide_array', am_get_slides() );
		// Pages data
		wp_localize_script( 'main', 'am_pages', am_get_post_data(am_get_post_ids('page')) );
		// Testimonials
		wp_localize_script( 'main', 'am_testimonials', am_get_post_data(am_get_post_ids('testimonial')) );
		// Ajax URL
		wp_localize_script( 'main', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
		// Slider DOM
		wp_localize_script( 'main', 'am_files_variables', am_files_to_variables( array('content-slider.php', 'content-carousel.html') ) );

		// Enqueue wordpress js plugins
		wp_enqueue_script( 'underscore' );
		
		wp_enqueue_script('google-maps');
		wp_enqueue_script('plugins');
		wp_enqueue_script('main');
		
	}

	/**
	 * Print Admin scripts
	 * @return [type] [description]
	 */
	function am_admin_javascript($hook) {
		// $hook = 'current page file, eg: index.php, edit.php etf';

		// Add the color picker css file       
        wp_enqueue_style( 'wp-color-picker' );

		// Register admin scripts
		wp_register_script( 'admin-main', LIB_ASSETS . '/js/admin-main.js', array('jquery', 'wp-color-picker'), null, false );

		// Enqueue admin scripts
		wp_enqueue_script( 'admin-main' );
	}

	/**
	 * Process Contact Form
	 */
	function am_process_form() {
		$formData = parse_str($_POST['data'], $formArray);
		extract($formArray); // $name, $email, $title, $company, $address, $phone, $summary

		// $to = 'rmerino@amayamedia.com';
		$to = 'info@dek-services.com';
		$subject = 'DEK Consulting Services Contact Form';
		$headers = array();
		$headers[] = 'From: DEK Services <no_reply@dek-services.com>';
		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		$message = 'New Message from: ' . $name . ' ' . $email . '<br><br>';

		foreach ($formArray as $key => $value) {
			$message .= '<strong>' . ucfirst($key) . ': </strong> ' . nl2br(htmlspecialchars($value)) . '<br>';
		}

		if ( wp_mail( $to, $subject, $message, $headers) ) {
			echo 'success';
		} else {
			echo 'warning';
		}
		exit();
	}


	?>