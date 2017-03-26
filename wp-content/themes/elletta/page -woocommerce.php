<?php /* Template Name: Woocommerce Page */ 
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }
$elletta_sidebar_woocommerce = get_theme_mod('sidebar_woocommerce');
?>
<?php get_header(); ?>
	<div id="main-container">
		<div class="container <?php if($elletta_sidebar_woocommerce != 'none') : ?>sidebar-open clearfix <?php endif; ?><?php echo esc_attr($elletta_sidebar_woocommerce); ?>">			
			<div id="content">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									
					<?php get_template_part('templates/layout', 'page'); ?>
										
				<?php endwhile; endif; ?>
			</div>	
			<?php if($elletta_sidebar_woocommerce != 'none') : ?><?php get_sidebar('woocommerce'); ?><?php endif; ?>		
		</div>
	</div>	
<?php get_footer(); ?>