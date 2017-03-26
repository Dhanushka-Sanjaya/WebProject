<?php 
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }
$elletta_sidebar_woocommerce_list = get_theme_mod('sidebar_woocommerce_list');
?>
<?php get_header(); ?>
	<div id="main-container">
		<div class="container <?php if($elletta_sidebar_woocommerce_list != 'none') : ?>sidebar-open clearfix <?php endif; ?><?php echo esc_attr($elletta_sidebar_woocommerce_list); ?>">			
                        <div id="content" class="woocommerce-content">
				<?php woocommerce_content(); ?>
			</div>	
			<?php if($elletta_sidebar_woocommerce_list != 'none') : ?><?php get_sidebar('woocommerce'); ?><?php endif; ?>		
		</div>
	</div>	
<?php get_footer(); ?>