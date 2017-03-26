<?php 
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

global $post;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(array("article-item","post")); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	
    
	<?php if(!has_post_format('link') && !has_post_format('quote')) : ?>	
                <div class="post-header">

                <?php if(get_theme_mod('show_categories_post')) : ?>
                        <?php if(has_category()) : ?>
                        <span class="cat"><?php the_category( ', ' ); ?></span>	
                        <?php endif; ?>
                <?php endif; ?>

                <?php if(is_single()) : ?>
                        <h1 itemprop="headline"><?php the_title(); ?></h1>
                <?php else : ?>
                        <h2 itemprop="headline"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h2>
                <?php endif; ?>
			
		</div>
		<?php get_template_part('templates/post/content', get_post_format() ); ?>
	<?php endif; ?>

        <div class="post-entry full">                
		<div class="post-entry-text" itemprop="text">
                <?php if(!has_post_format('link') && !has_post_format('quote') && !is_single()) : 
                    the_excerpt(); 
                else :
                    the_content();
                endif;
                ?>                   
                <?php if(has_post_format('quote')) : 
                    $elletta_post_quote_author = get_post_meta( $post->ID, 'elletta_post_quote_author', true );?>
                    <cite><?php echo esc_attr($elletta_post_quote_author);; ?></cite>
                <?php endif; ?>
		<?php if(get_theme_mod('show_author_post') || get_theme_mod('show_date_post') || get_theme_mod('show_views_post')) : ?>
			<?php if(!has_post_format('link') && !has_post_format('quote')) : ?>
				<div class="date-author">
					<?php if(get_theme_mod('show_author_post')) : ?>
						<?php esc_html_e('Written by', 'elletta') ?>
						<span class="author" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><?php the_author(); ?> </span>
					<?php endif; ?>
					<?php if(get_theme_mod('show_date_post')) : ?>
						<?php esc_html_e('in', 'elletta') ?>
						<span class="date" datetime="<?php the_time('c'); ?>" itemprop="datePublished"><?php the_time( get_option('date_format') ); ?> </span>
					<?php endif; ?>
                                        <?php if(get_theme_mod('show_views_post')) : ?>
                                                / <span class="views"><?php echo elletta_getPostViews( $post->ID ); ?></span>
					<?php /* <!-- mfunc elletta_setPostViews(get_the_ID()); --><!-- /mfunc --> If you are using a caching plugin like W3 Total Cache */
                                              endif; ?>                                                        
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php wp_link_pages(); ?>
		</div>
	</div>

	<?php if(!has_post_format('link') && !has_post_format('quote')) : ?>
		
		<?php if(!is_singular()) : ?>
			<div class="post-entry-bottom clearfix full">
				<a class="custom-more-link" href="<?php echo get_permalink($post->ID); ?>"><?php esc_html_e('Continue Reading', 'elletta') ?></a>
				<!-- Like Button -->
				<div class="like-comment-buttons-wrapper clearfix">
					<div class="like-comment-buttons">
						<?php echo getPostLikeLink( $post->ID ); ?>
						<?php echo elletta_comment_button( $post->ID ); ?>
					</div>
				</div>
				<!-- Like Button -->
			</div>
		<?php else: ?>
                    
                <?php endif; ?>
                <?php if((get_theme_mod('show_tags_post') || get_theme_mod('show_share_buttons_post')) && is_single()) : ?>
                        <div class="post-line-bottom">
                                <?php if(get_theme_mod('show_tags_post')) : ?>
                                        <?php if(is_single() && has_tag()) : ?>
                                                <div class="post-tags">
                                                        <em><?php esc_html_e("Tags", 'elletta') ?></em> | <?php the_tags("",", "); ?>
                                                </div>
                                        <?php endif; ?>
                                <?php endif; ?>

                                <?php  if(get_theme_mod('show_share_buttons_post')) : ?>
                                <!-- Share Buttons -->
                                <div class="post-share">
                                        <div class="post-share-inner">
                                                <ul>
                                                        <li class="share-item facebook"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode(get_the_permalink()); ?>"><span class="share-box"><i class="fa fa-facebook"></i></span></a></li>
                                                        <li class="share-item twitter"><a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(strip_tags(get_the_title())); ?>+-+<?php echo rawurlencode(get_the_permalink());; ?>"><span class="share-box"><i class="fa fa-twitter"></i></span></a></li>
                                                        <?php $pin_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),"elletta_thumbnail-full"); ?>
                                                        <li class="share-item pinterest"><a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo rawurlencode(get_the_permalink()); ?>&amp;media=<?php echo rawurlencode($pin_image[0]); ?>&amp;description=<?php echo urlencode(strip_tags(get_the_title())); ?>"><span class="share-box"><i class="fa fa-pinterest"></i></span></a></li>
                                                        <li class="share-item google"><a target="_blank" href="https://plus.google.com/share?url=<?php echo rawurlencode(get_the_permalink()); ?>"><span class="share-box"><i class="fa fa-google-plus"></i></span></a></li>
                                                        <li class="share-item e-mail"><a target="_blank" href="mailto:?Subject=<?php echo urlencode(strip_tags(get_the_title()));?>&amp;Body=<?php echo rawurlencode(get_the_permalink()); ?>"><span class="share-box"><i class="fa fa-envelope-o"></i></span></a></li>
                                                </ul>
                                        </div>
                                </div>
                                <!-- Share Buttons -->
                                <?php endif; ?>
                        </div>
                <?php endif; ?>
	<?php endif; ?>
