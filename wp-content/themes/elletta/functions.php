<?php
// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	//die( 'No direct script access allowed' );
}
// Set Content Width
if ( ! isset( $content_width ) )
	$content_width = 1080;

define( 'elletta_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'elletta_THEME_DIR_URI', trailingslashit( get_template_directory_uri() ) );
define( 'elletta_INCLUDES_DIR', trailingslashit( get_template_directory_uri() ) . 'inc/' );


// Theme set up
add_action( 'after_setup_theme', 'elletta_theme_setup' );

if ( !function_exists('elletta_theme_setup') ) {

	function elletta_theme_setup() {
	
		// Register navigation menu
		register_nav_menus( array(
                    'elletta_primary_nav' => esc_html__( 'Primary Navigation', 'elletta' ),
                    'elletta_secondary_nav'  => esc_html__( 'Secondary Navigation', 'elletta' ),
                ) );
		
		// Localization languaje
		load_theme_textdomain('elletta', elletta_THEME_DIR . '/languages');
                
                // Add default posts and comments RSS feed links to head.
                add_theme_support( 'automatic-feed-links' );
                
                /*
                * Let WordPress manage the document title.
                * By adding theme support, we declare that this theme does not use a
                * hard-coded <title> tag in the document head, and expect WordPress to
                * provide it for us.
                */
                add_theme_support( 'title-tag' );
                                		
		// Post formats
                add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'quote', 'link' ) );
                
                /*
                * Switch default core markup for search form, comment form, and comments
                * to output valid HTML5.
                */
                add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		
		// Featured image
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'elletta_thumbnail-full', 1180, 0, true );
                add_image_size( 'elletta_thumbnail-full-sidebar', 800, 0, true );
                add_image_size( 'elletta_thumbnail-list-sidebar', 355, 355, true );
		add_image_size( 'elletta_thumbnail-list', 440, 440, true );
		add_image_size( 'elletta_thumbnail-slider', 650, 0, true );
		add_image_size( 'elletta_thumbnail-masonry', 440, 0, true );
                add_image_size( 'elletta_thumbnail-featured-3', 375, 249, true );
                
                add_theme_support( 'custom-logo', array(
                        'height'      => 150,
                        'width'       => 500,
                        'flex-width'  => true,
                        'header-text' => array( 'site-title', 'site-description' ),
                ) );
	}
}

// Register & enqueue styles/scripts
add_action( 'wp_enqueue_scripts','elletta_load_scripts' );

function elletta_load_scripts() {

	// Register scripts and styles
        wp_register_style('components-css', elletta_INCLUDES_DIR . 'assets/css/components.css');
	wp_register_style('elletta_style', elletta_THEME_DIR_URI . 'style.css');
        wp_register_style('elletta_responsive', elletta_INCLUDES_DIR . 'assets/css/responsive.css');	
	wp_register_style('font-awesome', elletta_INCLUDES_DIR . 'assets/css/font-awesome/css/font-awesome.min.css');
	
	wp_register_script('components', elletta_INCLUDES_DIR . 'assets/js/components.js', 'jquery', '', true);
	wp_register_script('elletta_scripts', elletta_INCLUDES_DIR . 'assets/js/elletta.js', 'jquery', '', true);
        wp_register_script('masonry', elletta_INCLUDES_DIR . 'assets/js/masonry.pkgd.min.js', array(), NULL, true);
	
	// Enqueue scripts and 
        wp_enqueue_style('wp-mediaelement');
        wp_enqueue_style('components-css');
	wp_enqueue_style('elletta_style');
        wp_enqueue_style('elletta_responsive');	
	wp_enqueue_style('font-awesome');
        
            
	wp_enqueue_script('components');
	wp_enqueue_script('elletta_scripts');
        wp_enqueue_script('wp-mediaelement');
        $elletta_layout_homepage = explode( '-', get_theme_mod('layout_homepage') );       
        if($elletta_layout_homepage[0] == 'grid' || get_theme_mod( 'layout_page' ) == 'grid') :
		wp_enqueue_script('masonry');
            endif;
        if (is_singular() && get_option('thread_comments'))	wp_enqueue_script('comment-reply');
        
        wp_localize_script( 'elletta_scripts', 'ajax_var', array(
			'url' => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'ajax-nonce' )
			)
		);
        
}

