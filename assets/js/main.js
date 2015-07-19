var $ = jQuery.noConflict(),
	page_id = $('body').data('page');

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

	// Color Menu
	am_color_menu('.main-nav');

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
			/**
			 * Get slide images/Build controller
			 */
			var image_slides = [];
			_.each(am_slide_array, function(value, key) {

				if ( !_.isEmpty(value.featured_image.thumbnail_slider) && !_.isNull(value.featured_image.thumbnail_slider) ) {
					image_slides.push(value.featured_image.thumbnail_slider);

					// Controller
					controlItem = $('<a href="#" />');
					controlItem.html('<i class="fa fa-circle"></i>');
					controlItem.attr('data-slideindex', key);
					$('.controls').append(controlItem);
				}
			});
			/**
			 * Load backstretch
			 */
			$('.slider').backstretch(image_slides, {
				fade: 750
			});

			/**
			 * Get first slide content
			 */
			firstSlide = am_slide_array[0];

			$('.slide-content .slide-title').html( _.unescape(firstSlide.post_title) );
			$('.slide-content .slide-extra').html( _.unescape(firstSlide.am_slide_extra) );
			$('.controls a:first-child').addClass('active');

			/**
			 * Add content to slide
			 */
			$('.slider').on('backstretch.before', function(e, instance, index) {
				_.each(am_slide_array, function(value, key) {
					if (key ==  index) {
						$('.slide-content .slide-title').html( _.unescape(value.post_title) );
						$('.slide-content .slide-extra').html( _.unescape(value.am_slide_extra) );

						// Active slide control
						$('.controls a').removeClass('active');
						$('.controls a[data-slideindex="' + index + '"]').addClass('active');

					}
				});
			});

			/**
			 * Next/Prev Arrows
			 */
			$('.slider-arrow').on('click', function(e) {
				e.preventDefault();

				goTo = $(this).data('go');

				$('.slider').backstretch(goTo);
			});

			/**
			 * Slider Controls
			 */
			$('.controls').on('click', 'a', function(e) {
				e.preventDefault();

				slideIndex = $(this).data('slideindex');

				$('.slider').backstretch('show', slideIndex);
			});

			/**
			 * Fix list items in home questions
			 */
			$('.home-secondary').find('li').each(function(i) {
				evenOddClass = ( (i+1)%2 === 0 ) ? 'even' : 'odd';

				if (i <= 1 ) {
					$(this).addClass('title');
				}

				$(this).addClass(evenOddClass);
			});
			

		break;

		case 'training-programs-services':

			// Dropdown
			// am_accordion('.children', '.category-title', true);
			
		break;

		case 'testimonials':
			// Dropdown
			am_accordion('.testimonial', '.category-title', false);

			if ($('.navigation').size() > 0) {
				pageNavigation = $('.navigation').clone();
				$('.navigation').remove();
				$('.testimonials-wrapper').after(pageNavigation);
			}
			
		break;

		case 'client-list':

			if ($('.navigation').size() > 0) {
				pageNavigation = $('.navigation').clone();
				$('.navigation').remove();
				$('.clients-wrapper').after(pageNavigation);
			}

			/**
			 * Columnizer
			 */
			$('.clients-wrapper').columnize({
				width: 500
			});
			
		break;

		case 'about-us':
			var testimonial_slides = [],
				carouselContainer = $(am_files_variables.html_content_carousel),
				carouselItemClone = carouselContainer.find('.carousel-item').clone();

			carouselContainer.find('.carousel-item').remove();

			// Suffle testimonials
			am_testimonials = _.shuffle(am_testimonials);

			// Build carousel DOM
			_.each(am_testimonials, function(value, key) {
				carouselItem = carouselItemClone.clone();
				testimonialTitle = $('<h4>' + _.unescape(value.post_title) + '</h4>');
				testimonialContent = _.unescape(value.post_content);

				if ( !_.isEmpty(value.featured_image) ) {
					carouselItem.find('.featured-image img').attr('src', value.featured_image.thumbnail);
					carouselItem.find('.featured-image img').attr('alt', _.unescape(value.post_title));
				} else {
					carouselItem.find('.featured-image').remove();
				}

				carouselItem.append(testimonialContent);
				carouselItem.append(testimonialTitle);

				carouselContainer.find('.carousel').append(carouselItem);
			});

			// Append after title
			$('.primary').before(carouselContainer);

			// Init owl carousel
			$(".carousel").owlCarousel({
				items: 1,
				loop: true,
				autoplay: true,
				autoHeight:true,
				autoplayTimeout: 3000,
				autoplayHoverPause:true,
				nav: true
			});

			// Clear nav text
			$('.owl-nav > div').html('');

			/**
			 * Columnizer
			 */
			$('.entry-content h2').nextAll().wrapAll('<div class="content-columns" />');
			$('.content-columns').columnize({
				width: 500,
				doneFunc: function(a, b, c) {
					$('.content-columns > div').removeClass('column');
					$('.content-columns > div').contents().wrap('<div class="inner-column" />');
				}
			});

		break;

		case 'about-2':
			var testimonial_slides = [],
				carouselContainer = $(am_files_variables.html_content_carousel),
				carouselItemClone = carouselContainer.find('.carousel-item').clone();

			carouselContainer.find('.carousel-item').remove();

			// Suffle testimonials
			am_testimonials = _.shuffle(am_testimonials);

			// Build carousel DOM
			_.each(am_testimonials, function(value, key) {
				carouselItem = carouselItemClone.clone();
				testimonialTitle = $('<h4>' + _.unescape(value.post_title) + '</h4>');
				testimonialContent = _.unescape(value.post_content);

				if ( !_.isEmpty(value.featured_image) ) {
					carouselItem.find('.featured-image img').attr('src', value.featured_image.thumbnail);
					carouselItem.find('.featured-image img').attr('alt', _.unescape(value.post_title));
				} else {
					carouselItem.find('.featured-image').remove();
				}

				carouselItem.append(testimonialContent);
				carouselItem.append(testimonialTitle);

				carouselContainer.find('.carousel').append(carouselItem);
			});

			// Append after title
			$('.primary').before(carouselContainer);

			// Init owl carousel
			$(".carousel").owlCarousel({
				items: 1,
				loop: true,
				autoplay: true,
				autoHeight:true,
				autoplayTimeout: 3000,
				autoplayHoverPause:true,
				nav: true
			});

			// Clear nav text
			$('.owl-nav > div').html('');

		break;

		case "contact-us":
			// var mapId;
			// map = new Maplace({
			// 	locations: [{
			// 		lat: 40.8231595, 
			// 		lon: -74.4140816,
			// 		html: '<p>Get in touch to discuss our services and solutions.</p>',
			// 		icon: '/wp-content/themes/dek-services/assets/img/spotlight-poi.png',
			// 		animation: google.maps.Animation.DROP,
			// 		zoom: 12
			// 	}],
			// 	styles: {},
			// 	map_options: {
			// 		scrollwheel: false,
			// 		streetViewControl: false,
			// 		draggable: false
			// 	}
			// });

			// map.Load();

			// // resize map
			// $(window).on('resize', function() {
			// 	clearTimeout(mapId);
			// 	mapId = setTimeout(function() {
			// 			map.oMap.setCenter({lat: 40.8231595, lng: -74.4140816})		
			// 	}, 500);
			// });
			// google.maps.event.addDomListener(window, 'resize', function() {
			// 	map.oMap.setCenter({lat: 40.8231595, lng: -74.4140816})
			// 	// map.Load({
			// 	// 	map_options: {
			// 	// 		// center: google.maps.LatLng(40.8231595, -74.4140816)
			// 	// 		set_center: [40.8231595, -74.4140816]
			// 	// 	}
			// 	// });
			// });

			$("#contact-form").validate({
				submitHandler: function(form) {
					formData = $("#contact-form").serialize();
					
					$.post(
						ajaxurl,
						{
							'action': 'process_form',
							'data': formData
						},
						function(response) {
							$(".contact-form .form-response").find('p').hide();
							$(".contact-form .form-response").find('.' + response).removeClass('display-none');
							$(".contact-form .form-response").find('.' + response).fadeIn('normal', function() {
								setTimeout(function() {
									$(this).fadeOut();
								}, 2500);
							});
						}
					);
				}
			});
		break;

		default:
			/**
			 * Add backstretch if it has featured image
			 */
			// featuredImage = $('.post-thumbnail img').attr('src');
			// $('.post-thumbnail img').remove();
			// if ($('.post-thumbnail').size() > 0) {
			// 	$('.post-thumbnail').backstretch(featuredImage);
			// }
		break;
	}

}

