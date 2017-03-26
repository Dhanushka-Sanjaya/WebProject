<?php 
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

global $elletta_layout_homepage, $elletta_layout_page, $elletta_cont_post, $elletta_sidebar_homepage, $elletta_sidebar_page, $elletta_sidebar_post;

$elletta_images = get_post_meta( $post->ID, 'elletta_post_gallery_images' );
$elletta_gallery_type = get_post_meta( $post->ID, 'elletta_gallery_layout', true );
$elletta_post_gallery_row_height = get_post_meta( $post->ID, 'elletta_post_gallery_row_height', true );

$elletta_template_uri = get_template_directory_uri();

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
		if((is_home() && $elletta_layout_homepage[0] == 'blog')) :
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
                elseif(is_home() && $elletta_layout_homepage[1] == 'featured' && $elletta_cont_post == 1) :
                        if( $elletta_sidebar_homepage == 'none' ) :
                            $elletta_images_size = 'elletta_thumbnail-full';	
                        else :
                            $elletta_images_size = 'elletta_thumbnail-full-sidebar';
                        endif; 
                        $class_full = 'full';
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
			
<?php if($elletta_images) : 
if((is_home() && ($elletta_layout_homepage[0] == 'list' || $elletta_layout_homepage[0] == 'grid') && !( $elletta_layout_homepage[1] == 'featured' && $elletta_cont_post == 1 )) || ((is_archive() || is_search()) && ($elletta_layout_page == 'list' || $elletta_layout_page == 'grid'))) : ?> 
<div class="post-featured-item gallery-post">
  <div class="fotorama" data-nav="true" data-allowfullscreen="true" data-click="false" data-loop="true">
            <?php foreach($elletta_images as $image) : ?>
            <?php
            $elletta_image_full = wp_get_attachment_image_src( $image, $elletta_images_size );
            $elletta_caption = get_post($image)->post_excerpt;
            ?>
            <img src="<?php echo esc_url($elletta_image_full[0]); ?>" width="<?php echo esc_attr($elletta_image_full[1]); ?>" height="<?php echo esc_attr($elletta_image_full[2]); ?>" alt="<?php echo esc_html($elletta_caption); ?>" <?php if($elletta_caption) : ?>data-caption="<?php echo esc_html($elletta_caption); ?>"<?php endif; ?> />
            <?php endforeach; ?>

    </div>  
</div>
<?php else : ?>
        <div class="post-featured-item gallery-post">

                <?php if($elletta_gallery_type == "gallery-thumbnail" && !wp_is_mobile()) : ?>
                <div class="justified-gallery" data-row-height="<?php echo esc_attr($elletta_post_gallery_row_height); ?>">

                        <?php foreach($elletta_images as $image) : ?>

                                <?php

                                        $elletta_image = wp_get_attachment_image_src( $image, 'elletta_thumbnail-masonry' );
                                        $elletta_image_full = wp_get_attachment_image_src( $image, "full" );
                                        $elletta_caption = get_post($image)->post_excerpt; 
                                ?>
                                <div class="item">
                                        <a href="<?php echo esc_url($elletta_image_full[0]); ?>">
                                                <img src="<?php echo esc_url($elletta_image[0]); ?>" width="<?php echo esc_attr($elletta_image[1]); ?>" height="<?php echo esc_attr($elletta_image[2]); ?>" alt="<?php echo esc_html($elletta_caption); ?>" title="<?php echo esc_html($elletta_caption); ?>" />
                                                <?php if($elletta_caption) : ?><span class="caption-container"><span class="custom-caption"><?php echo esc_html($elletta_caption); ?></span></span><?php endif; ?>
                                        </a>
                                </div>

                        <?php endforeach; ?>

                </div>
                <?php else : ?>
                <div class="fotorama" data-nav="true" data-allowfullscreen="true" data-click="false" data-loop="true">

                        <?php foreach($elletta_images as $image) : ?>

                        <?php
                        $elletta_image_full = wp_get_attachment_image_src( $image, $elletta_images_size );
                        $elletta_caption = get_post($image)->post_excerpt;
                        ?>
                        <img src="<?php echo esc_url($elletta_image_full[0]); ?>" width="<?php echo esc_attr($elletta_image_full[1]); ?>" height="<?php echo esc_attr($elletta_image_full[2]); ?>" alt="<?php echo esc_html($elletta_caption); ?>" <?php if($elletta_caption) : ?>data-caption="<?php echo esc_html($elletta_caption); ?>"<?php endif; ?> />
                        <?php endforeach; ?>

                </div>
                <?php endif; ?>

        </div>

<?php 
endif;
else : ?>
<?php if(has_post_thumbnail()){ ?>
<div class="post-featured-item gallery-post">
<?php
	the_post_thumbnail($elletta_images_size); ?>
</div>
<?php } ?>
<?php endif; ?>