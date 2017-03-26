<?php 
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) : exit; endif;
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
		
	<div class="page-container">
		<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
		<div class="post-featured-item">
			<?php the_post_thumbnail('elletta_thumbnail-full'); ?>
			<?php $gorilla_caption = get_post_field('post_excerpt', $post->ID);
			if(get_post(get_post_thumbnail_id())->post_excerpt){
			echo "<span class='caption-container'><span class='custom-caption'>".get_post(get_post_thumbnail_id())->post_excerpt.'</span></span>'; 
			} ?>
		</div>
		<?php endif; ?>
		
		<div class="post-entry">
                        <?php if(get_the_title()): ?>
			<div class="post-header">
				<h1 itemprop="headline"><?php the_title(); ?></h1>
			</div>
                        <?php endif; ?>
                        <div itemprop="text">
                                <?php the_content(); ?>
                                <?php wp_link_pages(); ?>
                        </div>
		
		</div>
	</div>
	
</div>

<?php if(get_theme_mod('show_comments_page')) : ?>
	<?php comments_template( '', true );  ?>
<?php endif; ?>