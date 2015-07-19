<?php
/**
 * Template Name: Contact
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
						
						<?php get_template_part( 'content', 'contact' ); ?>
					
					<?php endwhile; ?>
				
				<?php endif; ?>

			</div><!-- .site-content -->

			<?php //get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>