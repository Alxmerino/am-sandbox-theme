<?php
/**
 * The template for displaying Archive pages
 *
 * @package WordPress
 * @subpackage am_boiler
 * @since AM_Framework 1.0
 */

get_header(); ?>

	<div id="primary" class="col-md-8">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'am_boiler' ), get_the_date() );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'am_boiler' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'am_boiler' ) ) );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'am_boiler' ), get_the_date( _x( 'Y', 'yearly archives date format', 'am_boiler' ) ) );
					else :
						_e( 'Archives', 'am_boiler' );
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

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>