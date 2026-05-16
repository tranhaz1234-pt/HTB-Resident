<?php
/**
 * Theme Info Page
 *
 * @package Residential Real Estate
 */

function residential_real_estate_theme_details() {
	add_theme_page( 'Themes', 'Residential Real Estate Theme', 'edit_theme_options', 'residential-real-estate-theme-info-page', 'theme_details_display', null );
}
add_action( 'admin_menu', 'residential_real_estate_theme_details' );

function theme_details_display() {

	include_once 'templates/theme-details.php';

}

add_action( 'admin_enqueue_scripts', 'residential_real_estate_theme_details_style' );

function residential_real_estate_theme_details_style() {
    wp_register_style( 'residential_real_estate_theme_details_css', get_template_directory_uri() . '/inc/residential-real-estate-theme-info-page/css/theme-details.css', false, '1.0.0' );
    wp_enqueue_style( 'residential_real_estate_theme_details_css' );
}