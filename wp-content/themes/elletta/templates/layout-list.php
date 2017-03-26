<?php 
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

global $post, $elletta_sidebar_homepage, $elletta_sidebar_page;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(array("article-item","post","clearfix")); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	
	<?php if(!has_post_format('link') && !has_post_format('quote')) : 
                    if(get_post_format() == 'video') : 
                            get_template_part('templates/post/content'); 
                    else :
                            get_template_part('templates/post/content', get_post_format()); 
                    endif;
            endif; ?>

	<div class="post-entry-wrapper">

		<?php if(!has_post_format('link') && !has_post_format('quote')) : ?>
			<div class="post-list-text-content">
				<div class="post-header">
                                        <?php if(get_theme_mod('show_categories_post')) : ?>
                                                <?php if(has_category()) : ?>
                                                <p><span class="cat"><?php the_category( ', ' ); ?></span></p>	
                                                <?php endif; ?>
                                        <?php endif; ?>
					<h2 itemprop="headline"><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_title(); ?></a></h2>

					<?php if( get_theme_mod('show_author_post') || get_theme_mod('show_date_post')) : ?>
						<div class="date-author">
							<p>							
							<?php if(get_theme_mod('show_date_post')) : ?>
								<span class="date"><?php the_time( get_option('date_format') ); ?></span>
							<?php endif; ?>
							</p>
						</div>
					<?php endif; ?>
				</div>
		<?php endif; ?>

		<?php if(has_post_format('link') || has_post_format('quote')) : ?>
			<div class="post-entry padding40">
				<div class="post-entry-text">
				<?php the_content(__('Continue Reading', 'elletta')); ?>
                                    <?php if(has_post_format('quote')) : 
                                            $elletta_post_quote_author = get_post_meta( $post->ID, 'elletta_post_quote_author', true );?>
                                            <cite><?php echo esc_attr($elletta_post_quote_author);; ?></cite>
                                    <?php endif; ?>
				</div>
			</div>
		<?php else: ?>
			<div class="post-entry">
				<div class="post-entry-text">
				<?php 
					$excerpt = get_the_excerpt();
					if((is_home() && $elletta_sidebar_homepage != 'none') || ((is_archive() || is_search()) && $elletta_sidebar_page) ){
						$trim_words = "20";
					}
					else {
						$trim_words = "75";
					}
					echo "<p>".wp_trim_words( $excerpt , $trim_words )."</p>";
				?>
				<?php wp_link_pages(); ?>
				</div>
			</div>
		<?php endif; ?>

		<?php if(!has_post_format('link') && !has_post_format('quote')) : ?>
			<div class="post-entry-bottom clearfix">
				<?php if(!is_singular()) : ?>
					<a class="custom-more-link" href="<?php echo get_permalink($post->ID); ?>"><?php _e('Continue Reading', 'elletta') ?></a>
				<?php endif; ?>

				<!-- Like Button -->
				<div class="like-comment-buttons-wrapper clearfix">
					<div class="like-comment-buttons">
						<?php echo getPostLikeLink( $post->ID ); ?>
						<?php echo elletta_comment_button( $post->ID ); ?>
					</div>
				</div>
				<!-- Like Button -->
			</div>
		</div>
		<?php endif; ?>
	</div>
</article>