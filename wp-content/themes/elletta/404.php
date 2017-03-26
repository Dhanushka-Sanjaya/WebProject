<?php 
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php get_header(); ?>
	
	<div id="main-container">		
                <div class="error-404">
                        <?php esc_html_e( '404', 'elletta' ); ?>
                        <h1><?php esc_html_e( 'Page not Found', 'elletta' ); ?></h1>
                </div>
                
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
                <div class="container">
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
                </div>
                <?php endif; ?>
                
	</div>		
<?php get_footer(); ?>