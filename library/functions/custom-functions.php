<?php

/*-----------------------------------------------------------------------------------*/
/*  Excerpt length
/*-----------------------------------------------------------------------------------*/
function am_custom_excerpt($length){
	global $post;
	$content = strip_tags($post->post_content);
	preg_match('/^\s*+(?:\S++\s*+){1,'.$length.'}/', $content, $matches);
	echo "<p>" . $matches[0] . "" . continue_reading_link() . "</p>";
}

/*-----------------------------------------------------------------------------------*/
/*  Continue reading link
/*-----------------------------------------------------------------------------------*/
function continue_reading_link() {
	return ' <a href="'. get_permalink() . '">( ' . __( 'Read More', 'am_sandbox_theme' ) . ' <span class="meta-nav">&rarr;</span> )</a>';
}

/*-----------------------------------------------------------------------------------*/
/*  Pagination Navigation
/*-----------------------------------------------------------------------------------*/
function am_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<div class="nav-links">
			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'am_sandbox_theme' ) ); ?></div>
			<?php endif; ?>
			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'am_sandbox_theme' ) ); ?></div>
			<?php endif; ?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}

/*-----------------------------------------------------------------------------------*/
/*  Posts nav
/*-----------------------------------------------------------------------------------*/
function am_post_nav() {
	global $post, $wpdb;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>

	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links">
			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'am_sandbox_theme' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'am_sandbox_theme' ) ); ?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}


/*-----------------------------------------------------------------------------------*/
/*  Posts Not Found
/*-----------------------------------------------------------------------------------*/
function am_posts_not_found() { ?>
	<div id="not-found">
		<h3><?php _e('No posts found. Try a different search?', 'am_sandbox_theme'); ?></h3>  
		<?php get_search_form(); ?>
	</div>
	<?php
}

/*-----------------------------------------------------------------------------------*/
/*  Post Meta
/*-----------------------------------------------------------------------------------*/
function am_entry_meta() {
	$format = get_post_format();
	
	//if standard post format
	if ( !$format ) { ?>

		<a href="<?php the_permalink(); ?>" class="post-format standard"></a>
		<?php _e('Posted by:', 'am_sandbox_theme'); ?> <?php the_author_posts_link(); ?> <?php _e('on:', 'am_sandbox_theme'); ?> <?php the_date('M d, Y'); ?> | <?php _e('comments:', 'am_sandbox_theme'); ?> <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>

	<?php } else { ?>

		<a href="<?php the_permalink(); ?>" class="post-format <?php echo $format; ?>"></a>
		<?php _e('Posted by:', 'am_sandbox_theme'); ?> <?php the_author_posts_link(); ?> <?php _e('on:', 'am_sandbox_theme'); ?> <?php the_date('M d, Y'); ?> | <?php _e('comments:', 'am_sandbox_theme'); ?> <?php comments_popup_link('No Comments', '1 Comment', '% Comments');

	}
}

/*-----------------------------------------------------------------------------------*/
/*  Display Random Sponsors
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'rand_sponsors' ) ) {
	function rand_sponsors() {
		$args = array(
			'post_type'     => 'sponsors',
			'posts_per_page'    => 4,
			'order'         => 'DESC',
			'orderby'       => 'rand'
		);
		
		$rand_loop = new WP_Query( $args );
		
		if ( $rand_loop->have_posts() ) { ?>
		
		<div id="sponsors" class="container">
			<h2 class="section-title center"><span><?php _e( 'Sponsors', 'am_sandbox_theme' ); ?>:</span></h2>
			
			<?php while ( $rand_loop->have_posts() ) : $rand_loop->the_post(); ?>
			
				<div class="sponsor three columns">
					<?php echo '<a href="', get_permalink(), '">';
						if (has_post_thumbnail()) {
							the_post_thumbnail('thumbnail-rand-sponsor');
						}
						else {
							echo '<img src="' . IMAGES . '/post-thumbnail.jpg', '" alt="thumbnail" width="185" height="110" />';
						}
						echo '</a>';
					?>
				</div><!-- .four -->
			
			<?php endwhile; ?>
			
		</div><!-- #sponsors -->
			
		<?php 
		}
		
		wp_reset_postdata();
		
	}
	
}

/*-----------------------------------------------------------------------------------*/
/*  Comments
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'am_comments' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own am_comments(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
	function am_comments( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case '' :
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<div id="comment-<?php comment_ID(); ?>" class="comment-wraper">
				<div class="comment-author vcard">
					<!-- Author avatar -->
					<?php echo get_avatar( $comment, 80 ); ?><br />
					<!-- Author's link -->
					<?php printf( __( '%s', 'am_sandbox_theme' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
					<span>
						<?php
							/* translators: 1: date */
							printf( __( '%1$s', 'am_sandbox_theme' ), get_comment_date('M d, y') ); ?><br />
						<?php edit_comment_link( __( '(Edit)', 'am_sandbox_theme' ), ' ' ); ?>
					</span>
				</div><!-- .comment-author -->
				<div class="comment-body">
					
					<?php comment_text(); ?>
					<div class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div><!-- .reply -->
					
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><?php _( 'Your comment is awaiting moderation.', 'am_sandbox_theme' ); ?></em>
						<br />
					<?php endif; ?>
		
				</div><!-- comment-body -->
			</div><!-- .commment-wraper -->                         
		</li><!-- .comment -->
		
		<?php
			break;
			case 'pingback'  :
			case 'trackback' :
		?>
		<li class="post pingback">
			<p><?php _e( 'Pingback:', 'am_sandbox_theme' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'am_sandbox_theme'), ' ' ); ?></p>
		<?php
				break;
		endswitch;
	}
