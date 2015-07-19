<?php
/**
 * Template Name: Homepage
 *
 * @package WordPress
 * @subpackage am_boiler
 * @since AM_Framework 1.0
 */

get_header(); ?>

	<?php get_template_part( 'content', 'slider'); ?>

	<div class="primary">

		<section class="home-content">
			<div class="container">
				<div class="home-heading">
					<h2>Creating A Culture For Success</h2>
				</div>
					
				<?php while ( have_posts() ) : the_post(); ?>
					
					<article class="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php if ( is_search() ) : // Only display Excerpts for Search ?>
							<div class="entry-summary">
								<?php the_excerpt(); ?>
							</div><!-- .entry-summary -->
						<?php else : ?>
							<div class="entry-content">
								<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'am_boiler' ) ); ?>
								<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'am_boiler' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
							</div><!-- .entry-content -->
						<?php endif; ?>

					</article><!-- #post -->
				<?php endwhile; ?>
			</div>
		</section>

		<section class="home-secondary">
			<div class="container">
				<?php if ( ! dynamic_sidebar( 'home1-widget-area' ) ) : ?>
				<div class="note">
					<p>Please add content in the widget's area</p>
				</div>
				<?php endif; ?>
			</div>
		</section>

		<section class="home-about">
			<div class="container">
				<?php if ( ! dynamic_sidebar( 'home3-widget-area' ) ) : ?>
				<div class="note">
					<p>Please add content in the widget's area</p>
				</div>
				<?php endif; ?>
			</div>
		</section>
	
	</div><!-- #primary -->

<?php get_footer(); ?>