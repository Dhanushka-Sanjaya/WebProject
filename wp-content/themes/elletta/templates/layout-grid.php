<?php 
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<article class="post-item article-item" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<div id="post-<?php the_ID(); ?>" <?php post_class(array("post","item")); ?>>

		<?php if(!has_post_format('link') && !has_post_format('quote')) : ?>
                        <?php get_template_part('templates/post/content', get_post_format()); ?>
		<?php endif; ?>
		
		<div class="item-content">
			<?php if(has_post_format('link') || has_post_format('quote')) : ?>
			<div class="post-entry">
			<?php else : ?>
			<div class="post-entry">
			<?php endif; ?>
				<?php if(!has_post_format('link') && !has_post_format('quote')) : ?>
				<h2 itemprop="headline"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h2>
					<?php if(get_theme_mod('show_date_post')) : ?>
						<div class="date-author">
							<span class="date"><?php the_time( get_option('date_format') ); ?></span>
						</div>
					<?php endif; ?>
				<?php endif; ?>

				<?php if(has_post_format('link') || has_post_format('quote')) : ?>
				<?php the_content(); ?>
                                <?php if(has_post_format('quote')) : 
                                        $elletta_post_quote_author = get_post_meta( $post->ID, 'elletta_post_quote_author', true );?>
                                        <cite><?php echo esc_attr($elletta_post_quote_author);; ?></cite>
                                <?php endif; ?>
				<?php else : ?>
				<?php 
					$excerpt = get_the_excerpt();
					echo "<p>".wp_trim_words( $excerpt , '25' )."</p>";
				?>
				<?php endif; ?>

				<?php if(!has_post_format('link') && !has_post_format('quote')) : ?>
				<div class="masonry-item-footer clearfix">
					<div class="sub-meta-container">
						<?php if(get_theme_mod('show_categories_post')) : ?>
                                                        <?php if(has_category()) : ?>
                                                        <span class="cat"><?php the_category( ', ' ); ?></span>	
                                                        <?php endif; ?>
						<?php endif; ?>
					</div>
					<div class="comment-like-container">
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
		
		</div>		
	</div>
</article>