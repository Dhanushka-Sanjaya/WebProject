<?php 
$logo_text = get_theme_mod('logo_text');
$logo_mobile = get_theme_mod('logo_mobile'); 
$logo_sticky = get_theme_mod('logo_sticky'); 
$defaults_primary = array(
         'theme_location'  => 'elletta_primary_nav',
         'menu'            => '',
         'container'       => '',
         'container_class' => '',
         'container_id'    => '',
         'menu_class'      => 'nav-menu',
         'menu_id'         => '',
         'echo'            => true,
         'fallback_cb'     => 'wp_page_menu',
         'before'          => '',
         'after'           => '',
         'link_before'     => '',
         'link_after'      => '',
         'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
         'depth'           => 0,
         'walker'          => ''
 );

 $defaults_secondary = array(
         'theme_location'  => 'elletta_secondary_nav',
         'menu'            => '',
         'container'       => '',
         'container_class' => '',
         'container_id'    => '',
         'menu_class'      => 'nav-menu',
         'menu_id'         => '',
         'echo'            => true,
         'fallback_cb'     => 'wp_page_menu',
         'before'          => '',
         'after'           => '',
         'link_before'     => '',
         'link_after'      => '',
         'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
         'depth'           => 0,
         'walker'          => ''
 );
$defaults_sidebar = array(
        'theme_location'  => 'elletta_primary_nav',
        'menu'            => '',
        'container'       => '',
        'container_class' => '',
        'container_id'    => '',
        'menu_class'      => 'sidebar-menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
);?>
<a id="close-sidebar-nav" class="header-2">
        <i class="fa fa-close"></i>
</a>
<nav id="sidebar-nav" class="header-2">
    <?php if(get_theme_mod('show_logo')) : ?>
        <div id="sidebar-nav-logo">
                <?php if($logo_mobile) : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php 
                    printf(
                            '<img itemprop="logo" class="logo-mobile" src="%s" alt="%s" title="%s" />',
                            esc_url( $logo_mobile ),
                            esc_attr( $logo_text ),
                            esc_attr( $logo_text )
                    ); ?>
                    </a>                   
                <?php elseif ( function_exists( 'the_custom_logo' ) ) :
                        the_custom_logo();
                else : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php 
                        printf(
                                '<img itemprop="logo" src="%s" alt="%s" title="%s" />',
                                esc_url( get_theme_mod('logo') ),
                                esc_attr( $logo_text ),
                                esc_attr( $logo_text )
                        ); ?>
                        </a>
                <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php wp_nav_menu( $defaults_sidebar );  ?>
</nav>
<div class="sticky-navigation-wrapper">
        <div class="clearfix">
                <?php if(get_theme_mod('show_logo')) : ?>
                    <?php
                    if($logo_sticky) : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php 
                        printf(
                                '<div class="logo-sticky-menu"><img itemprop="logo" src="%s" alt="%s" title="%s" /></div>',
                                esc_url( $logo_sticky ),
                                esc_attr( $logo_text ),
                                esc_attr( $logo_text )
                        ); ?>
                        </a>
                    <?php else :                    
                        if ( function_exists( 'the_custom_logo' ) ) : ?>
                                <div class="logo-sticky-menu"><?php the_custom_logo(); ?></div>
                        <?php else : ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php 
                                printf(
                                        '<div class="logo-sticky-menu"><img itemprop="logo" src="%s" alt="%s" title="%s" /></div>',
                                        esc_url( get_theme_mod('logo') ),
                                        esc_attr( $logo_text ),
                                        esc_attr( $logo_text )
                                ); ?>
                                </a>
                        <?php endif; ?> 
                    <?php endif; ?>             
                <?php endif; ?>
                <nav class="main-navigation clearfix ">
                        <?php wp_nav_menu( $defaults_primary ); ?>
                </nav>
                <div class="button-menu-mobile">
                        <i class="fa fa-bars"></i>
                </div>
                
                <?php if(get_theme_mod('header_show_search')) : ?>
                <div class="top-search-area">
                        <a href="#"><i class="fa fa-search"></i></a>
                </div>
                <?php endif; ?>
                
                <?php if(get_theme_mod('header_show_social_icons') && !get_theme_mod('show_social_icons_under_logo')) : ?>
                <div class="top-social-items">
                        <div class="top-social-items-inner">
                                <?php if(get_theme_mod('elletta_facebook')) : ?><a href="http://facebook.com/<?php echo esc_attr(get_theme_mod('elletta_facebook')); ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php endif; ?>
                                <?php if(get_theme_mod('elletta_twitter')) : ?><a href="http://twitter.com/<?php echo esc_attr(get_theme_mod('elletta_twitter')); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif; ?>
                                <?php if(get_theme_mod('elletta_instagram')) : ?><a href="http://instagram.com/<?php echo esc_attr(get_theme_mod('elletta_instagram')); ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php endif; ?>
                                <?php if(get_theme_mod('elletta_pinterest')) : ?><a href="http://pinterest.com/<?php echo esc_attr(get_theme_mod('elletta_pinterest')); ?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php endif; ?>
                                <?php if(get_theme_mod('elletta_google_plus')) : ?><a href="http://googleplus.com/<?php echo esc_attr(get_theme_mod('elletta_google_plus')); ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php endif; ?>
                                <?php if(get_theme_mod('elletta_tumblr')) : ?><a href="http://thumblr.com/<?php echo esc_attr(get_theme_mod('elletta_tumblr')); ?>" target="_blank"><i class="fa fa-tumblr"></i></a><?php endif; ?>
                                <?php if(get_theme_mod('elletta_bloglovin')) : ?><a href="http://bloglovin.com/<?php echo esc_attr(get_theme_mod('elletta_bloglovin')); ?>" target="_blank"><i class="fa fa-heart"></i></a><?php endif; ?>
                                <?php if(get_theme_mod('elletta_youtube')) : ?><a href="http://youtube.com/<?php echo esc_attr(get_theme_mod('elletta_youtube')); ?>" target="_blank"><i class="fa fa-youtube"></i></a><?php endif; ?>
                                <?php if(get_theme_mod('elletta_linkedin')) : ?><a href="<?php echo esc_attr(get_theme_mod('elletta_linkedin')); ?>" target="_blank"><i class="fa fa-linkedin"></i></a><?php endif; ?>
                        </div>
                </div>
                <?php endif; ?>
                <?php if (class_exists( 'WooCommerce' )) : ?>
                <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'elleta' ); ?>"></a>
                <?php endif; ?>
                

        </div>		
