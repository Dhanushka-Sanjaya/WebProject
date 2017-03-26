<?php 
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) : exit; endif;

global $post, $elletta_cont_post, $elletta_layout_homepage, $elletta_layout_page, $elletta_sidebar_homepage, $elletta_sidebar_page, $elletta_sidebar_post;
$elletta_class_full = '';
if(wp_is_mobile()) :
        $elletta_images_size = 'elletta_thumbnail-slider';
else:
	if(is_single()) :
		if( $elletta_sidebar_post == 'none' ) :
                    $elletta_images_size = 'elletta_thumbnail-full';	
                else :
                    $elletta_images_size = 'elletta_thumbnail-full-sidebar';
                endif;
	else :
		if(is_home() && $elletta_layout_homepage[0] == 'blog') :
			if( $elletta_sidebar_homepage == 'none' ) :
                            $elletta_images_size = 'elletta_thumbnail-full';	
                        else :
                            $elletta_images_size = 'elletta_thumbnail-full-sidebar';
                        endif;  
                elseif((is_archive() && $elletta_layout_page == 'blog') || (is_search() && $elletta_layout_page == 'blog')) :
                        if( $elletta_sidebar_page == 'none' ) :
                            $elletta_images_size = 'elletta_thumbnail-full';	
                        else :
                            $elletta_images_size = 'elletta_thumbnail-full-sidebar';
                        endif; 
                elseif($elletta_layout_homepage[1] == 'featured' && $elletta_cont_post == 1) :
                        if( $elletta_sidebar_homepage == 'none' ) :
                            $elletta_images_size = 'elletta_thumbnail-full';	
                        else :
                            $elletta_images_size = 'elletta_thumbnail-full-sidebar';
                        endif;
                        $elletta_class_full = 'full';
		elseif((is_home() && $elletta_layout_homepage[0] == 'list')) :
                        if( $elletta_sidebar_homepage == 'none' ) :
                            $elletta_images_size = 'elletta_thumbnail-list';	
                        else :
                            $elletta_images_size = 'elletta_thumbnail-list-sidebar';
                        endif; 
                elseif((is_archive() && $elletta_layout_page == 'list') || (is_search() && $elletta_layout_page == 'list')) :
                        if( $elletta_sidebar_page == 'none' ) :
                            $elletta_images_size = 'elletta_thumbnail-list';	
                        else :
                            $elletta_images_size = 'elletta_thumbnail-list-sidebar';
                        endif; 
                else :
			$elletta_images_size = 'elletta_thumbnail-masonry';
                endif;
        endif;
endif;
?>

<?php $elletta_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), $elletta_images_size ); ?>
<?php $elletta_caption = get_post_field('post_excerpt', $post->ID);
if($elletta_featured_image):

?>
<div class="post-featured-item <?php echo esc_attr($elletta_class_full);  ?>">
        <?php if(!is_single()) : ?>
        <a href="<?php echo get_permalink(); ?>">
        <?php endif; ?>
            <img itemprop="image" src="<?php echo esc_url($elletta_featured_image[0]); ?>" alt="<?php the_title(); ?>"  title="<?php the_title(); ?>" width="<?php echo esc_attr($elletta_featured_image[1]); ?>" height="<?php echo esc_attr($elletta_featured_image[2]); ?>" />
            <?php if(get_post_format() == 'video') :  ?>
            <span class="view-video"></span>          
            <?php endif; ?>
        <?php if(!is_single()) : ?>
        </a>
        <?php endif; ?>
</div>

<?php endif; ?>
