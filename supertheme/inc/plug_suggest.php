<?php
/**
 Plugin suggeriti
 */

require_once get_template_directory() . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'supertheme_register_required_plugins' );
function supertheme_register_required_plugins() {
	
	$plugins = array(

		array(
			'name'         => 'ACF Pro', // The plugin name.
			'slug'         => 'acf-pro', // The plugin slug (typically the folder name).
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => 'https://connect.advancedcustomfields.com/index.php?p=pro&a=download&k=b3JkZXJfaWQ9NjcwMjZ8dHlwZT1wZXJzb25hbHxkYXRlPTIwMTUtMTAtMjAgMTg6NTE6MjQ=', // If set, overrides default API URL and points to an external URL.
		),

		array(
			'name'      => 'Advanced Custom Fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
		),
		
		array(
			'name'      => 'Custom Post Type UI ',
			'slug'      => 'custom-post-type-ui ',
			'required'  => true,
		),
		
		
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => true,
		),
		
	
		array(
			'name'      => 'iThemes Security',
			'slug'      => 'better-wp-security',
			'required'  => true,
		),
		
		array(
			'name'      => 'WP Super Cache ',
			'slug'      => 'wp-super-cache ',
			'required'  => true,
		),
		
		array(
			'name'      => 'Duplicate Post',
			'slug'      => 'duplicate-post',
			'required'  => false,
		),
		
		array(
			'name'      => 'Duplicator',
			'slug'      => 'duplicator',
			'required'  => false,
		),
		
		array(
			'name'      => 'Cookie Notice di dFactory ',
			'slug'      => 'cookie-notice',
			'required'  => false,
		),
		
		array(
			'name'      => 'Elementor Page Builder',
			'slug'      => 'elementor',
			'required'  => false,
		),
		
		array(
			'name'      => 'Jetpack',
			'slug'      => 'jetpack',
			'required'  => false,
		),
		array(
			'name'        => 'WordPress SEO by Yoast',
			'slug'        => 'wordpress-seo',
			'is_callable' => 'wpseo_init',
		),

	);


	$config = array(
		'strings'      => array(
			
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). */
				'Potrebbe essere utile installare questi : %1$s.',
				'Installare questi plugin: %1$s.',
				'pb_plugin_tg'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). */
				'This theme recommends the following plugin: %1$s.',
				'Plugin Suggeriti: %1$s.',
				'pb_plugin_tg'
			),
			
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). */
				'Questi plugin sono stati installati ma non ancora attivati: %1$s.',
				'Questi plugin richiedono di essere attivati: %1$s.',
				'pb_plugin_tg'
			),
			
			'notice_can_activate_recommended' => _n_noop(
				/*translators: 1: plugin name(s). */
				'Questo plugin che è stato installato non ancora stato attivato: %1$s.',
				'Questi plugin richiedono di essere attivati: %1$s.',
				'pb_plugin_tg'
			),
			
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). */
				'Buone notizie!! Ci sono aggiornamenti per questo plugin: %1$s.',
				'Buone notizie!! Ci sono aggiornamenti per questi plugin: %1$s.',
				'pb_plugin_tg'
			),
			
			
			
			'install_link'                    => _n_noop(
				'Installa il plugin',
				'Installare tutti i plugin',
				'pb_plugin_tg'
			),
			'update_link' 					  => _n_noop(
				'Aggiorna il plugin',
				'Aggiorna i plugin',
				'pb_plugin_tg'
			),
			'activate_link'                   => _n_noop(
				'Attiva il plugin',
				'Attivare i plugin',
				'pb_plugin_tg'
			),
			'page_title'                      => __( 'Installare i plugin richiesti', 'pb_plugin_tg' ),
			
		), 
		
		
		);
		
	tgmpa( $plugins, $config );
}
		
		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'pb_plugin_tg' ),
			'menu_title'                      => __( 'Install Plugins', 'pb_plugin_tg' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'pb_plugin_tg' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'pb_plugin_tg' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'pb_plugin_tg' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'Potrebbe essere utile installare questi : %1$s.',
				'This theme requires the following plugins: %1$s.',
				'pb_plugin_tg'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'pb_plugin_tg'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'pb_plugin_tg'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'pb_plugin_tg'
			),
			
			
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'pb_plugin_tg'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'pb_plugin_tg'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'pb_plugin_tg'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'pb_plugin_tg' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'pb_plugin_tg' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'pb_plugin_tg' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'pb_plugin_tg' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'pb_plugin_tg' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'pb_plugin_tg' ),
			'dismiss'                         => __( 'Dismiss this notice', 'pb_plugin_tg' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'pb_plugin_tg' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'pb_plugin_tg' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
/*  fine TGM */
