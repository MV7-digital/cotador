<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package [Pride]
 */

/**
 * Enqueue scripts and styles.
 */
function theme_scripts() {
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700%7COpen+Sans:400,300,700' );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/style.css' );
    wp_enqueue_style( 'bootstrap-icons', get_template_directory_uri() . '/vendor/twbs/bootstrap-icons/font/bootstrap-icons.min.css' );

	wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), null, true );
	wp_enqueue_script( 'jspdf', get_template_directory_uri() . '/js/jspdf.umd.min.js', array(), null, true );
	wp_enqueue_script( 'jsPDF-autotable', 'https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.4/jspdf.plugin.autotable.min.js', array( 'jquery' ),'',true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );