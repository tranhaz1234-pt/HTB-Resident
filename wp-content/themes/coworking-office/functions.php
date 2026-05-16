<?php
if ( ! defined( 'COWORKING_OFFICE_VERSION' ) ) {
	define( 'COWORKING_OFFICE_VERSION', '0.0.1' );
}

/**
 * Enqueue scripts and styles.
 */
function coworking_office_scripts() {
	wp_enqueue_style( 'coworking-office-style', trailingslashit( get_template_directory_uri() ) . 'assets/css/style.css', array(), COWORKING_OFFICE_VERSION );

	wp_enqueue_style( 'fontawesome', trailingslashit( get_template_directory_uri() ) . 'assets/css/font-awesome/css/all.css', array(), COWORKING_OFFICE_VERSION );

	wp_enqueue_style( 'owl-carousel-css', trailingslashit( get_template_directory_uri() ) . 'assets/css/owl.carousel.css', array(), COWORKING_OFFICE_VERSION );

	// Enqueue theme JavaScript
	wp_enqueue_script( 'coworking-office-theme', trailingslashit( get_template_directory_uri() ) . 'assets/js/theme.js',
	    array( 'jquery' ), COWORKING_OFFICE_VERSION,true );

	wp_enqueue_script( 'owl-carousel-js', get_theme_file_uri( '/assets/js/owl.carousel.js' ), array( 'jquery' ), COWORKING_OFFICE_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'coworking_office_scripts' );

function coworking_office_load_dashicons_front_end() {
    wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'coworking_office_load_dashicons_front_end' );

/**
 * Enqueue Editor styles.
 */
function coworking_office_enqueue_editor_block_styles() {
	// Enqueue editor styles.
	add_editor_style( trailingslashit( get_template_directory_uri() ) . 'assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'coworking_office_enqueue_editor_block_styles' );

/**
 * Pattern categories.
 */
function coworking_office_register_block_pattern_category() {
	register_block_pattern_category(
		'coworking-office-banner',
		array(
			'label' => esc_html__( 'Banner', 'coworking-office' ),
		)
	);
	
	register_block_pattern_category(
		'coworking-office-services',
		array(
			'label' => esc_html__( 'Services', 'coworking-office' ),
		)
	);
}
add_action( 'init', 'coworking_office_register_block_pattern_category' );

/**
 * Add theme support for various features.
 */
function coworking_office_setup() {

	load_theme_textdomain( 'coworking-office', get_template_directory() . '/languages' );

	// Add support for block styles.
	add_theme_support( 'wp-block-styles' );
	
	// Add support for editor styles.
	add_theme_support( 'editor-styles' );
	
	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'coworking_office_setup' );