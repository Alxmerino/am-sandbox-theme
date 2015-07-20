<?php
/**
 * The default template for displaying page content
 * 
 * @package WordPress
 * @subpackage am_sandbox_theme
 * @since AM_Sandbox 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">

		<?php if ( is_singular() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
		<?php endif; // is_single() ?>

	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>
		<div class="entry-content">
			<?php if (has_post_thumbnail( $post->ID )) : ?>
				<div class="post-thumbnail">
					<?php echo get_the_post_thumbnail( $post->ID, 'medium' ); ?>
				</div>
			<?php endif; ?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'am_sandbox_theme' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'am_sandbox_theme' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		</div><!-- .entry-content -->
		<?php
				/**
				 * Page call to action
				 */
				$call_to_action_text = get_post_meta($post->ID, 'am_action_button_text', true);
				$call_to_action_url = get_post_meta($post->ID, 'am_action_button_url', true);
				$call_to_action_color = get_post_meta($post->ID, 'am_action_button_color', true);
				$call_to_action_text2 = get_post_meta($post->ID, 'am_action_button_text2', true);
				$call_to_action_url2 = get_post_meta($post->ID, 'am_action_button_url2', true);
				$call_to_action_color2 = get_post_meta($post->ID, 'am_action_button_color2', true);

				if ( (!empty($call_to_action_text)) && (!empty($call_to_action_url)) ) :
			?>
				<nav class="navigation post-navigation" role="navigation">
					<div class="nav-links">
						<a href="<?php echo $call_to_action_url; ?>" rel="prev" <?php echo (!empty($call_to_action_color)) ? 'style="background-color: ' . $call_to_action_color . '"' : ''; ?>><?php echo $call_to_action_text; ?></a>
						<?php if ( (!empty($call_to_action_text2)) && (!empty($call_to_action_url2)) ) : ?>
						<a href="<?php echo $call_to_action_url2; ?>" rel="next" <?php echo (!empty($call_to_action_color2)) ? 'style="background-color: ' . $call_to_action_color2 . '"' : ''; ?>><?php echo $call_to_action_text2; ?></a>
						<?php endif; ?>
					</div><!-- .nav-links -->
				</nav>
			<?php endif; ?>
	<?php endif; ?>

</article><!-- #post -->