<?php
/**
 * The default template for displaying page content
 * 
 * @package WordPress
 * @subpackage am_boiler
 * @since AM_Framework 1.0
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

	<div class="contact-form">
		<form action="" method="get" id="contact-form">
			<fieldset>
				<div class="form-field">
					<label for="name">Name <span class="required">*</span></label>
					<input type="text" name="name" id="name" required>
				</div>
				<div class="form-field">
					<label for="email">Email <span class="required">*</span></label>
					<input type="text" name="email" id="email" required>
				</div>
				<div class="form-field">
					<label for="title">Title</label>
					<input type="text" name="title" id="title">
				</div>
				<div class="form-field">
					<label for="company">Company Name <span class="required">*</span></label>
					<input type="text" name="company" id="company" required>
				</div>
				<div class="form-field">
					<label for="address">Address</label>
					<input type="text" name="address" id="address">
				</div>
				<div class="form-field">
					<label for="phone">Phone <span class="required">*</span></label>
					<input type="text" name="phone" id="phone" required>
				</div>
				<div class="form-field">
					<label for="employees">Number of employees</label>
					<input type="text" name="" id="employees">
				</div>
				<div class="form-field">
					<label for="hear_from_us">How did you hear from us?</label>
					<select name="hear_from_us" id="hear_from_us">
						<option value="Google">Google</option>
						<option value="MSN">MSN</option>
						<option value="Yahoo">Yahoo</option>
						<option value="Other search engine">Other search engine</option>
						<option value="Email promotion">Email promotion</option>
						<option value="Mail advert">Mail advert</option>
						<option value="Referral">Referral</option>
						<option value="Other">Other</option>
					</select>
				</div>
				<div class="form-field">
					<label for="hear_other" class="full">If other please specify...</label>
					<textarea type="text" name="hear_other" id="hear_other" cols="15" rows="3"></textarea>
				</div>
				<div class="form-field">
					<label for="summary" class="full">Summary of training needs</label>
					<textarea type="text" name="summary" id="summary" cols="15" rows="5"></textarea>
				</div>
				<div class="form-field submit-field">
					<input type="submit" value="submit">
				</div>
			</fieldset>
		</form>
		<div class="form-response">
			<p class="success display-none">Your message has been sent</p>
			<p class="warning display-none">There was an error while submitting the form.</p>
		</div>
	</div>

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
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'am_boiler' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'am_boiler' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		</div><!-- .entry-content -->
	<?php endif; ?>

</article><!-- #post -->