// Register widgets
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => esc_html__( 'Sidebar', 'elletta'),  
		'id'   => 'sidebar',             
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
        register_sidebar(array(
		'name' => esc_html__( 'Sidebar (Detail Post)', 'elletta'),
                'id'   => 'sidebar-detail',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
        register_sidebar(array(
		'name' => esc_html__( 'Sidebar (Detail Page)', 'elletta'),
                'id'   => 'sidebar-page',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
        register_sidebar(array(
		'name' => esc_html__( 'Sidebar (Woocommerce)', 'elletta'),
                'id'   => 'sidebar-woocommerce',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
        register_sidebar( array(
                'name'          => esc_html__( 'Footer Widget 1', 'elletta' ),
                'id'            => 'footer-1',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
        ) );
        register_sidebar( array(
                'name'          => esc_html__( 'Footer Widget 2', 'elletta' ),
                'id'            => 'footer-2',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
        ) );
        register_sidebar( array(
                'name'          => esc_html__( 'Footer Widget 3', 'elletta' ),
                'id'            => 'footer-3',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
        ) );
        register_sidebar( array(
                'name'          => esc_html__( 'Footer Widget 4', 'elletta' ),
                'id'            => 'footer-4',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
        ) );
        register_sidebar( array(
                'name'          => esc_html__( 'Instagram Footer', 'elletta' ),
                'id'            => 'instagram-widget-area',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
        ) );
}

require_once( elletta_THEME_DIR . 'inc/register-plugins.php' );
require_once( elletta_THEME_DIR . 'inc/theme-functions.php' );

// Uses backend panel and frontend preview.
require_once( elletta_THEME_DIR . 'customizer/customizer.php' );

// Widgets
include ( elletta_THEME_DIR . "widgets/wgt_social_media.php");
include ( elletta_THEME_DIR . "widgets/wgt_latest_posts.php");
include ( elletta_THEME_DIR . "widgets/wgt_latest_posts_category.php");
include ( elletta_THEME_DIR . "widgets/wgt_ads.php");
include ( elletta_THEME_DIR . "widgets/wgt_promo_box.php");
include ( elletta_THEME_DIR . "widgets/wgt_facebook.php");
include ( elletta_THEME_DIR . "widgets/wgt_about_me.php");

if ( is_admin() ) {
	include ( elletta_THEME_DIR . 'inc/admin-function.php');
}

function elletta_metabox_setup(){
	if (class_exists('RWMB_Loader')) :
		require_once( elletta_THEME_DIR . 'inc/meta-box-config.php' );
            endif;
}

add_action('init', 'elletta_metabox_setup', 1);

function elletta_theme_slug_fonts_url() {
        $fonts_url = '';

        $title_font = get_theme_mod('title_font') ? get_theme_mod('title_font') : "Lato:300,300i,400,700";
        $body_font = get_theme_mod('body_font') ? get_theme_mod('body_font') : "Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic";
        $header_font = get_theme_mod('header_font') ? get_theme_mod('header_font') : "Lato:300,300i,400,700";
        
        $title_font_explode = explode(':', $title_font);
        $body_font_explode = explode(':', $body_font);
        $header_font_explode = explode(':', $header_font);
        $title_font_name = str_replace('+', ' ', $title_font_explode[0]);
        $body_font_name = str_replace('+', ' ', $body_font_explode[0]);
        $header_font_name = str_replace('+', ' ', $header_font_explode[0]);
        
        $font1 = _x( 'on', $body_font_name  . ' font: on or off', 'elletta' );
        $font2 = _x( 'on', $title_font_name . ' font: on or off', 'elletta' );
        $font3 = _x( 'on', $header_font_name . ' font: on or off', 'elletta' );
               

        if ( 'off' !== $font1 || 'off' !== $font2  || 'off' !== $font3 ) {
        $font_families = array();
        

        if ( 'off' !== $font1 ) {
            $font_families[] = $body_font_name . ':' . $body_font_explode[1];
        }

        if ( 'off' !== $font2 ) {
            if($title_font != $body_font) :
                $font_families[] = $title_font_name . ':' . $title_font_explode[1];        
            endif;
        }
        
        if ( 'off' !== $font3 ) {
            if(($header_font != $body_font) && ($header_font != $title_font)) :
                $font_families[] = $header_font_name . ':' . $header_font_explode[1];          
            endif;
        }
        $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
        'subset' => urlencode( 'latin,latin-ext' ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }

        return esc_url_raw( $fonts_url );
}

function elletta_theme_slug_scripts_styles() {
        wp_enqueue_style( 'elletta-slug-fonts', elletta_theme_slug_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'elletta_theme_slug_scripts_styles' );

// Add specific CSS class by filter.
 
add_filter( 'body_class','elletta_body_classes' );
function elletta_body_classes( $classes ) {
 
    $classes[] = get_theme_mod('pattern_page');
     
    return $classes;
     
}

/**
 * Registers an editor stylesheet for the theme.
 */
function elletta_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'elletta_add_editor_styles' );

if (class_exists( 'WooCommerce' )) : 
    /* Woocommerce */
    add_action( 'after_setup_theme', 'woocommerce_support' );
    function woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }
    // Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
    add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
    function woocommerce_header_add_to_cart_fragment( $fragments ) {
            ob_start();
            ?>
            <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'elleta' ); ?>"><i class="fa fa-shopping-bag" aria-hidden="true"></i><?php if(WC()->cart->get_cart_contents_count()) : ?><span class="shop-icon-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span><?php endif; ?></a> 
            <?php

            $fragments['a.cart-contents'] = ob_get_clean();

            return $fragments;
    }
endif;