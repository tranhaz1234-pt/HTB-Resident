<?php 
/**
 * Default Properties Section
 */
return array(
	'title'      => esc_html__( 'Properties Section', 'residential-real-estate' ),
	'categories' => array( 'residential-real-estate', 'Properties Section' ),
	'content'    => '<!-- wp:group {"className":"places-section","backgroundColor":"extra-tertiary","layout":{"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-group places-section has-extra-tertiary-background-color has-background"><!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"center","level":3,"className":"places-sub-title","style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"500","letterSpacing":"2px","textTransform":"capitalize"},"color":{"text":"var(\u002d\u002dwp\u002d\u002dpreset\u002d\u002dcolor\u002d\u002dextra-primary)"},"elements":{"link":{"color":{"text":"var(\u002d\u002dwp\u002d\u002dpreset\u002d\u002dcolor\u002d\u002dextra-primary)"}}}},"fontFamily":"residential-real-estate-poppins"} -->
<h3 class="wp-block-heading has-text-align-center places-sub-title has-text-color has-link-color has-residential-real-estate-poppins-font-family" style="color:var(--wp--preset--color--extra-primary);font-size:20px;font-style:normal;font-weight:500;letter-spacing:2px;text-transform:capitalize">'. esc_html__('best places','residential-real-estate').'</h3>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","className":"places-title","style":{"typography":{"fontSize":"40px","lineHeight":"1.3","textTransform":"capitalize"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"spacing":{"margin":{"top":"8px"}}},"textColor":"primary","fontFamily":"residential-real-estate-playfair-display"} -->
<h2 class="wp-block-heading has-text-align-center places-title has-primary-color has-text-color has-link-color has-residential-real-estate-playfair-display-font-family" style="margin-top:8px;font-size:40px;line-height:1.3;text-transform:capitalize">'. esc_html__('popular real estate','residential-real-estate').'</h2>
<!-- /wp:heading -->

<!-- wp:columns {"className":"places-boxes","style":{"spacing":{"margin":{"top":"var:preset|spacing|70"}}}} -->
<div class="wp-block-columns places-boxes" style="margin-top:var(--wp--preset--spacing--70)"><!-- wp:column {"className":"places-card","style":{"border":{"radius":{"topLeft":"25px","topRight":"25px","bottomLeft":"25px","bottomRight":"25px"}},"spacing":{"padding":{"top":"30px","bottom":"15px","left":"15px","right":"15px"}}},"backgroundColor":"foreground"} -->
<div class="wp-block-column places-card has-foreground-background-color has-background" style="border-top-left-radius:25px;border-top-right-radius:25px;border-bottom-left-radius:25px;border-bottom-right-radius:25px;padding-top:30px;padding-right:15px;padding-bottom:15px;padding-left:15px"><!-- wp:group {"className":"place-title-box","style":{"border":{"bottom":{"color":"#b7b7b7","width":"1px"}},"spacing":{"padding":{"bottom":"var:preset|spacing|50"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group place-title-box" style="border-bottom-color:#b7b7b7;border-bottom-width:1px;padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:heading {"level":3,"className":"place-card-title","style":{"typography":{"fontSize":"22px","textTransform":"capitalize","lineHeight":"1.2"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background"} -->
<h3 class="wp-block-heading place-card-title has-background-color has-text-color has-link-color" style="font-size:22px;line-height:1.2;text-transform:capitalize">'. esc_html__('civita di bagnoregio','residential-real-estate').'</h3>
<!-- /wp:heading -->

<!-- wp:buttons {"className":"place-btn"} -->
<div class="wp-block-buttons place-btn"><!-- wp:button {"backgroundColor":"extra-tertiary","textColor":"background","style":{"spacing":{"padding":{"left":"10px","right":"10px","top":"10px","bottom":"10px"}},"border":{"radius":{"topLeft":"50%","topRight":"50%","bottomLeft":"50%","bottomRight":"50%"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background-color has-extra-tertiary-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-top-left-radius:50%;border-top-right-radius:50%;border-bottom-left-radius:50%;border-bottom-right-radius:50%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><span class="dashicons dashicons-arrow-right-alt"></span></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"places-text","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background"} -->
<p class="places-text has-background-color has-text-color has-link-color">'. esc_html__('we are more than just real estate advisors we are long-term partners in your property','residential-real-estate').'</p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":65,"width":"auto","height":"300px","sizeSlug":"full","linkDestination":"none","className":"place-img","style":{"border":{"radius":{"topLeft":"20px","topRight":"20px","bottomLeft":"20px","bottomRight":"20px"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border place-img"><img src="' . esc_url( get_theme_file_uri( '/assets/images/place-1.png' ) ) . '" alt="" class="wp-image-65" style="border-top-left-radius:20px;border-top-right-radius:20px;border-bottom-left-radius:20px;border-bottom-right-radius:20px;width:auto;height:300px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"places-card","style":{"border":{"radius":{"topLeft":"25px","topRight":"25px","bottomLeft":"25px","bottomRight":"25px"}},"spacing":{"padding":{"top":"30px","bottom":"15px","left":"15px","right":"15px"}}},"backgroundColor":"foreground"} -->
<div class="wp-block-column places-card has-foreground-background-color has-background" style="border-top-left-radius:25px;border-top-right-radius:25px;border-bottom-left-radius:25px;border-bottom-right-radius:25px;padding-top:30px;padding-right:15px;padding-bottom:15px;padding-left:15px"><!-- wp:group {"className":"place-title-box","style":{"border":{"bottom":{"color":"#b7b7b7","width":"1px"}},"spacing":{"padding":{"bottom":"var:preset|spacing|50"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group place-title-box" style="border-bottom-color:#b7b7b7;border-bottom-width:1px;padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:heading {"level":3,"className":"place-card-title","style":{"typography":{"fontSize":"22px","textTransform":"capitalize","lineHeight":"1.2"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background"} -->
<h3 class="wp-block-heading place-card-title has-background-color has-text-color has-link-color" style="font-size:22px;line-height:1.2;text-transform:capitalize">'. esc_html__('fort conger island','residential-real-estate').'</h3>
<!-- /wp:heading -->

<!-- wp:buttons {"className":"place-btn"} -->
<div class="wp-block-buttons place-btn"><!-- wp:button {"backgroundColor":"extra-tertiary","textColor":"background","style":{"spacing":{"padding":{"left":"10px","right":"10px","top":"10px","bottom":"10px"}},"border":{"radius":{"topLeft":"50%","topRight":"50%","bottomLeft":"50%","bottomRight":"50%"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background-color has-extra-tertiary-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-top-left-radius:50%;border-top-right-radius:50%;border-bottom-left-radius:50%;border-bottom-right-radius:50%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><span class="dashicons dashicons-arrow-right-alt"></span></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"places-text","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background"} -->
<p class="places-text has-background-color has-text-color has-link-color">'. esc_html__('we are more than just real estate advisors we are long-term partners in your property','residential-real-estate').'</p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":88,"width":"auto","height":"300px","sizeSlug":"full","linkDestination":"none","className":"place-img","style":{"border":{"radius":{"topLeft":"20px","topRight":"20px","bottomLeft":"20px","bottomRight":"20px"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border place-img"><img src="' . esc_url( get_theme_file_uri( '/assets/images/place-2.png' ) ) . '" alt="" class="wp-image-88" style="border-top-left-radius:20px;border-top-right-radius:20px;border-bottom-left-radius:20px;border-bottom-right-radius:20px;width:auto;height:300px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"places-card","style":{"border":{"radius":{"topLeft":"25px","topRight":"25px","bottomLeft":"25px","bottomRight":"25px"}},"spacing":{"padding":{"top":"30px","bottom":"15px","left":"15px","right":"15px"}}},"backgroundColor":"foreground"} -->
<div class="wp-block-column places-card has-foreground-background-color has-background" style="border-top-left-radius:25px;border-top-right-radius:25px;border-bottom-left-radius:25px;border-bottom-right-radius:25px;padding-top:30px;padding-right:15px;padding-bottom:15px;padding-left:15px"><!-- wp:group {"className":"place-title-box","style":{"border":{"bottom":{"color":"#b7b7b7","width":"1px"}},"spacing":{"padding":{"bottom":"var:preset|spacing|50"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group place-title-box" style="border-bottom-color:#b7b7b7;border-bottom-width:1px;padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:heading {"level":3,"className":"place-card-title","style":{"typography":{"fontSize":"22px","textTransform":"capitalize","lineHeight":"1.2"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background"} -->
<h3 class="wp-block-heading place-card-title has-background-color has-text-color has-link-color" style="font-size:22px;line-height:1.2;text-transform:capitalize">'. esc_html__('barcelona city beach','residential-real-estate').'</h3>
<!-- /wp:heading -->

<!-- wp:buttons {"className":"place-btn"} -->
<div class="wp-block-buttons place-btn"><!-- wp:button {"backgroundColor":"extra-tertiary","textColor":"background","style":{"spacing":{"padding":{"left":"10px","right":"10px","top":"10px","bottom":"10px"}},"border":{"radius":{"topLeft":"50%","topRight":"50%","bottomLeft":"50%","bottomRight":"50%"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background-color has-extra-tertiary-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-top-left-radius:50%;border-top-right-radius:50%;border-bottom-left-radius:50%;border-bottom-right-radius:50%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><span class="dashicons dashicons-arrow-right-alt"></span></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"places-text","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background"} -->
<p class="places-text has-background-color has-text-color has-link-color">'. esc_html__('we are more than just real estate advisors we are long-term partners in your property','residential-real-estate').'</p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":89,"width":"auto","height":"300px","sizeSlug":"full","linkDestination":"none","className":"place-img","style":{"border":{"radius":{"topLeft":"20px","topRight":"20px","bottomLeft":"20px","bottomRight":"20px"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border place-img"><img src="' . esc_url( get_theme_file_uri( '/assets/images/place-3.png' ) ) . '" alt="" class="wp-image-89" style="border-top-left-radius:20px;border-top-right-radius:20px;border-bottom-left-radius:20px;border-bottom-right-radius:20px;width:auto;height:300px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->',
);