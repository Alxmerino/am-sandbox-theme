<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage am_boiler
 * @since AM_Framework 1.0
 */

get_header(); ?>

<div class="col-md-8">
	
	<h1><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'am_boiler' ); ?></h1>

	<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'am_boiler' ); ?></p>

	<?php get_search_form(); ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>