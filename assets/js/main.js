
jQuery(document).ready(function($) {

	/*-----------------------------------------------------------------------------------*/
	/*	Superfish
	/*-----------------------------------------------------------------------------------*/
	$('nav.main-nav .menu ul, nav.main-nav .dropdown-menu ul').superfish({
		delay:       500,                            // one second delay on mouseout
		animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
		speed:       'fast',                          // faster animation speed
		autoArrows:  false                            // disable generation of arrow mark-up
	});

	// Page specific scritps
	am_load_page(page_id);

}); // end jQuery

function am_color_menu(target) {
	$(target).find('li').each(function() {
		menuItem = $(this);
		menuItemText = menuItem.find('> a').text();

		_.each(am_pages, function(value, key) {
			if (slugify(menuItemText) == slugify(value.post_title)) {
				menuItem.find('.menu-bg').css('background-color', value.am_menu_color);
				if (menuItem.find('.sub-menu').size() > 0) {
					menuItem.find('.sub-menu').css('background-color', value.am_menu_color);
				}
			}
		});
	});
}

function am_load_page(page_id) {
	
	switch(page_id) {
		case 'home':
		break;

		default:
		break;
	}

}

/**------------
 * HELPER FUNCTIONS
 */

/**
 * Slugify
 */
function slugify(text) {
  return text.toString().toLowerCase()
    .replace(/\s+/g, '-')           // Replace spaces with -
    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
    .replace(/^-+/, '')             // Trim - from start of text
    .replace(/-+$/, '');            // Trim - from end of text
}