</div>
<div id="header">
        <div class="secondary-navigation-wrapper header-2">
                <div class="container clearfix">
                        <nav class="secondary-navigation clearfix ">
                                <?php wp_nav_menu( $defaults_secondary ); ?>
                        </nav>

                        <?php if(get_theme_mod('header_show_search')) : ?>
                        <div class="top-search-area">
                                <a href="#"><i class="fa fa-search"></i></a>
                        </div>
                        <?php endif; ?>

                        <?php if(get_theme_mod('header_show_social_icons') && !get_theme_mod('show_social_icons_under_logo')) : ?>
                        <div class="top-social-items">
                                <div class="top-social-items-inner">
                                        <?php if(get_theme_mod('elletta_facebook')) : ?><a href="http://facebook.com/<?php echo esc_attr(get_theme_mod('elletta_facebook')); ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php endif; ?>
                                        <?php if(get_theme_mod('elletta_twitter')) : ?><a href="http://twitter.com/<?php echo esc_attr(get_theme_mod('elletta_twitter')); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif; ?>
                                        <?php if(get_theme_mod('elletta_instagram')) : ?><a href="http://instagram.com/<?php echo esc_attr(get_theme_mod('elletta_instagram')); ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php endif; ?>
                                        <?php if(get_theme_mod('elletta_pinterest')) : ?><a href="http://pinterest.com/<?php echo esc_attr(get_theme_mod('elletta_pinterest')); ?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php endif; ?>
                                        <?php if(get_theme_mod('elletta_google_plus')) : ?><a href="http://googleplus.com/<?php echo esc_attr(get_theme_mod('elletta_google_plus')); ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php endif; ?>
                                        <?php if(get_theme_mod('elletta_tumblr')) : ?><a href="http://thumblr.com/<?php echo esc_attr(get_theme_mod('elletta_tumblr')); ?>" target="_blank"><i class="fa fa-tumblr"></i></a><?php endif; ?>
                                        <?php if(get_theme_mod('elletta_bloglovin')) : ?><a href="http://bloglovin.com/<?php echo esc_attr(get_theme_mod('elletta_bloglovin')); ?>" target="_blank"><i class="fa fa-heart"></i></a><?php endif; ?>
                                        <?php if(get_theme_mod('elletta_youtube')) : ?><a href="http://youtube.com/<?php echo esc_attr(get_theme_mod('elletta_youtube')); ?>" target="_blank"><i class="fa fa-youtube"></i></a><?php endif; ?>
                                        <?php if(get_theme_mod('elletta_linkedin')) : ?><a href="<?php echo esc_attr(get_theme_mod('elletta_linkedin')); ?>" target="_blank"><i class="fa fa-linkedin"></i></a><?php endif; ?>
                                </div>
                        </div>
                        <?php endif; ?>

                </div>                		
        </div>
        <?php if(get_theme_mod('header_show_search')) : ?>
        <div class="search-form-area">				
                <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                        <div>
                                <input type="text" placeholder="<?php esc_html_e( 'Start Typing and Hit Enter...', 'elletta' ) ?>" name="s" class="search">
                                <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
                        </div>
                </form>				
                <a class="close-btn" href="javascript:;"><i class="fa fa-times"></i></a>
        </div>
        <?php endif; ?>
        <?php if(get_theme_mod('show_logo')) : ?>
        <header id="main-header" class="header-2" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
                <div id="main-top-wrapper">
                        <div class="container">                                    
                                <div id="logo">
                                        <?php if(is_front_page()) : ?>
                                        <h1 itemprop="headline">
                                                <span class="screen-reader-text"><?php bloginfo('name'); ?></span>
                                                <?php
                                                if (function_exists('get_custom_logo')) :
                                                    if(has_custom_logo()) :
                                                        $output = get_custom_logo();
                                                    // Nothing in the output: Custom Logo is not supported, or there is no selected logo
                                                    // In both cases we display the site's name
                                                    else :
                                                        $output = '<a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';
                                                    endif;

                                                    echo $output;
                                                else : ?>
                                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                                        <?php 
                                                        printf(
                                                                '<img itemprop="logo" src="%s" alt="%s" title="%s" />',
                                                                esc_url( get_theme_mod('logo') ),
                                                                esc_attr( $logo_text ),
                                                                esc_attr( $logo_text )
                                                        ); ?>
                                                        </a>
                                                <?php endif; ?>  
                                                <?php if($logo_mobile) : ?>
                                                <a class="custom-mobile-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                                <?php 
                                                printf(
                                                        '<img itemprop="logo" src="%s" alt="%s" title="%s" />',
                                                        esc_url( $logo_mobile ),
                                                        esc_attr( $logo_text ),
                                                        esc_attr( $logo_text )
                                                ); ?>
                                                </a>
                                                <?php endif; ?>
                                        </h1>
                                        <?php if($logo_text) : ?> 
                                        <h3><?php echo esc_attr( $logo_text ); ?></h3> 
                                        <?php endif; ?>
                                        <?php else : ?>
                                        <h2 itemprop="description">
                                                <span class="screen-reader-text"><?php bloginfo('name'); ?></span>
                                                <?php
                                                if (function_exists('get_custom_logo')) :
                                                        if(has_custom_logo()) :
                                                            $output = get_custom_logo();
                                                        // Nothing in the output: Custom Logo is not supported, or there is no selected logo
                                                        // In both cases we display the site's name
                                                        else :
                                                            $output = '<a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';
                                                        endif;

                                                        echo $output;
                                                else : ?>
                                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                                        <?php  
                                                        printf(
                                                                '<img itemprop="logo" src="%s" alt="%s" />',
                                                                esc_url( get_theme_mod('logo') ),
                                                                esc_attr( $theme_title )
                                                        );?>
                                                        </a>
                                                <?php endif; ?>
                                                <?php if($logo_mobile) : ?>
                                                <a class="custom-mobile-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                                <?php 
                                                printf(
                                                        '<img itemprop="logo" src="%s" alt="%s" title="%s" />',
                                                        esc_url( $logo_mobile ),
                                                        esc_attr( $logo_text ),
                                                        esc_attr( $logo_text )
                                                ); ?>
                                                </a>
                                                <?php endif; ?>
                                        </h2>
                                        <?php if($logo_text) : ?> 
                                        <h3><?php echo esc_attr( $logo_text ); ?></h3> 
                                        <?php endif; ?>
                                        <?php endif; ?>
                                </div> 

                                <?php if(get_theme_mod('header_show_social_icons') && get_theme_mod('show_social_icons_under_logo')) : ?>
                                <div id="top-social-items" class="under_logo">
                                        <div id="top-social-items-inner">
                                                <?php if(get_theme_mod('elletta_facebook')) : ?><a href="http://facebook.com/<?php echo esc_attr(get_theme_mod('elletta_facebook')); ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php endif; ?>
                                                <?php if(get_theme_mod('elletta_twitter')) : ?><a href="http://twitter.com/<?php echo esc_attr(get_theme_mod('elletta_twitter')); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif; ?>
                                                <?php if(get_theme_mod('elletta_instagram')) : ?><a href="http://instagram.com/<?php echo esc_attr(get_theme_mod('elletta_instagram')); ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php endif; ?>
                                                <?php if(get_theme_mod('elletta_pinterest')) : ?><a href="http://pinterest.com/<?php echo esc_attr(get_theme_mod('elletta_pinterest')); ?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php endif; ?>
                                                <?php if(get_theme_mod('elletta_google_plus')) : ?><a href="http://googleplus.com/<?php echo esc_attr(get_theme_mod('elletta_google_plus')); ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php endif; ?>
                                                <?php if(get_theme_mod('elletta_tumblr')) : ?><a href="http://thumblr.com/<?php echo esc_attr(get_theme_mod('elletta_tumblr')); ?>" target="_blank"><i class="fa fa-tumblr"></i></a><?php endif; ?>
                                                <?php if(get_theme_mod('elletta_bloglovin')) : ?><a href="http://bloglovin.com/<?php echo esc_attr(get_theme_mod('elletta_bloglovin')); ?>" target="_blank"><i class="fa fa-heart"></i></a><?php endif; ?>
                                                <?php if(get_theme_mod('elletta_youtube')) : ?><a href="http://youtube.com/<?php echo esc_attr(get_theme_mod('elletta_youtube')); ?>" target="_blank"><i class="fa fa-youtube"></i></a><?php endif; ?>
                                                <?php if(get_theme_mod('elletta_linkedin')) : ?><a href="<?php echo esc_attr(get_theme_mod('elletta_linkedin')); ?>" target="_blank"><i class="fa fa-linkedin"></i></a><?php endif; ?>
                                        </div>
                                </div>
                                <?php endif; ?>
                        </div>
                </div>
        </header>
        <?php endif; ?>
        <div class="main-navigation-wrapper header-2">
                <div class="container clearfix">
                        <nav class="main-navigation clearfix " itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" >
                                <?php wp_nav_menu( $defaults_primary ); ?>
                        </nav>
                        <div class="button-menu-mobile">
                                <i class="fa fa-bars"></i>
                        </div>

                        <?php if(get_theme_mod('header_show_search')) : ?>
                        <div class="mobile-search-area">
                                <a href="#"><i class="fa fa-search"></i></a>
                        </div>
                        <?php endif; ?>
                        <?php if (class_exists( 'WooCommerce' )) : ?>
                        <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'elletta' ); ?>"></a>
                        <?php endif; ?>
                        <?php if(get_theme_mod('header_show_social_icons') && !get_theme_mod('show_social_icons_under_logo')) : ?>
                        <div id="mobile-social-items">
                                <div id="top-social-items-inner">
                                        <?php if(get_theme_mod('elletta_facebook')) : ?><a href="http://facebook.com/<?php echo esc_attr(get_theme_mod('elletta_facebook')); ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php endif; ?>
                                        <?php if(get_theme_mod('elletta_twitter')) : ?><a href="http://twitter.com/<?php echo esc_attr(get_theme_mod('elletta_twitter')); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif; ?>
                                        <?php if(get_theme_mod('elletta_instagram')) : ?><a href="http://instagram.com/<?php echo esc_attr(get_theme_mod('elletta_instagram')); ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php endif; ?>
                                        <?php if(get_theme_mod('elletta_pinterest')) : ?><a href="http://pinterest.com/<?php echo esc_attr(get_theme_mod('elletta_pinterest')); ?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php endif; ?>
                                        <?php if(get_theme_mod('elletta_google_plus')) : ?><a href="http://googleplus.com/<?php echo esc_attr(get_theme_mod('elletta_google_plus')); ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php endif; ?>
                                        <?php if(get_theme_mod('elletta_tumblr')) : ?><a href="http://thumblr.com/<?php echo esc_attr(get_theme_mod('elletta_tumblr')); ?>" target="_blank"><i class="fa fa-tumblr"></i></a><?php endif; ?>
                                        <?php if(get_theme_mod('elletta_bloglovin')) : ?><a href="http://bloglovin.com/<?php echo esc_attr(get_theme_mod('elletta_bloglovin')); ?>" target="_blank"><i class="fa fa-heart"></i></a><?php endif; ?>
                                        <?php if(get_theme_mod('elletta_youtube')) : ?><a href="http://youtube.com/<?php echo esc_attr(get_theme_mod('elletta_youtube')); ?>" target="_blank"><i class="fa fa-youtube"></i></a><?php endif; ?>
                                        <?php if(get_theme_mod('elletta_linkedin')) : ?><a href="<?php echo esc_attr(get_theme_mod('elletta_linkedin')); ?>" target="_blank"><i class="fa fa-linkedin"></i></a><?php endif; ?>
                                </div>
                        </div>
                        <?php endif; ?>



                </div>		
        </div>
</div>
    