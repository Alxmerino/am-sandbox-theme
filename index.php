<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage am_boiler
 * @since AM_Framework 1.0
 */

get_header(); ?>

	<div id="primary" class="container">
		
		<?php if (have_posts()) : ?>
	
		<?php while ( have_posts() ) : the_post(); ?>
			
			<?php get_template_part( 'content', get_post_format() ); ?>
	
		<?php endwhile; ?>
	
			<?php am_paging_nav(); ?>
	
		<?php else: ?>
	
			<?php get_template_part( 'content', 'none' ); ?>
	    
		<?php endif; ?>
	
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>