<?php

// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'elletta_';

global $meta_boxes;

$meta_boxes = array();

/* Registered Sidebar Array List */

global $wp_registered_sidebars;

foreach($wp_registered_sidebars as $sidebar)
{
  if (strpos($sidebar['name'], 'Footer') === false) {
      $sidebars[$sidebar['id']] = $sidebar['name'];
  }
}


/*
*
* Metaboxes for Blog Post Types
*
*/

$meta_boxes[] = array(
  // Meta box id, UNIQUE per meta box. Optional since 4.1.5
  'id' => 'gallery-options',

  // Meta box title - Will appear at the drag and drop handle bar. Required.
  'title' => esc_html__( 'Gallery Options', 'elletta' ),

  // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
  'pages' => array( 'post' ),

  // Where the meta box appear: normal (default), advanced, side. Optional.
  'context' => 'normal',

  // Order of meta box: high (default), low. Optional.
  'priority' => 'high',

  // Auto save: true, false (default). Optional.
  'autosave' => true,

  // List of meta fields
  'fields' => array(
    array(
      'type' => 'heading',
      'name' => esc_html__( 'Gallery Layout', 'elletta' ),
      'id'   => 'fake_id', // Not used but needed for plugin
    ),
    array(
      'name' => esc_html__( 'Select A Type', 'elletta' ),
      'id'   => "{$prefix}gallery_layout",
      'type' => 'radio',
      'options' => array(
        'gallery-slideshow' => esc_html__( 'Slideshow', 'elletta' ),
        'gallery-thumbnail' => esc_html__( 'Thumbnail Gallery', 'elletta' )
      )
    ),
    array(
      'type' => 'heading',
      'name' => esc_html__( 'Images for That Gallery', 'elletta' ),
      'id'   => 'fake_id', // Not used but needed for plugin
    ),
    array(
      'name' => '',
      'id'   => "{$prefix}post_gallery_images",
      'type' => 'image_advanced',
      'max_file_uploads' => 24,
    ),
    array(
      'name' => esc_html__( 'Row Height', 'elletta' ),
      'id'   => "{$prefix}post_gallery_row_height",
      'type'  => 'number',
      'class' => 'gallery_thumb_row_height',
      'min'  => 20,
      'std' => 20
    )
  )
);

$meta_boxes[] = array(
  // Meta box id, UNIQUE per meta box. Optional since 4.1.5
  'id' => 'video-options',

  // Meta box title - Will appear at the drag and drop handle bar. Required.
  'title' => esc_html__( 'Video Options', 'elletta' ),

  // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
  'pages' => array( 'post' ),

  // Where the meta box appear: normal (default), advanced, side. Optional.
  'context' => 'normal',

  // Order of meta box: high (default), low. Optional.
  'priority' => 'high',

  // Auto save: true, false (default). Optional.
  'autosave' => true,

  // List of meta fields
  'fields' => array(
    array(
      'type' => 'heading',
      'name' => esc_html__( 'Video Types', 'elletta' ),
      'id'   => 'fake_id' // Not used but needed for plugin
    ),
    array(
      'name' => esc_html__( 'Select A Video Type', 'elletta' ),
      'id'   => "{$prefix}video_list",
      'type' => 'radio',
      // Options of checkboxes, in format 'value' => 'Label'
      'options' => array(
        'native' => esc_html__( 'HTML5 Native Video', 'elletta' ),
        'embed' => esc_html__( 'Embed Video (Youtube, Vimeo etc)', 'elletta' ),
      ),
      'std' => 'native'
    ),
    array(
      'type' => 'heading',
      'name' => esc_html__( 'HTML5 Native Video', 'elletta' ),
      'id'   => 'fake_id', // Not used but needed for plugin
      'class'   => 'inner_heading'
    ),
    array(
      'name' => esc_html__( 'MP4 File Upload', 'elletta' ),
      'id'   => "{$prefix}inner_video_file_mp4",
      'class' => 'video-file-wrapper',
      'type' => 'file_advanced',
      'max_file_uploads' => 1,
      'mime_type' => 'video/mp4' // Leave blank for all file types
    ),
    array(
      'name' => esc_html__( 'WEBM File Upload', 'elletta' ),
      'id'   => "{$prefix}inner_video_file_webm",
      'class' => 'video-file-wrapper',
      'type' => 'file_advanced',
      'max_file_uploads' => 1,
      'mime_type' => 'video/webm' // Leave blank for all file types
    ),
    array(
      'name' => esc_html__( 'OGV File Upload', 'elletta' ),
      'id'   => "{$prefix}inner_video_file_ogv",
      'class' => 'video-file-wrapper',
      'type' => 'file_advanced',
      'max_file_uploads' => 1,
      'mime_type' => 'video/ogg' // Leave blank for all file types
    ),
    // HEADING
    array(
      'type' => 'heading',
      'name' => esc_html__( 'Embed Video', 'elletta' ),
      'id'   => 'fake_id', // Not used but needed for plugin
      'class'   => 'embed_heading'
    ),
    array(
      'name' => esc_html__( 'Embed Video URL', 'elletta' ),
      'id'   => "{$prefix}embed_video_url",
      'class' => 'embed-video-wrapper',
      'type' => 'oembed'
    )
  )
);

