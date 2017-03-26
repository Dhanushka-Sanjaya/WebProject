<?php
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

// ADMIN JS&CSS
function elletta_admin_custom_scripts() {
  	wp_enqueue_media();
	wp_enqueue_style( 'admin-css', get_template_directory_uri() . '/inc/assets/css/admin.css' );
	wp_enqueue_script( 'admin-js', get_template_directory_uri() . '/inc/assets/js/admin.js', '', '', true );
}

add_action('admin_head', 'elletta_admin_custom_scripts');

