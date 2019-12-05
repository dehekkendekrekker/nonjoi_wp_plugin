<?php

/*
Plugin Name: Non Joi dictionary plugin
Plugin URI: https://nonjoi.org
description: A plugin to link the nonjoi site to the dictionary
Version: 1.0
Author: Daniel Attevelt
Author URI: None
License: GPL2
*/

// Security check


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'NONJOI_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-non-joi-activator.php
 */
function activate_nonjoi() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-non-joi-activator.php';
	Non_Joi_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-non-joi-deactivator.php
 */
function deactivate_nonjoi() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-non-joi-deactivator.php';
	Non_Joi_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_nonjoi' );
register_deactivation_hook( __FILE__, 'deactivate_nonjoi' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-non-joi.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_nonjoi() {

	$plugin = new NonJoi();
	$plugin->run();

}
run_nonjoi();
