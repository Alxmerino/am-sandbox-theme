<?php
// error reporting
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
/*-----------------------------------------------------------------------------------
	Here we have all the custom functions for the theme
	Please be extremely cautious editing this file and the files listed,
	When things go wrong, they tend to go wrong in a big way.
-------------------------------------------------------------------------------------*/

include 'library/functions/constants.php';		// PHP Constants
include LIB . '/functions/setup.php';			// Theme Setup
include LIB . '/functions/actions.php';			// Actions
include LIB . '/functions/filters.php';			// Filters	
include LIB . '/functions/custom-functions.php';			// Custom 

/*-----------------------------------------------------------------------------------*/
/*	Require AM Framework
/*-----------------------------------------------------------------------------------*/
// require( 'framework/am-init.php' );

/*-----------------------------------------------------------------------------------*/
/* Meta data
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/*	Custom Post Types
/*-----------------------------------------------------------------------------------*/
include LIB . '/custom-posts/custom-post-slides.php'; // Custom slides
include LIB . '/custom-posts/custom-post-services.php'; // Custom services
include LIB . '/custom-posts/custom-post-testimonials.php'; // Custom testimonials
include LIB . '/custom-posts/custom-post-clients.php'; // Custom clients
include LIB . '/custom-posts/custom-post-case-studies.php'; // Custom clients

/*-----------------------------------------------------------------------------------*/
/*	Shortcodes
/*-----------------------------------------------------------------------------------*/
include(LIB . '/shortcodes/shortcodes.php');
include(LIB . '/shortcodes/am_shortcodes.php');

/*-----------------------------------------------------------------------------------*/
/*	Meta
/*-----------------------------------------------------------------------------------*/
include LIB . '/meta/meta-pages.php';
/*-----------------------------------------------------------------------------------*/
/*	Widgets
/*-----------------------------------------------------------------------------------*/
include LIB . '/widgets/widget-testimonials.php';
include LIB . '/widgets/widget-get-page.php';
// include LIB . '/widgets/widget-html-text.php';

?>