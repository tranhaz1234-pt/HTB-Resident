<?php
	
load_template( get_template_directory() . '/inc/TGM/class-tgm-plugin-activation.php' );

/**
 * Recommended plugins.
 */
function residential_real_estate_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Siteready Coming Soon Under Construction', 'residential-real-estate' ),
			'slug'             => 'siteready-coming-soon-under-construction',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	residential_real_estate_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'residential_real_estate_register_recommended_plugins' );