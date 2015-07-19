// var $ = jQuery.noConflict();
var debugVar;

jQuery(document).ready(function($) {
	$('.am-color-field').wpColorPicker();

	/**
	 * Select custom upload image
	 */
	$('.am_upload_image_button').on('click', function() {

		var button = $(this);

		var frame = new wp.media.view.MediaFrame.Select({
			// Modal Title
			title: 'Select Image',

			// Enable/disable select
			multiple: false,

			// Library WordPress query arguments.
			library: {
				order: 'DESC',

				// [ 'name', 'author', 'date', 'title', 'modified', 'uploadedTo',
				// 'id', 'post__in', 'menuOrder' ]
				orderby: 'date',

				// mime type. e.g. 'image', 'image/jpeg'
				type: 'image',

				// Searches the attachment title.
				search: null,

				// Attached to a specific post (ID).
				uploadedTo: true
			},
			button: {
				text: 'Insert'
			}
		});

		// Fires after the frame markup has been built, but not appended to the DOM.
		// @see wp.media.view.Modal.attach()
		frame.on( 'ready', function() {} );

		// Fires when the frame's $el is appended to its DOM container.
		// @see media.view.Modal.attach()
		frame.on( 'attach', function() {} );

		// Fires when the modal opens (becomes visible).
		// @see media.view.Modal.open()
		frame.on( 'open', function() {} );

		// Fires when the modal closes via the escape key.
		// @see media.view.Modal.close()
		frame.on( 'escape', function() {} );

		// Fires when the modal closes.
		// @see media.view.Modal.close()
		frame.on( 'close', function() {} );

		// Fires when a user has selected attachment(s) and clicked the select button.
		// @see media.view.MediaFrame.Post.mainInsertToolbar()
		frame.on( 'select', function() {
			var formfield = button.siblings('.am_upload_image');
			var preview = button.siblings('.am_preview_image');
			
			var selectionCollection = frame.state().get('selection');
			var attachment = selectionCollection.first().toJSON();;
			var attachmentUrl = attachment.url;

			formfield.val(attachmentUrl);
			preview.attr('src', attachmentUrl);
		} );

		// Fires when a state activates.
		frame.on( 'activate', function() {} );

		// Fires when a mode is deactivated on a region.
		frame.on( '{region}:deactivate', function() {} );
		// and a more specific event including the mode.
		frame.on( '{region}:deactivate:{mode}', function() {} );

		// Fires when a region is ready for its view to be created.
		frame.on( '{region}:create', function() {} );
		// and a more specific event including the mode.
		frame.on( '{region}:create:{mode}', function() {} );

		// Fires when a region is ready for its view to be rendered.
		frame.on( '{region}:render', function() {} );
		// and a more specific event including the mode.
		frame.on( '{region}:render:{mode}', function() {} );

		// Fires when a new mode is activated (after it has been rendered) on a region.
		frame.on( '{region}:activate', function() {} );
		// and a more specific event including the mode.
		frame.on( '{region}:activate:{mode}', function() {} );

		// Get an object representing the current state.
		frame.state();

		// Get an object representing the previous state.
		frame.lastState();

		// Open the modal.
		frame.open();
	});

	/**
	 * Remove custom upload image
	 */
	$('.am_clear_image_button').on('click', function(e) {
		e.preventDefault();

		var formfield = $(this).parent().siblings('.am_upload_image');
		var defaultImage = $(this).parent().siblings('.am_default_image').data('src');

		formfield.val('')
		$(this).parent().siblings('.am_preview_image').attr('src', defaultImage);
	});

});