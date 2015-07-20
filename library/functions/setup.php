<?php 

/*-----------------------------------------------------------------------------------*/
/*	Set the content width based on the theme's design and stylesheet.

	Used to set the width of images and content. Should be equal to the width the theme
	is designed for, generally via the style.css stylesheet.
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
	$content_width = 820;
	
/*-----------------------------------------------------------------------------------*/
/*	Our Theme Setup
/*-----------------------------------------------------------------------------------*/

add_action( 'after_setup_theme', 'am_sandbox_theme_setup' );

function am_sandbox_theme_setup() {
	
	/* Add theme support for automatic feed links. */	
	add_theme_support( 'automatic-feed-links' ); 

	/* Add post-format support */
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'audio', 'image', 'link', 'quote', 'video' ) );
	
	/* Add theme support for post thumbnails (featured images) */
	if ( function_exists( 'add_theme_support' ) ) { 
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size(200, 200, true); // sets width and height for thumbnail
		add_image_size( 'thumbnail-slider', 1200, 9999); // slider thumb
		add_image_size( 'thumbnail-small', 150, 150, true);
		// add_image_size( 'thumbnail-gallery', 491, 9999); // gallery thumb
		// add_image_size( 'thumbnail-large', 491, '', true); // for blog pages
		// add_image_size( 'thumbnail-medium', 300, '', true); // for blog pages
		// add_image_size( 'thumbnail-small', 150, 100, true); // for blog pages
		// add_image_size( 'thumbnail-sponsor', 250, '', true ); // for sponsors
		// add_image_size( 'thumbnail-rand-sponsor', 185, 110, true ); // for random sponsors
		// add_image_size( 'thumbnail-key-speaker', 250, 250, true ); // for keynote speakers
		// add_image_size( 'thumbnail-featured-speaker', 100, 100, true ); // for featured speakers
	}
	
	/* ACTIONS
	================================================== */
	
	/* Add your nav menus function to the 'init' action hook. */
	add_action('init', 'am_register_custom_menus');
	
	/* Add your sidebars function to the 'widgets_init' action hook. */
	add_action('widgets_init', 'am_register_sidebar');
	
	/* Load and enqueue all our javascript files */
	add_action('wp_enqueue_scripts', 'am_load_javascript');

	/* Load and enqueue admin scripts */
	add_action( 'admin_enqueue_scripts', 'am_admin_javascript' );

	/* Process Form */
	add_action( 'wp_ajax_process_form', 'am_process_form' );
	add_action( 'wp_ajax_nopriv_process_form', 'am_process_form' );
	
	/* FILTERS
	================================================== */
	
	/* Custom Searchform */
	add_filter( 'get_search_form', 'am_search_form' );
	
	/* Excerpt Length */
	add_filter( 'excerpt_length', 'am_excerpt_length' );
	
	/* Excerpt more link */
	add_filter( 'excerpt_more', 'am_excerpt_more' );
	
	/* Enable post thumbnails in RSS feed */
	add_filter('the_excerpt_rss', 'am_rss_post_thumbnail');
	add_filter('the_content_feed', 'am_rss_post_thumbnail');

	/* Automatic p tags on TinyMCE*/
	add_filter('tiny_mce_before_init', 'am_tinymce_autop' );

	/* Sort order for previous/next post link */
	add_filter( 'get_previous_post_sort', 'am_adjacent_post_prev_sort' );
	add_filter( 'get_next_post_sort', 'am_adjacent_post_next_sort' );

	/* Sort order for precious/next post link WHERE */
	add_filter( 'get_next_post_where', 'am_adjacent_post_next_where' );
	add_filter( 'get_previous_post_where', 'am_adjacent_post_prev_where' );
	
} // end theme_setup