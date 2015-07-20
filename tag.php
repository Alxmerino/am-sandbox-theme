<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @package WordPress
 * @subpackage am_sandbox_theme
 * @since AM_Sandbox 1.0
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>

	<header class="archive-header">
		<h1 class="archive-title">
			<?php printf( __( 'Tag Archives: %s', 'am_sandbox_theme' ), single_tag_title( '', false ) ); ?>
		</h1>

		<?php
			// Show an optional term description.
			$term_description = term_description();
			if ( ! empty( $term_description ) ) :
				printf( '<div class="taxonomy-description">%s</div>', $term_description );
			endif;
		?>
	</header><!-- .archive-header -->

	<?php while ( have_posts() ) : the_post(); ?>
	
		<?php get_template_part( 'content', get_post_format() ); ?>

	<?php endwhile; ?>

		<?php am_paging_nav(); ?>

	<?php else: ?>

		<?php get_template_part( 'content', 'none' ); ?>
    
	<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
