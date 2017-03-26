<?php

require_once( elletta_THEME_DIR . 'inc/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'elletta_register_required_plugins' );

function elletta_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'      => __('Meta Box', 'elletta'),
			'slug'      => 'meta-box',
			'required'  => true,
                        'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
		),
                array(
			'name'      => __('MailChimp for WordPress', 'elletta'),
			'slug'      => 'mailchimp-for-wp',
			'required'  => false,
                        'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
		),
                array(
			'name'      => __('Wp Instagram Widget', 'elletta'), 
			'slug'      => 'wp-instagram-widget',
			'required'  => false,
                        'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
		),           
                array(
			'name'      => __('Contact Form 7', 'elletta'),
			'slug'      => 'contact-form-7',
			'required'  => false,
                        'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
		),
                array(
			'name'      => __('Recent Tweets Widget', 'elletta'),
			'slug'      => 'recent-tweets-widget',
			'required'  => false,
                        'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
		),
                array(
			'name'      => __('Wp Maintenance Mode', 'elletta'),
			'slug'      => 'wp-maintenance-mode',
			'required'  => false,
                        'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
		),
                array(
			'name'      => __('WooCommerce', 'elletta'),
			'slug'      => 'woocommerce',
			'required'  => false,
                        'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
		),
                array(
			'name'      => __('The Events Calendar', 'elletta'),
			'slug'      => 'the-events-calendar',
			'required'  => false,
                        'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
		),
		array(
			'name'               => 'Easy Social Share Buttons for WordPress', // The plugin name.
			'slug'               => 'easy-social-share-buttons3', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/plugins/easy-social-share-buttons3.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'               => 'Popup Plugin For WordPress - ConvertPlug', // The plugin name.
			'slug'               => 'convertplug', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/plugins/convertplug.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'elletta',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'elletta' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'elletta' ),
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'elletta' ), // %s = plugin name.
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'elletta' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'elletta'
			), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'elletta'
			), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop(
				'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
				'elletta'
			), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'elletta'
			), // %1$s = plugin name(s).
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'elletta'
			), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop(
				'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
				'elletta'
			), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'elletta'
			), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'elletta'
			), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop(
				'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
				'elletta'
			), // %1$s = plugin name(s).
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'elletta'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'elletta'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'elletta'
			),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'elletta' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'elletta' ),
			'activated_successfully'          => esc_html__( 'The following plugin was activated successfully:', 'elletta' ),
			'plugin_already_active'           => esc_html__( 'No action taken. Plugin %1$s was already active.', 'elletta' ),  // %1$s = plugin name(s).
			'plugin_needs_higher_version'     => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'elletta' ),  // %1$s = plugin name(s).
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'elletta' ), // %s = dashboard link.
			'contact_admin'                   => esc_html__( 'Please contact the administrator of this site for help.', 'elletta' ),

			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		),
		*/
	);

	tgmpa( $plugins, $config );
}