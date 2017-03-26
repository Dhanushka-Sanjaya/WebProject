        <?php
        $elletta_footer_javascript = get_theme_mod('footer_javascript');
        $elletta_boxed = get_theme_mod('footer_boxed');
        $elletta_theme_title = get_bloginfo( 'name' );
        if( get_theme_mod('logo_text') ) :
            $elletta_logo_text = get_theme_mod('logo_text');
        else :
            $elletta_logo_text = $elletta_theme_title;
        endif;
        
        if(get_theme_mod('footer_newsletter_show') && function_exists( 'mc4wp_show_form' )) :
            if($elletta_boxed) : ?>
            <div class="container">
            <?php endif;
            get_template_part( 'templates/footer-newsletter' );
            if($elletta_boxed) : ?>
            </div>
            <?php endif;
        endif;  
        
        if (get_theme_mod('footer_instagram_show') && is_active_sidebar( 'instagram-widget-area' ) && function_exists( 'wpiw_init' )) : ?>
		<div id="alternate-widget-area">

			<?php if($elletta_boxed) : ?>
			<div class="container">
			<?php endif; ?>

			<?php dynamic_sidebar( 'instagram-widget-area' ); ?>

			<?php if($elletta_boxed) : ?>
			</div>
			<?php endif; ?>

		</div>
	<?php endif;

        if(get_theme_mod('footer_widget_area_show')) :
            
                if($elletta_boxed) : ?>
                <div class="container">
                <?php endif;
                
                switch (get_theme_mod('footer_columns')) {
                    case 2:
                        get_template_part( 'templates/footer-2-columns' );
                        break;
                    case 3:
                        get_template_part( 'templates/footer-3-columns' );
                        break;
                    case 4:
                        get_template_part( 'templates/footer-4-columns' );
                        break;
                } 
                
                if($elletta_boxed) : ?>
                </div>
                <?php endif;
                
            endif;
        ?>   
        <?php if(get_theme_mod('footer_copyright_show')){ ?>
        
        <footer id="footer-copyright" itemscope="itemscope" itemtype="http://schema.org/WPFooter">		
		<div class="container">	                   
                        <?php $elletta_logo_footer = get_theme_mod('footer_logo'); 
                            if($elletta_logo_footer) : 
                            $size = getimagesize($elletta_logo_footer);
                            ?>
                                <div id="footer-logo">
                                     <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <?php 
                                    printf(
                                            '<img itemprop="logo" src="%s" alt="%s" title="%s" %s />',
                                            esc_url( $elletta_logo_footer ),
                                            esc_attr( $elletta_logo_text ),
                                            esc_attr( $elletta_logo_text ),
                                            $size[3]
                                    ); ?>
                                    </a>
                                </div>
			<?php endif; ?>		                                
                        <?php if(get_theme_mod('footer_social_media')) : ?>
                                <div id="footer-social-items-inner">
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
			<?php endif; ?>		
			<?php if(get_theme_mod('footer_copyright')) : ?>
				<p><?php echo wp_kses(get_theme_mod('footer_copyright'), wp_kses_allowed_html( 'post' ));  ?></p>
			<?php endif; ?>			
		</div>		
	</footer>
        <?php } ?>
        <a href="#" class="goto-top"><i class="fa fa-angle-up"></i></a>
	<!-- Root element of PhotoSwipe. Must have class pswp. -->
	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

	    <!-- Background of PhotoSwipe. 
	         It's a separate element as animating opacity is faster than rgba(). -->
	    <div class="pswp__bg"></div>

	    <!-- Slides wrapper with overflow:hidden. -->
	    <div class="pswp__scroll-wrap">

	        <!-- Container that holds slides. 
	            PhotoSwipe keeps only 3 of them in the DOM to save memory.
	            Don't modify these 3 pswp__item elements, data is added later on. -->
	        <div class="pswp__container">
	            <div class="pswp__item"></div>
	            <div class="pswp__item"></div>
	            <div class="pswp__item"></div>
	        </div>

	        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
	        <div class="pswp__ui pswp__ui--hidden">

	            <div class="pswp__top-bar">

	                <!--  Controls are self-explanatory. Order can be changed. -->

	                <div class="pswp__counter"></div>

	                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

	                <button class="pswp__button pswp__button--share" title="Share"></button>

	                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

	                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

	                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
	                <!-- element will get class pswp__preloader-active when preloader is running -->
	                <div class="pswp__preloader">
	                    <div class="pswp__preloader__icn">
	                      <div class="pswp__preloader__cut">
	                        <div class="pswp__preloader__donut"></div>
	                      </div>
	                    </div>
	                </div>
	            </div>

	            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
	                <div class="pswp__share-tooltip"></div> 
	            </div>

	            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
	            </button>

	            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
	            </button>

	            <div class="pswp__caption">
	                <div class="pswp__caption__center"></div>
	            </div>

	        </div>

	    </div>

	</div>
        <?php if($elletta_footer_javascript) : ?>
            <?php wp_add_inline_script( 'elletta_scripts', esc_js($elletta_footer_javascript), 'after' ); ?>
        <?php endif; ?>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>