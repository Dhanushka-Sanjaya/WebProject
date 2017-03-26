<?php
/**
 * WP Customizer panel section to handle header options
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}

$wp_customize->add_section( 'elletta_header_section', array(
        'priority' => 122,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Header Section', 'elletta' ),
        'description' => ''
    ) );

$wp_customize->add_setting( 'header_style', array(
    'default'        => $elletta_customizer_defaults['header_style'],
    'sanitize_callback' => 'elletta_sanitize_choices_field'
    ) );

$wp_customize->add_control( new Layout_Control(
        $wp_customize,
        'header_style',
        array(
            'label'   	=> __( 'Header Style', 'elletta' ),
            'section' 	=> 'elletta_header_section',
            'description' => __( 'Configure Header Style', 'elletta' ),
            'columns' => 2,
            'choices'	=> array(
                    'header-1' => 'header-1.gif',
                    'header-2'  => 'header-2.gif',
                    'header-3'  => 'header-3.gif',
                    'header-4' => 'header-4.gif',                  
            ),
            'priority'	 => 5
        )
    )
);

$wp_customize->add_setting( 'image_background_header', array(
        'default'    => '',
        'sanitize_callback' => 'esc_url_raw'
        ) 
);

$wp_customize->add_control( new WP_Customize_Image_Control(
           $wp_customize,
           'image_background_header',
           array(
               'label'      => __( 'Upload a Background Image', 'elletta' ),
               'priority' => 6,
               'section'    => 'elletta_header_section',
               'settings'   => 'image_background_header'
           )
       )
);

$wp_customize->add_setting( 'banner-header', array(
        'default'    => '',
        'sanitize_callback' => 'esc_url_raw'
        ) 
);

$wp_customize->add_control( new WP_Customize_Image_Control(
           $wp_customize,
           'banner-header',
           array(
               'label'      => __( 'Upload a Banner Image', 'elletta' ),
               'priority' => 7,
               'section'    => 'elletta_header_section',
               'settings'   => 'banner-header'
           )
       )
);

$wp_customize->add_setting( 'banner-link-header', array(
        'default'    => '',
        'sanitize_callback' => 'esc_url_raw'
        ) 
);

$wp_customize->add_control( 'banner-link-header',
           array(
               'label'      => __( 'Banner Image Link', 'elletta' ),
               'priority' => 8,
               'section'    => 'elletta_header_section',
               'settings'   => 'banner-link-header'
           )
);
    
$wp_customize->add_setting( 'header_show_search', array(
    'default'    => $elletta_customizer_defaults['header_show_search'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'header_show_search',
        array(
            'label'   	=> esc_html__( 'Show Searchbox', 'elletta' ),
            'priority' => 10,
            'section' 	=> 'elletta_header_section'               
        )
    )
);
$wp_customize->add_setting( 'header_show_social_icons', array(
	'default'    => $elletta_customizer_defaults['header_show_social_icons'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
	) 
);
    
$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'header_show_social_icons',
        array(
            'label'   	=> esc_html__( 'Show Social Icons', 'elletta' ),
            'priority' => 20,
            'section' 	=> 'elletta_header_section'               
        )
    )
);

$wp_customize->add_setting( 'primary_menu_text', array('sanitize_callback' => 'elletta_sanitize_textarea_field') );

$wp_customize->add_control( new Info_Custom_control(
        $wp_customize,
        'primary_menu_text',
        array(
            'label'      => esc_html__( 'Configuration Primary Menu', 'elletta' ),
            'section'    => 'elletta_header_section',
            'settings'   => 'primary_menu_text',
            'priority' => 90,
        )
    )
);

$wp_customize->add_setting( 'primary_menu_font_size', array(
	'default'    => $elletta_customizer_defaults['primary_menu_font_size'],
        'sanitize_callback' => 'elletta_sanitize_number_field'
	) );
    
$wp_customize->add_control( new Slider_Control(
        $wp_customize,
        'primary_menu_font_size',
        array(
            'label'   	=> esc_html__( 'Primary Menu Font Size', 'elletta' ),
            'section' 	=> 'elletta_header_section',
            'priority'      => 91
        )
    )
);

$wp_customize->add_setting( 'primary_submenu_font_size', array(
	'default'    => $elletta_customizer_defaults['primary_submenu_font_size'],
        'sanitize_callback' => 'elletta_sanitize_number_field'
	) );
    
$wp_customize->add_control( new Slider_Control(
        $wp_customize,
        'primary_submenu_font_size',
        array(
            'label'   	=> esc_html__( 'Primary Submenu Font Size', 'elletta' ),
            'section' 	=> 'elletta_header_section',
            'priority'      => 92
        )
    )
);

$wp_customize->add_setting( 'primary_menu_background_color', array(
	'default' => $elletta_customizer_defaults['primary_menu_background_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'primary_menu_background_color', 
        array(
            'label' => esc_html__( 'Primary Menu Background Color', 'elletta' ),
            'priority' => 93,
            'section' => 'elletta_header_section',
            'settings' => 'primary_menu_background_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'primary_menu_text_color', array(
	'default' => $elletta_customizer_defaults['primary_menu_text_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'primary_menu_text_color', 
        array(
            'label' => esc_html__( 'Primary Menu Text Color', 'elletta' ),
            'priority' => 94,
            'section' => 'elletta_header_section',
            'settings' => 'primary_menu_text_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'primary_menu_text_color_hover', array(
	'default' => $elletta_customizer_defaults['primary_menu_text_color_hover'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'primary_menu_text_color_hover', 
        array(
            'label' => esc_html__( 'Primary Menu Text Color Hover', 'elletta' ),
            'priority' => 95,
            'section' => 'elletta_header_section',
            'settings' => 'primary_menu_text_color_hover',
        ) 
    ) 
);

$wp_customize->add_setting( 'primary_menu_submenu_background_color', array(
	'default' => $elletta_customizer_defaults['primary_menu_submenu_background_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'primary_menu_submenu_background_color', 
        array(
            'label' => esc_html__( 'Primary Menu Submenu Background Color', 'elletta' ),
            'priority' => 96,
            'section' => 'elletta_header_section',
            'settings' => 'primary_menu_submenu_background_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'primary_menu_submenu_text_color', array(
	'default' => $elletta_customizer_defaults['primary_menu_submenu_text_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'primary_menu_submenu_text_color', 
        array(
            'label' => esc_html__( 'Primary Menu Submenu Text Color', 'elletta' ),
            'priority' => 97,
            'section' => 'elletta_header_section',
            'settings' => 'primary_menu_submenu_text_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'primary_menu_submenu_text_color_hover', array(
	'default' => $elletta_customizer_defaults['primary_menu_submenu_text_color_hover'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'primary_menu_submenu_text_color_hover', 
        array(
            'label' => esc_html__( 'Primary Menu Submenu Text Color Hover', 'elletta' ),
            'priority' => 98,
            'section' => 'elletta_header_section',
            'settings' => 'primary_menu_submenu_text_color_hover',
        ) 
    ) 
);
 //Secondary Menu

$wp_customize->add_setting( 'secondary_menu_text', array('sanitize_callback' => 'elletta_sanitize_textarea_field') );

$wp_customize->add_control( new Info_Custom_control(
        $wp_customize,
        'secondary_menu_text',
        array(
            'label'      => esc_html__( 'Configuration Secondary Menu', 'elletta' ),
            'section'    => 'elletta_header_section',
            'settings'   => 'secondary_menu_text',
            'priority' => 190,
        )
    )
);

$wp_customize->add_setting( 'secondary_menu_font_size', array(
	'default'    => $elletta_customizer_defaults['secondary_menu_font_size'],
        'sanitize_callback' => 'elletta_sanitize_number_field'
	) );
    
$wp_customize->add_control( new Slider_Control(
        $wp_customize,
        'secondary_menu_font_size',
        array(
            'label'   	=> esc_html__( 'Secondary Menu Font Size', 'elletta' ),
            'section' 	=> 'elletta_header_section',
            'priority'      => 191
        )
    )
);

$wp_customize->add_setting( 'secondary_submenu_font_size', array(
	'default'    => $elletta_customizer_defaults['secondary_submenu_font_size'],
        'sanitize_callback' => 'elletta_sanitize_number_field'
	) );
    
$wp_customize->add_control( new Slider_Control(
        $wp_customize,
        'secondary_submenu_font_size',
        array(
            'label'   	=> esc_html__( 'Secondary Submenu Font Size', 'elletta' ),
            'section' 	=> 'elletta_header_section',
            'priority'      => 192
        )
    )
);

$wp_customize->add_setting( 'secondary_menu_background_color', array(
	'default' => $elletta_customizer_defaults['secondary_menu_background_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'secondary_menu_background_color', 
        array(
            'label' => esc_html__( 'Secondary Menu Background Color', 'elletta' ),
            'priority' => 193,
            'section' => 'elletta_header_section',
            'settings' => 'secondary_menu_background_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'secondary_menu_text_color', array(
	'default' => $elletta_customizer_defaults['secondary_menu_text_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'secondary_menu_text_color', 
        array(
            'label' => esc_html__( 'Secondary Menu Text Color', 'elletta' ),
            'priority' => 194,
            'section' => 'elletta_header_section',
            'settings' => 'secondary_menu_text_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'secondary_menu_text_color_hover', array(
	'default' => $elletta_customizer_defaults['secondary_menu_text_color_hover'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'secondary_menu_text_color_hover', 
        array(
            'label' => esc_html__( 'Secondary Menu Text Color Hover', 'elletta' ),
            'priority' => 195,
            'section' => 'elletta_header_section',
            'settings' => 'secondary_menu_text_color_hover',
        ) 
    ) 
);

$wp_customize->add_setting( 'secondary_menu_submenu_background_color', array(
	'default' => $elletta_customizer_defaults['secondary_menu_submenu_background_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'secondary_menu_submenu_background_color', 
        array(
            'label' => esc_html__( 'Secondary Menu Submenu Background Color', 'elletta' ),
            'priority' => 196,
            'section' => 'elletta_header_section',
            'settings' => 'secondary_menu_submenu_background_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'secondary_menu_submenu_text_color', array(
	'default' => $elletta_customizer_defaults['secondary_menu_submenu_text_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'secondary_menu_submenu_text_color', 
        array(
            'label' => esc_html__( 'Secondary Menu Submenu Text Color', 'elletta' ),
            'priority' => 197,
            'section' => 'elletta_header_section',
            'settings' => 'secondary_menu_submenu_text_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'secondary_menu_submenu_text_color_hover', array(
	'default' => $elletta_customizer_defaults['secondary_menu_submenu_text_color_hover'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'secondary_menu_submenu_text_color_hover', 
        array(
            'label' => esc_html__( 'Secondary Menu Submenu Text Color Hover', 'elletta' ),
            'priority' => 198,
            'section' => 'elletta_header_section',
            'settings' => 'secondary_menu_submenu_text_color_hover',
        ) 
    ) 
);

//Mobile Menu

$wp_customize->add_setting( 'mobile_menu_text', array('sanitize_callback' => 'elletta_sanitize_textarea_field') );

$wp_customize->add_control( new Info_Custom_control(
        $wp_customize,
        'mobile_menu_text',
        array(
            'label'      => esc_html__( 'Configuration Mobile Menu', 'elletta' ),
            'section'    => 'elletta_header_section',
            'settings'   => 'mobile_menu_text',
            'priority' => 200,
        )
    )
);

$wp_customize->add_setting( 'mobile_menu_font_size', array(
	'default'    => $elletta_customizer_defaults['mobile_menu_font_size'],
        'sanitize_callback' => 'elletta_sanitize_number_field'
	) );
    
$wp_customize->add_control( new Slider_Control(
        $wp_customize,
        'mobile_menu_font_size',
        array(
            'label'   	=> esc_html__( 'Mobile Menu Font Size', 'elletta' ),
            'section' 	=> 'elletta_header_section',
            'settings' => 'mobile_menu_font_size',
            'priority'      => 201
        )
    )
);

$wp_customize->add_setting( 'mobile_submenu_font_size', array(
	'default'    => $elletta_customizer_defaults['secondary_submenu_font_size'],
        'sanitize_callback' => 'elletta_sanitize_number_field'
	) );
    
$wp_customize->add_control( new Slider_Control(
        $wp_customize,
        'mobile_submenu_font_size',
        array(
            'label'   	=> esc_html__( 'Mobile Submenu Font Size', 'elletta' ),
            'section' 	=> 'elletta_header_section',
            'priority'      => 202
        )
    )
);

$wp_customize->add_setting( 'mobile_menu_background_color', array(
	'default' => $elletta_customizer_defaults['mobile_menu_background_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'mobile_menu_background_color', 
        array(
            'label' => esc_html__( 'Mobile Menu Background Color', 'elletta' ),
            'priority' => 203,
            'section' => 'elletta_header_section',
            'settings' => 'mobile_menu_background_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'mobile_menu_text_color', array(
	'default' => $elletta_customizer_defaults['mobile_menu_text_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'mobile_menu_text_color', 
        array(
            'label' => esc_html__( 'Mobile Menu Text Color', 'elletta' ),
            'priority' => 204,
            'section' => 'elletta_header_section',
            'settings' => 'mobile_menu_text_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'mobile_menu_text_color_hover', array(
	'default' => $elletta_customizer_defaults['mobile_menu_text_color_hover'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'mobile_menu_text_color_hover', 
        array(
            'label' => esc_html__( 'Mobile Menu Text Color Hover', 'elletta' ),
            'priority' => 205,
            'section' => 'elletta_header_section',
            'settings' => 'mobile_menu_text_color_hover',
        ) 
    ) 
);


$wp_customize->add_setting( 'mobile_submenu_text_color', array(
	'default' => $elletta_customizer_defaults['mobile_submenu_text_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'mobile_submenu_text_color', 
        array(
            'label' => esc_html__( 'Mobile Submenu Text Color', 'elletta' ),
            'priority' => 207,
            'section' => 'elletta_header_section',
            'settings' => 'mobile_submenu_text_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'mobile_submenu_text_color_hover', array(
	'default' => $elletta_customizer_defaults['mobile_submenu_text_color_hover'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'mobile_submenu_text_color_hover', 
        array(
            'label' => esc_html__( 'Mobile Submenu Text Color Hover', 'elletta' ),
            'priority' => 208,
            'section' => 'elletta_header_section',
            'settings' => 'mobile_submenu_text_color_hover',
        ) 
    ) 
);