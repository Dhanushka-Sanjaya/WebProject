<?php 
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<?php get_header();
$elletta_sidebar_homepage = get_theme_mod('sidebar_homepage');
$elletta_layout_homepage = explode( '-', get_theme_mod('layout_homepage') );

if( get_theme_mod('show_slider') && ( !wp_is_mobile() || ( wp_is_mobile() && !get_theme_mod('hide_mobile_slider') )) ) :
        get_template_part( 'templates/slider-home' );
endif; ?>

	<?php if(get_theme_mod('show_featured_area')) :            
		do_action( 'elletta_get_featured_posts' );
	endif; ?>
	<div id="main-container" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">	
		<div class="container<?php if( $elletta_sidebar_homepage != 'none' ) : ?> sidebar-open clearfix<?php endif; ?> <?php echo esc_attr($elletta_layout_homepage[0]); ?>-container <?php echo esc_attr($elletta_sidebar_homepage); ?>">		
			<div id="content">
				<div class="post-list <?php echo esc_attr($elletta_layout_homepage[0]); ?>">			
                                <?php if($elletta_layout_homepage[0] == 'blog') : ?>
				<div class="blog-layout">				
				<?php endif; ?>				
				<?php 
                                $elletta_cont_post = 0;
                                if (have_posts()) : while (have_posts()) : the_post(); 
					$elletta_cont_post++;  
                                        if($elletta_layout_homepage[0] == 'blog') : 
                                                get_template_part('templates/layout', 'full'); 
                                        else : 
                                                if($elletta_layout_homepage[1] == 'featured' && $elletta_cont_post == 1) :
                                                        get_template_part('templates/layout', 'full'); ?>
                                                        <div class="<?php echo esc_attr($elletta_layout_homepage[0]); ?>-layout">                                                 
                                                <?php else:
                                                    if($elletta_cont_post == 1) : ?>
                                                            <div class="<?php echo esc_attr($elletta_layout_homepage[0]); ?>-layout">
                                                    <?php  endif;
                                                    get_template_part('templates/layout', $elletta_layout_homepage[0]);                                                     
                                                endif;        
                                        endif; 						
				endwhile; ?>  
                                </div>
                                <!-- end layout -->                               
				<?php elletta_pagination(); ?>                                    
				<?php endif; ?>                                   
                                </div>
                                <!-- end post-list -->
			</div>
                        <!-- end content -->
			<?php if( $elletta_sidebar_homepage != 'none' ) : ?><?php get_sidebar(); ?><?php endif; ?>		
		</div>	
                <!-- end container -->
	</div>
        <!-- end main-container -->
<?php get_footer(); ?>