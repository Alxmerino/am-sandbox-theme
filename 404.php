<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage am_sandbox_theme
 * @since AM_Sandbox 1.0
 */

get_header(); ?>

	<h1><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'am_sandbox_theme' ); ?></h1>

	<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'am_sandbox_theme' ); ?></p>

	<?php get_search_form(); ?>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>