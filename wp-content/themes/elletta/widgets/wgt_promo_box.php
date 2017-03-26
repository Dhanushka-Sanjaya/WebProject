<?php

// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'widgets_init', 'promo_load_widget' );

function promo_load_widget() {
	register_widget( 'promo_widget' );
}

add_action( 'load-widgets.php', 'my_custom_load' );

function my_custom_load() {    
	wp_enqueue_style( 'wp-color-picker' );        
	wp_enqueue_script( 'wp-color-picker' );    
}

class promo_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function __construct() {
		parent::__construct(
			'promo_widget', // Base ID
			__( 'elletta - Promo Box', 'elletta' ), // Name
			array(
				'description' => esc_html__( 'A widget that display your content as promo box', 'elletta' ), 
				'classname' => 'promo_widget',
				'width' => 250,
                                'height' => 350
			) 
		);
	}

	/**
	 * How to display the widget on the screen.
	 */
	public function widget( $args, $instance ) {
		extract( $args );

		if(empty($instance)){
			$instance = array( 'title' => 'Promo Box Title', 'image' => '', 'description' => '','more_text' => '', 'more_link' => '', 'height' => '', 'background_color' => '#FFFFFF', 'background_color_hover' => '#ED364D');
		}

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$image = $instance['image'];
		$description = $instance['description'];
		$more_text = $instance['more_text'];
		$more_link = $instance['more_link'];
		$height = $instance['height'];
                $background_color = $instance['background_color'];
                $background_color_hover = $instance['background_color_hover'];
                
                if($background_color) : ?>
                    <style>
                        .promo_widget .widget-title,#sidebar .promo_widget .widget-title,#footer-widget-area .promo_widget .widget-title, .promo_widget, .promo_widget .widget-text-container .widget-link{color: <?php echo esc_attr($background_color); ?>;}
                        .promo_widget .widget-text-container .widget-link { border: 1px solid <?php echo esc_attr($background_color); ?>;}
                        .promo_widget .widget-text-container .widget-link:hover { background: <?php echo esc_attr($background_color_hover); ?>; border: 1px solid <?php echo esc_attr($background_color_hover); ?>;}
                    </style>  
                <?php endif; 
		
		/* Before widget (defined by themes). */
		echo wp_kses($before_widget, wp_kses_allowed_html( 'post' ));

		/* Display the widget title if one was input (before and after defined by themes). */
		
		?>

		<div class="promobox category-box" style="height:<?php echo esc_attr($height) . 'px' ?>">
			<div class="widget-content">
				<?php if($image) : 

					$image_full = wp_get_attachment_image_src($instance['image'],'elletta_thumbnail-masonry'); ?>

					<div class="img" style="background: url('<?php echo esc_url($image_full[0]); ?>') center center; background-size:cover;"></div>

				<?php endif; ?>
                                        <div class="widget-text-container">
				<?php 
					if ( $title ) : 
						echo wp_kses($before_title, wp_kses_allowed_html( 'post' )) . wp_kses($title, wp_kses_allowed_html( 'post' )) . wp_kses($after_title, wp_kses_allowed_html( 'post' ));
                                        endif;?>

					<?php if($description) : ?>
					<div class="widget-content-description">
						<p><?php echo wp_kses($description, wp_kses_allowed_html( 'post' )); ?></p>
					</div>
					<?php endif; ?>
					<?php if($more_link) : ?>
					<div class="widget-link-container">
						<a class="widget-link" href="<?php echo esc_url($more_link); ?>"><?php echo esc_html($more_text); ?></a>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>

			
		<?php

		/* After widget (defined by themes). */
		echo wp_kses($after_widget, wp_kses_allowed_html( 'post' ));
	}

	/**
	 * Update the widget settings.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['image'] = strip_tags( $new_instance['image'] );
		$instance['description'] = $new_instance['description'];
		$instance['more_text'] = strip_tags( $new_instance['more_text'] );
		$instance['more_link'] = strip_tags( $new_instance['more_link'] );
		$instance['height'] = strip_tags( $new_instance['height'] );
                $instance['background_color'] = strip_tags( $new_instance['background_color'] );
                $instance['background_color_hover'] = strip_tags( $new_instance['background_color_hover'] );
                
		return $instance;
	}

	/**
	 * form in widget update area
	 */
	public function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Promo Box Title', 'image' => '', 'description' => '','more_text' => '', 'more_link' => '', 'height' =>'250', 'background_color' => '#FFFFFF', 'background_color_hover' => '#ED364D');
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		$image_full = wp_get_attachment_image_src($instance['image'],'full'); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'elletta' ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" style="width:96%;" />
		</p>

		<!-- image url -->
		<p class="upload-item">
	      <label for="<?php echo esc_attr($this->get_field_id('image')); ?>"><?php esc_html_e( 'Image:', 'elletta' ); ?></label><br />
	        <img class="custom_media_image" src="<?php echo esc_url($image_full[0]); ?>" style="display:block;max-width:96%;height:auto;margin-bottom:8px;" />
	        <input type="hidden" class="widefat custom_media_id" name="<?php echo esc_attr($this->get_field_name('image')); ?>" id="<?php echo esc_attr($this->get_field_id('image')); ?>" value="<?php echo esc_attr($instance['image']); ?>">
	        <input type="button" value="<?php esc_html_e( 'Upload Image', 'elletta' ); ?>" class="button custom_media_upload" id="custom_image_uploader"/>
	        <input type="button" value="<?php esc_html_e( 'Remove', 'elletta' ); ?>" class="button custom_media_upload_remove"/><br>
	        <small style="display:block;margin-top:5px;"><?php esc_html_e( 'Image width should be 300px min.', 'elletta' ); ?></small>
	    </p>

	    <!-- height of the area -->
	    <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'height' )); ?>"><?php esc_html_e( 'Height of The Box:', 'elletta' ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'height' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'height' )); ?>" value="<?php echo esc_attr($instance['height']); ?>" style="width:96%;" />
		</p>

		<!-- description -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'description' )); ?>"><?php esc_html_e( 'Mini Text For Promo Box:', 'elletta' ); ?></label>
			<textarea id="<?php echo esc_attr($this->get_field_id( 'description' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'description' )); ?>" style="width:95%;" rows="6"><?php echo wp_kses($instance['description'], wp_kses_allowed_html( 'post' )); ?></textarea>
		</p>

		<!-- more text -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'more_text' )); ?>"><?php esc_html_e( 'Detail Link Text:', 'elletta' ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'more_text' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'more_text' )); ?>" value="<?php echo esc_attr($instance['more_text']); ?>" style="width:96%;" /><br />
		</p>

		<!-- more link -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'more_link' )); ?>"><?php esc_html_e( 'Detail Link URL:', 'elletta' ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'more_link' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'more_link' )); ?>" value="<?php echo esc_url($instance['more_link']); ?>" style="width:96%;" /><br />
			<small>Insert your detail page Url </small>
		</p>
                <?php wp_add_inline_script( 'elletta_scripts', esc_js("jQuery(document).ready(function($) { $('.my-color-picker').wpColorPicker(); });"), 'after' ); ?>
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id( 'background_color' )); ?>"><?php esc_html_e( 'Text Color:', 'elletta' ); ?></label>
                    <input type="text" class="my-color-picker" name="<?php echo esc_attr($this->get_field_name( 'background_color' )); ?>" value="<?php echo esc_url($instance['background_color']); ?>" />
                </p>
                
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id( 'background_color_hover' )); ?>"><?php esc_html_e( 'Text Color Hover:', 'elletta' ); ?></label>
                    <input type="text" class="my-color-picker" name="<?php echo esc_attr($this->get_field_name( 'background_color_hover' )); ?>" value="<?php echo esc_url($instance['background_color_hover']); ?>" />
                </p>
                


	<?php
	}
}

?>