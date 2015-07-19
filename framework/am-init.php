<?php
/*-----------------------------------------------------------------------------------*/
/*	AM Framework v.1.0
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/*	Define Constants
/*-----------------------------------------------------------------------------------*/
define('FRAMEWORK_DIR', get_template_directory() . '/framework');
define('FRAMEWORK_URL', get_template_directory_uri() . '/framework');
define('FRAMEWORK_VERSION', '1.0');

/*-----------------------------------------------------------------------------------*/
/*	Options page
/*-----------------------------------------------------------------------------------*/
require(FRAMEWORK_DIR . '/am-admin-menu.php');
require(FRAMEWORK_DIR . '/am-admin-register-settings.php');
require(FRAMEWORK_DIR . '/am-options.php');
require(FRAMEWORK_DIR . '/am-option-fields.php');
require(FRAMEWORK_DIR . '/am-admin-page-options.php');