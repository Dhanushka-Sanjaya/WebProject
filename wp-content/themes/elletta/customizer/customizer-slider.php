<?php
/**
 * WP Customizer panel section to handle header options
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}

$wp_customize->add_section( 'elletta_slider_section', array(
        'priority' => 140,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Home Slider Settings', 'elletta' ),
        'description' => ''
    ) );
    
$wp_customize->add_setting( 'show_slider', array(
    'default'    => $elletta_customizer_defaults['show_slider'],
    'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'show_slider',
        array(
            'label'   	=> esc_html__( 'Show Slider', 'elletta' ),
            'priority' => 10,
            'section' 	=> 'elletta_slider_section'               
        )
    )
);

$wp_customize->add_setting( 'boxed_slider', array(
    'default'    => $elletta_customizer_defaults['boxed_slider'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);
$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'boxed_slider',
        array(
            'label'   	=> esc_html__( 'Boxed Slider', 'elletta' ),
            'priority' => 10,
            'section' 	=> 'elletta_slider_section'               
        )
    )
);

$wp_customize->add_setting( 'hide_mobile_slider', array(
    'default'    => $elletta_customizer_defaults['hide_mobile_slider'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);
$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'hide_mobile_slider',
        array(
            'label'   	=> esc_html__( 'Hide Slider in mobile', 'elletta' ),
            'priority' => 11,
            'section' 	=> 'elletta_slider_section'               
        )
    )
);

$wp_customize->add_setting( 'height_slider', array (
    'default'   => $elletta_customizer_defaults['height_slider'],
        'sanitize_callback' => 'elletta_sanitize_number_field'
) );

$wp_customize->add_control( new Customizer_Number_Inline_Control( 
        $wp_customize, 
        'height_slider', 
        array (
            'label'     => esc_html__( 'Slider Height', 'elletta'  ),
            'type'      => 'number',
            'section'   => 'elletta_slider_section',
            'settings'  => 'height_slider',
            'priority'  => 12,
            'fieldwidth'=> '30', //set the field to 50% width so that we can display a second one next to it
        ) 
    )
);

$wp_customize->add_setting( 'slider_transition', array(
    'default'    => $elletta_customizer_defaults['slider_transition'],
        'sanitize_callback' => 'elletta_sanitize_choices_field'
    ) 
);


$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'slider_transition',
        array(
            'label'          => esc_html__( 'Slider Transition', 'elletta' ),
            'section'        => 'elletta_slider_section',
            'settings'       => 'slider_transition',
            'type'           => 'select',
            'priority'       => 30,
            'choices'        => array(
                'slide'   => esc_html__( 'Slide Effect', 'elletta'  ),
                'fade'  => esc_html__( 'Fade Effect', 'elletta'  ),
                'cube'   => esc_html__( 'Cube Effect', 'elletta'  ),
                'coverflow'   => esc_html__( 'Coverflow Effect', 'elletta'  )
            )
        )
    )
);

$wp_customize->add_setting( 'autoplay_slider', array(
    'default'    => $elletta_customizer_defaults['autoplay_slider'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'autoplay_slider',
        array(
            'label'   	=> esc_html__( 'Autoplay Slider', 'elletta' ),
            'priority' => 40,
            'section' 	=> 'elletta_slider_section'               
        )
    )
);

$wp_customize->add_setting( 'show_author_slider', array(
	'default' => $elletta_customizer_defaults['show_author_slider'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
        ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'show_author_slider',
        array(
            'label'   	=> esc_html__( 'Show Author', 'elletta' ),
            'priority' => 50,
            'section' 	=> 'elletta_slider_section'               
        )
    )
);

$wp_customize->add_setting( 'show_categories_slider', array(
	'default' => $elletta_customizer_defaults['show_categories_slider'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
        ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'show_categories_slider',
        array(
            'label'   	=> esc_html__( 'Show Categories', 'elletta' ),
            'priority' => 60,
            'section' 	=> 'elletta_slider_section'               
        )
    )
);

$wp_customize->add_setting( 'show_date_slider', array(
	'default' => $elletta_customizer_defaults['show_date_slider'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
        ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'show_date_slider',
        array(
            'label'   	=> esc_html__( 'Show Date', 'elletta' ),
            'priority' => 70,
            'section' 	=> 'elletta_slider_section'               
        )
    )
);

$wp_customize->add_setting( 'title_slider_font_size', array(
	'default'    => $elletta_customizer_defaults['title_slider_font_size'],
        'sanitize_callback' => 'elletta_sanitize_number_field'
	) );
    
$wp_customize->add_control( new Slider_Control(
        $wp_customize,
        'title_slider_font_size',
        array(
            'label'   	=> esc_html__( 'Title Slider Font Size', 'elletta' ),
            'section' 	=> 'elletta_slider_section',
            'priority'      => 80
        )
    )
);

$wp_customize->add_setting( 'slider_posts', array(
        'default'        => $elletta_customizer_defaults['slider_posts'],
        'sanitize_callback' => 'elletta_sanitize_choices_field'
) );

$wp_customize->add_control( 'slider_posts', array(
        'label'   => esc_html__( 'Posts Slider', 'elletta' ),
        'section' => 'elletta_slider_section',
        'type'    => 'radio',
        'priority' => 90,
        'choices' => array(
                'lastest_posts' => esc_html__( 'Your latest posts', 'elletta'  ),
                'category_posts'  => esc_html__( 'Select Category', 'elletta'  ),
                'slider_posts'  => esc_html__( 'Select Posts', 'elletta'  ),
        ),
) );

$wp_customize->add_setting( 'category_slider_posts', array(
    'default'    => '0',
        'sanitize_callback' => 'elletta_sanitize_number_field'
    )
);

$wp_customize->add_control( new Category_Control(
        $wp_customize,
        'category_slider_posts',
        array(
            'label'    =>  esc_html__( 'Category', 'elletta'  ),
            'settings' => 'category_slider_posts',
            'section'  => 'elletta_slider_section',
            'priority' => 100,
        )
    )
);

$wp_customize->add_setting( 'slider_selected_posts', array(
    'default'    => '',
        'sanitize_callback' => 'elletta_sanitize_multiselect'
    ) 
);

$wp_customize->add_control( new Post_Control(
        $wp_customize,
        'slider_selected_posts',
        array(
            'label'    =>  esc_html__( 'Select Posts', 'elletta'  ),
            'settings' => 'slider_selected_posts',
            'section'  => 'elletta_slider_section',
            'post_type' => 'post',
            'priority' => 110,
        )
    )
);

$wp_customize->add_setting( 'number_posts', array (
    'default'   => $elletta_customizer_defaults['number_posts'],
        'sanitize_callback' => 'elletta_sanitize_number_field'
) );

$wp_customize->add_control( new Customizer_Number_Inline_Control( 
        $wp_customize, 
        'number_posts', 
        array (
            'label'     => esc_html__( 'Number posts', 'elletta'  ),
            'description'     => esc_html__( 'Number of posts if you select Latest posts or Category ', 'elletta'  ),
            'type'      => 'number',
            'section'   => 'elletta_slider_section',
            'settings'  => 'number_posts',
            'priority'  => 120,
            'fieldwidth'=> '30', //set the field to 50% width so that we can display a second one next to it
        ) 
    )
);