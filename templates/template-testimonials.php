<?php
/**
 * Template Name: Testimonials
 *
 * @package WordPress
 * @subpackage am_boiler
 * @since AM_Framework 1.0
 */

// Taxonomy args
$catArgs = array(
	'type'       => 'testimonial',
	'orderby'    => 'count',
	'order'      => 'ASC',
	'taxonomy'   => 'testimonial_tax',
);

// Get testimonial posts
$args = array(
	'post_type' => 'testimonial',
	'posts_per_page' => -1,
	'nopagin' => true,
	'order' => 'DESC',
	'orderby' => 'menu_order'
);

$testimonialCategories = get_categories( $catArgs );
foreach ($testimonialCategories as $key => $value) {
	$value->object_ids = get_objects_in_term( $value->term_id, 'testimonial_tax');
}
$testimonialQuery = new WP_Query($args);
$testimonialPosts = array();
foreach ($testimonialQuery->posts as $key => $value) {
	$testimonialPosts[$value->ID] = $value;
}

get_header(); ?>

	<div class="primary">
		<div class="container">
			<div class="site-content">
				<?php if (have_posts()) : ?>
					
					<?php while ( have_posts() ) : the_post(); ?>
						
						<?php get_template_part( 'content', 'page' ); ?>
					
					<?php endwhile; ?>
				
				<?php endif; ?>

				<!-- Testimonials -->
				<div class="testimonials-wrapper">

					<?php foreach ($testimonialCategories as $key => $value) : ?>

						<div class="testimonial-category">
							<h3 class="category-title"><?php echo $value->name; ?></h3>

							<?php foreach ($value->object_ids as $post_id) : ?>
								<?php if (isset($testimonialPosts[$post_id])) : ?>
									<div class="testimonial">
										<div class="testimonial-text">
											<?php echo wpautop( $testimonialPosts[$post_id]->post_content); ?>
										</div>
										<h4 class="testimonial-by">- <?php echo $testimonialPosts[$post_id]->post_title; ?></h4>
									</div>
								<?php endif; ?>
							<?php endforeach; ?>
						
						</div>

					<?php endforeach; ?>
				</div>

			</div>

			<?php //get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>