/**
 * AM Accordion
 */
function am_accordion (targetEl, handler, animate) {
	$(targetEl).each(function() {
		$(this).addClass('closed');
		$(this).hide();
	});

	// remove empty class if it has content
	$(targetEl).each(function() {
		if (!_.isEmpty($.trim($(this).html()))) {
			$(this).parent().addClass('hasChildren');
		} else {
			$(this).parent().addClass('noChildren');
		}
	});

	$(handler).on('click', function(e) {

		thisPanel = $(this).nextAll().not('.desc');
		allPanels = $(targetEl);

		// return if no children
		if ( thisPanel.parent().hasClass('noChildren') ) {
			return;
		}

		if (!thisPanel.hasClass('open')){
			allPanels.removeClass('open');
			allPanels.addClass('closed');
			thisPanel.removeClass('closed');
			thisPanel.addClass('open');

			// class for fontAwesome
			$(handler).removeClass('open');
			$(this).addClass('open');

			allPanels.slideUp('normal');

			thisPanel.slideDown('normal', function() {
				if (animate) {
					$('html, body').animate({
						scrollTop: thisPanel.offset().top - 75
					}, 1000);
				}
			});
		} else {
			thisPanel.removeClass('open');
			thisPanel.addClass('closed');

			$(handler).removeClass('open');

			if (animate) {
				thisPanel.slideUp('normal', function() {
					$('html, body').animate({
						scrollTop: 0
					}, 1000);
				});
			}
		}
	});
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