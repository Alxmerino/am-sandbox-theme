<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage am_boiler
 * @since AM_Framework 1.0
 */

get_header(); ?>

	<div class="primary">
		<div class="container">
			<div class="site-content">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>
					<?php am_post_nav(); ?>
					<?php //comments_template(); ?>

				<?php endwhile; ?>

			</div><!-- #content -->
			<?php //get_sidebar(); ?>
		</div>
	</div><!-- #primary -->
<?php get_footer(); ?>