<?php

// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'widgets_init', 'about_load_widget' );

function about_load_widget() {
	register_widget( 'about_widget' );
}

class about_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function __construct() {
		parent::__construct(
			'about_widget', // Base ID
			__( 'elletta - About Me', 'elletta' ), // Name
			array(
				'description' => esc_html__( 'A widget that displays an about me content', 'elletta' ), 
				'classname' => 'about_widget',
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
			$instance = array( 'title' => 'About Me', 'subtitle' => 'Subtitle Here', 'image' => '', 'description' => '','more_text' => '','more_link' => '', 'round_image' => false);
		}

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$subtitle = $instance['subtitle'];
		$image = $instance['image'];
		$description = $instance['description'];
		$more_text = $instance['more_text'];
		$more_link = $instance['more_link'];
                $round_image = $instance['round_image'];
		
		/* Before widget (defined by themes). */
		echo wp_kses($before_widget, wp_kses_allowed_html( 'post' ));

		/* Display the widget title if one was input (before and after defined by themes). */

		?>
			
			<div class="about-widget">
				<div class="widget-content clearfix">
					<?php if($image) : 
						$image_full = wp_get_attachment_image_src($instance['image'],'elletta_thumbnail-masonry'); ?>
                                                <div class="background-about-me"></div>    
                                                <div class="img">
                                                    <img <?php if($round_image) : ?> class="about-round" <?php endif; ?> src="<?php echo esc_url($image_full[0]); ?>" alt="<?php echo esc_attr($title); ?>" />
                                                </div>
					
					<?php endif;
					if ( $title ) :
						echo wp_kses($before_title, wp_kses_allowed_html( 'post' )) . wp_kses($title, wp_kses_allowed_html( 'post' )) . wp_kses($after_title, wp_kses_allowed_html( 'post' ));
                                        endif;

					if ( $subtitle ) :  ?>
						<h5><?php echo wp_kses($subtitle, wp_kses_allowed_html( 'post' )); ?></h5>
					<?php
                                        endif; ?>

					<?php if($description) : ?>
					<div class="widget-content-desription">
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
		$instance['subtitle'] = strip_tags( $new_instance['subtitle'] );
		$instance['image'] = strip_tags( $new_instance['image'] );
		$instance['description'] = $new_instance['description'];
		$instance['more_text'] = strip_tags( $new_instance['more_text'] );
		$instance['more_link'] = strip_tags( $new_instance['more_link'] );
                $instance['round_image'] = strip_tags( $new_instance['round_image'] );

		return $instance;
	}
	
	/**
	 * form in widget update area
	 */
	public function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'About Me','subtitle' => 'Subtitle Here', 'image' => '', 'description' => '','more_text' => '','more_link' => '', 'round_image' => false);
		$instance = wp_parse_args( (array) $instance, $defaults ); 

		$image_full = wp_get_attachment_image_src($instance['image'],'full');

		?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'elletta' ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" style="width:96%;" />
		</p>

		<!-- Widget SubTitle: Text Input -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'subtitle' )); ?>"><?php esc_html_e( 'SubTitle:', 'elletta' ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'subtitle' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'subtitle' )); ?>" value="<?php echo esc_attr($instance['subtitle']); ?>" style="width:96%;" />
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
                
                <!-- round image -->
                <p>
                        <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('round_image')); ?>" name="<?php echo esc_attr($this->get_field_name('round_image')); ?>" <?php if ($instance['round_image']) echo 'checked="checked"' ?> />
                        <label for="<?php echo esc_attr($this->get_field_id('round_image')); ?>"><?php esc_html_e('Round Image?', 'elletta'); ?></label>
		</p>

		<!-- description -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'description' )); ?>"><?php esc_html_e( 'About Me Text:', 'elletta' ); ?></label>
			<textarea id="<?php echo esc_attr($this->get_field_id( 'description' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'description' )); ?>" style="width:95%;" rows="6"><?php echo wp_kses($instance['description'], wp_kses_allowed_html( 'post' )); ?></textarea>
		</p>

		<!-- more text -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'more_text' )); ?>"><?php esc_html_e( 'More Text:', 'elletta' ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'more_text' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'more_text' )); ?>" value="<?php echo esc_attr($instance['more_text']); ?>" style="width:96%;" /><br />
		</p>

		<!-- more link -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'more_link' )); ?>"><?php esc_html_e( 'More Link URL:', 'elletta' ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'more_link' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'more_link' )); ?>" value="<?php echo esc_url($instance['more_link']); ?>" style="width:96%;" /><br />
			<small><?php esc_html_e( 'Insert your about me detail page Url', 'elletta' ); ?></small>
		</p>


	<?php
	}
}

?>