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
 * Version:           1.0.0
 *
 **/
class Pagenator {

	const VERSION = '1.0.0';

	protected $plugin_slug = 'pagenator';
	protected static $instance = null;

	private function __construct() {

		// Load public-facing style sheet and JavaScript.
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		add_filter( 'the_content', array( $this, 'add_prev_next_buttons' ), 10 );

	}

	public function get_plugin_slug() {
		return $this->plugin_slug;
	}

	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	public static function activate( $network_wide ) {

	}

	public static function deactivate( $network_wide ) {

	}

	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_slug . '-plugin-styles', plugins_url( 'assets/css/pagenator.css', __FILE__ ), array(), self::VERSION );
	}

	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_slug . '-plugin-script', plugins_url( 'assets/js/public.js', __FILE__ ), array( 'jquery' ), self::VERSION );
	}

	public function add_prev_next_buttons( $content ) {



		add_filter( 'next_post_link',  array( $this, 'posts_link_next_class') );
		add_filter( 'previous_post_link',  array( $this, 'posts_link_prev_class' ));


		if ( is_single() ) {

			ob_start();
			include_once( plugin_dir_path( __FILE__ ) . 'views/pager.php' );

			$pager = ob_get_contents();

			ob_end_clean();

			return $content . $pager;
		} else {
			return $content;
		}

	}

	public function posts_link_next_class( $format ) {
		$format = str_replace( 'href=', 'class="next_button" href=', $format );

		return $format;
	}

	public function posts_link_prev_class( $format ) {
		$format = str_replace( 'href=', 'class="prev_button" href=', $format );

		return $format;
	}


}
