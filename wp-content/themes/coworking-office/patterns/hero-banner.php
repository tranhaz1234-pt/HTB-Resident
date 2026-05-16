<?php
/**
 * Title: Hero Banner
 * Slug: coworking-office/hero-banner
 */
$get_url = trailingslashit(get_template_directory_uri());
$coworking_office_hero_image_1 = $get_url . 'assets/images/banner.jpg';
?>


<!-- wp:group {"className":"banner-main-section","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group banner-main-section" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"<?php echo esc_url($coworking_office_hero_image_1); ?>","id":167,"dimRatio":50,"overlayColor":"black","isUserOverlayColor":true,"sizeSlug":"large","className":"slide-bg","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-cover slide-bg" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><img class="wp-block-cover__image-background wp-image-167 size-large" alt="" src="<?php echo esc_url($coworking_office_hero_image_1); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"className":"slide-content-box","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group slide-content-box"><!-- wp:group {"className":"extra-head-main","layout":{"type":"constrained"}} -->
<div class="wp-block-group extra-head-main"><!-- wp:paragraph {"align":"left","className":"banner-extra-head","style":{"elements":{"link":{"color":{"text":"var:preset|color|fourth"}}},"spacing":{"padding":{"top":"7px","bottom":"7px","left":"20px","right":"20px"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"typography":{"textTransform":"uppercase"},"border":{"radius":{"topLeft":"30px","topRight":"30px","bottomLeft":"30px","bottomRight":"30px"}}},"backgroundColor":"primary","textColor":"fourth","fontSize":"small","fontFamily":"worksans"} -->
<p class="has-text-align-left banner-extra-head has-fourth-color has-primary-background-color has-text-color has-background has-link-color has-worksans-font-family has-small-font-size" style="border-top-left-radius:30px;border-top-right-radius:30px;border-bottom-left-radius:30px;border-bottom-right-radius:30px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:7px;padding-right:20px;padding-bottom:7px;padding-left:20px;text-transform:uppercase"><?php esc_html_e('HIGH FACILITY CO WORKING SPACE', 'coworking-office'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"left","className":"banner-heading","style":{"elements":{"link":{"color":{"text":"var:preset|color|fourth"}}},"typography":{"fontStyle":"normal","fontWeight":"800","letterSpacing":"1px","fontSize":"120px"},"spacing":{"margin":{"right":"0","left":"0","top":"0","bottom":"0"}}},"textColor":"fourth","fontFamily":"worksans"} -->
<h2 class="wp-block-heading has-text-align-left banner-heading has-fourth-color has-text-color has-link-color has-worksans-font-family" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;font-size:120px;font-style:normal;font-weight:800;letter-spacing:1px"><?php esc_html_e('CO-WORKING SPACE', 'coworking-office'); ?></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"banner-btn-row","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group banner-btn-row" style="margin-top:0;margin-bottom:0"><!-- wp:buttons {"className":"banner-btn","style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"border":{"radius":{"topLeft":"0px","topRight":"0px","bottomLeft":"0px","bottomRight":"0px"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-buttons banner-btn" style="border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;padding-top:0;padding-bottom:0"><!-- wp:button {"backgroundColor":"primary","textColor":"fourth","style":{"spacing":{"padding":{"top":"6px","bottom":"6px"}},"elements":{"link":{"color":{"text":"var:preset|color|fourth"}}},"border":{"radius":{"topLeft":"30px","topRight":"30px","bottomLeft":"30px","bottomRight":"30px"}}},"fontFamily":"worksans"} -->
<div class="wp-block-button slider-btn"><a class="wp-block-button__link has-fourth-color has-primary-background-color has-text-color has-background has-link-color has-worksans-font-family wp-element-button" href="#" style="border-top-left-radius:30px;border-top-right-radius:30px;border-bottom-left-radius:30px;border-bottom-right-radius:30px;padding-top:6px;padding-bottom:6px"><?php esc_html_e('Our Services', 'coworking-office'); ?><i class="fas fa-chevron-right"></i></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"align":"left","className":"banner-para","style":{"elements":{"link":{"color":{"text":"var:preset|color|fourth"}}},"spacing":{"margin":{"right":"0","left":"0","top":"0","bottom":"0"}}},"textColor":"fourth","fontFamily":"worksans"} -->
<p class="has-text-align-left banner-para has-fourth-color has-text-color has-link-color has-worksans-font-family" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0"><?php esc_html_e('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'coworking-office'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->