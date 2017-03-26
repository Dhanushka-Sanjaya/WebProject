<?php

 //Render dynamic styles based on theme options
function elletta_dynamic_styles() {
	include (elletta_THEME_DIR . '/customizer/customizer-defaults.php');        
	?>
	<style type="text/css" media="screen">
		<?php
		include (elletta_THEME_DIR . '/inc/assets/css/dynamic-style.php');
		?>
	</style>
	<?php
}
add_action( 'wp_head', 'elletta_dynamic_styles' );

// Comment button
function elletta_comment_button($id) {

	if ( comments_open() || have_comments() ) :
                $output = '<a class="comment-button" href="'.esc_url(get_comments_link( $id )).'"><i class="fa fa-comment-o"></i> '.get_comments_number( $id ).'</a>';
	else :
                $output = "";
	endif;

	return $output;
}

// Featured Posts
function elletta_get_featured_posts(){
	require_once( elletta_THEME_DIR . '/templates/featured_posts.php' );
}

add_action('elletta_get_featured_posts', 'elletta_get_featured_posts', 1);


// Post like Init

function elletta_post_like_init(){
	require_once( elletta_THEME_DIR . '/inc/post-like.php' );
}

add_action('init', 'elletta_post_like_init', 2);

function elletta_pagination_init(){
	// Included Load More Functionality
	if(get_theme_mod('pagination_type') == "load-more"){
                /**
                * Plugin Name: PBD AJAX Load Posts
                * Plugin URI: http://www.problogdesign.com/
                * Description: Load the next page of posts with AJAX.
                * Version: 0.1
                * Author: Pro Blog Design
                * Author URI: http://www.problogdesign.com/
                */
           
                global $wp_query;       
                if( !is_singular() ) :	
                        // Queue JS and CSS
                        wp_enqueue_script(
                                'pbd-alp-load-posts',
                                elletta_INCLUDES_DIR . 'assets/js/load-posts.js', array(), NULL, true
                        ); 	

                        // What page are we on? And what is the pages limit?
                        $max = $wp_query->max_num_pages;
                        $paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;

                        // Add some parameters for the JS.
                        wp_localize_script(
                                'pbd-alp-load-posts',
                                'pbd_alp',
                                array(
                                        'startPage' => $paged,
                                        'maxPages' => $max,
                                        'nextLink' => next_posts($max, false)
                                )
                        );
                    endif;
        }

}
add_action('template_redirect', 'elletta_pagination_init');

// Pagination
function elletta_pagination() {

	$pagination_type = get_theme_mod('pagination_type');

	if($pagination_type == "classic" && (get_previous_posts_link() || get_next_posts_link())) :
        ?>	
	<div class="pagination clearfix">
		<div class="older animative-btn"><?php next_posts_link( esc_html__("Older Posts", 'elletta') ); ?></div>
		<div class="newer animative-btn"><?php previous_posts_link( esc_html__("Newer Posts", 'elletta') ); ?></div>
	</div>					
	<?php		
	elseif($pagination_type == "load-more") : ?>
        <div class="pagination load-more">
                <p id="pbd-alp-load-posts"><a href="#" class="animative-btn"><span class="throbber-loader"></span><span class="text"><?php esc_html_e('Want to See More Stories?', 'elletta'); ?></span></a></p>
        </div>

        <?php  
        elseif($pagination_type == "numeric") : 
            global $wp_query;
            $total = $wp_query->max_num_pages;
            // solo seguimos con el resto si tenemos más de una página
            if ( $total > 1 )  :
                // obtenemos la página actual
                if ( !$current_page = get_query_var('paged') ) :
                     $current_page = 1;
                 endif;
                if( get_option('permalink_structure') ) :
                      $format = 'page/%#%/';
                else :
                      $format = '&paged=%#%';  
                endif; ?>
                <div class="pagination clearfix">
                <?php echo paginate_links(array(
                        'base' => get_pagenum_link(1) . '%_%',
                        'format' => $format,
                        'current' => $current_page,
                        'prev_next' => True,
                        'prev_text' => esc_html__('&laquo; Previous', 'elletta'),
                        'next_text' => esc_html__('Next &raquo;', 'elletta'),
                        'total' => $total,
                        'mid_size' => 4,
                        'type' => 'list'
                )); ?>
                </div>	
            <?php endif; 
        endif;
}



