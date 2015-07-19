<?php

/*-----------------------------------------------------------------------------------*/
/*	Replace WP autop formatting
/*-----------------------------------------------------------------------------------*/


if ( ! function_exists( 'am_remove_wpautop' ) ) {
	function am_remove_wpautop( $content ) {
		$content = do_shortcode( shortcode_unautop( $content ) );
		$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
		return $content;
	}
}


/*-----------------------------------------------------------------------------------*/
/*	Dividers
/*
Optional arguments:
 - Type: line, clear, dot

*/
function am_divider( $atts, $content = null ) {
	extract(shortcode_atts( array(
		'type' => 'line'
	), $atts));
	return '<div class="' . $type . 'Divider"></div>';
}

add_shortcode('divider', 'am_divider');


/*-----------------------------------------------------------------------------------*/
/*	Dropcap
/*-----------------------------------------------------------------------------------*/

function am_dropcap($atts, $content = null ) {
	return '
		<div class="dropcap">' . am_remove_wpautop($content) . '</div>';
}

add_shortcode('dropcap', 'am_dropcap');


/*-----------------------------------------------------------------------------------*/
/*	Buttons
/*-----------------------------------------------------------------------------------*/

function am_buttons($atts, $content = null ) {
	extract(shortcode_atts( array(
		'color' => '',
		'url'	=> ''
	), $atts));
	return '
		<a class="button ' . $color . '" href="' . $url . '" rel="external">' . am_remove_wpautop($content) . '</a>';
}

add_shortcode('button', 'am_buttons');


/*-----------------------------------------------------------------------------------*/
/*	columns
/*-----------------------------------------------------------------------------------*/

/* ============= Two Columns ============= */

function am_collumn_one_half($atts, $content = null) {
   return '<div class="one_half"><p>' . am_remove_wpautop($content) . '</p></div>';
}
add_shortcode( 'one_half', 'am_collumn_one_half' );

function am_collumn_one_half_last($atts, $content = null) {
   return '<div class="one_half last"><p>' . am_remove_wpautop($content) . '</p></div>';
}
add_shortcode( 'one_half_last', 'am_collumn_one_half_last' );


/* ============= Three Columns ============= */

function am_collumn_one_third($atts, $content = null) {
   return '<div class="one_third"><p>' . am_remove_wpautop($content) . '</p></div>';
}
add_shortcode( 'one_third', 'am_collumn_one_third' );

function am_collumn_one_third_last($atts, $content = null) {
   return '<div class="one_third last"><p>' . am_remove_wpautop($content) . '</p></div>';
}
add_shortcode( 'one_third_last', 'am_collumn_one_third_last' );

function am_collumn_two_thirds($atts, $content = null) {
   return '<div class="two_thirds"><p>' . am_remove_wpautop($content) . '</p></div>';
}
add_shortcode( 'two_thirds', 'am_collumn_two_thirds' );

function am_collumn_two_last($atts, $content = null) {
   return '<div class="two_thirds last"><p>' . am_remove_wpautop($content) . '</p></div>';
}
add_shortcode( 'two_thirds_last', 'am_collumn_two_last' );

/* ============= Four Columns ============= */

function am_collumn_one_fourth($atts, $content = null) {
   return '<div class="one_fourth"><p>' . am_remove_wpautop($content) . '</p></div>';
}
add_shortcode( 'one_fourth', 'am_collumn_one_fourth' );

function am_collumn_one_fourth_last($atts, $content = null) {
   return '<div class="one_fourth last"><p>' . am_remove_wpautop($content) . '</p></div>';
}
add_shortcode( 'one_fourth_last', 'am_collumn_one_fourth_last' );

function am_collumn_three_fourths($atts, $content = null) {
   return '<div class="three_fourth"><p>' . am_remove_wpautop($content) . '</p></div>';
}
add_shortcode( 'three_fourths', 'am_collumn_three_fourths' );

function am_collumn_three_fourths_last($atts, $content = null) {
   return '<div class="three_fourth last"><p>' . am_remove_wpautop($content) . '</p></div>';
}
add_shortcode( 'three_fourths_last', 'am_collumn_three_fourths_last' );


/*-----------------------------------------------------------------------------------*/
/*	Alerts
/*-----------------------------------------------------------------------------------*/

/*
Optional arguments:
 - Type: message, note, info, success, warning\

*/

function am_info_box($atts, $content = null ) {
	extract(shortcode_atts( array(
		'type' => 'message'
	), $atts));
	return '
		<div class="alert ' . $type . '">' . am_remove_wpautop($content) . '</div>';
}

add_shortcode('message', 'am_info_box');


/*-----------------------------------------------------------------------------------*/
/*  General Box
/*-----------------------------------------------------------------------------------*/
function am_general_box($atts, $content = null) {
  extract(shortcode_atts( array(
    'class' => ''
  ), $atts ));

  return '
    <div class="general-box ' . $class . '">
      <div class="inner-box">' . am_remove_wpautop($content) . '</div>
    </div>';

}
add_shortcode('box', 'am_general_box');


/*-----------------------------------------------------------------------------------*/
/*	Youtube
/*-----------------------------------------------------------------------------------*/

function am_youtube_video($atts, $content=null) {
    extract(shortcode_atts( array(
        'id'       => '',
        'width'    => '590',
        'height'   => '332',
        'title' => ''
    ), $atts));
    return '
		<div class="video">
			<iframe width="' . $width . '" height="' . $height .'" src="http://www.youtube.com/embed/' . $id . '" frameborder="0" allowfullscreen></iframe>
			<h4>' . $title . '</h4>
		</div>';
}

add_shortcode('youtube', 'am_youtube_video');


/*-----------------------------------------------------------------------------------*/
/*	Vimeo
/*-----------------------------------------------------------------------------------*/

function am_vimeo_video($atts, $content=null) {  
    extract(shortcode_atts( array(  
        'id'     => '',  
        'width'  => '590',  
        'height' => '332',  
        'color'  => 'BAC8D3',
		'title'  => ''
    ), $atts));  
    return '
		<div class="video">
			<iframe src="http://player.vimeo.com/video/' . $id . '?color=' . $color . '" width="' . $width .'" height="' . $height . '" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>
			<h4>' . $title . '</h4>
		</div>';  
}  
add_shortcode('vimeo', 'am_vimeo_video');


/*-----------------------------------------------------------------------------------*/
/*	Google Maps
/*-----------------------------------------------------------------------------------*/

function am_googleMaps($atts, $content = null) {  
   extract(shortcode_atts(array(  
      "width" => '590',  
      "height" => '332',  
      "src" => ''  
   ), $atts));  
   return '<div id="map"><iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&amp;output=embed"></iframe></div>';  
}

add_shortcode("googlemap", "am_googleMaps");


/*-----------------------------------------------------------------------------------*/
/*	Paypal Donation Link
/*-----------------------------------------------------------------------------------*/

function am_donate_shortcode( $atts ) {  
    extract(shortcode_atts(array(  
        'text' => 'Make a donation',  
        'account' => 'REPLACE ME',  
        'for' => '',
        'color' => ''  
    ), $atts));  
  
    global $post;  
  
    if (!$for) $for = str_replace(" ","+",$post->post_title);  
  
    return '<a class="button '.$color.'" href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business='.$account.'&item_name=Donation+for+'.$for.'">'.$text.'</a>';  
  
}  
add_shortcode('donate', 'am_donate_shortcode');
