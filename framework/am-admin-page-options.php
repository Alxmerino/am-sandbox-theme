<?php 

/*-----------------------------------------------------------------------------------*/
/*	Render Framework Options
/*-----------------------------------------------------------------------------------*/
function am_options_page( $active_tab = '' ) { ?>

	<div class="wrap">
		<h2><?php _e( 'Theme Options', 'am_framework' ); ?></h2>

		<?php settings_errors(); ?>

		<!-- TODO: NAV-TABS ($active_tab) -->

		<form method="post" action="options.php">
			
			<?php 

				settings_fields( 'am_framework_options' );

				am_options_fields();

				submit_button();
			?>

		</form>

	</div>

<?php
}