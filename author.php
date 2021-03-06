<?php
/**
 * The template for displaying Author archive pages
 *
 * @package WordPress
 * @subpackage am_sandbox_theme
 * @since AM_Sandbox 1.0
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<header class="archive-header">
			<h1 class="archive-title"><?php printf( __( 'All posts by %s', 'am_sandbox_theme' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
			<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<?php get_template_part( 'author-bio' ); ?>
			<?php endif; ?>
		</header><!-- .archive-header -->

		<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>

		<?php endwhile; ?>

		<?php am_paging_nav(); ?>

	<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>