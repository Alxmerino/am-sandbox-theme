<?php
/**
 * The template for displaying Archive pages
 *
 * @package WordPress
 * @subpackage am_sandbox_theme
 * @since AM_Sandbox 1.0
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>
		<header class="archive-header">
			<h1 class="archive-title"><?php
				if ( is_day() ) :
					printf( __( 'Daily Archives: %s', 'am_sandbox_theme' ), get_the_date() );
				elseif ( is_month() ) :
					printf( __( 'Monthly Archives: %s', 'am_sandbox_theme' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'am_sandbox_theme' ) ) );
				elseif ( is_year() ) :
					printf( __( 'Yearly Archives: %s', 'am_sandbox_theme' ), get_the_date( _x( 'Y', 'yearly archives date format', 'am_sandbox_theme' ) ) );
				else :
					_e( 'Archives', 'am_sandbox_theme' );
				endif;
			?></h1>
		</header><!-- .archive-header -->

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', get_post_format() ); ?>

	<?php endwhile; ?>

		<?php am_paging_nav(); ?>

	<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>
		
	<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>