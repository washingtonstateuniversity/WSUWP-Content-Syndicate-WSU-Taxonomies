<?php
/*
Plugin Name: WSUWP Content Syndicate - WSU Taxonomies
Version: 0.0.1
Description: Unique rules for WSUWP Content Syndicate and WSU taxonomies.
Author: washingtonstateuniversity
Author URI: https://web.wsu.edu/
Plugin URI: https://github.com/washingtonstateuniversity/wsuwp-content-syndicate-wsu-taxonomies
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// This plugin uses namespaces and requires PHP 5.3 or greater.
if ( version_compare( PHP_VERSION, '5.3', '<' ) ) {
	add_action( 'admin_notices', create_function( '',
	"echo '<div class=\"error\"><p>" . __( 'WSUWP Content Syndicate WSU Taxonomies requires PHP 5.3 to function properly. Please upgrade PHP or deactivate the plugin.', 'wsuwp-content-syndicate-wsu-taxonomies' ) . "</p></div>';" ) );
	return;
} else {
	include_once __DIR__ . '/includes/wsuwp-content-syndicate-wsu-taxonomies.php';
}
