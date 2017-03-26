<?php

// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'widgets_init', 'facebook_load_widget' );

function facebook_load_widget() {
	register_widget( 'facebook_widget' );
}

class facebook_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function __construct() {
		parent::__construct(
			'facebook_widget', // Base ID
			__( 'elletta - Facebook Like Box', 'elletta' ), // Name
			array(
				'description' => esc_html__( 'A widget that displays a Facebook Like Box', 'elletta' ), 
				'classname' => 'facebook_widget',
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
			$instance = array( 'title' => 'Find us on Facebook', 'width' => 300, 'height' => 350, 'faces' => 'on', 'page_url' => '', 'stream' => false);
		}

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$page_url = $instance['page_url'];
		$faces = $instance['faces'];
		$stream = $instance['stream'];
		$width = $instance['width'];
		$height = $instance['height'];
		
		/* Before widget (defined by themes). */
		echo wp_kses($before_widget, wp_kses_allowed_html( 'post' ));

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo wp_kses($before_title, wp_kses_allowed_html( 'post' )) . wp_kses($title, wp_kses_allowed_html( 'post' )) . wp_kses($after_title, wp_kses_allowed_html( 'post' ));

		?>
		<div id="fb-root"></div>
        <?php $elletta_wgt_facebook = '(function(d, s, id) {	var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";	fjs.parentNode.insertBefore(js, fjs); }(document, "script", "facebook-jssdk"))';

        wp_add_inline_script( 'elletta_scripts', $elletta_wgt_facebook, 'after' ); ?>
        
		<div class="fb-like-box-container">
			<div class="fb-like-box-container-inner">
				<div class="fb-page" data-href="<?php echo esc_url($page_url); ?>" data-width="<?php echo esc_attr($width); ?>" data-height="<?php echo esc_attr($height); ?>" data-hide-cover="false" data-show-facepile="<?php if($faces) { echo 'true'; } else { echo 'false'; } ?>" data-show-posts="<?php if($stream) { echo 'true'; } else { echo 'false'; } ?>"></div>
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
		$instance['page_url'] = strip_tags( $new_instance['page_url'] );
		$instance['faces'] = strip_tags( $new_instance['faces'] );
		$instance['stream'] = strip_tags( $new_instance['stream'] );
		$instance['width'] = strip_tags( $new_instance['width'] );
		$instance['height'] = strip_tags( $new_instance['height'] );

		return $instance;
	}


	/**
	 * form in widget update area
	 */
	public function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Find us on Facebook', 'width' => 300, 'height' => 350, 'faces' => 'on', 'page_url' => '', 'stream' => false);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'elletta' ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" style="width:96%;" />
		</p>
		
		<!-- Page url -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'page_url' )); ?>"><?php esc_html_e( 'Facebook Page URL:', 'elletta' ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'page_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'page_url' )); ?>" value="<?php echo esc_url($instance['page_url']); ?>" style="width:96%;" />
			<small><?php esc_html_e( 'EG', 'elletta' ); ?>. http://www.facebook.com/envato</small>
		</p>

		<!-- Faces -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'faces' )); ?>"><?php esc_html_e( 'Show Faces:', 'elletta' ); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'faces' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'faces' )); ?>" <?php checked( (bool) $instance['faces'], true ); ?> />
		</p>
		
		<!-- Stream -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'stream' )); ?>"><?php esc_html_e( 'Show Stream:', 'elletta' ); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'stream' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'stream' )); ?>" <?php checked( (bool) $instance['stream'], true ); ?> />
		</p>
		
		<!-- Widget width -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'width' )); ?>"><?php esc_html_e( 'Box Width:', 'elletta' ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'width' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'width' )); ?>" value="<?php echo esc_attr($instance['width']); ?>" style="width:20%;" />
		</p>
		
		<!-- Widget height -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'height' )); ?>"><?php esc_html_e( 'Box Height:', 'elletta' ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'height' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'height' )); ?>" value="<?php echo esc_attr($instance['height']); ?>" style="width:20%;" />
		</p>


	<?php
	}
}

?>