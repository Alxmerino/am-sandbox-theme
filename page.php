<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage am_boiler
 * @since AM_Framework 1.0
 */

get_header(); ?>

	<div class="primary">
		<div class="container">
			<div class="site-content">
				<?php if (have_posts()) : ?>
					
					<?php while ( have_posts() ) : the_post(); ?>
						
						<?php get_template_part( 'content', 'page' ); ?>
						<?php am_paging_nav(); ?>
					
					<?php endwhile; ?>
				
				<?php endif; ?>
			</div>

			<?php //get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>