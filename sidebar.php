<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<aside class="sidebar">

	<?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>

		<div class="widget">
			<h3 class="widget-title"><?php _e( 'Search', 'am_sandbox_theme' ); ?></h3>
			<?php get_search_form(); ?>
		</div><!-- .widget-container -->
	
		<div class="widget">
			<h3 class="widget-title"><?php _e( 'Archives', 'am_sandbox_theme' ); ?></h3>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</div><!-- .widget-container -->

		<div class="widget">
			<h3 class="widget-title"><?php _e( 'Categories', 'am_sandbox_theme' ); ?></h3>
			<ul>
				<?php wp_list_categories(); ?>
			</ul>
		</div><!-- .widget-container -->

		<div class="widget">
			<h3 class="widget-title"><?php _e( 'Tag Cloud', 'am_sandbox_theme' ); ?></h3>
			<ul>
				<?php wp_tag_cloud(	); ?>
			</ul>
		</div><!-- .widget-container -->
	
		<div class="widget">
			<h3 class="widget-title"><?php _e( 'Meta', 'am_sandbox_theme' ); ?></h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</div><!-- .widget-container -->

	<?php endif; ?>
	
</aside><!-- #secondary -->