endif;


/*-----------------------------------------------------------------------------------*/
/*  Output audio
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'am_audio' ) ) {
	function am_audio($postid, $width = 495) {
		
		$mp3 = get_post_meta($postid, 'am_audio_mp3', TRUE);
		$ogg = get_post_meta($postid, 'am_audio_ogg', TRUE);
		$poster = get_post_meta($postid, 'am_audio_poster_url', TRUE);
		$height = get_post_meta($postid, 'am_audio_height', TRUE);
		$height = ($height) ? $height : 75;
	
	?>
	
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("#jquery_jplayer_<?php echo $postid ?>").jPlayer({
			ready: function () {
				jQuery(this).jPlayer("setMedia", {
					<?php if($mp3 != '') : ?>
					mp3: "<?php echo $mp3; ?>",
					<?php endif; ?>
					<?php if($ogg != '') : ?>
					oga: "<?php echo $ogg; ?>",
					<?php endif; ?>
					<?php if($poster != '') : ?>
					poster: "<?php echo $poster; ?>"
					<?php endif; ?>
				});
			},
				size: {
					width: "100%",
					height: "<?php echo $height; ?>"
				},
			swfPath: "<?php echo get_template_directory_uri(); ?>/lib/jplayer/",
			cssSelectorAncestor: "#jp_interface_<?php echo $postid; ?>",
			supplied: "m4a, oga, all"
		});
	});
	</script>
		
	<div id="jquery_jplayer_<?php echo $postid ?>" class="jp-jplayer"></div>
		<div id="jp_container_1" class="jp-audio">
			<div class="jp-type-single">
				<div id="jp_interface_<?php echo $postid; ?>"  class="jp-gui jp-interface">
					<ul class="jp-controls">
						<li><div class="jp-divider-first"></div></li>
						<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
						<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
						<li>
							<div class="jp-progress">
								<div class="jp-seek-bar">
								<div class="jp-play-bar"></div>
							</div>
						</li>
						<li><div class="jp-divider-second"></div></li>
						<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
						<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
						<li>
								<div class="jp-volume-bar">
								<div class="jp-volume-bar-value"></div>
						</li>   
					</ul>
				</div><!-- .jp-gui -->
		</div><!-- .jp-type-single -->
			<div class="jp-no-solution">
				<span>Update Required</span>
			To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
			</div>
	</div><!-- .jp-audio -->
		<?php 
	}
}

/*-----------------------------------------------------------------------------------*/
/*  Output Video
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'am_video' ) ) {
	function am_video($postid, $width = 491) {
		
		$height = get_post_meta($postid, 'am_video_height', true);
		$height = ($height) ? $height : 276;
		$m4v    = get_post_meta($postid, 'am_video_m4v', true);
		$ogv    = get_post_meta($postid, 'am_video_ogv', true);
		$poster = get_post_meta($postid, 'am_video_poster_url', true);
		
		?>
		
	<script type="text/javascript">
	jQuery(document).ready(function($){
		$("#jquery_jplayer_<?php echo $postid; ?>").jPlayer({
			ready: function () {
				$(this).jPlayer("setMedia", {
					<?php if($m4v != '') : ?>
					m4v: "<?php echo $m4v; ?>",
					<?php endif; ?>
					<?php if($ogv != '') : ?>
					ogv: "<?php echo $ogv; ?>",
					<?php endif; ?>
					<?php if ($poster != '') : ?>
					poster: "<?php echo $poster; ?>"
					<?php endif; ?>
				});
		  },
			size: {
				width: "100%",
				height: "<?php echo $height; ?>"
			},
			swfPath: "<?php echo get_template_directory_uri(); ?>/lib/jplayer/",
			cssSelectorAncestor: "#jp_interface_<?php echo $postid; ?>",
			supplied: "m4v, ogv"
		});
	});
	</script>

	<div id="jquery_jplayer_<?php echo $postid ?>" class="jp-jplayer jp-player-video"></div>
		<div id="jp_container_1" class="jp-video">
			<div class="jp-type-single">
				<div id="jp_interface_<?php echo $postid; ?>"  class="jp-gui jp-interface">
					<ul class="jp-controls">
						<li><div class="jp-divider-first"></div></li>
						<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
						<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
						<li>
							<div class="jp-progress">
								<div class="jp-seek-bar">
								<div class="jp-play-bar"></div>
							</div>
						</li>
						<li><div class="jp-divider-second"></div></li>
						<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
						<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
						<li>
								<div class="jp-volume-bar">
								<div class="jp-volume-bar-value"></div>
						</li>   
					</ul>
				</div><!-- .jp-gui -->
		</div><!-- .jp-type-single -->
			<div class="jp-no-solution">
				<span>Update Required</span>
			To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
			</div>
	</div><!-- .jp-video -->
		
		<?php
	}
	
}


/*-----------------------------------------------------------------------------------*/
/*  Output Gallery Slideshow
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'am_gallery' ) ) {
	function am_gallery($postid, $imagesize) { 
	
	 ?>
	
	<script type="text/javascript">
	jQuery(window).load(function() {
	
		jQuery('.slide_<?php echo $postid; ?>').flexslider({
			animation: "slide",     // fade/slide
			easing: "swing",        // swing method/easing plugin*
			direction: "horizontal",// direction
			slideshowSpeed: 7000,   // slide speed
			animationSpeed: 600,    //animation speed
			slideshow: false,       // auto slideshow
			smoothHeight: true,     //Smoothes height transitions
			pauseOnAction: true,    //pause slideshow after next/prev
			useCSS: true,           //use CSS3 transitions if available
			touch: true,            // allow touch devices
			controlNav: false,      // navigation controls
			prevText: "Previous",
			nextText: "Next",
			start: function(slider){ // init the height of the first item on start
				var $new_height = slider.slides.eq(0).height();
					
				/* add a current class to the active item */
				slider.slides.removeClass('current');
				slider.slides.eq(0).addClass('current');
					
				slider.container.height($new_height);
														
			},          
			before: function(slider){ // init the height of the next item before slide
				var $animatingTo = slider.slides.eq(slider.animatingTo);
				var $new_height = slider.slides.eq(slider.animatingTo).height();                
				
				/* add a current class to the active item */
				slider.slides.removeClass('current');
				$animatingTo.addClass('current');
				
				if($new_height != slider.container.height()){
					slider.container.stop().animate({ height: $new_height  }, 250);
				}
			}
		});
	});
	</script>
	
	<?php
	
	echo '<div class="flexslider slide_' . $postid . '">';
	$args = array(
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'post_type' => 'attachment',
		'post_parent' => $postid,
		'post_mime_type' => 'image',
		'post_status' => null,
		'numberposts' => -1
	);
	
	$images = get_posts( $args );
	 if ( $images ) {
		echo '<ul class="slides">';
		foreach ( $images as $image ) {
		   echo '<li>';
		   echo wp_get_attachment_image( $image->ID, $imagesize );
		   echo '<p>';
		   echo apply_filters( 'the_title', $image->post_title );
		   echo '</p></li>';
		  }
		echo '</ul>';
	 }
	 echo '</div><!-- .slider_' . $postid .'';

	}
}


