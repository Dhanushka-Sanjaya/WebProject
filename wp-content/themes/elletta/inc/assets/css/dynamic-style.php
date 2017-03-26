<?php
//header
$image_background_header = get_theme_mod('image_background_header');

$primary_menu_font_size = get_theme_mod('primary_menu_font_size');
$primary_submenu_font_size = get_theme_mod('primary_submenu_font_size');
$primary_menu_background_color = get_theme_mod('primary_menu_background_color');
$primary_menu_text_color = get_theme_mod('primary_menu_text_color');
$primary_menu_text_color_hover = get_theme_mod('primary_menu_text_color_hover');
$primary_menu_submenu_background_color = get_theme_mod('primary_menu_submenu_background_color');
$primary_menu_submenu_text_color = get_theme_mod('primary_menu_submenu_text_color');
$primary_menu_submenu_text_color_hover = get_theme_mod('primary_menu_submenu_text_color_hover');

$secondary_menu_font_size = get_theme_mod('secondary_menu_font_size');
$secondary_submenu_font_size = get_theme_mod('secondary_submenu_font_size');
$secondary_menu_background_color = get_theme_mod('secondary_menu_background_color');
$secondary_menu_text_color = get_theme_mod('secondary_menu_text_color');
$secondary_menu_text_color_hover = get_theme_mod('secondary_menu_text_color_hover');
$secondary_menu_submenu_background_color = get_theme_mod('secondary_menu_submenu_background_color');
$secondary_menu_submenu_text_color = get_theme_mod('secondary_menu_submenu_text_color');
$secondary_menu_submenu_text_color_hover = get_theme_mod('secondary_menu_submenu_text_color_hover');

$mobile_menu_font_size = get_theme_mod('mobile_menu_font_size');
$mobile_submenu_font_size = get_theme_mod('mobile_submenu_font_size');
$mobile_menu_background_color = get_theme_mod('mobile_menu_background_color');
$mobile_menu_text_color = get_theme_mod('mobile_menu_text_color');
$mobile_menu_text_color_hover = get_theme_mod('mobile_menu_text_color_hover');
$mobile_menu_submenu_text_color = get_theme_mod('mobile_submenu_text_color');
$mobile_menu_submenu_text_color_hover = get_theme_mod('mobile_submenu_text_color_hover');

$footer_newsletter_bg_image = get_theme_mod('footer_newsletter_bg_image');
$footer_background_color = get_theme_mod('footer_background_color');
$footer_font_color = get_theme_mod('footer_font_color');
$footer_title_font_color = get_theme_mod('footer_title_font_color');
$footer_newsletter_text_color = get_theme_mod('footer_newsletter_text_color');
//fonts size
$title_slider_font_size = get_theme_mod('title_slider_font_size');
$title_featured_font_size = get_theme_mod('title_featured_font_size');
$body_font_size = get_theme_mod('body_font_size');
$title_post_font_size = get_theme_mod('title_post_font_size');
$title_list_font_size = get_theme_mod('title_list_font_size');
$title_widget_font_size = get_theme_mod('title_widget_font_size');
//fonts family
$title_font = explode(':', get_theme_mod('title_font'));
$body_font = explode(':', get_theme_mod('body_font'));
$header_font = explode(':', get_theme_mod('header_font'));
$title_font = str_replace('+', ' ', $title_font[0]);
$body_font = str_replace('+', ' ', $body_font[0]);
$header_font = str_replace('+', ' ', $header_font[0]);
$title_font_weight = get_theme_mod('title_font_weight');
$body_font_weight = get_theme_mod('body_font_weight');
$header_font_weight = get_theme_mod('header_font_weight');
//colors
$body_background_color = get_theme_mod('body_background_color');
$body_text_color = get_theme_mod('body_text_color');
$title_text_color = get_theme_mod('title_text_color');
$title_widget_text_color = get_theme_mod('title_widget_text_color');
$link_text_color = get_theme_mod('link_text_color');
$link_hover_text_color = get_theme_mod('link_hover_text_color');
$button_read_more_color = get_theme_mod('button_read_more_color');
$button_read_more_text_color = get_theme_mod('button_read_more_text_color');
$other_buttons_color = get_theme_mod('other_buttons_color');
$other_buttons_text_color = get_theme_mod('other_buttons_text_color');
$tags_categories_color = get_theme_mod('tags_categories_color');
$tags_categories_text_color = get_theme_mod('tags_categories_text_color');
$comments_background_color = get_theme_mod('comments_background_color');
$logo_text_color = get_theme_mod('logo_text_color');
//slider
$height_slider = get_theme_mod( 'height_slider' );

