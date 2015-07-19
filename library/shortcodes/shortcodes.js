(function() {
	tinymce.create('tinymce.plugins.buttonPlugin', {
		init : function(ed, url) {
			// Register commands
			ed.addCommand('mcebutton', function() {
				ed.windowManager.open({
					file : url + '/popup.php', // file that contains HTML for our modal window
					width : 880 + parseInt(ed.getLang('button.delta_width', 0)), // size of our window
					height : 620 + parseInt(ed.getLang('button.delta_height', 0)), // size of our window
					inline : 1
				}, {
					plugin_url : url
				});
			});
 
			// Register buttons
				ed.addButton('sc_generator', {title : 'Shortcode Generator', cmd : 'mcebutton', image: url + '/images/icon.png' });
		},
 
		getInfo : function() {
			return {
				longname : 'Shortcode Generator',
				author : 'Rene Merino',
				authorurl : 'http://amayamedia.com',
				infourl : 'http://wiki.moxiecode.com',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});
 
	// Register plugin
	// first parameter is the button ID and must match ID elsewhere
	// second parameter must match the first parameter of the tinymce.create() function above
	tinymce.PluginManager.add('sc_generator', tinymce.plugins.buttonPlugin);
 
})();