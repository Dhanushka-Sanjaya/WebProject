<?php
/**
 * WP Customizer panel section to handle header options
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}
$wp_customize->add_section( 'elletta_post_section', array(
        'priority' => 160,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Post Settings', 'elletta' ),
        'description' => ''
    ) );

 
$wp_customize->add_setting( 'sidebar_post', array(
    'default'        => $elletta_customizer_defaults['sidebar_post'],
    'sanitize_callback' => 'elletta_sanitize_choices_field'
    ) );

$wp_customize->add_control( new Layout_Control(
        $wp_customize,
        'sidebar_post',
        array(
            'label'   	=> esc_html__( 'Sidebar Post', 'elletta' ),
            'section' 	=> 'elletta_post_section',
            'description' => esc_html__( 'Configure Post Sidebar', 'elletta' ),
            'choices'	=> array(
                    'right' => 'sidebar-right.gif',                   
                    'none'  => 'no-sidebar.gif',
                    'left'  => 'sidebar-left.gif',
            ),
            'priority'	 => 10
        )
    )
);

$wp_customize->add_setting( 'show_categories_post', array(
    'default'    => $elletta_customizer_defaults['show_categories_post'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'show_categories_post',
        array(
            'label'   	=> esc_html__( 'Show Categories', 'elletta' ),
            'priority' => 20,
            'section' 	=> 'elletta_post_section' ,
            'settings'   => 'show_categories_post'
        )
    )
);

$wp_customize->add_setting( 'show_date_post', array(
    'default'    => $elletta_customizer_defaults['show_date_post'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'show_date_post',
        array(
            'label'   	=> esc_html__( 'Show Date', 'elletta' ),
            'priority' => 30,
            'section' 	=> 'elletta_post_section' ,
            'settings'   => 'show_date_post'
        )
    )
);

$wp_customize->add_setting( 'show_author_post', array(
    'default'    => $elletta_customizer_defaults['show_author_post'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'show_author_post',
        array(
            'label'   	=> esc_html__( 'Show Author', 'elletta' ),
            'priority' => 40,
            'section' 	=> 'elletta_post_section' ,
            'settings'   => 'show_author_post'
        )
    )
);

$wp_customize->add_setting( 'show_author_box_post', array(
    'default'    => $elletta_customizer_defaults['show_author_box_post'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'show_author_box_post',
        array(
            'label'   	=> esc_html__( 'Show Author Box', 'elletta' ),
            'priority' => 50,
            'section' 	=> 'elletta_post_section' ,
            'settings'   => 'show_author_box_post'
        )
    )
);

$wp_customize->add_setting( 'show_tags_post', array(
    'default'    => $elletta_customizer_defaults['show_tags_post'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'show_tags_post',
        array(
            'label'   	=> esc_html__( 'Show Tags', 'elletta' ),
            'priority' => 60,
            'section' 	=> 'elletta_post_section' ,
            'settings'   => 'show_tags_post'
        )
    )
);

$wp_customize->add_setting( 'show_share_buttons_post', array(
    'default'    => $elletta_customizer_defaults['show_share_buttons_post'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'show_share_buttons_post',
        array(
            'label'   	=> esc_html__( 'Show Share Buttons', 'elletta' ),
            'priority' => 70,
            'section' 	=> 'elletta_post_section' ,
            'settings'   => 'show_share_buttons_post'
        )
    )
);

$wp_customize->add_setting( 'show_related_posts_post', array(
    'default'    => $elletta_customizer_defaults['show_related_posts_post'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'show_related_posts_post',
        array(
            'label'   	=> esc_html__( 'Show Related Posts', 'elletta' ),
            'priority' => 80,
            'section' 	=> 'elletta_post_section' ,
            'settings'   => 'show_related_posts_post'
        )
    )
);

$wp_customize->add_setting( 'show_post_navigation_post', array(
    'default'    => $elletta_customizer_defaults['show_post_navigation_post'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'show_post_navigation_post',
        array(
            'label'   	=> esc_html__( 'Show Post Navigation', 'elletta' ),
            'priority' => 90,
            'section' 	=> 'elletta_post_section' ,
            'settings'   => 'show_post_navigation_post'
        )
    )
);

$wp_customize->add_setting( 'show_comments_post', array(
    'default'    => $elletta_customizer_defaults['show_comments_post'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'show_comments_post',
        array(
            'label'   	=> esc_html__( 'Show Comments', 'elletta' ),
            'priority' => 100,
            'section' 	=> 'elletta_post_section' ,
            'settings'   => 'show_comments_post'
        )
    )
);

$wp_customize->add_setting( 'show_views_post', array(
    'default'    => $elletta_customizer_defaults['show_views_post'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'show_views_post',
        array(
            'label'   	=> esc_html__( 'Show Views', 'elletta' ),
            'priority' => 110,
            'section' 	=> 'elletta_post_section' ,
            'settings'   => 'show_views_post'
        )
    )
);