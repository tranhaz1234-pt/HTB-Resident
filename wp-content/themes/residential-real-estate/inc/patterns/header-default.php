<?php 
/**
 * Default Header
 */
return array(
	'title'      => esc_html__( 'Default Header', 'residential-real-estate' ),
	'categories' => array( 'residential-real-estate', 'header' ),
	'content'    => '<!-- wp:group {"className":"header-wrap","layout":{"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-group header-wrap"><!-- wp:columns {"className":"header-boxes","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|40","right":"var:preset|spacing|20"},"blockGap":{"top":"15px","left":"15px"}},"border":{"radius":{"topLeft":"60px","topRight":"60px","bottomLeft":"60px","bottomRight":"60px"}}},"backgroundColor":"foreground"} -->
<div class="wp-block-columns header-boxes has-foreground-background-color has-background" style="border-top-left-radius:60px;border-top-right-radius:60px;border-bottom-left-radius:60px;border-bottom-right-radius:60px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--40)"><!-- wp:column {"verticalAlignment":"center","width":"20%","className":"header-logo-box"} -->
<div class="wp-block-column is-vertically-aligned-center header-logo-box" style="flex-basis:20%"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"width":80,"shouldSyncIcon":true} /-->

<!-- wp:site-title {"level":0,"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontSize":"26px","fontStyle":"normal","fontWeight":"400"}},"textColor":"primary","fontFamily":"residential-real-estate-playfair-display"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"60%","className":"header-mid-box"} -->
<div class="wp-block-column is-vertically-aligned-center header-mid-box" style="flex-basis:60%"><!-- wp:navigation {"textColor":"primary","metadata":{"ignoredHookedBlocks":["woocommerce/customer-account"]},"style":{"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"capitalize"}},"fontFamily":"residential-real-estate-poppins","layout":{"type":"flex","justifyContent":"center"}} --><!-- wp:navigation-link {"label":"Home","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"About Us","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Blog","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Contact Us","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Buy Now","type":"link","opensInNewTab":true,"url":"' . esc_url( RESIDENTIAL_REAL_ESTATE_BUY_NOW ) . '","kind":"custom","className":"buy-now-button"} /-->
<!-- /wp:navigation --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"20%","className":"header-btn-box"} -->
<div class="wp-block-column is-vertically-aligned-center header-btn-box" style="flex-basis:20%"><!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"14px","left":"14px"}}},"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":{"topLeft":"35px","topRight":"35px","bottomLeft":"35px","bottomRight":"35px"}},"color":{"background":"var(\u002d\u002dwp\u002d\u002dpreset\u002d\u002dcolor\u002d\u002dextra-secondary)"},"typography":{"fontSize":"15px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"500"},"spacing":{"padding":{"top":"10px","bottom":"10px"}}},"fontFamily":"residential-real-estate-poppins"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background has-residential-real-estate-poppins-font-family has-custom-font-size wp-element-button" href="#" style="border-top-left-radius:35px;border-top-right-radius:35px;border-bottom-left-radius:35px;border-bottom-right-radius:35px;background-color:var(--wp--preset--color--extra-secondary);padding-top:10px;padding-bottom:10px;font-size:15px;font-style:normal;font-weight:500;text-transform:capitalize">'. esc_html__('Book Now','residential-real-estate').'</a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"extra-primary","className":"header-open-btn","style":{"border":{"radius":{"topLeft":"35px","topRight":"35px","bottomLeft":"35px","bottomRight":"35px"}},"typography":{"fontSize":"15px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"500"},"spacing":{"padding":{"left":"10px","right":"10px","top":"10px","bottom":"10px"}}},"fontFamily":"residential-real-estate-poppins"} -->
<div class="wp-block-button header-open-btn"><a class="wp-block-button__link has-extra-primary-background-color has-background has-residential-real-estate-poppins-font-family has-custom-font-size wp-element-button" style="border-top-left-radius:35px;border-top-right-radius:35px;border-bottom-left-radius:35px;border-bottom-right-radius:35px;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;font-size:15px;font-style:normal;font-weight:500;text-transform:capitalize"><img class="wp-image-104" style="width: 72px;" src="' . esc_url( get_theme_file_uri( '/assets/images/toggle.png' ) ) . '" alt=""></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"className":"header-info","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","right":"var:preset|spacing|40","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}}},"backgroundColor":"extra-secondary","layout":{"type":"default"}} -->
<div class="wp-block-group header-info has-extra-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:image {"lightbox":{"enabled":false},"id":107,"width":"auto","height":"40px","sizeSlug":"large","linkDestination":"custom","className":"header-close-btn"} -->
<figure class="wp-block-image size-large is-resized header-close-btn"><a href="#"><img src="' . esc_url( get_theme_file_uri( '/assets/images/close-btn.png' ) ) . '" alt="" class="wp-image-107" style="width:auto;height:40px"/></a></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground"} -->
<p class="has-foreground-color has-text-color has-link-color">'. esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','residential-real-estate').'</p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#ffffff","openInNewTab":true,"className":"is-style-logos-only header-social-box","style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":{"top":"10px","left":"10px"}}}} -->
<ul class="wp-block-social-links has-icon-color is-style-logos-only header-social-box" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)"><!-- wp:social-link {"url":"www.facebook.com","service":"facebook"} /-->

<!-- wp:social-link {"url":"www.x.com","service":"x"} /-->

<!-- wp:social-link {"url":"www.instagram.com","service":"instagram"} /-->

<!-- wp:social-link {"url":"www.linkedin.com","service":"linkedin"} /-->

<!-- wp:social-link {"url":"www.pinterest.com","service":"pinterest"} /--></ul>
<!-- /wp:social-links -->

<!-- wp:columns {"verticalAlignment":"center","className":"header-phone-box","style":{"spacing":{"blockGap":{"left":"14px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center header-phone-box"><!-- wp:column {"verticalAlignment":"center","width":"10%","className":"header-phone-icon"} -->
<div class="wp-block-column is-vertically-aligned-center header-phone-icon" style="flex-basis:10%"><!-- wp:image {"id":122,"width":"auto","height":"25px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . esc_url( get_theme_file_uri( '/assets/images/phone.png' ) ) . '" alt="" class="wp-image-122" style="width:auto;height:25px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"90%","className":"header-phone-info"} -->
<div class="wp-block-column is-vertically-aligned-center header-phone-info" style="flex-basis:90%"><!-- wp:paragraph {"className":"header-phone-text","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}},"typography":{"fontSize":"17px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"600"}},"textColor":"foreground"} -->
<p class="header-phone-text has-foreground-color has-text-color has-link-color" style="font-size:17px;font-style:normal;font-weight:600;text-transform:capitalize">'. esc_html__('contact us','residential-real-estate').'</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"header-phone-num","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}},"typography":{"fontSize":"14px"},"spacing":{"margin":{"top":"0px"}}},"textColor":"foreground"} -->
<p class="header-phone-num has-foreground-color has-text-color has-link-color" style="margin-top:0px;font-size:14px"><a href="tel:0987654321">'. esc_html__('0987654321','residential-real-estate').'</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":"center","className":"header-mail-box","style":{"spacing":{"blockGap":{"left":"14px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center header-mail-box"><!-- wp:column {"verticalAlignment":"center","width":"10%","className":"header-mail-icon"} -->
<div class="wp-block-column is-vertically-aligned-center header-mail-icon" style="flex-basis:10%"><!-- wp:image {"id":132,"width":"auto","height":"25px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . esc_url( get_theme_file_uri( '/assets/images/mail.png' ) ) . '" alt="" class="wp-image-132" style="width:auto;height:25px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"90%","className":"header-mail-info"} -->
<div class="wp-block-column is-vertically-aligned-center header-mail-info" style="flex-basis:90%"><!-- wp:paragraph {"className":"header-mail-text","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}},"typography":{"fontSize":"17px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"600"}},"textColor":"foreground"} -->
<p class="header-mail-text has-foreground-color has-text-color has-link-color" style="font-size:17px;font-style:normal;font-weight:600;text-transform:capitalize">'. esc_html__('email ','residential-real-estate').'</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"header-mail","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}},"typography":{"fontSize":"14px"},"spacing":{"margin":{"top":"0px"}}},"textColor":"foreground"} -->
<p class="header-mail has-foreground-color has-text-color has-link-color" style="margin-top:0px;font-size:14px"><a href="mailto:support@example.com">'. esc_html__('support@example.com','residential-real-estate').'</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
);