// Comments Layout
function elletta_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		
		<div class="comment-item">
					
			<div class="author-img">
				<?php echo get_avatar($comment,60); ?>
			</div>
			
			<div class="comment-text">
				<span class="author"><?php echo get_comment_author_link(); ?></span>
				<span class="date"><?php printf(__('%1$s at %2$s', 'elletta'), get_comment_date(),  get_comment_time()) ?></span>
				<?php if ($comment->comment_approved == '0') : ?>
					<em><i class="icon-info-sign"></i> <?php esc_html_e('Comment awaiting approval', 'elletta'); ?></em>
					<br />
				<?php endif; ?>
				<?php comment_text(); ?>

				<span class="reply">
					<?php comment_reply_link(array_merge( $args, array('reply_text' => esc_html__('Reply', 'elletta'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?>
					<?php edit_comment_link(__('Edit', 'elletta')); ?>
				</span>
				
			</div>
					
		</div>
		
		
	</li>

	<?php 
}

function elletta_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count=='') :
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 ".__('Wiew', 'elletta');
    endif;
    return $count . ' ' . esc_html__('Wiews', 'elletta');
}
function elletta_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count=='') :
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    else :
        $count++;
        update_post_meta($postID, $count_key, $count);
    endif;
}
// Remove issues with prefetching adding extra views
//remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// Author Social Links
function elletta_user_contact_methods( $elletta_contact_methods ) {

	$elletta_contact_methods['twitter']   = esc_html__( 'Twitter Username', 'elletta');
	$elletta_contact_methods['facebook']  = esc_html__( 'Facebook Username', 'elletta');
	$elletta_contact_methods['google']    = esc_html__( 'Google Plus Username', 'elletta');
	$elletta_contact_methods['tumblr']    = esc_html__( 'Tumblr Username', 'elletta');
	$elletta_contact_methods['instagram'] = esc_html__( 'Instagram Username', 'elletta');
	$elletta_contact_methods['pinterest'] = esc_html__( 'Pinterest Username', 'elletta');

	return $elletta_contact_methods;
}
add_filter('user_contact_methods','elletta_user_contact_methods',10,1);

// FACEBOOK OPEN GRAPH
if ( ! function_exists( 'elletta_openGraph' ) ) :
function elletta_openGraph() {
	global $post;
	$excerpt = "";

	echo "<meta property='og:site_name' content='". get_bloginfo('name') ."'/>";
	echo "<meta property='og:url' content='" . get_permalink() . "'/>";

	if(has_excerpt()) :
		$excerpt = strip_tags($post->post_excerpt);
                $excerpt = str_replace("", "'", $excerpt);
		echo '<meta property="og:description" content="'.$excerpt.'">';
            endif;

	if (is_single() && $post->post_type == "post") :
                echo "<meta property='og:title' content='" . strip_tags(get_the_title()) . "'/>"; 
                echo "<meta property='og:type' content='article'/>"; 
        elseif (is_front_page() or is_home()) :
                echo "<meta property='og:title' content='" . get_bloginfo("name") . "'/>"; 
                echo "<meta property='og:type' content='website'/>"; 
        else :
                echo "<meta property='og:title' content='" . strip_tags(get_the_title()) . "'/>";
                echo "<meta property='og:type' content='website'/>";
        endif;

	if(is_single() && has_post_thumbnail( $post->ID )) :
		$ev_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail-grid' );
		echo "<meta property='og:image' content='" . esc_attr( $ev_thumbnail[0] ) . "'/>"; 
            endif;

}

add_action( 'wp_head', 'elletta_openGraph', 5 );
endif;