/*-----------------------------------------------------------------------------------*/
/*  Add custom meta box
/*-----------------------------------------------------------------------------------*/

function am_add_meta_box( $meta_box ) {

	if ( !is_array($meta_box) ) return false;

	// Create callback function
	$callback = create_function( '$post,$meta_box', 'am_print_meta_box( $post, $meta_box["args"] );' );

	add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['page'], $meta_box['context'], $meta_box['priority'], $meta_box );

}

/*-----------------------------------------------------------------------------------*/
/*  Print HTML for meta box
/*-----------------------------------------------------------------------------------*/

function am_print_meta_box( $post, $meta_box ) {

	if ( !is_array($meta_box) ) return false;

	// Show Description
	if ( isset($meta_box['description']) && $meta_box['description'] != '' ) {
		echo '<p>' . $meta_box['description'] . '</p>';
	}

	wp_nonce_field( basename(__FILE__), 'am_meta_box_nonce' );
	echo '<table class="meta-table" width="100%;">';

		foreach ( $meta_box['fields'] as $field ) {
			// Get current meta data
			$meta = get_post_meta( $post->ID, $field['id'], true );
			echo '<tr>
					<td>
						<label for="' . $field['id'] . '">
							<p><strong>' . $field['name'] . '</strong></p>
						</label>';

			switch ( $field['type'] ) {
				case 'text':
					echo '<input type="text" name="am_meta['. $field['id'] .']" id="'. $field['id'] .'" value="'. ($meta ? $meta : $field['std']) .'" size="30" /></td>';
				break;

				case 'color':
					echo '<input class="am-color-field" type="text" name="am_meta['. $field['id'] .']" id="'. $field['id'] .'" value="'. ($meta ? $meta : $field['std']) .'" size="30" /></td>';
				break;

				case 'images':
					$image = IMAGES . '/icon-format-image.png';
					echo '<span class="am_default_image" data-src="' . $image . '" style="display: none;"></span>';
					if ($meta) {
						$image = $meta;
					}
					echo '<input type="hidden" class="am_upload_image" name="am_meta['. $field['id'] .']" value="' . $meta .'" />
						  <img src="' . $image . '" class="am_preview_image" style="max-width: 100%" alt="" /><br />
						  <br />
						  <input type="button" class="am_upload_image_button button" id="am_images_upload" value="Select Image" />
						  <p class="hide-if-no-js"><a href="#" class="am_clear_image_button">Remove Image</a></p></td>';
				break;

				case 'editor':
					// end and begin tr tag to have editor in one whole block
					// echo '</tr><tr><td>';

						$settings = array(
							'textarea_name' => 'am_meta['. $field['id'] .']',
							'textarea_rows' => 5,
							'media_buttons' => false
						);

						$meta = ($meta ? $meta : $field['std']);

						// echo addslashes(( htmlspecialchars_decode($meta) ));

						wp_editor( $meta, $field['id'], $settings );
					echo '</td>';
				break;

				case 'select':
					echo '<select name="am_meta['.$field['id'].']" id="'.$field['id'].'">';
						foreach ($field['options'] as $option) {
							echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';
						}
					echo '</select><br /><span class="description">'.$field['desc'].'</span></td>';
				break;

				case 'select_post_type':
					echo '<select name="am_meta['.$field['id'].']" id="'.$field['id'].'">';
					echo '<option>Select a category</option>';
						foreach ($field['options'] as $option) {
							echo '<option', $meta == $option['ID'] ? ' selected="selected"' : '', ' value="'.$option['ID'].'">'.$option['post_title'].'</option>';
						}
					echo '</select><br /><span class="description">'.$field['desc'].'</span></td>';
				break;
			}

			echo '</tr>';
		}

	echo '</table>';

}