if(strcasecmp($logo_text_color, $elletta_customizer_defaults['logo_text_color']) != 0 ) : ?>
#logo h3 { color: <?php echo esc_url($logo_text_color); ?>; }
<?php endif; 
if($image_background_header) : ?>
header { background-image: url('<?php echo esc_url($image_background_header); ?>'); }
<?php endif; 
if ( strcasecmp($primary_menu_background_color, $elletta_customizer_defaults['primary_menu_background_color']) != 0 ) : ?>
.main-navigation-wrapper.header-1, .main-navigation-wrapper.header-2, .main-navigation-wrapper.header-4, .sticky-navigation-wrapper { background: <?php echo esc_attr($primary_menu_background_color); ?>; }
<?php endif; ?>
<?php if ( strcasecmp($secondary_menu_background_color, $elletta_customizer_defaults['secondary_menu_background_color']) != 0 ) : ?>
.secondary-navigation-wrapper.header-2, .secondary-navigation-wrapper.header-3, .secondary-navigation-wrapper.header-4 { background: <?php echo esc_attr($secondary_menu_background_color); ?>; }
<?php endif; ?>
<?php if ( strcasecmp($mobile_menu_background_color, $elletta_customizer_defaults['mobile_menu_background_color']) != 0 ) : ?>
#sidebar-nav.header-2, #sidebar-nav.header-3, #sidebar-nav.header-4 { background: <?php echo esc_attr($mobile_menu_background_color); ?>; }
<?php endif; ?>
<?php if ( strcasecmp ($primary_menu_text_color, $elletta_customizer_defaults['primary_menu_text_color']) != 0 ) : ?>
.main-navigation-wrapper .nav-menu > li > a, .main-navigation-wrapper .top-social-items a, .main-navigation-wrapper .top-search-area a, .main-navigation-wrapper .button-menu-mobile, .sticky-navigation-wrapper .nav-menu > li > a, .sticky-navigation-wrapper .top-social-items a, .sticky-navigation-wrapper .button-menu-mobile, .mobile-search-area a:hover, #mobile-social-items a { color: <?php echo esc_attr($primary_menu_text_color); ?>; }
 .mobile-search-area a:hover, #mobile-social-items a { color: <?php echo esc_attr($primary_menu_text_color); ?>; }
.slicknav_menu .slicknav_icon-bar { background-color: <?php echo esc_attr($primary_menu_text_color); ?>; }
<?php endif; ?>
<?php if ( strcasecmp ($secondary_menu_text_color, $elletta_customizer_defaults['secondary_menu_text_color']) != 0 ) : ?>
.secondary-navigation-wrapper .nav-menu > li > a, .top-social-items a, .secondary-navigation-wrapper .top-search-area a { color: <?php echo esc_attr($secondary_menu_text_color); ?>; }
<?php endif; ?>
<?php if ( strcasecmp ($mobile_menu_text_color, $elletta_customizer_defaults['mobile_menu_text_color']) != 0 ) : ?>
#sidebar-nav .sidebar-menu li a .indicator, #sidebar-nav .sidebar-menu > li > a { color: <?php echo esc_attr($mobile_menu_text_color); ?>; }
<?php endif; ?>

