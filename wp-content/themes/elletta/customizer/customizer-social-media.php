<?php
/**
 * WP Customizer panel section to handle header options
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}

$wp_customize->add_section( 'elletta_social_media_section', array(
        'priority' => 160,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Social Media Settings', 'elletta' ),
        'description' => ''
    ) );

$wp_customize->add_setting( 'elletta_facebook', array (
    'default'   => $elletta_customizer_defaults['elletta_facebook'],
        'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control(
        new Social_Media_Custom_control(
                $wp_customize,
                'elletta_facebook',
                array(
                        'label'      => '<i class="fa fa-facebook" aria-hidden="true"></i> Facebook',
                        'section'    => 'elletta_social_media_section',
                        'settings'   => 'elletta_facebook',
                        'priority'	 => 1,
                )
        )
);

$wp_customize->add_setting( 'elletta_twitter', array (
    'default'   => $elletta_customizer_defaults['elletta_twitter'],
        'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control(
        new Social_Media_Custom_control(
                $wp_customize,
                'elletta_twitter',
                array(
                        'label'      => '<i class="fa fa-twitter" aria-hidden="true"></i> Twitter',
                        'section'    => 'elletta_social_media_section',
                        'settings'   => 'elletta_twitter',
                        'priority'	 => 2,
                )
        )
);

$wp_customize->add_setting( 'elletta_instagram', array (
    'default'   => $elletta_customizer_defaults['elletta_instagram'],
        'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control(
        new Social_Media_Custom_control(
                $wp_customize,
                'elletta_instagram',
                array(
                        'label'      => '<i class="fa fa-instagram" aria-hidden="true"></i> Instagram',
                        'section'    => 'elletta_social_media_section',
                        'settings'   => 'elletta_instagram',
                        'priority'	 => 2,
                )
        )
);

$wp_customize->add_setting( 'elletta_pinterest', array (
    'default'   => $elletta_customizer_defaults['elletta_pinterest'],
        'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control(
        new Social_Media_Custom_control(
                $wp_customize,
                'elletta_pinterest',
                array(
                        'label'      => '<i class="fa fa-pinterest" aria-hidden="true"></i> Pinterest',
                        'section'    => 'elletta_social_media_section',
                        'settings'   => 'elletta_pinterest',
                        'priority'	 => 2,
                )
        )
);

$wp_customize->add_setting( 'elletta_bloglovin', array (
    'default'   => $elletta_customizer_defaults['elletta_bloglovin'],
        'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control(
        new Social_Media_Custom_control(
                $wp_customize,
                'elletta_bloglovin',
                array(
                        'label'      => '<i class="fa fa-heart" aria-hidden="true"></i> Bloglovin',
                        'section'    => 'elletta_social_media_section',
                        'settings'   => 'elletta_bloglovin',
                        'priority'	 => 2,
                )
        )
);

$wp_customize->add_setting( 'elletta_google_plus', array (
    'default'   => $elletta_customizer_defaults['elletta_google_plus'],
        'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control(
        new Social_Media_Custom_control(
                $wp_customize,
                'elletta_google_plus',
                array(
                        'label'      => '<i class="fa fa-google-plus" aria-hidden="true"></i> Google Plus',
                        'section'    => 'elletta_social_media_section',
                        'settings'   => 'elletta_google_plus',
                        'priority'	 => 2,
                )
        )
);

$wp_customize->add_setting( 'elletta_tumblr', array (
    'default'   => $elletta_customizer_defaults['elletta_tumblr'],
        'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control(
        new Social_Media_Custom_control(
                $wp_customize,
                'elletta_tumblr',
                array(
                        'label'      => '<i class="fa fa-tumblr" aria-hidden="true"></i> Tumblr',
                        'section'    => 'elletta_social_media_section',
                        'settings'   => 'elletta_tumblr',
                        'priority'	 => 2,
                )
        )
);

$wp_customize->add_setting( 'elletta_youtube', array (
    'default'   => $elletta_customizer_defaults['elletta_youtube'],
        'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control(
        new Social_Media_Custom_control(
                $wp_customize,
                'elletta_youtube',
                array(
                        'label'      => '<i class="fa fa-youtube" aria-hidden="true"></i> Youtube',
                        'section'    => 'elletta_social_media_section',
                        'settings'   => 'elletta_youtube',
                        'priority'	 => 2,
                )
        )
);

$wp_customize->add_setting( 'elletta_linkedin', array (
    'default'   => $elletta_customizer_defaults['elletta_linkedin'],
        'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control(
        new Social_Media_Custom_control(
                $wp_customize,
                'elletta_linkedin',
                array(
                        'label'      =>  '<i class="fa fa-linkedin" aria-hidden="true"></i> Linkedin',
                        'description' =>  esc_html__( ' (Use full URL to your Linkedin profile)', 'elletta' ),
                        'section'    => 'elletta_social_media_section',
                        'settings'   => 'elletta_linkedin',
                        'priority'	 => 2,
                )
        )
);
