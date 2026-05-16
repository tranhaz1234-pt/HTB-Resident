<?php
/**
 * Title: Services
 * Slug: coworking-office/services
 */

$get_url = trailingslashit(get_template_directory_uri());
$coworking_office_service_image_1 = $get_url . 'assets/images/service-1.jpg';
$coworking_office_service_image_2 = $get_url . 'assets/images/service-2.jpg';
$coworking_office_service_image_3 = $get_url . 'assets/images/service-3.jpg';
?>

<!-- wp:group {"className":"property-head","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xx-large"},"padding":{"top":"0","bottom":"var:preset|spacing|medium","left":"0","right":"0"}},"color":{"background":"#e8edee"}},"layout":{"type":"constrained","contentSize":"100%","wideSize":""}} -->
<div class="wp-block-group property-head has-background" style="background-color:#e8edee;margin-bottom:var(--wp--preset--spacing--xx-large);padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--medium);padding-left:0"><!-- wp:paragraph {"align":"center","className":"property-small-head","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}},"backgroundColor":"primary","textColor":"background","fontFamily":"worksans"} -->
<p class="has-text-align-center property-small-head has-background-color has-primary-background-color has-text-color has-background has-link-color has-worksans-font-family" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><?php esc_html_e('Featured Workspace', 'coworking-office'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":4,"className":"property-heading","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary"} -->
<h4 class="wp-block-heading has-text-align-center property-heading has-secondary-color has-text-color has-link-color" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><strong><?php esc_html_e('Tailored Solutions For Your Unique Work Needs.', 'coworking-office'); ?></strong></h4>
<!-- /wp:heading -->

<!-- wp:group {"className":"service-owl","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group service-owl"><!-- wp:group {"className":"property-block  cat-position owl-carousel","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group property-block  cat-position owl-carousel"><!-- wp:group {"className":"property-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group property-box"><!-- wp:image {"id":81,"sizeSlug":"full","linkDestination":"none","className":"property-img"} -->
<figure class="wp-block-image size-full property-img"><img src="<?php echo esc_url($coworking_office_service_image_1); ?>" alt="" class="wp-image-81"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"property-content-bg","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|x-small","left":"var:preset|spacing|large","right":"var:preset|spacing|large"}}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group property-content-bg has-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--x-small);padding-left:var(--wp--preset--spacing--large)"><!-- wp:heading {"level":6,"className":"land-name","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.5"},"color":{"text":"#182027"},"elements":{"link":{"color":{"text":"#182027"}}}},"fontSize":"xx-large","fontFamily":"worksans"} -->
<h6 class="wp-block-heading land-name has-text-color has-link-color has-worksans-font-family has-xx-large-font-size" style="color:#182027;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500;line-height:1.5"><?php esc_html_e('Dedicated Desk - Type A', 'coworking-office'); ?></h6>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"land-address","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"text":"#666666"},"elements":{"link":{"color":{"text":"#666666"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"small","fontFamily":"worksans"} -->
<p class="land-address has-text-color has-link-color has-worksans-font-family has-small-font-size" style="color:#666666;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500"><?php esc_html_e('Ideal For Personal, Semi Private.', 'coworking-office'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"office-detail","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group office-detail" style="margin-top:var(--wp--preset--spacing--x-small);margin-bottom:var(--wp--preset--spacing--x-small);padding-top:0;padding-bottom:0"><!-- wp:paragraph {"className":"no-of-beds","fontFamily":"worksans"} -->
<p class="no-of-beds has-worksans-font-family"><i class="fas fa-chair"></i><?php esc_html_e(' 04 Desk', 'coworking-office'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"no-of-bath","style":{"color":{"text":"#666666"},"elements":{"link":{"color":{"text":"#666666"}}}},"fontFamily":"worksans"} -->
<p class="no-of-bath has-text-color has-link-color has-worksans-font-family" style="color:#666666"><i class="fas fa-wifi"></i><?php esc_html_e(' Free Internet', 'coworking-office'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"no-of-pool","fontFamily":"worksans"} -->
<p class="no-of-pool has-worksans-font-family"><i class="fas fa-thermometer-three-quarters"></i><?php esc_html_e(' Full Ac', 'coworking-office'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"feature-btn","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|small"}}}} -->
<div class="wp-block-buttons feature-btn" style="margin-bottom:var(--wp--preset--spacing--small)"><!-- wp:button {"style":{"border":{"radius":{"topLeft":"10px","topRight":"10px","bottomLeft":"10px","bottomRight":"10px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}},"fontFamily":"worksans"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-worksans-font-family wp-element-button" href="#" style="border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding-top:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small)"><?php esc_html_e('VIEW DETAILS', 'coworking-office'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"property-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group property-box"><!-- wp:image {"id":81,"sizeSlug":"full","linkDestination":"none","className":"property-img"} -->
<figure class="wp-block-image size-full property-img"><img src="<?php echo esc_url($coworking_office_service_image_2); ?>" alt="" class="wp-image-81"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"property-content-bg","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|x-small","left":"var:preset|spacing|large","right":"var:preset|spacing|large"}}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group property-content-bg has-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--x-small);padding-left:var(--wp--preset--spacing--large)"><!-- wp:heading {"level":6,"className":"land-name","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.5"},"color":{"text":"#182027"},"elements":{"link":{"color":{"text":"#182027"}}}},"fontSize":"xx-large","fontFamily":"worksans"} -->
<h6 class="wp-block-heading land-name has-text-color has-link-color has-worksans-font-family has-xx-large-font-size" style="color:#182027;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500;line-height:1.5"><?php esc_html_e('Dedicated Desk - Type B', 'coworking-office'); ?></h6>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"land-address","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"text":"#666666"},"elements":{"link":{"color":{"text":"#666666"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"small","fontFamily":"worksans"} -->
<p class="land-address has-text-color has-link-color has-worksans-font-family has-small-font-size" style="color:#666666;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500"><?php esc_html_e('Ideal For Personal, Semi Private.', 'coworking-office'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"office-detail","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group office-detail" style="margin-top:var(--wp--preset--spacing--x-small);margin-bottom:var(--wp--preset--spacing--x-small);padding-top:0;padding-bottom:0"><!-- wp:paragraph {"className":"no-of-beds","fontFamily":"worksans"} -->
<p class="no-of-beds has-worksans-font-family"><i class="fas fa-chair"></i><?php esc_html_e(' 04 Desk', 'coworking-office'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"no-of-bath","style":{"color":{"text":"#666666"},"elements":{"link":{"color":{"text":"#666666"}}}},"fontFamily":"worksans"} -->
<p class="no-of-bath has-text-color has-link-color has-worksans-font-family" style="color:#666666"><i class="fas fa-wifi"></i><?php esc_html_e(' Free Internet', 'coworking-office'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"no-of-pool","fontFamily":"worksans"} -->
<p class="no-of-pool has-worksans-font-family"><i class="fas fa-thermometer-three-quarters"></i><?php esc_html_e(' Full Ac', 'coworking-office'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"feature-btn","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|small"}}}} -->
<div class="wp-block-buttons feature-btn" style="margin-bottom:var(--wp--preset--spacing--small)"><!-- wp:button {"style":{"border":{"radius":{"topLeft":"10px","topRight":"10px","bottomLeft":"10px","bottomRight":"10px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}},"fontFamily":"worksans"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-worksans-font-family wp-element-button" href="#" style="border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding-top:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small)"><?php esc_html_e('VIEW DETAILS', 'coworking-office'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"property-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group property-box"><!-- wp:image {"id":81,"sizeSlug":"full","linkDestination":"none","className":"property-img"} -->
<figure class="wp-block-image size-full property-img"><img src="<?php echo esc_url($coworking_office_service_image_3); ?>" alt="" class="wp-image-81"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"property-content-bg","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|x-small","left":"var:preset|spacing|large","right":"var:preset|spacing|large"}}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group property-content-bg has-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--x-small);padding-left:var(--wp--preset--spacing--large)"><!-- wp:heading {"level":6,"className":"land-name","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.5"},"color":{"text":"#182027"},"elements":{"link":{"color":{"text":"#182027"}}}},"fontSize":"xx-large","fontFamily":"worksans"} -->
<h6 class="wp-block-heading land-name has-text-color has-link-color has-worksans-font-family has-xx-large-font-size" style="color:#182027;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500;line-height:1.5"><?php esc_html_e('Dedicated Desk - Type C', 'coworking-office'); ?></h6>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"land-address","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"text":"#666666"},"elements":{"link":{"color":{"text":"#666666"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"small","fontFamily":"worksans"} -->
<p class="land-address has-text-color has-link-color has-worksans-font-family has-small-font-size" style="color:#666666;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500"><?php esc_html_e('Ideal For Personal, Semi Private.', 'coworking-office'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"office-detail","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group office-detail" style="margin-top:var(--wp--preset--spacing--x-small);margin-bottom:var(--wp--preset--spacing--x-small);padding-top:0;padding-bottom:0"><!-- wp:paragraph {"className":"no-of-beds","fontFamily":"worksans"} -->
<p class="no-of-beds has-worksans-font-family"><i class="fas fa-chair"></i><?php esc_html_e(' 04 Desk', 'coworking-office'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"no-of-bath","style":{"color":{"text":"#666666"},"elements":{"link":{"color":{"text":"#666666"}}}},"fontFamily":"worksans"} -->
<p class="no-of-bath has-text-color has-link-color has-worksans-font-family" style="color:#666666"><i class="fas fa-wifi"></i><?php esc_html_e(' Free Internet', 'coworking-office'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"no-of-pool","fontFamily":"worksans"} -->
<p class="no-of-pool has-worksans-font-family"><i class="fas fa-thermometer-three-quarters"></i><?php esc_html_e(' Full Ac', 'coworking-office'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"feature-btn","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|small"}}}} -->
<div class="wp-block-buttons feature-btn" style="margin-bottom:var(--wp--preset--spacing--small)"><!-- wp:button {"style":{"border":{"radius":{"topLeft":"10px","topRight":"10px","bottomLeft":"10px","bottomRight":"10px"}},"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}},"fontFamily":"worksans"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-worksans-font-family wp-element-button" href="#" style="border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding-top:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small)"><?php esc_html_e('VIEW DETAILS', 'coworking-office'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->