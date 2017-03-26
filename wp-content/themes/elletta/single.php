<?php 
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<?php get_header();
$elletta_sidebar_post = get_theme_mod('sidebar_post');
?>
	<div id="main-container">	
		<div class="container<?php if( $elletta_sidebar_post != 'none' ) : ?> sidebar-open clearfix<?php endif; ?>  <?php echo esc_attr($elletta_sidebar_post); ?>">		
			<div id="content">
				<?php 
                                if (have_posts()) : while (have_posts()) : the_post(); 
                                        get_template_part('templates/layout', 'full'); 
                                        elletta_setPostViews($post->ID);
                                        endwhile; 
                                endif;
                                ?>
			</div>
			<?php if( $elletta_sidebar_post != 'none' ) : ?><?php get_sidebar('detail'); ?><?php endif; ?>		
		</div>		
	</div>
<?php get_footer(); ?>