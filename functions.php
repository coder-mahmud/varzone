<?php
// Prevent direct script access
if ( !defined( 'ABSPATH' ) )
	die ( 'No direct script access allowed' );

/**
* Child Theme Setup
* 
* Always use child theme if you want to make some custom modifications. 
* This way theme updates will be a lot easier.
*/
function bimber_child_setup() {
	wp_enqueue_style('child_style', get_stylesheet_directory_uri(). '/css/styles.css');
	wp_enqueue_script('child_main_script', get_stylesheet_directory_uri().'/js/main.js', array('jquery'), '', true );
}

add_action( 'after_setup_theme', 'bimber_child_setup' );