</article>

<?php if(get_theme_mod('show_author_box_post') && is_single()) : ?>
<div class="post-author">
	<div class="author-img">
		<?php echo get_avatar( get_the_author_meta('email'), '100' ); ?>
	</div>
	
	<div class="author-content">
                <h6><?php esc_html_e('AUTHOR', 'elletta'); ?></h6>
		<h5><?php the_author_posts_link(); ?></h5>
		<div class="author-info">
			<p><?php the_author_meta('description'); ?></p>
                        <div>
			<?php if(get_the_author_meta('facebook')) : ?><a target="_blank" class="author-social" href="<?php echo the_author_meta('facebook'); ?>"><i class="fa fa-facebook"></i></a><?php endif; ?>
			<?php if(get_the_author_meta('twitter')) : ?><a target="_blank" class="author-social" href="<?php echo the_author_meta('twitter'); ?>"><i class="fa fa-twitter"></i></a><?php endif; ?>
			<?php if(get_the_author_meta('instagram')) : ?><a target="_blank" class="author-social" href="<?php echo the_author_meta('instagram'); ?>"><i class="fa fa-instagram"></i></a><?php endif; ?>
			<?php if(get_the_author_meta('google')) : ?><a target="_blank" class="author-social" href="<?php echo the_author_meta('google'); ?>"><i class="fa fa-google-plus"></i></a><?php endif; ?>
			<?php if(get_the_author_meta('pinterest')) : ?><a target="_blank" class="author-social" href="<?php echo the_author_meta('pinterest'); ?>"><i class="fa fa-pinterest"></i></a><?php endif; ?>
			<?php if(get_the_author_meta('tumblr')) : ?><a target="_blank" class="author-social" href="<?php echo the_author_meta('tumblr'); ?>"><i class="fa fa-tumblr"></i></a><?php endif; ?>
                        </div>
                </div>
	</div>
	
</div>
<?php endif; ?>

<?php if(get_theme_mod('show_related_posts_post') && is_single()) : 
$tags = get_the_tags($post->ID);

if ($tags) :
	$tag_ids = array();
	foreach($tags as $individual_tags) $tag_ids[] = $individual_tags->term_id;
	
	$args = array(
		'tag__in'     => $tag_ids,
		'post__not_in'     => array($post->ID),
		'posts_per_page'   => 3, // Number of related posts that will be shown.
		'ignore_sticky_posts' => 1,
		'orderby' => 'rand'
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
                                            <a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('elletta_thumbnail-featured-3'); ?></a>
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
<?php   endif;
endif;
wp_reset_postdata();
endif; ?>

<?php if(is_single() && get_theme_mod('show_comments_post')) : ?>
    <?php comments_template( '', true );  ?>
<?php endif; ?>

<?php if(get_theme_mod('show_post_navigation_post') && is_single()) : ?>
<div class="pagination post-pagination clearfix">
	<?php
	$prev_post = get_previous_post();
	$next_post = get_next_post();
	?>	
	<?php if (!empty( $prev_post )) : ?>
	<div class="older">
		<a class="animative-btn" href="<?php echo get_permalink( $prev_post->ID ); ?>">
			<?php esc_html_e("Previous Post", 'elletta'); ?>
		</a>
	</div>
	<?php endif; ?>
	
	<?php if (!empty( $next_post )) : ?>
	<div class="newer">
		<a class="animative-btn" href="<?php echo get_permalink( $next_post->ID ); ?>">
			<?php esc_html_e("Next Post", 'elletta'); ?>
		</a>
	</div>
	<?php endif; ?>
		
</div>
<?php endif; ?>