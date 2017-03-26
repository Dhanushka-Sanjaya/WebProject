<?php
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'widgets_init', 'elletta_lastest_post' );

function elletta_lastest_post() {
	register_widget( 'elletta_lastest_post_widget' );
}

class elletta_lastest_post_widget extends WP_Widget {

	//parameters
	function __construct() {
		parent::__construct(
			'elletta_lastest_post_widget', // Base ID
			__( 'elletta - Latest Post', 'elletta' ), // Name
			array(
				'description' => esc_html__( 'Allows you to display recent posts with featured image', 'elletta' ), 
				'classname' => 'elletta_lastest_post_widget',
				'width' => 250,
                                'height' => 250
			) 
		);
	}


	//widget main
	public function widget ($args,$instance) {
	  extract($args);

	  if(empty($instance)){
		$instance = array( 'title' => 'Latest Posts');
	  }

	  $title = $instance['title'];
	  $numberposts = $instance['numberposts'];
	  $showdate = $instance['showdate'];
          $round_image = $instance['round_image'];
          $showcategories = $instance['showcategories'];
          $showexcerpt = $instance['showexcerpt'];

	  // retrieve posts information from database
	  $query = array(
		  'posts_per_page' => $numberposts,
		  'nopaging' => 0,
		  'post_status' => 'publish',
		  'ignore_sticky_posts' => 1,
		  'tax_query' => array(
		    array(
		      'taxonomy' => 'post_format',
		      'field' => 'slug',
		      'terms' => array('post-format-link', 'post-format-quote' ),
		      'operator' => 'NOT IN'
		    )
		  )
		);
	  $posts = new WP_Query($query);

	   $out = '<ul>';
		$thumb = '';
	  while ($posts->have_posts()) : $posts->the_post();
                $classRound = '';
                if ($round_image) : 
                    $classRound = ' post_round';
                endif;
	  	if(has_post_thumbnail()) :
	  		$thumb = '<div class="thumb size_50_50'. $classRound .'"><a href="'.get_permalink().'">'. get_the_post_thumbnail($posts->ID, 'thumbnail') . '</a></div>' ;	  		  	
	  	endif;

		$out .= '<li><div class="clearfix">'. $thumb . '<div class="recent_post_text">'; 
                if ($showcategories) :
                    $categories = get_the_category();
                    $separator = ', ';
                    $output = '';
                    if ( ! empty( $categories ) ) :
                        $out .= '<span class="post-categories">'; 
                        foreach( $categories as $category ) :
                            $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( esc_html__( 'View all posts in %s', 'elletta' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                        endforeach;
                        $out .= trim( $output, $separator ) . '</span>'; 
                    endif;
                endif;
                $out .= '<a href="'.get_permalink().'" class="recent_post_widget_header">'.get_the_title().'</a>';
		if ($showexcerpt) : $out .= '<span class="post-excerpt">'. wp_trim_words( get_the_excerpt() , '10' ) .'</span>'; endif;
                if ($showdate) : $out .= '<span class="post-date">'.get_the_date().'</span>'; endif;
		$out .= '</div></div></li>';

	  endwhile;
	  $out .= '</ul>';
	  
	  //print the widget for the sidebar
	  echo wp_kses($before_widget, wp_kses_allowed_html( 'post' ));
	  echo wp_kses($before_title, wp_kses_allowed_html( 'post' )).wp_kses($title, wp_kses_allowed_html( 'post' )).wp_kses($after_title, wp_kses_allowed_html( 'post' ));
	  echo wp_kses($out, wp_kses_allowed_html( 'post' ));
	  echo wp_kses($after_widget, wp_kses_allowed_html( 'post' ));
	  wp_reset_postdata();
	 }

	 //update
	public function update ($new_instance, $old_instance) {
	  $instance = $old_instance;

	  $instance['numberposts'] = $new_instance['numberposts'];
	  $instance['title'] = $new_instance['title'];
	  $instance['showdate'] = $new_instance['showdate'];
          $instance['round_image'] = $new_instance['round_image'];
          $instance['showcategories'] = $new_instance['showcategories'];
          $instance['showexcerpt'] = $new_instance['showexcerpt'];

	  return $instance;
	}

	//form in widget update area
	public function form ($instance) {
		/* Set up some default widget settings. */
		$defaults = array('numberposts' => '5', 'title'=>'Latest Posts', 'showdate'=>'', 'round_image'=>'', 'showcategories'=>'', 'showexcerpt'=>''); 
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'elletta'); ?></label>
			<input class="widefat" type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?> " value="<?php echo esc_attr($instance['title']); ?>" size="20">
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('numberposts')); ?>"><?php esc_html_e('Number of posts:', 'elletta'); ?></label>
			<select id="<?php echo esc_attr($this->get_field_id('numberposts')); ?>" name="<?php echo esc_attr($this->get_field_name('numberposts')); ?>">
			<?php for ($i=1;$i<=20;$i++) {
			     echo '<option value="'.$i.'"';
			     if ($i==$instance['numberposts']) echo ' selected="selected"';
			     echo '>'.$i.'</option>';
			    } ?>
			</select>
		</p>

		<p>
                        <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('showdate')); ?>" name="<?php echo esc_attr($this->get_field_name('showdate')); ?>" <?php if ($instance['showdate']) echo 'checked="checked"' ?> />
                        <label for="<?php echo esc_attr($this->get_field_id('showdate')); ?>"><?php esc_html_e('Show Date?', 'elletta'); ?></label>
		</p>
                
                <p>
                        <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('showcategories')); ?>" name="<?php echo esc_attr($this->get_field_name('showcategories')); ?>" <?php if ($instance['showcategories']) echo 'checked="checked"' ?> />
                        <label for="<?php echo esc_attr($this->get_field_id('showcategories')); ?>"><?php esc_html_e('Show Categories?', 'elletta'); ?></label>
		</p>
                
                <p>
                        <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('showexcerpt')); ?>" name="<?php echo esc_attr($this->get_field_name('showexcerpt')); ?>" <?php if ($instance['showexcerpt']) echo 'checked="checked"' ?> />
                        <label for="<?php echo esc_attr($this->get_field_id('showexcerpt')); ?>"><?php esc_html_e('Show Excerpt?', 'elletta'); ?></label>
		</p>
                
                <p>
                        <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('round_image')); ?>" name="<?php echo esc_attr($this->get_field_name('round_image')); ?>" <?php if ($instance['round_image']) echo 'checked="checked"' ?> />
                        <label for="<?php echo esc_attr($this->get_field_id('round_image')); ?>"><?php esc_html_e('Round Image?', 'elletta'); ?></label>
		</p>

	<?php
	}
}
?>