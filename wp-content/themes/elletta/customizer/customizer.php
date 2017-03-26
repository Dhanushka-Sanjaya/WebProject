<?php
/**
 * Register theme sections into the WP Customizer
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}

// Customizer - Add Custom Styling

function elletta_theme_customizer_style()
{
        wp_enqueue_style('customizer-font-awesome', elletta_INCLUDES_DIR . 'assets/css/font-awesome/css/font-awesome.min.css' );
        wp_enqueue_style('sumoselect-css', elletta_THEME_DIR_URI . 'customizer/css/sumoselect.css');
        wp_enqueue_style('customizer-css', elletta_THEME_DIR_URI . 'customizer/css/customizer.css');
	wp_enqueue_media();
}
add_action('customize_controls_print_styles', 'elletta_theme_customizer_style');

function elletta_theme_customizer_scripts(){
        wp_enqueue_script('sumoselect', elletta_THEME_DIR_URI . 'customizer/js/jquery.sumoselect.min.js', '', '', true);
	wp_enqueue_script('customizer-js', elletta_THEME_DIR_URI . 'customizer/js/customizer.js', '', '', true);
}
add_action('customize_controls_enqueue_scripts', 'elletta_theme_customizer_scripts');

function elletta_theme_customize_register($wp_customize){
    
    // Add color scheme setting and control.
    require_once( elletta_THEME_DIR . 'customizer/class/customizer-classes.php');
    require_once( elletta_THEME_DIR . 'customizer/customizer-defaults.php');
    
    //$wp_customize->get_section('static_front_page')->title = esc_html__( 'Home  Settings', 'elletta' );
    $wp_customize->get_section('title_tagline')->title = esc_html__( 'General  Settings', 'elletta' );
    require_once( elletta_THEME_DIR . 'customizer/customizer-settings.php');
    require_once( elletta_THEME_DIR . 'customizer/customizer-colors.php');
    require_once( elletta_THEME_DIR . 'customizer/customizer-fonts.php');
    require_once( elletta_THEME_DIR . 'customizer/customizer-home.php');
    require_once( elletta_THEME_DIR . 'customizer/customizer-page.php');
    require_once( elletta_THEME_DIR . 'customizer/customizer-post.php');
    if (class_exists( 'WooCommerce' )) : 
    require_once( elletta_THEME_DIR . 'customizer/customizer-woocommerce.php');
    endif;
    if (class_exists( 'Tribe__Events__Main' )) : 
    require_once( elletta_THEME_DIR . 'customizer/customizer-events.php');
    endif;
    require_once( elletta_THEME_DIR . 'customizer/customizer-header.php');
    require_once( elletta_THEME_DIR . 'customizer/customizer-footer.php');
    require_once( elletta_THEME_DIR . 'customizer/customizer-featured-area.php');
    
    require_once( elletta_THEME_DIR . 'customizer/customizer-slider.php');
    require_once( elletta_THEME_DIR . 'customizer/customizer-social-media.php');
    require_once( elletta_THEME_DIR . 'customizer/customizer-custom-javascript.php');
    require_once( elletta_THEME_DIR . 'customizer/customizer-custom-css.php');

}
add_action('customize_register', 'elletta_theme_customize_register');

if ( ! function_exists( 'elletta_initialize_defaults' ) ) :
	/**
	 * Helper function to initialize default values for settings as customizer api do not do so.
	 *
	 * @param WP_Customize_Manager $wp_customize
	 */
	function elletta_initialize_defaults() { 
                require_once( elletta_THEME_DIR . 'customizer/customizer-defaults.php');             
		if ( is_array( $elletta_customizer_defaults ) && ! empty( $elletta_customizer_defaults ) ) {
			$mods = get_theme_mods();
			foreach ( $elletta_customizer_defaults as $key=>$value ) {
				if ( ! isset( $mods[ $key ] ) ) {
					set_theme_mod( $key, $value );
				}
			}
		}
	}
        add_action('after_switch_theme', 'elletta_initialize_defaults' );
endif;


if ( ! function_exists( 'elletta_sanitize_choices_field' ) ) :
    function elletta_sanitize_choices_field( $input, $setting ) {
            global $wp_customize;
 
            $control = $wp_customize->get_control( $setting->id );

            if ( array_key_exists( $input, $control->choices ) ) {
                return $input;
            } else {
                return $setting->default;
            }
    }
endif;

if ( ! function_exists( 'elletta_sanitize_textarea_field' ) ) :
    function elletta_sanitize_textarea_field( $input ) {
            return esc_textarea($input);
    }
endif;

if ( ! function_exists( 'elletta_sanitize_javascript_field' ) ) :
    function elletta_sanitize_javascript_field( $input ) {
            return wp_filter_post_kses($input);
    }
endif;

if ( ! function_exists( 'elletta_sanitize_checkbox_field' ) ) :
    function elletta_sanitize_checkbox_field( $input ) {
            if ( $input == 1 ) {
                    return true;
            }
            else {
                    return false;
            }
    }
endif;

if ( ! function_exists( 'elletta_sanitize_number_field' ) ) :
    function elletta_sanitize_number_field( $input ) {
            return absint( $input );
    }
endif;

if ( ! function_exists( 'elletta_sanitize_multiselect' ) ) :
    function elletta_sanitize_multiselect( $values ) {
        $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;
        return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
    }
endif;
