/*-----------------------------------------------------------------------------------*/
/*	Insert Button Shortcode
/*-----------------------------------------------------------------------------------*/

var ButtonDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ButtonDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
 
		// set up variables to contain our input values
		var url = jQuery('#buttons input#button-url').val();
		var text = jQuery('#buttons input#button-text').val();
		var color = jQuery('#buttons select#button-color').val();	 
 
		var output = '';
 
		// setup the output of our shortcode
		output = '[button ';
			output += 'color=' + color + ' ';
 
			// only insert if the url field is not blank
			if(url)
				output += ' url=' + url;
		// check to see if the TEXT field is blank
		if(text) {	
			output += ']'+ text + '[/button]';
		}
		// if it is blank, use the selected text, if present
		else {
			output += ']'+ButtonDialog.local_ed.selection.getContent() + '[/button]';
		}
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ButtonDialog.init, ButtonDialog);


/*-----------------------------------------------------------------------------------*/
/*	Insert Divider Shortcode
/*-----------------------------------------------------------------------------------*/

var DividerDialog = {
	local_ed : 'ed',
	init : function(ed) {
		DividerDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
 
		// set up variables to contain our input values
		var type = jQuery('#dividers select#divider-type').val();	 
 
		var output = '';
 
		// setup the output of our shortcode
		output = '[divider ';
			output += 'type=' + type + ']';
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(DividerDialog.init, DividerDialog);


/*-----------------------------------------------------------------------------------*/
/*	Insert Column Shortcode
/*-----------------------------------------------------------------------------------*/

var ColumnDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ColumnDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
 			
		jQuery('#columns select#column-type').each(function() {
			var type = jQuery(this).val();
			var text = jQuery('#columns textarea#column-text').val();
			
			var output = '';
	 		
			// setup the output of our shortcode
			output = '[';
			  output += type + ']';
			  
			  	if(text)
			  		output += text;
			  
			  output += '[/' + type + ']';
			  
			  tinyMCEPopup.execCommand('mceReplaceContent', false, output);
			
		});
 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ColumnDialog.init, ColumnDialog);


/*-----------------------------------------------------------------------------------*/
/*	Insert Dropcap Shortcode
/*-----------------------------------------------------------------------------------*/

var DropDialog = {
	local_ed : 'ed',
	init : function(ed) {
		DropDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
 
		// set up variables to contain our input values
		var letter = jQuery('#dropcap input#letter').val();	 
 
		var output = '';
 
		// setup the output of our shortcode
		output = '[dropcap';
		// check to see if the TEXT field is blank
		if(letter) {	
			output += ']'+ letter + '[/dropcap]';
		}
		// if it is blank, use the selected text, if present
		else {
			output += ']'+DropDialog.local_ed.selection.getContent() + '[/dropcap]';
		}
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(DropDialog.init, DropDialog);


/*-----------------------------------------------------------------------------------*/
/*	Insert Alert Shortcode
/*-----------------------------------------------------------------------------------*/

var MessageDialog = {
	local_ed : 'ed',
	init : function(ed) {
		MessageDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
 
		// set up variables to contain our input values
		var m_type = jQuery('#alerts select#alert-type').val();
		var m_text = jQuery('#alerts textarea#alert-text').val();	 
 
		var output = '';
 
		// setup the output of our shortcode
		output = '[message ';
			output += 'type=' + m_type + ' ';
		// check to see if the TEXT field is blank
		if(m_text) {	
			output += ']'+ m_text + '[/message]';
		}
		// if it is blank, use the selected text, if present
		else {
			output += '][/message]';
		}
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(MessageDialog.init, MessageDialog);


/*-----------------------------------------------------------------------------------*/
/*	Insert Alert Shortcode
/*-----------------------------------------------------------------------------------*/

var GeneralBoxDialog = {
	local_ed : 'ed',
	init : function(ed) {
		GeneralBoxDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
 
		// set up variables to contain our input values
		var m_class = jQuery('#box input#class').val();
 
		var output = '';
 
		// setup the output of our shortcode
		output = '[box ';

		if (m_class) {
			output += 'class="' + m_class + '"]' + DropDialog.local_ed.selection.getContent() + '[/box]';
		}
		// if it is blank, use the selected text, if present
		else {
			output += ']' + DropDialog.local_ed.selection.getContent() + '[/box]';
		}
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(GeneralBoxDialog.init, GeneralBoxDialog);


/*-----------------------------------------------------------------------------------*/
/*	Insert Youtube Shortcode
/*-----------------------------------------------------------------------------------*/

var YoutubeDialog = {
	local_ed : 'ed',
	init : function(ed) {
		YoutubeDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
 
		// set up variables to contain our input values
		var id		= jQuery('#youtube input#youtube-id').val();
		var width	= jQuery('#youtube input#youtube-width').val();
		var height	= jQuery('#youtube input#youtube-height').val();
		var title	= jQuery('#youtube input#youtube-title').val();	 
 
		var output = '';
 
		// setup the output of our shortcode
		output = '[youtube ';
			output += 'id='+ id + ' ';
			output += 'width='+ width + ' ';
			output += 'height='+ height + ' ';
			
		// check to see if the TITLE field is blank
		if(title) {	
			output += 'title="'+ title + '"]';
		} else {
			output += ']';
		}
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(YoutubeDialog.init, YoutubeDialog);


/*-----------------------------------------------------------------------------------*/
/*	Insert Vimeo Shortcode
/*-----------------------------------------------------------------------------------*/

var VimeoDialog = {
	local_ed : 'ed',
	init : function(ed) {
		VimeoDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
 
		// set up variables to contain our input values
		var id		= jQuery('#vimeo input#vimeo-id').val();
		var width	= jQuery('#vimeo input#vimeo-width').val();
		var height	= jQuery('#vimeo input#vimeo-height').val();
		var color	= jQuery('#vimeo input#vimeo-color').val();
		var title	= jQuery('#vimeo input#vimeo-title').val();	 
 
		var output = '';
 
		// setup the output of our shortcode
		output = '[vimeo ';
			output += 'id='+ id + ' ';
			output += 'width='+ width + ' ';
			output += 'height='+ height + ' ';
			
			// only insert if the color field is not blank
			if(color)
				output += ' color=' + color + ' ';
			
		// check to see if the TITLE field is blank
		if(title) {	
			output += 'title="'+ title + '"]';
		} else {
			output += ']';
		}
			
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(VimeoDialog.init, VimeoDialog);


/*-----------------------------------------------------------------------------------*/
/*	Insert Google Map Shortcode
/*-----------------------------------------------------------------------------------*/

var MapDialog = {
	local_ed : 'ed',
	init : function(ed) {
		MapDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
 
		// set up variables to contain our input values
		var url		= jQuery('#map input#map-url').val();
		var width	= jQuery('#map input#map-width').val();
		var height	= jQuery('#map input#map-height').val();	 
 
		var output = '';
 
		// setup the output of our shortcode
		output = '[googlemap ';
			output += 'width='+ width + ' ';
			output += 'height='+ height + ' ';
			output += 'src="'+ url + '"]';
			
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(MapDialog.init, MapDialog);


/*-----------------------------------------------------------------------------------*/
/*	Insert Paypal Shortcode
/*-----------------------------------------------------------------------------------*/

var PaypalDialog = {
	local_ed : 'ed',
	init : function(ed) {
		PaypalDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
 
		// set up variables to contain our input values
		var text	= jQuery('#paypal input#paypal-text').val();
		var color	= jQuery('#paypal select#paypal-color').val();
		var account	= jQuery('#paypal input#paypal-account').val();
		var amount	= jQuery('#paypal input#paypal-for').val();	 
 
		var output = '';
 
		// setup the output of our shortcode
		output = '[donate ';
			output += 'account='+ account + ' ';
			output += 'color='+ color + ' ';
			
			if(amount)
				output += 'for='+ amount + ' ';
				
		// check to see if the TEXT field is blank
		if(text) {	
			output += 'text="'+ text + '"]';
		} else {
			output += ']'+DropDialog.local_ed.selection.getContent() + '[/donate]';
		}
			
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(PaypalDialog.init, PaypalDialog);