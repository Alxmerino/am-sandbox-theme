<!DOCTYPE html>
<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and site's header
 *
 * @package WordPress
 * @subpackage am_boiler
 * @since AM_Framer 1.0
 */
?>
<!--[if lt IE 7]>      
	<html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>
	<![endif]-->
<!--[if IE 7]>
	<html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>>
	<![endif]-->
<!--[if IE 8]>
	<html class="no-js lt-ie9" <?php language_attributes(); ?>>
	<![endif]-->
	<!--[if gt IE 8]><!-->
	<html class="no-js" <?php language_attributes(); ?>>
	<!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php bloginfo( 'name' ); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
		<meta name="viewport" content="width=device-width">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo CSSPATH; ?>/main.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo CSSPATH; ?>/owl.carousel/owl.carousel.css" />

		<!--[if lt IE 9]>
			<script src="<?php echo VENDOR; ?>/html5-3.6.min.js"></script>
		<![endif]-->

		<!-- TypeKit -->
		<script type="text/javascript">
		(function() {
			var config = {
				kitId: 'yoj7izd',
				scriptTimeout: 3000
			};
			var h = document.getElementsByTagName('html')[0];
			h.className += ' wf-loading';
			var t = setTimeout(function() {
				h.className = h.className.replace(/(\s|^)wf-loading(\s|$)/g, ' ');
				h.className += ' wf-inactive';
			}, config.scriptTimeout);
			var d = false;
			var tk = document.createElement('script');
			tk.src = '//use.typekit.net/' + config.kitId + '.js';
			tk.type = 'text/javascript';
			tk.async = 'true';
			tk.onload = tk.onreadystatechange = function() {
				var rs = this.readyState;
				if (d || rs && rs != 'complete' && rs != 'loaded') return;
				d = true;
				clearTimeout(t);
				try { Typekit.load(config); } catch (e) {}
			};
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(tk, s);
		})();
		</script>

		<?php 
			wp_head();

			$page_id = am_get_post_slug(get_the_ID());
		?>
	</head>
	<body data-page="<?php echo $page_id; ?>" id="<?php echo $page_id; ?>" <?php body_class(); ?>>
	<!--[if lt IE 7]>
		<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->

		<div class="wrapper">
			<header class="header">
				<div class="container">
					<div class="header-top">
						<div class="logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<img src="<?php echo IMAGES; ?>/dek-consulting-services-logo.png" alt="">
							</a>
						</div>
						<div class="right-callout">
							<div class="call-us">Call Us: 1-800-625-0436</div>
						</div>
					</div>
					<nav class="main-nav">
						<?php wp_nav_menu( 
							array(
								'theme_location'	=> 'main-menu',
								'container_class'	=> 'dropdown-menu',
								'before'			=> '<span class="menu-bg"></span>'
							)
						); ?>
					</nav>
				</div>
			</header>