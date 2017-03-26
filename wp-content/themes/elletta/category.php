<?php 
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<?php get_header(); ?>
<div class="archive-title-area">		
    <h1 class="page-introduce-title"><strong><?php echo $wp_query->found_posts; ?></strong> <?php printf( __( 'Posts for <strong>%s</strong> Category', 'elletta' ), single_cat_title( '', false ) ); ?></h1>		
</div>
<?php 
$elletta_sidebar_page = get_theme_mod('sidebar_page');
$elletta_layout_page = get_theme_mod('layout_page');
?>
	<div id="main-container">	
            <?php if (have_posts()) : ?>	
		<div class="container<?php if( $elletta_sidebar_page != 'none' ) : ?> sidebar-open clearfix<?php endif; ?> <?php echo esc_attr($elletta_layout_page); ?>-container <?php echo esc_attr($elletta_sidebar_page); ?>">		
			<div id="content">
				<div class="post-list <?php echo esc_attr($elletta_layout_page); ?>">				
                                <?php if($elletta_layout_page == 'blog') : ?>
				<div class="blog-layout">				
				<?php else: ?>
                                <div class="<?php echo esc_attr($elletta_layout_page); ?>-layout">
                                <?php endif; ?>
				<?php 
                                while (have_posts()) : the_post(); 
                                        if($elletta_layout_page == 'blog') : 
                                                get_template_part('templates/layout', 'full'); 
                                        else : 
                                                get_template_part('templates/layout', $elletta_layout_page);                                                          
                                        endif; 						
				endwhile; ?>				
				</div>
				</div>				
                                <?php elletta_pagination(); ?>	
                        </div>
                        <?php if( $elletta_sidebar_page != 'none' ) : ?><?php get_sidebar('detail'); ?><?php endif; ?>		
                </div>
            <?php else : ?>
                <div class="container<?php if( $elletta_sidebar_page != 'none' ) : ?> sidebar-open clearfix<?php endif; ?> <?php echo esc_attr($elletta_layout_page); ?>-container <?php echo esc_attr($elletta_sidebar_page); ?>">
                        <div id="content" class="post">
                                <div class="entry-content">
                                        <h2><?php esc_html_e( "We Can't Find Anything For", 'elletta' ); ?> <span class="search-query"><?php echo single_cat_title( '', false ); ?></span></h2>
                                        <p><?php esc_html_e( "Would You Like To Do More Search?", 'elletta' ); ?></p>
                                </div><!-- .entry-content -->	

                                <div class="inline-search-wrapper">
                                        <?php get_search_form(); ?>
                                </div>
                        </div>
                        <?php if( $elletta_sidebar_page != 'none' ) : ?><?php get_sidebar('detail'); ?><?php endif; ?>	
                </div>
            <?php endif; ?>					
	</div>
<?php get_footer(); ?>