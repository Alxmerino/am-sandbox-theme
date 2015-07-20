<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content.
 *
 * @package WordPress
 * @subpackage am_sandbox_theme
 * @since AM_Sandbox 1.0
 */
?>
	<footer class="footer">

		<nav class="footer-nav">
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => 'dropdown-menu') ); ?>
		</nav>

		<div class="copyright">
			<p>&copy; Copyright <?php echo date('Y') ?> | <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> - Website by <a href="http://amayamedia.com" rel="external" title="Amaya Media">Amaya Media</a></p>
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