<?php
/**
 * Pagenator
 *
 * Pagenator plugin that adds prev | next links after post content.
 *
 * @package   Pagenator
 * @author    NullLogic <hello@nulllogic.net>
 * @license   MIT
 * @link      http://www.nulllogic.net
 * @copyright 2014 NullLogic
 *
 * Plugin Name:       Pagenator
 * Plugin URI:        http://www.nulllogic.net/services/development/
 * Description:       Pagenator adds after content next & prev buttons .
 * Version:           1.0.0
 * Author:            NullLogic
 * Author URI:        http://www.nulllogic.net
 * License:           MIT
 * License URI:       http://opensource.org/licenses/MIT
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once( plugin_dir_path( __FILE__ ) . 'public/pagenator-public.php' );

register_activation_hook( __FILE__, array( 'Pagenator', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Pagenator', 'deactivate' ) );


add_action( 'plugins_loaded', array( 'Pagenator', 'get_instance' ) );