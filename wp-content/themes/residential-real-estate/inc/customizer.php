<?php
/**
 * Customizer
 * 
 * @package WordPress
 * @subpackage Residential Real Estate
 * @since Residential Real Estate 1.9
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function residential_real_estate_customize_register( $wp_customize ) {
    // Check for existence of WP_Customize_Manager before proceeding
	if ( ! class_exists( 'WP_Customize_Manager' ) ) {
        return;
    }
    
	$wp_customize->add_section( new Residential_Real_Estate_Customizer_Pro_Button( $wp_customize, 'upsell_premium_section', array(
		'title'       => __( 'Residential Real Estate Pro', 'residential-real-estate' ),
		'button_text' => __( 'Buy Pro Theme', 'residential-real-estate' ),
		'url'         => esc_url( RESIDENTIAL_REAL_ESTATE_BUY_NOW ),
		'priority'    => 0,
	)));

	$wp_customize->add_section( new Residential_Real_Estate_Customizer_Pro_Button( $wp_customize, 'upsell_bundle_section', array(
		'title'       => __( 'Get All Themes', 'residential-real-estate' ),
		'button_text' => __( 'Buy Now', 'residential-real-estate' ),
		'url'         => esc_url( RESIDENTIAL_REAL_ESTATE_BUNDLE_LINK ),
		'priority'    => 0,
	)));

}
add_action( 'customize_register', 'residential_real_estate_customize_register' );

if ( class_exists( 'WP_Customize_Section' ) ) {
	class Residential_Real_Estate_Customizer_Pro_Button extends WP_Customize_Section {
		public $type = 'residential-real-estate-buynow';
		public $button_text = '';
		public $url = '';

		protected function render() {
			?>
			<li id="accordion-section-<?php echo esc_attr( $this->id ); ?>" class="residential_real_estate_customizer_pro_button accordion-section control-section control-section-<?php echo esc_attr( $this->id ); ?> cannot-expand">
				<h3 class="accordion-section-title premium-details">
					<?php echo esc_html( $this->title ); ?>
					<a href="<?php echo esc_url( $this->url ); ?>" class="button button-secondary alignright" target="_blank" style="margin-top: -4px;"><?php echo esc_html( $this->button_text ); ?></a>
				</h3>
			</li>
			<?php
		}
	}
}

/**
 * Enqueue script for custom customize control.
 */
function residential_real_estate_custom_control_scripts() {
	wp_enqueue_script( 'residential-real-estate-custom-controls-js', get_template_directory_uri() . '/assets/js/custom-controls.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );

    wp_enqueue_style( 'residential-real-estate-customizer-css', get_template_directory_uri() . '/assets/css/customizer.css', array(), '1.0' );
}
add_action( 'customize_controls_enqueue_scripts', 'residential_real_estate_custom_control_scripts' );