<?php if ( strcasecmp ($primary_menu_background_color, $elletta_customizer_defaults['primary_menu_background_color']) != 0 || strcasecmp ($primary_menu_text_color, $elletta_customizer_defaults['primary_menu_text_color']) != 0 || strcasecmp ($primary_menu_text_color_hover, $elletta_customizer_defaults['primary_menu_text_color_hover']) != 0) : ?>
.main-navigation-wrapper .top-search-area a i, .sticky-navigation-wrapper .top-search-area a i, .mobile-search-area a i{
        <?php if ( strcasecmp ($primary_menu_text_color, $elletta_customizer_defaults['primary_menu_text_color']) != 0 ) : ?>
        background: <?php echo esc_attr($primary_menu_text_color); ?>;
        <?php endif; ?>
        <?php if ( strcasecmp ($primary_menu_background_color, $elletta_customizer_defaults['primary_menu_background_color']) != 0 ) : ?>
        color: <?php echo esc_attr($primary_menu_background_color); ?>;
        <?php endif; ?>
}
.main-navigation-wrapper .top-search-area a:hover i, .sticky-navigation-wrapper .top-search-area a:hover i, .mobile-search-area a:hover i{
        <?php if ( strcasecmp ($primary_menu_text_color_hover, $elletta_customizer_defaults['primary_menu_text_color_hover']) != 0 ) : ?>
        background: <?php echo esc_attr($primary_menu_text_color_hover); ?>;
        <?php endif; ?>
        <?php if ( strcasecmp ($primary_menu_text_color, $elletta_customizer_defaults['primary_menu_text_color']) != 0 ) : ?>
        color: <?php echo esc_attr($primary_menu_text_color); ?>;
        <?php endif; ?>
}
<?php endif; ?>
<?php if ( strcasecmp ($secondary_menu_background_color, $elletta_customizer_defaults['secondary_menu_background_color']) != 0 || strcasecmp ($secondary_menu_text_color, $elletta_customizer_defaults['secondary_menu_text_color']) != 0 || strcasecmp ($secondary_menu_text_color_hover, $elletta_customizer_defaults['secondary_menu_text_color_hover']) != 0) : ?>
.secondary-navigation-wrapper .top-search-area a i{
        <?php if ( strcasecmp ($secondary_menu_text_color, $elletta_customizer_defaults['secondary_menu_text_color']) != 0 ) : ?>
        background: <?php echo esc_attr($secondary_menu_text_color); ?>;
        <?php endif; ?>
        <?php if ( strcasecmp ($secondary_menu_background_color, $elletta_customizer_defaults['secondary_menu_background_color']) != 0 ) : ?>
        color: <?php echo esc_attr($secondary_menu_background_color); ?>;
        <?php endif; ?>
}
.secondary-navigation-wrapper .top-search-area a:hover i{
        <?php if ( strcasecmp ($secondary_menu_text_color_hover, $elletta_customizer_defaults['secondary_menu_text_color_hover']) != 0 ) : ?>
        background: <?php echo esc_attr($secondary_menu_text_color_hover); ?>;
        <?php endif; ?>
        <?php if ( strcasecmp ($secondary_menu_text_color, $elletta_customizer_defaults['secondary_menu_text_color']) != 0 ) : ?>
        color: <?php echo esc_attr($secondary_menu_text_color); ?>;
        <?php endif; ?>
}
<?php endif; ?>
<?php if ( strcasecmp ($primary_menu_text_color_hover, $elletta_customizer_defaults['primary_menu_text_color_hover']) != 0 ) : ?>
.sticky-navigation-wrapper .top-social-items a:hover, .main-navigation .nav-menu > li > a:hover, .main-navigation .nav-menu > li.current_page_item > a, .main-navigation .nav-menu > li.current_page_ancestor > a, .main-navigation .nav-menu > li.current-menu-item > a, .main-navigation .nav-menu > li:hover > a, .main-navigation-wrapper.header-1 .top-social-items a:hover, .main-navigation-wrapper .button-menu-mobile:hover, .mobile-search-area a, #mobile-social-items a:hover { color: <?php echo esc_attr($primary_menu_text_color_hover); ?>; }
.shop-icon-count, .main-navigation .nav-menu > li.current_page_item > a:after, .main-navigation .nav-menu li.current-menu-item > a:after { background: <?php echo esc_attr($primary_menu_text_color_hover); ?>;}
<?php endif; ?>
<?php if ( strcasecmp ($secondary_menu_text_color_hover, $elletta_customizer_defaults['secondary_menu_text_color_hover']) != 0 ) : ?>
.secondary-navigation .nav-menu > li > a:hover, .secondary-navigation .nav-menu > li.current_page_item > a, .secondary-navigation .nav-menu > li.current_page_ancestor > a, .secondary-navigation .nav-menu > li.current-menu-item > a, .secondary-navigation .nav-menu > li:hover > a, .secondary-navigation-wrapper .top-social-items a:hover { color: <?php echo esc_attr($secondary_menu_text_color_hover); ?>; }
<?php endif; ?>
<?php if ( strcasecmp ($mobile_menu_text_color_hover, $elletta_customizer_defaults['mobile_menu_text_color_hover']) != 0 ) : ?>
#sidebar-nav .sidebar-menu > li > a:hover, #sidebar-nav .sidebar-menu li a:hover .indicator, #sidebar-nav .sidebar-menu .sub-menu li a:hover .indicator { color: <?php echo esc_attr($mobile_menu_text_color_hover); ?>; }
<?php endif; ?>
<?php if ( strcasecmp ($primary_menu_submenu_background_color, $elletta_customizer_defaults['primary_menu_submenu_background_color']) != 0 ) : ?>
.main-navigation .nav-menu .sub-menu, .main-navigation .nav-menu .children {  background: <?php echo esc_attr($primary_menu_submenu_background_color); ?>; }
<?php endif; ?>
<?php if ( strcasecmp ($secondary_menu_submenu_background_color, $elletta_customizer_defaults['secondary_menu_submenu_background_color']) != 0 ) : ?>
.secondary-navigation .nav-menu .sub-menu, .secondary-navigation .nav-menu .children {  background: <?php echo esc_attr($secondary_menu_submenu_background_color); ?>; }
<?php endif; ?>
<?php if ( strcasecmp ($primary_menu_submenu_text_color, $elletta_customizer_defaults['primary_menu_submenu_text_color']) != 0 ) : ?>
.main-navigation .nav-menu .sub-menu a { color: <?php echo esc_attr($primary_menu_submenu_text_color); ?>; }
<?php endif; ?>
<?php if ( strcasecmp ($secondary_menu_submenu_text_color, $elletta_customizer_defaults['secondary_menu_submenu_text_color']) != 0 ) : ?>
.secondary-navigation .nav-menu .sub-menu a { color: <?php echo esc_attr($secondary_menu_submenu_text_color); ?>; }
<?php endif; ?>
<?php if ( strcasecmp ($mobile_menu_submenu_text_color, $elletta_customizer_defaults['mobile_submenu_text_color']) != 0 ) : ?>
#sidebar-nav .sidebar-menu .sub-menu a { color: <?php echo esc_attr($mobile_menu_submenu_text_color); ?>; }
<?php endif; ?>
<?php if ( strcasecmp ($primary_menu_submenu_text_color_hover, $elletta_customizer_defaults['primary_menu_submenu_text_color_hover']) != 0 ) : ?>
.main-navigation .nav-menu .sub-menu a:hover { color: <?php echo esc_attr($primary_menu_submenu_text_color_hover); ?>; }
<?php endif; ?>
<?php if ( strcasecmp ($secondary_menu_submenu_text_color_hover, $elletta_customizer_defaults['secondary_menu_submenu_text_color_hover']) != 0 ) : ?>
.secondary-navigation .nav-menu .sub-menu a:hover { color: <?php echo esc_attr($secondary_menu_submenu_text_color_hover); ?>; }
<?php endif; ?>
<?php if ( strcasecmp ($mobile_menu_submenu_text_color_hover, $elletta_customizer_defaults['mobile_submenu_text_color_hover']) != 0 ) : ?>
#sidebar-nav .sidebar-menu .sub-menu a:hover { color: <?php echo esc_attr($mobile_menu_submenu_text_color_hover); ?>; }
<?php endif; ?>
<?php if ($body_font) : ?>
body, blockquote p {font-family: "<?php echo esc_attr($body_font); ?>";}
<?php endif; ?>
<?php if ($title_font) : ?>
h1, h2, h3, h4, h5, h6, #alternate-widget-area p.clear, .widget.elletta_lastest_post_widget ul li {font-family: "<?php echo esc_attr($title_font); ?>";}
<?php endif; ?>
<?php if ($header_font) : ?>
.main-navigation .nav-menu > li > a, .main-navigation .nav-menu a, .secondary-navigation .nav-menu > li > a, .secondary-navigation .nav-menu a, .secondary-navigation .nav-menu > ul > li > a {font-family: "<?php echo esc_attr($header_font); ?>";}
<?php endif; ?>
<?php if ( strcasecmp ($body_font_weight, $elletta_customizer_defaults['body_font_weight']) != 0 ) : ?>
body, blockquote p {font-weight: <?php echo esc_attr($body_font_weight); ?>;}
<?php endif; ?>
<?php if ( strcasecmp ($title_font_weight, $elletta_customizer_defaults['title_font_weight']) != 0 ) : ?>
h1, h2, h3, h4, h5, h6, #alternate-widget-area p.clear, .widget.elletta_lastest_post_widget ul li {font-weight: <?php echo esc_attr($title_font_weight); ?>;}
<?php endif; ?>
<?php if ( strcasecmp ($header_font_weight, $elletta_customizer_defaults['header_font_weight']) != 0 ) : ?>
.main-navigation .nav-menu > li > a, .main-navigation .nav-menu a, .secondary-navigation .nav-menu > li > a, .secondary-navigation .nav-menu a, .secondary-navigation .nav-menu > ul > li > a {font-weight: <?php echo esc_attr($header_font_weight); ?>;}
<?php endif; ?>
<?php if($footer_newsletter_bg_image) : ?>
#footer-newsletter { background-image: url('<?php echo esc_url($footer_newsletter_bg_image); ?>'); }
<?php elseif ( strcasecmp ($footer_newsletter_background_color, $elletta_customizer_defaults['footer_newsletter_background_color']) != 0 ) : ?>
#footer-newsletter { background-color: <?php echo esc_attr($footer_newsletter_background_color); ?>; }
<?php endif; ?>
<?php if(strcasecmp ($footer_background_color, $elletta_customizer_defaults['footer_background_color']) != 0) : ?>
#footer-widget-area { background: <?php echo esc_attr($footer_background_color); ?>; }
<?php endif; ?>
<?php if(strcasecmp ($footer_newsletter_text_color, $elletta_customizer_defaults['footer_newsletter_text_color']) != 0) : ?>
#footer-newsletter, #footer-newsletter h2 { color: <?php echo esc_attr($footer_newsletter_text_color); ?>; }
<?php endif; ?>
<?php if(strcasecmp ($footer_title_font_color, $elletta_customizer_defaults['footer_title_font_color']) != 0) : ?>
#footer-widget-area .widget-title { color: <?php echo esc_attr($footer_title_font_color); ?>; }
<?php endif; ?>
<?php if(strcasecmp ($footer_font_color, $elletta_customizer_defaults['footer_font_color']) != 0) : ?>
#footer-widget-area, #footer-widget-area p { color: <?php echo esc_attr($footer_font_color); ?>; }
<?php endif; ?>
<?php if(strcasecmp ($primary_menu_font_size, $elletta_customizer_defaults['primary_menu_font_size']) != 0) : ?>
.main-navigation .nav-menu > li > a { font-size: <?php echo esc_attr($primary_menu_font_size); ?>px; }
<?php endif; ?>
<?php if(strcasecmp ($secondary_menu_font_size, $elletta_customizer_defaults['secondary_menu_font_size']) != 0) : ?>
.secondary-navigation .nav-menu > li > a { font-size: <?php echo esc_attr($secondary_menu_font_size); ?>px; }
<?php endif; ?>
<?php if(strcasecmp ($mobile_menu_font_size, $elletta_customizer_defaults['mobile_menu_font_size']) != 0) : ?>
#sidebar-nav .sidebar-menu > li > a { font-size: <?php echo esc_attr($mobile_menu_font_size); ?>px; }
<?php endif; ?>
<?php if(strcasecmp ($primary_submenu_font_size, $elletta_customizer_defaults['primary_submenu_font_size']) != 0) : ?>
.main-navigation .nav-menu .sub-menu a { font-size: <?php echo esc_attr($primary_submenu_font_size); ?>px; }
<?php endif; ?>
<?php if(strcasecmp ($secondary_submenu_font_size, $elletta_customizer_defaults['secondary_submenu_font_size']) != 0) : ?>
.secondary-navigation .nav-menu .sub-menu a { font-size: <?php echo esc_attr($secondary_submenu_font_size); ?>px; }
<?php endif; ?>
<?php if(strcasecmp ($mobile_submenu_font_size, $elletta_customizer_defaults['mobile_submenu_font_size']) != 0) : ?>
#sidebar-nav .sidebar-menu .sub-menu a { font-size: <?php echo esc_attr($mobile_submenu_font_size); ?>px; }
<?php endif; ?>
<?php if(strcasecmp ($title_slider_font_size, $elletta_customizer_defaults['title_slider_font_size']) != 0) : ?>
.featured-area[data-slider-type="slider"] .slider-item h2, .featured-area[data-slider-type="slider"] .slider-item h2 a { font-size: <?php echo esc_attr($title_slider_font_size); ?>px; }
<?php endif; ?>
<?php if(strcasecmp ($title_featured_font_size, $elletta_customizer_defaults['title_featured_font_size']) != 0) : ?>
.featured-posts h4 a { font-size: <?php echo esc_attr($title_featured_font_size); ?>px; }
<?php endif; ?>
<?php if(strcasecmp ($body_font_size, $elletta_customizer_defaults['body_font_size']) != 0) : ?>
body { font-size: <?php echo esc_attr($body_font_size); ?>px; }
<?php endif; ?>
<?php if(strcasecmp ($title_post_font_size, $elletta_customizer_defaults['title_post_font_size']) != 0) : ?>
.single .post-header h1 a, .single .post-header h1, .page .post-header h1 a, .page .post-header h1, .post-header h2 { font-size: <?php echo esc_attr($title_post_font_size); ?>px; }
<?php endif; ?>
<?php if(strcasecmp ($title_list_font_size, $elletta_customizer_defaults['title_list_font_size']) != 0) : ?>
.sidebar-open .list-layout .post-header h2 a, .grid-layout .post-item .item h2 a { font-size: <?php echo esc_attr($title_list_font_size); ?>px; }
.list-layout .post-list-text-content .post-header h2 a { font-size: <?php echo esc_attr($title_list_font_size+5); ?>px; }
<?php endif; ?>
<?php if(strcasecmp ($title_widget_font_size, $elletta_customizer_defaults['title_widget_font_size']) != 0) : ?>
.widget-title { font-size: <?php echo esc_attr($title_widget_font_size); ?>px; }
<?php endif; ?>
<?php if(strcasecmp ($body_background_color, $elletta_customizer_defaults['body_background_color']) != 0) : ?>
body, #sidebar .about-widget .background-about-me { background: <?php echo esc_attr($body_background_color); ?>; }
<?php endif; ?>
<?php if(strcasecmp ($comments_background_color, $elletta_customizer_defaults['comments_background_color']) != 0) : ?>
.post-comments, .archive-title-area { background-color: <?php echo esc_attr($comments_background_color); ?>; }
<?php endif; ?>
<?php if(strcasecmp ($body_text_color, $elletta_customizer_defaults['body_text_color']) != 0) : ?>
body, .like-comment-buttons a, .like-comment-buttons a, .widget.elletta_lastest_post_widget .recent_post_text .post-excerpt, .widget_categories ul li a { color: <?php echo esc_attr($body_text_color); ?>; }
<?php endif; ?>
<?php if(strcasecmp ($title_text_color, $elletta_customizer_defaults['title_text_color']) != 0) : ?>
.woocommerce div.product .product_title, .woocommerce .page-title, .product h3, .cart-collaterals h2, .post-item .item h2 a, .post-item .item h2 a:hover, .post-header h1 a, .post-header h2 a, .post-header h1, .post-header h2, .tribe-events-day .tribe-events-day-time-slot h5, #tribe-events h1 { color: <?php echo esc_attr($title_text_color); ?> !important; }
.widget h4.tribe-event-title a, .featured-posts h4 a, .featured-area[data-slider-type="slider"] .slider-item h2, .featured-area[data-slider-type="slider"] .slider-item h2 a, .widget.elletta_lastest_post_widget .recent_post_text>a, .widget ul.side-newsfeed li .side-item .side-item-text h4 a, .related-posts .item h3 a, .box-title-area .title, .commment-form-wrapper h5 { color: <?php echo esc_attr($title_text_color); ?>; }
<?php endif; ?>
<?php if(strcasecmp ($title_widget_text_color, $elletta_customizer_defaults['title_widget_text_color']) != 0) : ?>
.widget-title { color: <?php echo esc_attr($title_widget_text_color); ?>; }
<?php endif; ?>
<?php if(strcasecmp ($link_text_color, $elletta_customizer_defaults['link_text_color']) != 0) : ?>
a, .post-entry-text a, #alternate-widget-area p.clear a, .related-posts .item h3 a:hover, .widget.elletta_lastest_post_widget .recent_post_text>a:hover, .widget ul.side-newsfeed li .side-item .side-item-text h4 a:hover, .widget.elletta_lastest_post_widget .recent_post_text .post-categories a, .cat a, .date-author span, .post-tags a:hover, .widget_categories ul li, .like-comment-buttons a:hover, .like-comment-buttons a:hover, #footer-copyright #footer-social-items-inner a:hover, #footer-widget-area .widget ul.side-newsfeed li .side-item .side-item-text h4 a:hover, #footer-widget-area .recent_post_text a:hover, .footer .tp_recent_tweets li a, .tp_recent_tweets li a, .woocommerce-info:before, .tribe-events-calendar td.tribe-events-present div[id*='tribe-events-daynum-'], .tribe-events-calendar td.tribe-events-present div[id*='tribe-events-daynum-'] > a, #tribe_events_filters_wrapper input[type=submit], #tribe-events-content .tribe-events-tooltip h4, #tribe_events_filters_wrapper .tribe_events_slider_val, .single-tribe_events a.tribe-events-ical, .single-tribe_events a.tribe-events-gcal, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce ul.products li.product .price { color: <?php echo esc_attr($link_text_color); ?>; }
.box-title-area .title:after, .featured-area[data-slider-type="slider"] .slider-item h2:after, .format-quote .post-entry blockquote p:after, .featured-area[data-slider-type="slider"] .swiper-pagination .swiper-pagination-bullet-active, .featured-area[data-slider-type="slider"] .swiper-pagination .swiper-pagination-bullet:hover, .featured-area .swiper-button-prev-custom:hover, .featured-area .swiper-button-next-custom:hover, .post-header h1:before, .post-header h2:before, .page .post-header h1:after, .page .post-header h2:after, .woocommerce span.onsale, h1.tribe-events-single-event-title:after { background: <?php echo esc_attr($link_text_color); ?>; }
.post-entry-text a {  border-bottom: 1px dotted <?php echo esc_attr($link_text_color); ?>; }
.woocommerce-info { border-top-color: <?php echo esc_attr($link_text_color); ?>; }
<?php endif; ?>
<?php if(strcasecmp ($link_hover_text_color, $elletta_customizer_defaults['link_hover_text_color']) != 0) : ?>
a:hover, .post-entry-text a:hover, .cat a:hover, .footer .tp_recent_tweets li a:hover, .tp_recent_tweets li a:hover { color: <?php echo esc_attr($link_hover_text_color); ?>; }
.post-entry-text a:hover {  border-bottom: 1px dotted <?php echo esc_attr($link_hover_text_color); ?>; }
<?php endif; ?>
<?php if(strcasecmp ($button_read_more_color, $elletta_customizer_defaults['button_read_more_color']) != 0) : ?>
.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .post-entry-bottom a.custom-more-link, .pagination a, .woocommerce nav.woocommerce-pagination ul li a, .widget .about-widget .widget-link, .widget.tribe-events-list-widget .widget-link { border-color: <?php echo esc_attr($button_read_more_color); ?>; }
#footer-widget-area .widget .tagcloud a, .widget .tagcloud a, .pagination a:hover, .pagination .current, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .post-entry-bottom a.custom-more-link:hover, .widget .about-widget .widget-link:hover,.widget.tribe-events-list-widget .widget-link:hover { background: <?php echo esc_attr($button_read_more_color); ?>; }
<?php endif; ?>
<?php if(strcasecmp ($button_read_more_text_color, $elletta_customizer_defaults['button_read_more_text_color']) != 0) : ?>
.woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .widget .about-widget .widget-link, .widget.tribe-events-list-widget .widget-link, .post-entry-bottom a.custom-more-link, .post-entry-bottom a.custom-more-link:hover, .page-numbers.dots, #sidebar .about-widget .background-about-me, #sidebar .about-widget .background-about-me:hover, .pagination a, .pagination a:hover, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li a:hover, #sidebar .about-widget .background-about-me:hover, #footer-widget-area .widget .tagcloud a, #footer-widget-area .widget .tagcloud a:hover, .widget .tagcloud a, #footer-widget-area .widget .tagcloud a, .widget .tagcloud a:hover, #footer-widget-area .widget .about-widget .widget-link, #footer-widget-area .widget.tribe-events-list-widget .widget-link, #footer-widget-area .widget .about-widget .widget-link:hover  { color: <?php echo esc_attr($button_read_more_text_color); ?>; }
<?php endif; ?>
<?php if(strcasecmp ($other_buttons_color, $elletta_customizer_defaults['other_buttons_color']) != 0) : ?>
button[type="submit"], input[type="submit"], .goto-top, .woocommerce div.product form.cart .button, .woocommerce #payment #place_order, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce div.product form.cart .button:hover, .woocommerce #payment #place_order:hover, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover { background-color: <?php echo esc_attr($other_buttons_color); ?>; }
<?php endif; ?>
<?php if(strcasecmp ($other_buttons_text_color, $elletta_customizer_defaults['other_buttons_text_color']) != 0) : ?>
.woocommerce div.product form.cart .button:hover, .woocommerce #payment #place_order:hover, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover, .woocommerce #payment #place_order, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce div.product form.cart .button, button[type="submit"], input[type="submit"], .tribe-events-button, #tribe-events .tribe-events-button, .tribe-events-button.tribe-inactive, #tribe-events .tribe-events-button:hover, .tribe-events-button:hover, .tribe-events-button.tribe-active:hover { color: <?php echo esc_attr($other_buttons_text_color); ?>; }
<?php endif; ?>
<?php if(strcasecmp ($tags_categories_color, $elletta_customizer_defaults['tags_categories_color']) != 0) : ?>
.side-item .side-image .side-item-category-inner, .gallery .gallery-caption { background: <?php echo esc_attr($tags_categories_color); ?>; }
<?php endif; ?>
<?php if(strcasecmp ($tags_categories_text_color, $elletta_customizer_defaults['tags_categories_text_color']) != 0) : ?>
.side-item .side-image .side-item-category-inner, .gallery .gallery-caption { color: <?php echo esc_attr($tags_categories_text_color); ?>; }
<?php endif; ?>
<?php if(strcasecmp ($height_slider , $elletta_customizer_defaults['height_slider']) != 0) : ?>
.featured-area[data-slider-type="slider"] .slider-item { height: <?php echo esc_attr($height_slider ); ?>px; }
<?php endif; ?>
<?php echo esc_attr(get_theme_mod('custom_css')); ?>
