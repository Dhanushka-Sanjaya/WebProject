<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$elletta_sidebar_events = get_theme_mod('sidebar_events');
?>
<?php get_header(); ?>
	<div id="main-container">
		<div class="container <?php if($elletta_sidebar_events != 'none') : ?>sidebar-open clearfix <?php endif; ?><?php echo esc_attr($elletta_sidebar_events); ?>">			
			<div id="content">
				<?php tribe_events_before_html(); ?>
                                <?php tribe_get_view(); ?>
                                <?php tribe_events_after_html(); ?>
			</div>	
			<?php if($elletta_sidebar_events != 'none') : ?><?php get_sidebar('detail'); ?><?php endif; ?>		
		</div>
	</div>	
<?php get_footer(); ?>
