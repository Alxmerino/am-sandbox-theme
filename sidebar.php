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
			<h3 class="widget-title"><?php _e( 'Search', 'am_boiler' ); ?></h3>
			<?php get_search_form(); ?>
			<div class="lineDivider"></div>
		</div><!-- .widget-container -->
	
		<div class="widget">
			<h3 class="widget-title"><?php _e( 'Archives', 'am_boiler' ); ?></h3>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
			<div class="lineDivider"></div>
		</div><!-- .widget-container -->

		<div class="widget">
			<h3 class="widget-title"><?php _e( 'Categories', 'am_boiler' ); ?></h3>
			<ul>
				<?php wp_list_categories(); ?>
			</ul>
			<div class="lineDivider"></div>
		</div><!-- .widget-container -->

		<div class="widget">
			<h3 class="widget-title"><?php _e( 'Tag Cloud', 'am_boiler' ); ?></h3>
			<ul>
				<?php wp_tag_cloud(	); ?>
			</ul>
			<div class="lineDivider"></div>
		</div><!-- .widget-container -->
	
		<div class="widget">
			<h3 class="widget-title"><?php _e( 'Meta', 'am_boiler' ); ?></h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
			<div class="lineDivider"></div>
		</div><!-- .widget-container -->

	<?php endif; ?>
	
</aside><!-- #secondary -->
