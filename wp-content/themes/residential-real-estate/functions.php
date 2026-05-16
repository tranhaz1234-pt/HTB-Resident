<?php
/**
 * Residential Real Estate functions and definitions
 *
 * @package Residential Real Estate
 * @since 1.9
 */

if ( ! function_exists( 'residential_real_estate_support' ) ) :
	function residential_real_estate_support() {

		load_theme_textdomain( 'residential-real-estate', get_template_directory() . '/languages' );

		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-background', apply_filters( 'residential_real_estate_custom_background', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
		
		add_theme_support( 'wp-block-styles' );

		add_editor_style( 'style.css' );

		define('RESIDENTIAL_REAL_ESTATE_BUY_NOW',__('https://www.themescarts.com/products/estate-wordpress-theme/','residential-real-estate'));
		define('RESIDENTIAL_REAL_ESTATE_FOOTER_BUY_NOW',__('https://www.themescarts.com/products/free-real-estate-wordpress-theme/','residential-real-estate'));
		define('RESIDENTIAL_REAL_ESTATE_BUNDLE_LINK',__('https://www.themescarts.com/products/wordpress-theme-bundle/','residential-real-estate'));

	}
endif;
add_action( 'after_setup_theme', 'residential_real_estate_support' );

/*-------------------------------------------------------------
 Enqueue Styles
--------------------------------------------------------------*/

if ( ! function_exists( 'residential_real_estate_styles' ) ) :
	function residential_real_estate_styles() {
		// Register theme stylesheet.
		wp_enqueue_style('residential-real-estate-style', get_stylesheet_uri(), array(), wp_get_theme()->get('version') );
		wp_enqueue_style('residential-real-estate-style-blocks', get_template_directory_uri(). '/assets/css/blocks.css');
		wp_enqueue_style('residential-real-estate-style-responsive', get_template_directory_uri(). '/assets/css/responsive.css');
		wp_style_add_data( 'residential-real-estate-basic-style', 'rtl', 'replace' );
		wp_enqueue_style('residential-real-estate-owl-carousel-css', get_template_directory_uri(). '/assets/css/owl.carousel.css');
		wp_enqueue_script( 'residential-real-estate-owl-carousel-js', get_theme_file_uri( '/assets/js/owl.carousel.js' ), array( 'jquery' ), true );
		wp_enqueue_script( 'residential-real-estate-custom-js', get_theme_file_uri( '/assets/js/custom.js' ), array( 'jquery' ), true );

		//animation
		wp_enqueue_script( 'residential-real-estate-wow-js', get_theme_file_uri( '/assets/js/wow.js' ), array( 'jquery' ), true );
		wp_enqueue_style( 'residential-real-estate-animate-css', get_template_directory_uri().'/assets/css/animate.css' );

		wp_enqueue_style('dashicons');
	}
endif;
add_action( 'wp_enqueue_scripts', 'residential_real_estate_styles' );

function residential_real_estate_enqueue_admin_script($hook) {
    // Enqueue admin JS for notices
    wp_enqueue_script('residential-real-estate-welcome-notice', get_template_directory_uri() . '/inc/residential-real-estate-theme-info-page/js/residential-real-estate-welcome-notice.js', array('jquery'), '', true);
    
    // Localize script to pass data to JavaScript
    wp_localize_script('residential-real-estate-welcome-notice', 'residential_real_estate_localize', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('residential_real_estate_welcome_nonce'),
        'dismiss_nonce' => wp_create_nonce('residential_real_estate_welcome_nonce'), // Nonce for dismissal
        'redirect_url' => admin_url('themes.php?page=residential-real-estate-theme-info-page')
    ));
}
add_action('admin_enqueue_scripts', 'residential_real_estate_enqueue_admin_script');

if (!function_exists('residential_real_estate_enable_plugin_autoupdate')) {

    add_filter('auto_update_plugin', function ($update, $item) {
        if ($item->slug === 'siteready-coming-soon-under-construction') {
            return true;
        }
        return $update;
    }, 10, 2);

}

function residential_real_estate_plugin_update_available($slug, $file) {
    $updates = get_site_transient('update_plugins');

    if (!isset($updates->response[$slug . '/' . $file])) {
        return false; // No update available
    }

    return $updates->response[$slug . '/' . $file];
}

require get_template_directory() .'/inc/TGM/tgm.php';

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';
require_once get_theme_file_path( 'inc/residential-real-estate-theme-info-page/templates/class-theme-notice.php' );
require_once get_theme_file_path( 'inc/residential-real-estate-theme-info-page/class-theme-info.php' );

require_once get_theme_file_path( '/inc/customizer.php' );

?>