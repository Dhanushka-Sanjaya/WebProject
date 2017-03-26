<?php
/**
 * WP Customizer panel section to handle header options
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}

$wp_customize->add_section( 'elletta_footer_section', array(
        'priority' => 130,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Footer Section', 'elletta' ),
        'description' => ''
    ) );

$wp_customize->add_setting( 'footer_boxed', array(
    'default'    => $elletta_customizer_defaults['footer_boxed'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'footer_boxed',
        array(
            'label'   	=> esc_html__( 'Footer Boxed', 'elletta' ),
            'priority' => 10,
            'section' 	=> 'elletta_footer_section' ,
            'settings'   => 'footer_boxed'
        )
    )
);

if( function_exists( 'mc4wp_show_form' ) ) :
    
    $wp_customize->add_setting( 'footer_newsletter_show', array(
        'default'    => $elletta_customizer_defaults['footer_newsletter_show'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
        ) 
    );

    $wp_customize->add_control( new Toggle_Checkbox_Custom_control(
            $wp_customize,
            'footer_newsletter_show',
            array(
                'label'   	=> esc_html__( 'Show Footer Newsletter', 'elletta' ),
                'priority' => 20,
                'section' 	=> 'elletta_footer_section' ,
                'settings'   => 'footer_newsletter_show'
            )
        )
    );
    
    $wp_customize->add_setting( 'footer_newsletter_title', array(
        'default'    => $elletta_customizer_defaults['footer_newsletter_title'],
        'sanitize_callback' => 'sanitize_text_field'
        ) );

    $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'footer_newsletter_title',
            array(
                    'label'      => esc_html__( 'Newsletter Form Title', 'elletta' ),
                    'section'    => 'elletta_footer_section',
                    'settings'   => 'footer_newsletter_title',
                    'type'	 => 'text',
                    'priority'	 => 21
                )
            )
    );

    $wp_customize->add_setting( 'footer_newsletter_subtitle', array(
        'default'    => $elletta_customizer_defaults['footer_newsletter_subtitle'],
        'sanitize_callback' => 'sanitize_text_field'
        ) );

    $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'footer_newsletter_subtitle',
            array(
                    'label'      => esc_html__( 'Newsletter Form Subtitle', 'elletta' ),
                    'section'    => 'elletta_footer_section',
                    'settings'   => 'footer_newsletter_subtitle',
                    'type'       => 'text',
                    'priority'	 => 22
                )
            )
    );
    
    $wp_customize->add_setting( 'footer_newsletter_text_color', array(
            'default' => $elletta_customizer_defaults['footer_newsletter_text_color'],
            'sanitize_callback' => 'sanitize_hex_color'
            ) 
    );


    $wp_customize->add_control( new WP_Customize_Color_Control( 
            $wp_customize, 
            'footer_newsletter_text_color', 
            array(
                'label' => esc_html__( 'Newsletter Font Color', 'elletta' ),
                'priority' => 23,
                'section' => 'elletta_footer_section',
                'settings' => 'footer_newsletter_text_color',
            ) 
        ) 
    );
    
    $wp_customize->add_setting( 'footer_newsletter_background_color', array(
	'default' => $elletta_customizer_defaults['footer_newsletter_background_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );

    $wp_customize->add_control( new WP_Customize_Color_Control( 
            $wp_customize, 
            'footer_newsletter_background_color', 
            array(
                'label' => esc_html__( 'Newsletter Background Color', 'elletta' ),
                'priority' => 24,
                'section' => 'elletta_footer_section',
                'settings' => 'footer_newsletter_background_color',
            ) 
        )
    );
    
    $wp_customize->add_setting( 'footer_newsletter_bg_image', array(
        'default'    => $elletta_customizer_defaults['footer_newsletter_bg_image'],
        'sanitize_callback' => 'esc_url_raw'
        ) 
    );

    $wp_customize->add_control( new WP_Customize_Image_Control(
               $wp_customize,
               'footer_newsletter_bg_image',
               array(
                   'label'      => esc_html__( 'Upload a Newsletter Background Image', 'elletta' ),
                   'priority' => 30,
                   'section'    => 'elletta_footer_section',
                   'settings'   => 'footer_newsletter_bg_image'
               )
           )
       );   
    
endif;
if ( function_exists( 'wpiw_init' ) ) :
    
$wp_customize->add_setting( 'footer_instagram_show', array(
        'default'    => $elletta_customizer_defaults['footer_instagram_show'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'footer_instagram_show',
        array(
            'label'   	=> esc_html__( 'Show Footer Instagram', 'elletta' ),
            'priority' => 31,
            'section' 	=> 'elletta_footer_section' ,
            'settings'   => 'footer_instagram_show'
        )
    )
);
endif;

$wp_customize->add_setting( 'footer_widget_area_show', array(
        'default'    => $elletta_customizer_defaults['footer_widget_area_show'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'footer_widget_area_show',
        array(
            'label'   	=> esc_html__( 'Show Footer Widget Area', 'elletta' ),
            'priority' => 40,
            'section' 	=> 'elletta_footer_section' ,
            'settings'   => 'footer_widget_area_show'
        )
    )
);


$wp_customize->add_setting( 'footer_columns', array(
        'default'    => $elletta_customizer_defaults['footer_columns'],
        'sanitize_callback' => 'elletta_sanitize_choices_field'
    ) );

$wp_customize->add_control( new Layout_Control(
        $wp_customize,
        'footer_columns',
        array(
            'label'   	=> esc_html__( 'Footer Layout', 'elletta' ),
            'section' 	=> 'elletta_footer_section',
            'description' => esc_html__( 'Configure Footer Layout', 'elletta' ),
            'choices'	=> array(
                    '2' => 'footer-x2.gif',
                    '3' => 'footer-x3.gif',
                    '4' => 'footer-x4.gif',
            ),
            'priority'	 => 50,
            'settings'   => 'footer_columns'
        )
    )
);

$wp_customize->add_setting( 'footer_background_color', array(
	'default' => $elletta_customizer_defaults['footer_background_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);


$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'footer_background_color', 
        array(
            'label' => esc_html__( 'Background Color', 'elletta' ),
            'priority' => 59,
            'section' => 'elletta_footer_section',
            'settings' => 'footer_background_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'footer_title_font_color', array(
	'default' => $elletta_customizer_defaults['footer_title_font_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'footer_title_font_color', 
        array(
            'label' => esc_html__( 'Title Font Color', 'elletta' ),
            'priority' => 60,
            'section' => 'elletta_footer_section',
            'settings' => 'footer_title_font_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'footer_font_color', array(
	'default' => $elletta_customizer_defaults['footer_font_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);


$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'footer_font_color', 
        array(
            'label' => esc_html__( 'Font Color', 'elletta' ),
            'priority' => 61,
            'section' => 'elletta_footer_section',
            'settings' => 'footer_font_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'footer_copyright_show', array(
    'default'    => $elletta_customizer_defaults['footer_copyright_show'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'footer_copyright_show',
        array(
            'label'   	=> esc_html__( 'Show Footer Copyright Area', 'elletta' ),
            'priority' => 70,
            'section' 	=> 'elletta_footer_section' ,
            'settings'   => 'footer_copyright_show'
        )
    )
);

$wp_customize->add_setting( 'footer_logo', array(
    'default'    => $elletta_customizer_defaults['footer_logo'],
        'sanitize_callback' => 'esc_url_raw'
    ) 
);

$wp_customize->add_control( new WP_Customize_Image_Control(
           $wp_customize,
           'footer_logo',
           array(
               'label'      => esc_html__( 'Upload a Footer logo', 'elletta' ),
               'priority'   => 80,
               'section'    => 'elletta_footer_section',
               'settings'   => 'footer_logo'
           )
       )
   );

$wp_customize->add_setting( 'footer_social_media', array(
    'default'    => $elletta_customizer_defaults['footer_social_media'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'footer_social_media',
        array(
            'label'   	=> esc_html__( 'Show Social Media', 'elletta' ),
            'priority' => 90,
            'section' 	=> 'elletta_footer_section' ,
            'settings'   => 'footer_social_media'
        )
    )
);

$wp_customize->add_setting( 'footer_copyright', array(
    'default'    => $elletta_customizer_defaults['footer_copyright'],
        'sanitize_callback' => 'elletta_sanitize_textarea_field'
    ) );

$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'footer_copyright',
        array(
                'label'      => esc_html__( 'Footer Copyright Text', 'elletta' ),
                'section'    => 'elletta_footer_section',
                'settings'   => 'footer_copyright',
                'type'		 => 'textarea',
                'priority'	 => 100
            )
        )
);


