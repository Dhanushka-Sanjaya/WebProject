<?php
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

global $elletta_cont_post, $elletta_layout_homepage, $elletta_layout_page, $elletta_sidebar_homepage, $elletta_sidebar_page, $elletta_sidebar_post;
$elletta_video_type = get_post_meta( $post->ID, 'elletta_video_list', true );
$elletta_template_uri = get_template_directory_uri();

$elletta_video_file_mp4_url = $elletta_video_file_mp4_url_link = $elletta_video_file_webm_url = $elletta_video_file_ogv_url = $elletta_video_file_webm_url_link = $elletta_video_file_ogv_url_link = "";

?>
<?php if ($elletta_video_type == "embed") :
        $elletta_video_embed_url = get_post_meta( $post->ID, "elletta_embed_video_url", true );
	?>

        <?php if($elletta_video_embed_url): ?>
        <div class="post-featured-item video-post">
                <div class="video-wrapper embed">
                        <?php echo wp_oembed_get($elletta_video_embed_url); ?>
                </div>
        </div>
        <?php endif; ?>

	<?php elseif ($elletta_video_type == "native") :

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

		$elletta_video_poster = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $elletta_images_size );
		$elletta_video_poster = $elletta_video_poster[0];

		$elletta_video_file_mp4 = get_post_meta( $post->ID, "elletta_inner_video_file_mp4" );
		foreach ( $elletta_video_file_mp4 as $info ) :
			$elletta_video_file_mp4_url = wp_get_attachment_url($info);
			$elletta_video_file_mp4_url_link = wp_get_attachment_link($info);
                endforeach;

		$elletta_video_file_webm = get_post_meta( $post->ID, "elletta_inner_video_file_webm" );
		foreach ( $elletta_video_file_webm as $info ) :
			$elletta_video_file_webm_url = wp_get_attachment_url($info);
			$elletta_video_file_webm_url_link = wp_get_attachment_link($info);
                endforeach;

		$elletta_video_file_ogv = get_post_meta( $post->ID, "elletta_inner_video_file_ogv" );
		foreach ( $elletta_video_file_ogv as $info ) :
			$elletta_video_file_ogv_url = wp_get_attachment_url($info);
			$elletta_video_file_ogv_url_link = wp_get_attachment_link($info);
                endforeach;

		?>

		<?php if($elletta_video_file_mp4 || $elletta_video_file_webm): ?>
		<div class="post-featured-item video-post">
			<div class="video-wrapper native">
				<video preload="none" style="width:100%;height:100%;" poster="<?php echo esc_attr($elletta_video_poster); ?>">
					<?php if($elletta_video_file_webm_url != "") : ?>
					<source type="video/webm" src="<?php echo esc_url($elletta_video_file_webm_url); ?>">
					<?php endif; ?>
					<?php if($elletta_video_file_mp4_url != "") : ?>
					<source type="video/mp4" src="<?php echo esc_url($elletta_video_file_mp4_url); ?>">
					<?php endif; ?>
					<?php if($elletta_video_file_ogv_url != "") : ?>
					<source type="video/ogg" src="<?php echo esc_url($elletta_video_file_ogv_url); ?>">
					<?php endif; ?>
					<?php echo esc_url($elletta_video_file_mp4_url_link).esc_url($elletta_video_file_webm_url_link).esc_url($elletta_video_file_ogv_url_link); ?>
				</video>
			</div>
		</div>
		<?php endif;

	else : ?>
	<?php if(has_post_thumbnail()) : ?>
	<div class="post-featured-item video-post">

	<?php
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

		the_post_thumbnail($elletta_images_size); ?>
		
	</div>
	<?php endif; ?>
<?php endif; ?>
