<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
/* Custom layout control */
class Layout_Control extends WP_Customize_Control
{   
    public $type = 'layout_control';
    public $columns= 4;
    /**
    * Render the content on the theme customizer page
    */
    public function render_content()
        {
            $name = 'customize-radio-' . $this->id;
            ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php if ( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
            <?php endif; ?>
            <?php foreach ( $this->choices as $value => $image ) : ?>
                <?php $class_selected = ( $this->value() == $value ) ? ' of-radio-img-selected' : ''; ?>
                <label>
                        <input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> class="screen-reader-text" />
                        <img src="<?php echo elletta_THEME_DIR_URI . '/customizer/images/' . esc_html( $image ); ?>" class="of-radio-img-img<?php echo esc_attr($class_selected); ?>" style="max-width: <?php echo 85/$this->columns; ?>%;"/>
                </label>

            <?php endforeach;
        }
}
/* Custom checkbox switch */
class Toggle_Checkbox_Custom_control extends WP_Customize_Control{
    public $type = 'toogle_checkbox';
    
    public function render_content()
        {
            ?>
            <div class="checkbox_switch">
                <div class="onoffswitch">
                    <input type="checkbox" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" class="onoffswitch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?>>
                    <label class="onoffswitch-label" for="<?php echo esc_attr($this->id); ?>"></label>
                </div>
                <span class="customize-control-title onoffswitch_label"><?php echo esc_html( $this->label ); ?></span>
                <p><?php echo wp_kses_post($this->description); ?></p>
            </div>
            <?php
        }
}

/* Custom Info */
class Info_Custom_control extends WP_Customize_Control{
        public $type = 'info';
        public function render_content(){
            ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <p><?php echo wp_kses_post($this->description); ?></p>
            <?php
        }
}
/* Custom Separator */
class Separator_Custom_control extends WP_Customize_Control{
        public $type = 'separator';
        public function render_content(){
            ?>
            <hr>
            <?php
        }
}
/* Category_Control */
class Category_Control extends WP_Customize_Control {
    public $type = 'select_category';
    public function render_content() {
        $dropdown = wp_dropdown_categories(
            array(
                'name'              => '_customize-dropdown-categories-' . $this->id,
                'echo'              => 0,
                'show_option_none'  => esc_html__( '&mdash; Select &mdash;' , 'elletta' ),
                'option_none_value' => '0',
                'selected'          => $this->value(),
            )
        );

        // Hackily add in the data link parameter.
        $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

        printf(
            '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
            $this->label,
            $dropdown
        );
    }
}
/* Post_Control */
class Post_Control extends WP_Customize_Control {
        public $type = 'latest_post_dropdown';
        public $post_type = 'post';

        public function render_content() {

        $latest = new WP_Query( array(
                'post_type'   => $this->post_type,
                'post_status' => 'publish',
                'orderby'     => 'date',
                'order'       => 'DESC',
                'posts_per_page' => -1
        ));

        ?>
        <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
                <?php
                        while( $latest->have_posts() ) : $latest->the_post();
                        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ) );
                            if(get_the_title() && $featured_image) :
									if($this->value()) :
                                    	$selected = ( in_array( get_the_ID(), $this->value() ) ) ? selected( 1, 1, false ) : '';
										else :
										$selected = false;
										endif;
                                    echo '<option value="' . esc_attr( get_the_ID() ) . '"' . $selected . '>' . the_title( '', '', false ) . '</option>';
                            endif;
                        endwhile;
                ?>
                </select>
        </label>
        <?php
        }      
}

class Customizer_Number_Inline_Control extends WP_Customize_Control {
    public $fieldwidth = 'text';
    public $type = 'number';
    public $min = 1;
    public $max = 1000;
    public $step = 1;
    

    protected function render() {
        $id = 'customize-control-' . str_replace( '[', '-', str_replace( ']', '', $this->id ) );
        $class = 'customize-control customize-control-' . $this->type; ?>
        <li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>" style="clear:none;display:inline-block;">
            <?php $this->render_content(); ?>
        </li>
    <?php }

