<?php
$elletta_theme_title = get_bloginfo( 'name' );
$elletta_header_javascript = get_theme_mod('header_javascript');
if( get_theme_mod('logo_text') ) :
    $elletta_logo_text = get_theme_mod('logo_text');
else :
    $elletta_logo_text = $elletta_theme_title;
endif;

if(wp_is_mobile()){
  $elletta_mobile_class = "mobile-device";
}
else {
  $elletta_mobile_class = "no-mobile-device";
}

?>
<!DOCTYPE html>
<!--[if IE 9]><html class="ie9 <?php echo esc_attr($elletta_mobile_class); ?>" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="<?php echo esc_attr($elletta_mobile_class); ?>" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
                
        <?php wp_head(); ?>
</head>
    <?php if($elletta_header_javascript) : ?>
            <?php wp_add_inline_script( 'elletta_scripts', esc_js($elletta_header_javascript), 'after' ); ?>
    <?php endif; ?>
<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <div id="wrapper">
        <?php get_template_part( 'templates/' . get_theme_mod('header_style') ); ?>


            
        
