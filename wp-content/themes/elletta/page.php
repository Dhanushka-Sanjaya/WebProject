<?php 
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }
$elletta_sidebar_page = get_theme_mod('sidebar_page');
?>
<?php get_header(); ?>
	<div id="main-container" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
		<div class="container <?php if($elletta_sidebar_page != 'none') : ?>sidebar-open clearfix <?php endif; ?><?php echo esc_attr($elletta_sidebar_page); ?>">			
			<div id="content">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									
					<?php get_template_part('templates/layout', 'page'); ?>
										
				<?php endwhile; endif; ?>
			</div>	
			<?php if($elletta_sidebar_page != 'none') : ?><?php get_sidebar('page'); ?><?php endif; ?>		
		</div>
	</div>	
<?php get_footer(); ?>