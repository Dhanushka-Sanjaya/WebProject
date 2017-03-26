<?php 
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

$elletta_post_per_page = get_theme_mod('number_posts');
$elletta_slider_post = get_theme_mod('slider_posts');
$elletta_slider_boxed = get_theme_mod( 'boxed_slider' );
$elletta_slider_transition = get_theme_mod( 'slider_transition' );
$elletta_slider_autoplay = get_theme_mod( 'autoplay_slider' );

if( $elletta_slider_post == 'category_posts' ) :
    $elletta_post_category = get_theme_mod('category_slider_posts');
    $args = array(
            'posts_per_page' => $elletta_post_per_page,
            'cat' => $elletta_post_category,
            'meta_query' => array(
                    array(
                     'key' => '_thumbnail_id',
                     'compare' => 'EXISTS'
                    ),
                )
    );
elseif( $elletta_slider_post == 'slider_posts' ) :
    $args = array(
            'post__in' => get_theme_mod('slider_selected_posts'), 
            'meta_query' => array(
                    array(
                     'key' => '_thumbnail_id',
                     'compare' => 'EXISTS'
                    ),
                )
    );
else :
    $args = array(
        'posts_per_page' => $elletta_post_per_page,
        'meta_query' => array(
                    array(
                     'key' => '_thumbnail_id',
                     'compare' => 'EXISTS'
                    ),
                )
    );
endif;

$elletta_slider_query = new WP_Query($args);
if ( $elletta_slider_query->have_posts() ) :
?>
<div class="featured-area <?php if($elletta_slider_boxed) : ?> boxed <?php endif; ?>" data-slider-type="slider" data-slider-transition="<?php echo esc_attr($elletta_slider_transition); ?>"<?php if($elletta_slider_autoplay) echo ' data-slider-autoplay-enabled="1"'; ?>>
	
	<?php if($elletta_slider_boxed) : ?>
	<div class="container">
	<?php endif; ?>

	<div class="swiper-container-wrapper">

		<div class="swiper-container">
	        <div class="swiper-wrapper">

	        	<?php  while ($elletta_slider_query->have_posts()) : $elletta_slider_query->the_post(); 
                                    if(wp_is_mobile()) {
                                                    $elletta_image_size = 'elletta_thumbnail-full';
                                    }
                                    else {
                                                    if(!$elletta_slider_boxed){
                                                                    $elletta_image_size = 'full';
                                                    }
                                                    else {
                                                                    $elletta_image_size = 'elletta_thumbnail-full';
                                                    }
                                    }
                        $elletta_thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $elletta_image_size );
                        if($elletta_thumb_image_url) :?>
                                <div class="swiper-slide">
                                    <div class="slider-item" data-bg-src="<?php echo esc_url($elletta_thumb_image_url[0]); ?>">

                                            <?php if(!$elletta_slider_boxed) : ?>
                                            <div class="container">
                                            <?php endif; ?>

                                                    <div class="vertical-middle">
                                                            <div class="vertical-middle-inner">
                                                                    <div class="item-header-wrapper">
                                                                            <?php if(get_theme_mod('show_categories_slider')) : ?>
                                                                                    <span class="cat item-postit">
                                                                                    <?php if(has_category()) : ?>
                                                                                    <?php the_category( ', ' ); ?>
                                                                                    <?php endif; ?>
                                                                                    </span>
                                                                            <?php endif; ?>
                                                                            <h2><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h2>
                                                                            <?php if(get_theme_mod('show_author_slider') || get_theme_mod('show_date_slider')) : ?>
                                                                            <span class="date-author">
                                                                                    <?php if(get_theme_mod('show_author_slider')) : ?>
                                                                                            <span class="author"><?php the_author(); ?></span>
                                                                                    <?php endif; ?>
                                                                                    <?php if(get_theme_mod('show_author_slider') && get_theme_mod('show_date_slider')) : 
                                                                                            echo "<span class='seperator'>-</span>";
                                                                                            endif; ?>
                                                                                    <?php if(get_theme_mod('show_date_slider')) : ?>
                                                                                            <span class="date"><?php the_time( get_option('date_format') ); ?></span>
                                                                                    <?php endif; ?>

                                                                            </span>
                                                                            <?php endif; ?>
                                                                    </div>
                                                            </div>
                                                    </div>

                                            <?php if(!$elletta_slider_boxed) : ?>
                                            </div>
                                            <?php endif; ?>

                                    </div>

                            </div>
				<?php endif; 
                                endwhile; ?>

	        </div>
	        <!-- Add Pagination -->
	        <div class="swiper-pagination"></div>

	    </div>

	    <!-- Add Next/Prev -->
	    <div class="swiper-button-prev-custom"><i class="fa fa-long-arrow-left"></i></div>
            <div class="swiper-button-next-custom"><i class="fa fa-long-arrow-right"></i></div>

	</div>

	<?php if($elletta_slider_boxed) : ?>
	</div>
	<?php endif; ?>
	
</div>
<?php endif; ?>