/*-----------------------------------------------------------------------------------*/
/*  Save the metabox
/*-----------------------------------------------------------------------------------*/
function am_save_meta( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		return;
	
	if ( !isset($_POST['am_meta']) || !isset($_POST['am_meta_box_nonce']) || !wp_verify_nonce( $_POST['am_meta_box_nonce'], basename( __FILE__ ) ) )
		return;
	
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) return;
	} else {
		if ( !current_user_can( 'edit_post', $post_id ) ) return;
	}
 
	foreach( $_POST['am_meta'] as $key=>$val ){

		if ( strpos($key, 'editor') >= 0 ) {
			update_post_meta( $post_id, $key, stripslashes( $val ) );
		} else {
			update_post_meta( $post_id, $key, stripslashes( htmlspecialchars( $val ) ) );
		}
	}

}
add_action( 'save_post', 'am_save_meta' );

/*-----------------------------------------------------------------------------------*/
/*  Get Post Data
/*-----------------------------------------------------------------------------------*/
function am_get_post_data($post_ids, $data_type = '', $meta_args = array()) {
	$postDataArray = array();

	// If single ID supplied, convert to array
	$post_ids = ( !is_array($post_ids) ) ? (array) $post_ids : $post_ids;

	// Get Post Types
	$post_types = get_post_types();
	$exclude_post_types = array('attachment', 'revision', 'nav_menu_item');
	foreach ($post_types as $key => $value) {
		if ( in_array($value, $exclude_post_types) ) {
			unset($post_types[$key]);
		}
	}

	// Query Args
	$args = array(
		'post__in' => $post_ids,
		'posts_per_page' => -1,
		'post_type' => $post_types
	);

	// Get Post Data
	$postsData = new WP_Query( $args );
	$postDataArray = $postsData->posts;

	// Include meta data
	foreach ($postDataArray as $key => $value) {
		$post_id = $value->ID;

		if ( !empty($meta_args) ) {
			foreach ($meta_args as $meta) {
				$metaData = get_post_meta( $post_id, $meta, true );

				$value->$meta = $metaData;
			}
		} else {
			$allMetaArray = get_post_meta( $post_id );
			$excludeMeta = array('_edit_last', '_edit_lock');

			foreach ($allMetaArray as $meta => $metaData) {
				if ( !in_array($meta, $excludeMeta) ) {
					$value->$meta = $metaData[0];
				}
			}
		}

		// Get featured image
		$attachmentsData = am_get_attachments($post_id);
		$value->featured_image = $attachmentsData;
	}

	switch ($data_type) {
		case 'json':
			return json_encode($postDataArray, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
		break;

		case 'object':
			return am_array_to_object($postDataArray);
		break;

		case '': // Default
			// return $postDataArray;
			return am_obj_to_array($postDataArray);
		break;
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Return Post IDs
/*-----------------------------------------------------------------------------------*/

function am_get_post_ids($post_type) {
	global $wpdb;
	$slideIDArray = array();

	$posts = $wpdb->get_results('SELECT ID FROM ' . $wpdb->prefix . 'posts WHERE post_type="' . $post_type . '"', ARRAY_A);

	foreach ($posts as $post) {
		$slideIDArray[] = $post['ID'];
	}

	return $slideIDArray;
}

/*-----------------------------------------------------------------------------------*/
/*	Get attachments 
/*-----------------------------------------------------------------------------------*/
function am_get_attachments($post_id) {

	$attachmentID = get_post_thumbnail_id( $post_id );
	// Define arrays
	$attachmentArray = array();
	$attachmentSizesArray = array();

	// get image sizes names
	$attachmentData = get_post_meta( $attachmentID, '_wp_attachment_metadata' );
	$attachmentData = $attachmentData[0];
	$attachmentSizes = $attachmentData['sizes'];

	// Loop and build sizes array
	if ( $attachmentSizes != null ) {
		foreach ($attachmentSizes as $key => $value) {
			$attachmentSizesArray[] = $key;
		}
	}

	// Build final array
	foreach ($attachmentSizesArray as $key => $value) {
		$attachmentSrc = wp_get_attachment_image_src($attachmentID, $value);

		$value = str_replace('-', '_', $value);
		$attachmentArray[$value] = $attachmentSrc[0];
	}

	return $attachmentArray;
}

/*-----------------------------------------------------------------------------------*/
/*	Convert Object to array
/*-----------------------------------------------------------------------------------*/
function am_obj_to_array($obj) {
	if (is_object($obj)) {
		// Gets the properties of the given object
		// with get_object_vars function
		$obj = get_object_vars($obj);
	}

	if (is_array($obj)) {
		/*
		* Return array converted to object
		* Using __FUNCTION__ (Magic constant)
		* for recursive call
		*/
		return array_map(__FUNCTION__, $obj);
	}
	else {
		// Return array
		return $obj;
	}
}


/*-----------------------------------------------------------------------------------*/
/*	Conver Array to object
/*-----------------------------------------------------------------------------------*/
function am_array_to_object($array) {
	if (is_array($array)) {
		/*
		* Return array converted to object
		* Using __FUNCTION__ (Magic constant)
		* for recursive call
		*/
		return (object) array_map(__FUNCTION__, $array);
	} else {
		// Return object
		return $array;
	}
}


/*-----------------------------------------------------------------------------------*/
/*	Return Slides Data
/*-----------------------------------------------------------------------------------*/
function am_get_slides($data_type = '') {
	$slideIDArray = am_get_post_ids('slide');
	$slides_data = am_get_post_data($slideIDArray, $data_type);

	return $slides_data;
}

/*-----------------------------------------------------------------------------------*/
/*	Get post slug
/*-----------------------------------------------------------------------------------*/
function am_get_post_slug($post_id) {
	$post_slug = get_post_field('post_name', $post_id);

	return $post_slug;
}

/*-----------------------------------------------------------------------------------*/
/*	Get file contents to string
/*-----------------------------------------------------------------------------------*/
function am_files_to_variables($files_name = array()) {
	$file_string = array();
	foreach ( (array) $files_name as $filename) {
		$file = locate_template($filename);

		if ( $file != '' ) {
			$variableName = explode('.', $filename);
			$variableName = $variableName[1] . '_' . $variableName[0];
			$variableName = preg_replace('/[^A-Za-z0-9]+/', '_', $variableName);

			$file_string[$variableName] = file_get_contents($file);
		}
	}

	return $file_string;
}

?>