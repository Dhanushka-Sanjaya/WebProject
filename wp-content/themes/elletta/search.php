<?php 
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }
$elletta_sidebar_page = get_theme_mod('sidebar_page');
$elletta_layout_page = get_theme_mod('layout_page');
$elletta_category_total_posts = $wp_query->found_posts;
?>

<?php get_header(); ?>
	
	<div class="archive-title-area search-page">

		<h1 class="page-introduce-title"><?php echo $elletta_category_total_posts; ?></strong> <?php esc_html_e( 'Search results for', 'elletta' ); ?> <span class="search-query"><?php echo get_search_query(); ?></span></h1>
		
	</div>
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
				
					<?php while (have_posts()) : the_post(); ?>								
						<?php 
                                                if($elletta_layout_page == 'blog') : 
                                                        get_template_part('templates/layout', 'full'); 
                                                else : 
                                                        get_template_part('templates/layout', $elletta_layout_page);                                                          
                                                endif; 
                                                ?>							
					<?php endwhile; ?>
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
						<h2><?php esc_html_e( "Sorry, no posts were found. Try searching for something else.", 'elletta' ); ?></h2>
					</div><!-- .entry-content -->	

					<?php $args = array(
                                                'posts_per_page' => 3,
                                                'nopaging' => 0,
                                                'post_status' => 'publish',
                                                'ignore_sticky_posts' => 1,
                                                'tax_query' => array(
                                                  array(
                                                    'taxonomy' => 'post_format',
                                                    'field' => 'slug',
                                                    'terms' => array('post-format-link', 'post-format-quote' ),
                                                    'operator' => 'NOT IN'
                                                  )
                                                )
                                              );

                                        $my_query = new wp_query( $args );
                                        if( $my_query->have_posts() ) : ?>
                                        <div class="related-posts">
                                                <div class="box-title-area">
                                                        <h4 class="title">
                                                            <?php esc_html_e('You Might Also Like', 'elletta'); ?>
                                                        </h4>
                                                </div>
                                                <div class="related-posts-inner clearfix">
                                                    <?php while( $my_query->have_posts() ) : 
                                                        $my_query->the_post(); ?>
                                                        <div class="item">
                                                                <div class="related-post-image ">
                                                                    <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
                                                                    <a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('thumbnail-grid'); ?></a>
                                                                    
                                                                    <?php endif; ?>
                                                                </div>
                                                                <h3>
                                                                        <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                                                                </h3>
                                                                <span class="date"><?php the_time( get_option('date_format') ); ?></span>
                                                        </div>
                                                        <?php endwhile; ?>
                                                </div>
                                        </div>
                                        <?php endif; ?>
				</div>
                                <?php if( $elletta_sidebar_page != 'none' ) : ?><?php get_sidebar('detail'); ?><?php endif; ?>	
			</div>
				
			<?php endif; ?>
			
			</div>
		</div>
	</div>	
<?php get_footer(); ?>