$meta_boxes[] = array(
  // Meta box id, UNIQUE per meta box. Optional since 4.1.5
  'id' => 'audio-options',

  // Meta box title - Will appear at the drag and drop handle bar. Required.
  'title' => esc_html__( 'Audio Options', 'elletta' ),

  // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
  'pages' => array( 'post' ),

  // Where the meta box appear: normal (default), advanced, side. Optional.
  'context' => 'normal',

  // Order of meta box: high (default), low. Optional.
  'priority' => 'high',

  // Auto save: true, false (default). Optional.
  'autosave' => true,

  // List of meta fields
  'fields' => array(
    array(
      'type' => 'heading',
      'name' => esc_html__( 'Audio Types', 'elletta' ),
      'id'   => 'fake_id', // Not used but needed for plugin
    ),
    array(
      'name' => esc_html__( 'Select An Audio Type', 'elletta' ),
      'id'   => "{$prefix}audio_list",
      'type' => 'radio',
      // Options of checkboxes, in format 'value' => 'Label'
      'options' => array(
        'native' => esc_html__( 'HTML5 Native Audio', 'elletta' ),
        'embed' => esc_html__( 'Embed Audio (SoundCloud etc.)', 'elletta' ),
      ),
      'std' => 'native'
    ),
    array(
      'type' => 'heading',
      'name' => esc_html__( 'HTML5 Native Audio', 'elletta' ),
      'id'   => 'fake_id', // Not used but needed for plugin
      'class'   => 'inner_heading'
    ),
    array(
      'type' => 'heading',
      'name' => esc_html__( 'Audio Properties', 'elletta' ),
      'id'   => 'fake_id', // Not used but needed for plugin
      'class'   => 'inner_heading'
    ),
    array(
      'name' => esc_html__( 'Audio MP3 File Upload', 'elletta' ),
      'id'   => "{$prefix}audio_mp3_file",
      'class' => 'audio-file-wrapper',
      'type' => 'file_advanced',
      'max_file_uploads' => 1,
      'mime_type' => 'audio/mpeg'
    ),
    array(
      'name' => esc_html__( 'Audio OGA File Upload', 'elletta' ),
      'id'   => "{$prefix}audio_oga_file",
      'class' => 'audio-file-wrapper',
      'type' => 'file_advanced',
      'max_file_uploads' => 1,
      'mime_type' => 'audio/ogg'
    ),
    array(
      'type' => 'heading',
      'name' => esc_html__( 'Embed Audio', 'elletta' ),
      'id'   => 'fake_id', // Not used but needed for plugin
      'class'   => 'embed_heading'
    ),
    array(
      'name' => esc_html__( 'Embed Audio URL', 'elletta' ),
      'id'   => "{$prefix}embed_audio_url",
      'class' => 'embed-audio-wrapper',
      'type' => 'oembed'
    )
  )
);
      
$meta_boxes[] = array(
    // Meta box id, UNIQUE per meta box. Optional since 4.1.5
    'id' => 'quote-options',

    // Meta box title - Will appear at the drag and drop handle bar. Required.
    'title' => esc_html__( 'Quote Options', 'elletta' ),

    // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
    'pages' => array( 'post' ),

    // Where the meta box appear: normal (default), advanced, side. Optional.
    'context' => 'normal',

    // Order of meta box: high (default), low. Optional.
    'priority' => 'high',

    // Auto save: true, false (default). Optional.
    'autosave' => true,

    // List of meta fields
    'fields' => array(
            array(
                  'name' => esc_html__( 'Quote Author', 'elletta' ),
                  'id'   => "{$prefix}post_quote_author",
                  'type'  => 'text'
                )
    )
);


/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function elletta_register_meta_boxes()
{
  // Make sure there's no errors when the plugin is deactivated or during upgrade
  if ( !class_exists( 'RW_Meta_Box' ) )
    return;

  global $meta_boxes;
  foreach ( $meta_boxes as $meta_box )
  {
    new RW_Meta_Box( $meta_box );
  }
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'elletta_register_meta_boxes' );

