<?php 
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

global $elletta_cont_post, $elletta_layout_homepage, $elletta_layout_page, $elletta_sidebar_homepage, $elletta_sidebar_page, $elletta_sidebar_post;
$elletta_template_uri = get_template_directory_uri();

?>

<?php $elletta_audio_type = get_post_meta( $post->ID, 'elletta_audio_list', true ); ?>
<?php if ($elletta_audio_type == "embed") :
        $elletta_audio_embed_url = get_post_meta( $post->ID, "elletta_embed_audio_url", true );
?>

<div class="post-featured-item audio-post">
        <div class="audio-wrapper embed">
                <?php echo wp_oembed_get($elletta_audio_embed_url); ?>
        </div>
</div>

<?php elseif ($elletta_audio_type == "native") : ?>
<div class="post-featured-item audio-post">
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
                elseif((is_home() && $elletta_layout_homepage[0] == 'list') || (is_archive() && $elletta_layout_page == 'list') || (is_search() && $elletta_layout_page == 'list')) :
                        $elletta_images_size = 'elletta_thumbnail-list';	
                else :
                        $elletta_images_size = 'elletta_thumbnail-masonry';
                endif;
        endif;
endif;

wp_enqueue_script('wp-mediaelement');

$elletta_audio_file_mp3_url = $elletta_audio_file_mp3_url_link = $elletta_audio_file_oga_url = $elletta_audio_file_oga_url_link = "";

$elletta_audio_file_mp3 = get_post_meta( $post->ID, "elletta_audio_mp3_file" );
foreach ( $elletta_audio_file_mp3 as $info )
{
        $elletta_audio_file_mp3_url = wp_get_attachment_url($info);
        $elletta_audio_file_mp3_url_link = wp_get_attachment_link($info);
}

$elletta_audio_file_oga = get_post_meta( $post->ID, "elletta_audio_oga_file" );
foreach ( $elletta_audio_file_oga as $info )
{
        $elletta_audio_file_oga_url = wp_get_attachment_url($info);
        $elletta_audio_file_oga_url_link = wp_get_attachment_link($info);
}

the_post_thumbnail($elletta_images_size);

?>

        <div class="audio-wrapper native">
                <audio preload="none">
                        <?php if($elletta_audio_file_mp3_url != ""){ ?>
                        <source type="audio/mpeg" src="<?php echo esc_url($elletta_audio_file_mp3_url); ?>">
                        <?php } ?>
                        <?php if($elletta_audio_file_oga_url != ""){ ?>
                        <source type="audio/ogg" src="<?php echo esc_url($elletta_audio_file_oga_url); ?>">
                        <?php } ?>
                        <?php echo esc_url($elletta_audio_file_mp3_url_link).esc_url($elletta_audio_file_oga_url_link); ?>
                </audio>
        </div>
</div>
<?php else :

if(has_post_thumbnail()) : ?>
<div class="post-featured-item audio-post">

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
                        elseif((is_home() && $elletta_layout_homepage[0] == 'list') || (is_archive() && $elletta_layout_page == 'list') || (is_search() && $elletta_layout_page == 'list')) :
                                $elletta_images_size = 'elletta_thumbnail-list';	
                        else :
                                $elletta_images_size = 'elletta_thumbnail-masonry';
                        endif;
                endif;
        endif;

        the_post_thumbnail($elletta_images_size); ?>

</div>
<?php endif;

endif; ?>