    public function render_content() { ?>
        <label class="inline">
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <p><?php echo wp_kses_post($this->description); ?></p>
            <input type="number" <?php $this->link(); ?> value="<?php echo intval( $this->value() ); ?>" min="<?php echo intval( $this->min ); ?>" max="<?php echo intval( $this->max ); ?>" step="<?php echo intval( $this->step ); ?>" style="max-width:<?php echo esc_attr($this->fieldwidth) . "%"; ?>"/>
        </label>
    <?php }
}

/* Social Media */
class Social_Media_Custom_control extends WP_Customize_Control{
        public $type = 'social_media';
        public function render_content(){
            ?>
            <label>
                <span class="customize-control-title social-media <?php echo esc_attr( $this->id ); ?>"><?php echo $this->label; ?></span>
                <?php if($this->description) : ?><span><?php echo wp_kses_post($this->description); ?></span><?php endif; ?>
                <input type="text" value="<?php echo esc_attr( $this->value() ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>">
            </label>
            <?php
        }
}

/**
 * A class to create a dropdown for all google fonts
 */
 class Google_Font_Dropdown_Custom_Control extends WP_Customize_Control
 {
    private $fonts = false;
    public $type = 'select_fonts';
    public function __construct($manager, $id, $args = array(), $options = array())
    {
        $this->fonts = $this->get_fonts();
        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */
    public function render_content()
    {
        if(!empty($this->fonts))
        {
            ?>
                <label class="customize-control-select">
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <select <?php $this->link(); ?>>
                        <?php
                            printf('<option value="" %s>%s</option>', selected($this->value(), '', false), esc_html__( '&mdash; Default Font &mdash;' , 'elletta' ));
                            foreach ( $this->fonts as $k => $v )
                            {
                                $name = str_replace(' ', '+', $v->family);
                                $types = '';
                                foreach ( $v->variants as $key => $value ){
                                    if($types) :
                                        $types .= ',' . $value;
                                    else:
                                        $types = ':' . $value;
                                    endif;
                                }
                                printf('<option value="%s" %s>%s</option>', $name . $types, selected($this->value(), $name . $types, false), $v->family);
                            }
                        ?>
                    </select>
                </label>
            <?php
        }
    }

    /**
     * Get the google fonts from the API or in the cache
     *
     * @param  integer $amount
     *
     * @return String
     */
    public function get_fonts( $amount = 150 )
    {
        $fontFile = elletta_THEME_DIR_URI . 'customizer/cache/google-web-fonts.txt';
        $content = null;
        global $wp_filesystem;
        // Initialize the WP filesystem, no more using 'file-put-contents' function
        if (empty($wp_filesystem)) {
            require_once (ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();
        }
            
        $content = json_decode($wp_filesystem->get_contents($fontFile));
        
        if(!$content) :
            require( elletta_THEME_DIR . 'customizer/cache/google-web-fonts.php');
            $content = json_decode($elletta_fonts);
        endif;
        
        if($amount == 'all')
        {
            return $content->items;
        } else {
            return array_slice($content->items, 0, $amount);
        }
    }
 }
 
class Slider_Control extends WP_Customize_Control {
	public $type = 'slider';
        public $max = 50;
        public $min = 10;
        public $step = 1;
	public function render_content() { ?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<div class="slider">
				<input data-id="<?php echo esc_attr($this->id); ?>" type="range" min="<?php echo esc_attr($this->min); ?>" max="<?php echo esc_attr($this->max); ?>" step="<?php echo esc_attr($this->step); ?>" value="<?php echo esc_attr($this->value()); ?>" onchange="updateSlider(<?php $this->link(); checked( $this->value() ); ?>)" <?php $this->link(); ?> />
                                <span data-id="<?php echo esc_attr($this->id); ?>"><?php echo esc_attr($this->value()); ?>px</span>
			</div>
		</label>
	<?php }
}