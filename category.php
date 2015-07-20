<?php
/**
 * The template for displaying Category pages
 *
 * @package WordPress
 * @subpackage am_sandbox_theme
 * @since AM_Sandbox 1.0
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>
		<header class="archive-header">
			<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'am_sandbox_theme' ), single_cat_title( '', false ) ); ?></h1>

			<?php if ( category_description() ) : // Show an optional category description ?>
			<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
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