<?php
/**
 * Template Name: Services
 *
 * @package WordPress
 * @subpackage am_boiler
 * @since AM_Framework 1.0
 */

get_header(); ?>

	<?php

	// Get services categories posts
	$args = array(
		'post_type' => 'service',
		'posts_per_page' => -1,
		'nopagin' => true,
		'order' => 'ASC',
		'orderby' => 'menu_order'
	);
	$servicesQuery = new WP_Query($args);

	$servicesArray = array();
	// Build services array
	foreach ($servicesQuery->posts as $key => $value) {

		$value->post_content = '';

		$excerpt = get_post_meta( $value->ID, 'am_service_excerpt', true );
		$oneLinerDesc = get_post_meta( $value->ID, 'am_service_one_liner', true );
		$value->post_excerpt = $excerpt;
		$value->desc = $oneLinerDesc;

		if ( empty($value->post_parent) ) {
			foreach ($value as $k => $val) {
				$servicesArray[$value->ID][$k] = $val;
			}
		} else {
			$servicesArray[$value->post_parent]['children'][] = am_obj_to_array($value);
		}
	}

	?>

	<div class="primary">
		<div class="container">
			<div class="site-content">
	
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>


				<div class="entry-content">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class('one_half'); ?>>

						<?php the_content(); ?>

					</div><!-- #post-ID -->

					<?php endwhile; endif; ?>
					
					<div class="services-container one_half last">
					<?php foreach ($servicesArray as $key => $value) : ?>

						<div class="services-wrapper">
							
							<div class="service-category">
								<h3 class="category-title">
									<a href="<?php echo get_permalink( $value['ID'] ); ?>"><?php echo $value['post_title']; ?></a>
								</h3>

								<div class="desc">
									<?php echo wpautop( $value['desc'] ); ?>
									<a href="<?php echo get_permalink( $value['ID'] ); ?>">Read More</a>
								</div>

								<!-- <div class="children">
									<?php //foreach ($value['children'] as $childService) : ?>
										<div class="child-service">
											<h4><?php echo $childService['post_title']; ?></h4>
											<div class="child-desc">
												<?php echo wpautop( $childService['desc'] ); ?>
												<a href="<?php echo get_permalink( $childService['ID'] ); ?>">Read More</a>
											</div>
										</div>
									<?php //endforeach; ?>
								</div> -->
							</div>

						</div>

					<?php endforeach; ?>
					</div>
				</div><!-- .entry-content -->

			</div><!-- .site-content -->

			<?php //get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>