<?php
/**
 * Template Name: Clients
 *
 * @package WordPress
 * @subpackage am_boiler
 * @since AM_Framework 1.0
 */

// Taxonomy args
$catArgs = array(
	'type'       => 'client',
	'orderby'    => 'name',
	'order'      => 'ASC',
	'taxonomy'   => 'client_tax',
);

// Get client posts
$args = array(
	'post_type' => 'client',
	'posts_per_page' => -1,
	'nopagin' => true,
	'order' => 'DESC',
	'orderby' => 'menu_order'
);

$clientCategories = get_categories( $catArgs );
foreach ($clientCategories as $key => $value) {
	$value->object_ids = get_objects_in_term( $value->term_id, 'client_tax');
}
$clientQuery = new WP_Query($args);
$clientPosts = array();
foreach ($clientQuery->posts as $key => $value) {
	$clientPosts[$value->ID] = $value;
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

				<!-- Clients -->
 				<div class="clients-wrapper">

					<?php foreach ($clientCategories as $key => $value) : ?>

						<ul class="client-category">
							<li>
								<h3 class="category-title"><?php echo $value->name; ?></h3>
							</li>

							<?php foreach ($value->object_ids as $post_id) : 
								$client = $clientPosts[$post_id];
								$clientUrl = get_post_meta( $post_id, 'am_client_url', true );
							?>

							<li class="client-item">
								<a href="<?php echo $clientUrl ?>" target="_blank">
									<?php
										$meta = get_post_meta( $post_id, 'am_client_alt', true );
									
										if ( has_post_thumbnail( $post_id ) || $meta) {
											if ($meta) {
												echo '<img src="' . $meta . '" alt="' . $client->post_title .'" />';
											} else {
												echo get_the_post_thumbnail($post_id, 'thumbnail');
											}
										}
									?>
								</a>
								<a href="<?php echo $clientUrl ?>" target="_blank"><?php echo $client->post_title; ?></a>
							</li>
							<?php endforeach; ?>
						
						</ul>

					<?php endforeach; ?>
				</div>

			</div>

			<?php //get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>