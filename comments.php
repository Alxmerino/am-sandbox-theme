<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage am_boiler
 * @since AM_Framework 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) : ?>
				<p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'am_boiler' ); ?></p>
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
?>

<div id="comments">

	<?php if ( have_comments() ) : ?>

		<div id="comments-header">
			<h2 class="comments-title">
				<?php
					printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'am_boiler' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
				?>
			</h2>
		</div><!-- end #comments-header -->

		<ul id="comment-list">
			<?php 
				wp_list_comments( array( 
					'callback'		=> 'am_comments',
					'style'			=> 'ul'
				) ); ?>
		</ul>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<?php previous_comments_link( __( '&larr; Older Comments', 'am_boiler' ) ); ?>
		<?php next_comments_link( __( 'Newer Comments &rarr;', 'am_boiler' ) ); ?>
	<?php endif; // check for comment navigation ?>

	<?php else : // or, if we don't have comments:

		/* If there are no comments and comments are closed,
		 * let's leave a little note, shall we?
		 */
		if ( ! comments_open() ) : ?>
			<p><?php _e( 'Comments are closed.', 'am_boiler' ); ?></p>
		<?php endif; // end ! comments_open() ?>

	<?php endif; // end have_comments() ?>

	
	<?php
		
		$comments_args = array(
        	// remove "Text or HTML to be displayed after the set of comment fields"
        	'comment_notes_after' => '',
        	'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Your Message"></textarea></p>',
        	'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'am_boiler' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
        	'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out &raquo;</a>', 'am_boiler' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
            'comment_notes_before' => '',
            'comment_notes_after' => '',
            'title_reply_to' => __('<h3 class="heading"><span>Leave a reply</span></h3>', 'am_boiler'),
            'cancel_reply_link' => __('Cancel Reply', 'am_boiler'),
            'label_submit' => __('Add Comment', 'am_boiler'),
            'fields' => apply_filters( 
            	'comment_form_default_fields', array(
            		'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name *', 'am_boiler' ) . '</label>' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' placeholder="Your Name" /></p>',
            		'email' => '<p class="comment-form-email"><label for="email">' . __( 'Email *', 'am_boiler' ) . '</label>' . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' placeholder="Your Email" /></p>',
            		'url' => '<p class="comment-form-url"><label for="url">' . __( 'Website', 'am_boiler' ) . '</label>' . '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="Your Website" /></p>' ) )
        );

	 comment_form($comments_args); ?>
	        
</div><!-- end #comments -->