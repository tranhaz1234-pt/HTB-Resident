<?php
/**
 * Title: Header
 * Slug: coworking-office/header
 */

$get_url = trailingslashit(get_template_directory_uri());
$coworking_office_hero_admin_img = $get_url . 'assets/images/admin.png';
?>

<!-- wp:group {"className":"topbar-bg","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|x-large","top":"var:preset|spacing|x-small"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"secondary","layout":{"type":"constrained","contentSize":"80%","justifyContent":"right"}} -->
<div class="wp-block-group topbar-bg has-secondary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-large)"><!-- wp:social-links {"iconColor":"black","iconColorValue":"#000000","iconBackgroundColor":"transparent","iconBackgroundColorValue":"transparent","openInNewTab":true,"size":"has-normal-icon-size","className":"header-social-icon is-style-default","style":{"spacing":{"margin":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"right","orientation":"horizontal","flexWrap":"wrap"}} -->
<ul class="wp-block-social-links has-normal-icon-size has-icon-color has-icon-background-color header-social-icon is-style-default" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0"><!-- wp:social-link {"url":"https://www.facebook.com/","service":"facebook"} /-->

<!-- wp:social-link {"url":"https://www.twitter.com/","service":"twitter"} /-->

<!-- wp:social-link {"url":"https://www.linkedin.com/","service":"linkedin"} /-->

<!-- wp:social-link {"url":"https://www.instagram.com/","service":"instagram"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"whole-header","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-group whole-header" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:columns {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":{"top":"var:preset|spacing|x-small","left":"0"}},"border":{"radius":{"topLeft":"20px","topRight":"20px","bottomLeft":"20px","bottomRight":"20px"}}},"backgroundColor":"fourth"} -->
<div class="wp-block-columns has-fourth-background-color has-background" style="border-top-left-radius:20px;border-top-right-radius:20px;border-bottom-left-radius:20px;border-bottom-right-radius:20px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"width":"10%","className":"logo-box","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<div class="wp-block-column logo-box" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:10%"><!-- wp:group {"className":"logo-div","backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group logo-div has-primary-background-color has-background"><!-- wp:site-title {"style":{"typography":{"fontWeight":"700","fontStyle":"normal"},"elements":{"link":{"color":{"text":"var:preset|color|fourth"}}}},"textColor":"fourth","fontSize":"xx-large","fontFamily":"worksans"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"90%","className":"heaader-content","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"}}} -->
<div class="wp-block-column heaader-content" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:90%"><!-- wp:group {"className":"padding-btom","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}},"border":{"radius":{"topLeft":"0px","topRight":"0px","bottomLeft":"0px","bottomRight":"0px"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group padding-btom" style="border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"className":"topbar","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"},"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"fontSize":"small","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group topbar has-small-font-size" style="margin-top:0;margin-bottom:0;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:group {"className":"topbar-main","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0px","right":"0px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group topbar-main" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0px;padding-bottom:0;padding-left:0px"><!-- wp:group {"className":"topbar-detail","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}},"border":{"bottom":{"color":"#e0e0e0","width":"1px"},"top":[],"right":[],"left":[]}},"fontFamily":"inter","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group topbar-detail has-worksans-font-family" style="border-bottom-color:#e0e0e0;border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"className":"heads-detail","layout":{"type":"constrained"}} -->
<div class="wp-block-group heads-detail"><!-- wp:group {"className":"detail-gap","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group detail-gap"><!-- wp:group {"className":"detail-icon","layout":{"type":"constrained"}} -->
<div class="wp-block-group detail-icon"><!-- wp:html -->
<i class="far fa-envelope"></i>
<!-- /wp:html --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:heading {"level":6,"style":{"color":{"text":"#062a26"},"elements":{"link":{"color":{"text":"#062a26"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontFamily":"worksans"} -->
<h6 class="wp-block-heading has-text-color has-link-color has-worksans-font-family" style="color:#062a26;font-style:normal;font-weight:600">Mail</h6>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"mail-address","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"textColor":"black","fontFamily":"worksans"} -->
<p class="mail-address has-black-color has-text-color has-link-color has-worksans-font-family" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e('coworkingspace12@example.com', 'coworking-office'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"heads-detail mailss","layout":{"type":"constrained"}} -->
<div class="wp-block-group heads-detail mailss"><!-- wp:group {"className":"detail-gap","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group detail-gap"><!-- wp:group {"className":"detail-icon","layout":{"type":"constrained"}} -->
<div class="wp-block-group detail-icon"><!-- wp:html -->
<i class="fas fa-phone-alt"></i>
<!-- /wp:html --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:heading {"level":6,"style":{"color":{"text":"#062a26"},"elements":{"link":{"color":{"text":"#062a26"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontFamily":"worksans"} -->
<h6 class="wp-block-heading has-text-color has-link-color has-worksans-font-family" style="color:#062a26;font-style:normal;font-weight:600">Call Us</h6>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"mail-address","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"textColor":"black","fontFamily":"worksans"} -->
<p class="mail-address has-black-color has-text-color has-link-color has-worksans-font-family" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e('+00 123 456 7890', 'coworking-office'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"heads-detail","layout":{"type":"constrained"}} -->
<div class="wp-block-group heads-detail"><!-- wp:group {"className":"detail-gap","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group detail-gap"><!-- wp:group {"className":"detail-icon","layout":{"type":"constrained"}} -->
<div class="wp-block-group detail-icon"><!-- wp:html -->
<i class="fas fa-map-marker-alt"></i>
<!-- /wp:html --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:heading {"level":6,"style":{"color":{"text":"#062a26"},"elements":{"link":{"color":{"text":"#062a26"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontFamily":"worksans"} -->
<h6 class="wp-block-heading has-text-color has-link-color has-worksans-font-family" style="color:#062a26;font-style:normal;font-weight:600">Location</h6>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"mail-address","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"textColor":"black","fontFamily":"worksans"} -->
<p class="mail-address has-black-color has-text-color has-link-color has-worksans-font-family" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e('88 Broklyn Golden Street. New York', 'coworking-office'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"header-admin"} -->
<div class="wp-block-buttons header-admin"><!-- wp:button {"backgroundColor":"black"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-black-background-color has-background wp-element-button"><img class="wp-image-115" style="width: 13px;" src="<?php echo esc_url($coworking_office_hero_admin_img); ?>" alt=""></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"tagName":"header","align":"full","className":"coworking-office-header","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"15px","right":"15px"},"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|fourth"}}}},"textColor":"fourth","layout":{"type":"constrained","contentSize":"100%"}} -->
<header class="wp-block-group alignfull coworking-office-header has-fourth-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0px;padding-right:15px;padding-bottom:0px;padding-left:15px"><!-- wp:columns {"className":"menu-margin","style":{"spacing":{"padding":{"left":"0","right":"0","top":"0px","bottom":"0px"},"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"0","left":"0"}},"border":{"radius":{"topLeft":"0px","topRight":"0px","bottomLeft":"0px","bottomRight":"0px"}}}} -->
<div class="wp-block-columns menu-margin" style="border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;margin-top:0;margin-bottom:0;padding-top:0px;padding-right:0;padding-bottom:0px;padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"80%","className":"header-menu"} -->
<div class="wp-block-column is-vertically-aligned-center header-menu" style="flex-basis:80%"><!-- wp:navigation {"textColor":"black","icon":"menu","metadata":{"ignoredHookedBlocks":["woocommerce/customer-account","woocommerce/mini-cart"]},"className":"coworking-office-main-navigation","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontFamily":"worksans","layout":{"type":"flex","justifyContent":"left"}} -->
<!-- wp:navigation-link {"label":"<?php esc_html_e('Home', 'coworking-office'); ?>","url":"<?php echo esc_url('#'); ?>","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"<?php esc_html_e('Pages', 'coworking-office'); ?>","url":"<?php echo esc_url('#'); ?>","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"<?php esc_html_e('Services', 'coworking-office'); ?>","url":"<?php echo esc_url('#'); ?>","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"<?php esc_html_e('Portfolio', 'coworking-office'); ?>","url":"<?php echo esc_url('#'); ?>","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"<?php esc_html_e('Blogs', 'coworking-office'); ?>","url":"<?php echo esc_url('#'); ?>","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"<?php esc_html_e('Contact Us', 'coworking-office'); ?>","url":"<?php echo esc_url('#'); ?>","kind":"custom","isTopLevelLink":true} /-->
<!-- /wp:navigation -->
</div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"20%","className":"header-btns"} -->
<div class="wp-block-column is-vertically-aligned-center header-btns" style="flex-basis:20%"><!-- wp:group {"className":"cart-detail","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-group cart-detail"><!-- wp:buttons {"className":"coworking-office-header-cta","style":{"border":{"radius":{"topLeft":"30px","topRight":"30px","bottomLeft":"30px","bottomRight":"30px"}}},"backgroundColor":"primary","fontFamily":"inter","layout":{"type":"flex","justifyContent":"right","flexWrap":"nowrap"}} -->
<div class="wp-block-buttons coworking-office-header-cta has-primary-background-color has-background has-worksans-font-family" style="border-top-left-radius:30px;border-top-right-radius:30px;border-bottom-left-radius:30px;border-bottom-right-radius:30px"><!-- wp:button {"textColor":"background","className":"header-btn","style":{"typography":{"letterSpacing":"0.5px","fontStyle":"normal","fontWeight":"600","textTransform":"capitalize"},"spacing":{"padding":{"left":"15px","right":"15px","top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}},"fontSize":"medium","fontFamily":"worksans"} -->
<div class="wp-block-button header-btn"><a class="wp-block-button__link has-background-color has-text-color has-worksans-font-family has-medium-font-size has-custom-font-size wp-element-button" style="padding-top:var(--wp--preset--spacing--x-small);padding-right:15px;padding-bottom:var(--wp--preset--spacing--x-small);padding-left:15px;font-style:normal;font-weight:600;letter-spacing:0.5px;text-transform:capitalize">Appointment Now<i class="fas fa-calendar-alt"></i></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></header>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->