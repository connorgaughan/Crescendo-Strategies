<?php

class Makespace {

	function __construct(){
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );
	}

	function wp_enqueue_scripts(){

		wp_enqueue_script( 'theme', get_stylesheet_directory_uri() . '/_app/js/theme.js' );
		wp_localize_script( 'theme', 'MSWObject', array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'site_url' => site_url(),
			'stylesheet_directory' => get_stylesheet_directory_uri()
		) );

		wp_enqueue_style( 'theme', get_stylesheet_directory_uri() . '/_app/css/style.css' );
	}

}

$Makespace = new Makespace();

function sc_button($atts, $content = null) {
	extract( shortcode_atts( array(
		'url' => '#',
		'target' => '_self'
	), $atts ) );
	return '<a class="button primary" href="'. $url .'" target="'. $target .'">' . do_shortcode($content) . '</a>';
}
add_shortcode('button', 'sc_button');