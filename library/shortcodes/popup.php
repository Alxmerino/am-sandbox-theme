<?php
// this file contains the contents of the popup window
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>AM Shortcode Generator</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="../../../../../wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<script type="text/javascript" src="js/popup.js"></script>
<script type="text/javascript" src="js/jquery.appendo.js"></script>
<style type="text/css" src="../../wp-includes/js/tinymce/themes/advanced/skins/wp_theme/dialog.css"></style>
<link rel="stylesheet" href="css/shortcodes_tinymce.css" />
<link rel="stylesheet" href="css/simple/jquery-ui-1.9.2.custom.min.css" />

<script>
    jQuery(function() {
        
        jQuery( "#tabs" ).tabs();
        
        jQuery('#outer').appendo({
        	subSelect: '.inner',
        	labelAdd: 'Add Column',
        	allowDelete: false,
        	focusFirst: false
        });
        
        jQuery('.column-remove').live('click', function() {        
			var	btn = $(this),
				row = btn.parent().parent();
			
			if( $('.inner').size() > 1 ) {
				row.remove();
			} else {
				alert('You need a minimum of one row');
			}
			
			return false;
		});
		
		$( "#outer" ).sortable();
        
    });
</script>

</head>
	<body>
		<div id="tabs">
		    <ul>
		        <li><a href="#buttons">Button</a></li>
		        <li><a href="#dividers">Divider</a></li>
		        <li><a href="#columns">Columns</a></li>
		        <li><a href="#dropcap">Dropcap</a></li>
		        <li><a href="#alerts">Alerts</a></li>
		        <li><a href="#box">Boxes</a></li>
		        <li><a href="#youtube">Youtube Video</a></li>
		        <li><a href="#vimeo">Vimeo Video</a></li>
		        <li><a href="#map">Map</a></li>
		        <li><a href="#paypal">Paypal Button</a></li>
		    </ul>
			<div id="buttons">
				<form action="/" method="get" accept-charset="utf-8">
					<p>
						<label for="button-url">Button URL</label>
						<input type="text" name="button-url" value="" id="button-url" placeholder="http://" />
					</p>
					<p>
						<label for="button-text">Button Text</label>
						<input type="text" name="button-text" value="" id="button-text" placeholder="Button Text" />
					</p>
					<p>
						<label for="button-color">Color</label>
						<select name="button-color" id="button-color" size="1">
							<option value="" selected="selected" >Default</option>
							<option value="orange" >Orange</option>
							<option value="blue">Blue</option>
							<option value="green">Green</option>
							<option value="red">Red</option>
							<option value="white">White</option>
							<option value="purple">Purple</option>
							<option value="yellow">Yellow</option>
						</select>
					</p>
					<p>	
						<a class="button" href="javascript:ButtonDialog.insert(ButtonDialog.local_ed)" id="insert">Insert Button</a>
					</p>
				</form>
			</div>
			<div id="dividers">
			    <form action="/" method="get" accept-charset="utf-8">
					<p>
						<label for="divider-type">Type</label>
						<select name="divider-type" id="divider-type" size="1">
							<option value="line" selected="selected" >Line Divider</option>
							<option value="clear" >Clear</option>
							<option value="dot">Dotted</option>
						</select>
					</p>
					<p>	
						<a class="button" href="javascript:DividerDialog.insert(DividerDialog.local_ed)" id="insert">Insert Divider</a>
					</p>
				</form>
			</div>
			<div id="columns">
			    <form action="/" method="get" accept-charset="utf-8">
					<div id="outer" class="appendo">
						<div class="inner">
							<p>
								<label for="column-type">Column Type</label>
								<select name="column-type" id="column-type" size="1">
									<option value="one_half" selected="selected" >One Half</option>
									<option value="one_half_last" >One Half Last</option>
									<option value="one_third">One Third</option>
									<option value="one_third_last">One Third Last</option>
									<option value="two_thirds">Two Thirds</option>
									<option value="two_thirds_last">Two Thirds Last</option>
									<option value="one_fourth">One Fourth</option>
									<option value="one_fourth_last">One Fourth Last</option>
									<option value="three_fourths">Three Fourths</option>
									<option value="three_fourths_last">Three Fourths Last</option>
								</select>
							</p>
							<p>
								<textarea rows="6" cols="80" type="text" name="column-text" value="" id="column-text" ></textarea>
							</p>
							<p class="button-secondary"><a class="column-remove" style="margin-right: 0.5em; color: #CC0000;">Remove Column</a></p>
						</div>
					</div>
					<p>	
						<a class="button" href="javascript:ColumnDialog.insert(ColumnDialog.local_ed)" id="insert">Insert Columns</a>
					</p>
				</form>
			</div>
			<div id="dropcap">
				<form action="/" method="get" accept-charset="utf-8">
					<p>
						<label for="letter">Letter</label>
						<input type="text" name="letter" value="" id="letter" placeholder="L" />
					</p>
					<p>	
						<a class="button" href="javascript:DropDialog.insert(DropDialog.local_ed)" id="insert">Insert Dropcap</a>
					</p>
				</form>
			</div>
			<div id="alerts">
				<form action="/" method="get" accept-charset="utf-8">
					<p>
						<label for="alert-text">Alert Text</label>
						<textarea type="text" name="alert-text" value="" id="alert-text" placeholder="Alert Text"></textarea>
					</p>
					<p>
						<label for="alert-type">Type</label>
						<select name="alert-type" id="alert-type" size="1">
							<option value="message" selected="selected" >Message</option>
							<option value="note" >Note</option>
							<option value="info">Info</option>
							<option value="success">Success</option>
							<option value="warning">Warning</option>
						</select>
					</p>
					<p>	
						<a class="button" href="javascript:MessageDialog.insert(MessageDialog.local_ed)" id="insert">Insert Alert</a>
					</p>
				</form>
			</div>
			<div id="box">
				<form action="/" method="get" accept-charset="utf-8">
					<p>
						<label for="alert-text">General Box</label>
						<input type="text" name="class" value="" id="class" />
					</p>
					<p>	
						<a class="button" href="javascript:GeneralBoxDialog.insert(GeneralBoxDialog.local_ed)" id="insert">Insert Box</a>
					</p>
				</form>
			</div>
			<div id="youtube">
				<form action="/" method="get" accept-charset="utf-8">
					<p>
						<label for="youtube-id">Video ID</label>
						<input type="text" name="youtube-id" value="" id="youtube-id" placeholder="2Sar5WT76kE" />
					</p>
					<p>
						<label for="youtube-width">Width</label>
						<input type="text" name="youtube-width" value="" id="youtube-width" placeholder="490" />
					</p>
					<p>
						<label for="youtube-height">Height</label>
						<input type="text" name="youtube-height" value="" id="youtube-height" placeholder="276" />
					</p>
					<p>
						<label for="youtube-title">Title</label>
						<input type="text" name="youtube-title" value="" id="youtube-title" placeholder="Video Title" />
					</p>
					<p>	
						<a class="button" href="javascript:YoutubeDialog.insert(YoutubeDialog.local_ed)">Insert Youtube Video</a>
					</p>
				</form>
			</div>
			<div id="vimeo">
				<form action="/" method="get" accept-charset="utf-8">
					<p>
						<label for="vimeo-id">Video ID</label>
						<input type="text" name="vimeo-id" value="" id="vimeo-id" placeholder="3784524" />
					</p>
					<p>
						<label for="vimeo-width">Width</label>
						<input type="text" name="vimeo-width" value="" id="vimeo-width" placeholder="490" />
					</p>
					<p>
						<label for="vimeo-height">Height</label>
						<input type="text" name="vimeo-height" value="" id="vimeo-height" placeholder="276" />
					</p>
					<p>
						<label for="vimeo-color">Color</label>
						<input type="text" name="vimeo-color" value="" id="vimeo-color" placeholder="BAC8D3" />
					</p>
					<p>
						<label for="vimeo-title">Title</label>
						<input type="text" name="vimeo-title" value="" id="vimeo-title" placeholder="Video Title" />
					</p>
					<p>	
						<a class="button" href="javascript:VimeoDialog.insert(VimeoDialog.local_ed)">Insert Vimeo Video</a>
					</p>
				</form>
			</div>
			<div id="map">
				<form action="/" method="get" accept-charset="utf-8">
					<p>
						<label for="map-width">Width</label>
						<input type="text" name="map-width" value="" id="map-width" placeholder="490" />
					</p>
					<p>
						<label for="map-height">Height</label>
						<input type="text" name="map-height" value="" id="map-height" placeholder="276" />
					</p>
					<p>
						<label for="map-url">URL</label>
						<input type="text" name="map-url" value="" id="map-url" />
					</p>
					<p>	
						<a class="button" href="javascript:MapDialog.insert(MapDialog.local_ed)">Insert Google Map</a>
					</p>
				</form>
			</div>
			<div id="paypal">
				<form action="/" method="get" accept-charset="utf-8">
					<p>
						<label for="paypal-text">Text</label>
						<input type="text" name="paypal-text" value="" id="paypal-text" placeholder="Make A Donation" />
					</p>
					<p>
						<label for="paypal-color">Color</label>
						<select name="paypal-color" id="paypal-color" size="1">
							<option value="" selected="selected" >Default</option>
							<option value="orange" >Orange</option>
							<option value="blue">Blue</option>
							<option value="green">Green</option>
							<option value="red">Red</option>
							<option value="white">White</option>
							<option value="purple">Purple</option>
							<option value="yellow">Yellow</option>
						</select>
					</p>
					<p>
						<label for="paypal-account">Account</label>
						<input type="text" name="paypal-account" value="" id="paypal-account" placeholder="email@paypal.com" />
					</p>
					<p>
						<label for="paypal-for">For</label>
						<input type="text" name="paypal-for" value="" id="paypal-for" placeholder="20" />
					</p>
					<p>	
						<a class="button" href="javascript:PaypalDialog.insert(PaypalDialog.local_ed)">Insert Paypal Button</a>
					</p>
				</form>
			</div>
		</div><!-- end tabs -->
	</body>
</html>