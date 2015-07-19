<?php

/*-----------------------------------------------------------------------------------*/
/*	Pages Metaboxes
/*-----------------------------------------------------------------------------------*/

add_action( 'add_meta_boxes', 'am_pages_meta' );

function am_pages_meta() {

	// Color box
	$meta_box = array(
		'id'			=> 'am-page-info',
		'title'			=> __('Menu Color'),
		'description'	=> '',
		'page'			=> 'page',
		'context'		=> 'normal',
		'priority'		=> 'high',
		'fields'		=> array(
				array(
						'name'	=> __('Menu background color:'),
						'desc'	=> '',
						'id'	=> 'am_menu_color',
						'type'	=> 'color',
						'std'	=> '#000000'
					),
				array(
						'name'	=> __('Action Button 1 Text:'),
						'desc'	=> 'Call to action button 1 text',
						'id'	=> 'am_action_button_text',
						'type'	=> 'text',
						'std'	=> 'Find out more'
					),
				array(
						'name'	=> __('Action Button 1 URL:'),
						'desc'	=> 'Call to action button 1 url',
						'id'	=> 'am_action_button_url',
						'type'	=> 'text',
						'std'	=> ''
					),
				array(
						'name'	=> __('Action Button 1 color:'),
						'desc'	=> 'Call to action button 1 color',
						'id'	=> 'am_action_button_color',
						'type'	=> 'color',
						'std'	=> ''
					),
				array(
						'name'	=> __('Action Button 2 Text:'),
						'desc'	=> 'Call to action button 2 text',
						'id'	=> 'am_action_button_text2',
						'type'	=> 'text',
						'std'	=> 'Find out more'
					),
				array(
						'name'	=> __('Action Button 2 URL:'),
						'desc'	=> 'Call to action button 2 url',
						'id'	=> 'am_action_button_url2',
						'type'	=> 'text',
						'std'	=> ''
					),
				array(
						'name'	=> __('Action Button 2 color:'),
						'desc'	=> 'Call to action button 2 color',
						'id'	=> 'am_action_button_color2',
						'type'	=> 'color',
						'std'	=> ''
					),
				array(
						'name'	=> __('Alternate Page Content:'),
						'desc'	=> '',
						'id'	=> 'am_alternate_page_content_editor',
						'type'	=> 'editor',
						'std'	=> ''
					),
			)
	);

	am_add_meta_box( $meta_box );

}
?>