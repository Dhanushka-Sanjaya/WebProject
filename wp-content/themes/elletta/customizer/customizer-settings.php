<?php
/**
 * WP Customizer panel section to handle header options
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}

$wp_customize->add_setting( 'show_logo', array(
    'default'    => $elletta_customizer_defaults['show_logo'],
    'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'show_logo',
        array(
            'label'   	=> esc_html__( 'Show Logo', 'elletta' ),
            'priority' => 8,
            'section' 	=> 'title_tagline'               
        )
    )
);

$wp_customize->add_setting( 'logo_mobile', array(
        'default'    => '',
        'sanitize_callback' => 'esc_url_raw'
        ) 
);

$wp_customize->add_control( new WP_Customize_Image_Control(
           $wp_customize,
           'logo_mobile',
           array(
               'label'      => __( 'Upload a Mobile Logo', 'elletta' ),
               'priority' => 9,
               'section'    => 'title_tagline',
               'settings'   => 'logo_mobile'
           )
       )
);

$wp_customize->add_setting( 'logo_sticky', array(
        'default'    => '',
        'sanitize_callback' => 'esc_url_raw'
        ) 
);

$wp_customize->add_control( new WP_Customize_Image_Control(
           $wp_customize,
           'logo_sticky',
           array(
               'label'      => __( 'Upload a Sticky Logo', 'elletta' ),
               'priority' => 9,
               'section'    => 'title_tagline',
               'settings'   => 'logo_sticky'
           )
       )
);

$wp_customize->add_setting('logo_text', array(
    'default'    => $elletta_customizer_defaults['logo_text'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('logo_text', array(
    'label'      => esc_html__('Logo Text', 'elletta'),
    'section'    => 'title_tagline',
    'settings'   => 'logo_text',
    'priority'	 => 10
));

$wp_customize->add_setting( 'logo_text_color', array(
	'default' => $elletta_customizer_defaults['logo_text_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'logo_text_color', 
        array(
            'label' => esc_html__( 'Logo Text Color', 'elletta' ),
            'priority' => 11,
            'section' => 'title_tagline',
            'settings' => 'logo_text_color',
        ) 
    ) 
);

$wp_customize->add_setting('pagination_type', array(
    'default'    => $elletta_customizer_defaults['pagination_type'],
        'sanitize_callback' => 'elletta_sanitize_choices_field'
));

$wp_customize->add_control(
	'pagination_type', 
	array(
		'label'    => esc_html__( 'Pagination Type', 'elletta'),
		'section'  => 'title_tagline',
		'settings' => 'pagination_type',
		'type'     => 'radio',
		'choices'  => array(
			'classic'  => esc_html__( 'Classic Type', 'elletta'),
			'load-more' => esc_html__( 'Load More Type', 'elletta'),
                        'numeric' => esc_html__( 'Numeric', 'elletta'),
		),
            'priority'	 => 20
	)
);

$wp_customize->add_setting( 'pattern_page', array(
    'default'        => $elletta_customizer_defaults['pattern_page'],
        'sanitize_callback' => 'elletta_sanitize_choices_field'
    ) );

$wp_customize->add_control( new Layout_Control(
        $wp_customize,
        'pattern_page',
        array(
            'label'   	=> esc_html__( 'Pattern', 'elletta' ),
            'section' 	=> 'title_tagline',
            'settings' => 'pattern_page',
            'choices'	=> array(
                    'pattern-0' => 'pattern-0.png',
                    'pattern-1' => 'pattern-1.png',
                    'pattern-2' => 'pattern-2.png',
                    'pattern-3' => 'pattern-3.png',
                    'pattern-4' => 'pattern-4.png',
            ),
            'priority'	 => 30
        )
    )
);