<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content.
 *
 * @package WordPress
 * @subpackage am_boiler
 * @since AM_Framework 1.0
 */
?>

		</div><!-- #wrapper -->
		<footer class="footer">
			<div class="container">
				<nav class="footer-nav">
					<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => 'dropdown-menu') ); ?>
				</nav>
				<div class="social">
					<ul>
						<li><a href="https://www.facebook.com/pages/DEK-Consulting-Services-LLC/290856507729130" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
						<li><a href="https://twitter.com/DEKServices" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
						<li><a href="https://www.linkedin.com/company/dek-consulting-services-llc" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
						<li><a href="https://plus.google.com/u/1/118281421370689443953/posts" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="copyright">
				<div class="container">
					<p>&copy; Copyright <?php echo date('Y') ?> | <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> - Website by <a href="http://amayamedia.com" rel="external" title="Amaya Media">Amaya Media</a></p>
				</div>
			</div>
		</footer>
		<!-- Dynamic scripts -->
		<script>
			<?php if ( is_front_page() ) : ?>
				// var slidesArray = JSON.parse('<?php echo (am_get_slides("json")); ?>');
			<?php endif; ?>
		</script>
		<?php wp_footer(); ?>
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-64322418-1', 'auto');
		ga('require', 'displayfeatures');
		ga('send', 'pageview');

		</script>
	</body>
</html>