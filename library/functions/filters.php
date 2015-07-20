<?php
/*-----------------------------------------------------------------------------------*/
/*	Filters
/*-----------------------------------------------------------------------------------*/

	/* searchform function
	================================================== */
	function am_search_form( $form ) {
	
	    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	    		    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __('Search...', 'am_sandbox_theme') . '" />
	    		    <button type="submit" id="searchsubmit">' . __('Search', 'am_sandbox_theme') . '</button>
	    		</form>';
	
	    return $form;
	}
	
	/* Excerpt Length
	================================================== */
	function am_excerpt_length($length) {
		return 35;
	}
	
	/* Excerpt More Link
	================================================== */
	function am_excerpt_more($more) {
		global $post;
		return '... <a href="'. get_permalink($post->ID) . '">( ' . __('Read More', 'am_sandbox_theme') . ' &rarr; )</a>';
	}

	/* add post thumbnails to RSS images
	================================================== */
	function am_rss_post_thumbnail($content) {
	    global $post;
	    if(has_post_thumbnail($post->ID)) {
	        $content = '<p>' . get_the_post_thumbnail($post->ID) .
	        '</p>' . get_the_excerpt();
	    }
	 
	    return $content;
	}

	/* Automatic p tags on TinyMCE
	================================================== */
	function am_tinymce_autop($in){
		$in['wpautop']=false;
		return $in;
	}

	/* Sort order for previous/next post link ORDER BY
	================================================== */
	function am_adjacent_post_next_sort( $orderby ) {
		return 'ORDER BY p.menu_order ASC LIMIT 1';
	}
	function am_adjacent_post_prev_sort( $orderby ) {
		return 'ORDER BY p.menu_order DESC LIMIT 1';
	}

	/* Sort order for precious/next post link WHERE
	================================================== */
	function am_adjacent_post_next_where( $query, $in_same_term, $excluded_terms ) {
		global $post;
		return "WHERE p.menu_order > $post->menu_order AND p.post_type = '$post->post_type' AND p.post_status = 'publish'";
	}
	function am_adjacent_post_prev_where( $query, $in_same_term, $excluded_terms ) {
		global $post;
		return "WHERE p.menu_order < $post->menu_order AND p.post_type = '$post->post_type' AND p.post_status = 'publish'";
	}
?>