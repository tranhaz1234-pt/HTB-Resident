<?php   
/**
 * Block Patterns
 *
 * @package Residential Real Estate
 * @since 1.9
 */

/**
 * Registers block patterns and categories.
 *
 * @since 1.0
 *
 * @return void
 */
function residential_real_estate_register_block_patterns() {
	$block_pattern_categories = array(
		'residential-real-estate' => array( 'label' => esc_html__( 'Residential Real Estate Patterns', 'residential-real-estate' ) ),
		'pages'    => array( 'label' => esc_html__( 'Pages', 'residential-real-estate' ) ),
	);

	$block_pattern_categories = apply_filters( 'residential_real_estate_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$block_patterns = array(
		'archive-inner-banner',
		'header-default',
		'header-banner',
		'properties-section',
		'inner-banner',
		'post-one-column',
		'post-two-column',
		'latest-blog',
		'hidden-404',
		'sidebar',
		'footer-default',	
	);

	$block_patterns = apply_filters( 'residential_real_estate_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_parent_theme_file_path( '/inc/patterns/' . $block_pattern . '.php' );

		register_block_pattern(
			'residential-real-estate/' . $block_pattern,
			require $pattern_file
		);
	}
}
add_action( 'init', 'residential_real_estate_register_block_patterns', 9 );