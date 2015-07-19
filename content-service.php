<?php
/**
 * The default template for displaying program service
 * 
 * @package WordPress
 * @subpackage am_boiler
 * @since AM_Framework 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h2 class="service-entry-title"><?php the_title(); ?></h2>
	
	<div class="entry-content">
		<?php the_content(); ?>
		<a href="<?php the_permalink(); ?>" rel="bookmark">Read More...</a>
	</div>

</article><!-- #post -->