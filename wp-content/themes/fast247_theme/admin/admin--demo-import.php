<?php

	// TGM Plugin Activation.
	
	require_once get_template_directory() . '/admin/admin--class-tgm-plugin-activation.php';


/* ============================================================================================================================================= */


	function logistica_plugins()
	{
		$message = "";
		
		if (isset($_GET['plugin']))
		{
			if ($_GET['plugin'] == 'one-click-demo-import')
			{
				// Plugin activated.
				
				$message .= '<div class="notice notice-info pixelwars-tgmpa-notice">';
				$message .= 	'<h3>' . esc_html__('One Click Demo Import', 'logistica') . ' </h3>';
				$message .= 	'<p>' . esc_html__('Importing demo data is the quickest and easiest way to set up your new theme.', 'logistica') . ' </p>';
				$message .= 	'<p><a class="button button-primary" href="' . esc_url(admin_url('themes.php?page=logistica-import-theme-demos')) . '">' . esc_html__('Run Importer', 'logistica') . '</a></p>';
				$message .= '</div>';
			}
		}
		else
		{
			$message .= '<div class="notice notice-warning pixelwars-tgmpa-notice">';
			$message .= 	'<h3>' . esc_html__('Important', 'logistica') . ' </h3>';
			$message .= 	'<p>' . esc_html__('Install/Activate ', 'logistica') . ' <b><u>' . esc_html__('One Click Demo Import', 'logistica') . '</u></b> ' . esc_html__('plugin to import theme demos.', 'logistica') . '</p>';
			$message .= '</div>';
		}
		
		$config = array(
			'id'           => 'logistica_tgmpa',
			'default_path' => "",
			'menu'         => 'logistica-install-update-theme-plugins',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'is_automatic' => true,
			'has_notices'  => false,
			'dismissable'  => true,
			'dismiss_msg'  => '<h2>' . esc_html__('Theme Plugins', 'logistica') . '</h2>',
			'message'      => $message,
			'strings'      => array(
				'menu_title' => esc_html__('Install Theme Plugins', 'logistica'),
				'page_title' => esc_html__('Install/Update Theme Plugins', 'logistica'),
			)
		);
		
		$plugins = array(
			array(
				'name'               => esc_html__('Pixelwars Core', 'logistica'),
				'slug'               => 'pixelwars-core',
				'source'             => get_template_directory() . '/admin/plugins/pixelwars-core.zip',
				'version'            => '6.2.4',
				'required'           => false,
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => "",
				'is_callable'        => ""
			),
			array(
				'name'     => esc_html__('One Click Demo Import', 'logistica'),
				'slug'     => 'one-click-demo-import',
				'required' => false
			)
		);
		
		tgmpa($plugins, $config);
	}
	
	add_action('tgmpa_register', 'logistica_plugins');


/* ============================================================================================================================================= */
/* ============================================================================================================================================= */


	// Plugin: "One Click Demo Import".
	
	function logistica_ocdi_plugin_page_setup($default_settings)
	{
		$default_settings['capability']  = 'import';
		$default_settings['parent_slug'] = 'themes.php';
		$default_settings['menu_slug']   = 'logistica-import-theme-demos';
		$default_settings['menu_title']  = esc_html__('Import Theme Demo' , 'logistica');
		$default_settings['page_title']  = esc_html__('One Click Demo Import' , 'logistica');
		
		return $default_settings;
	}

	add_filter('ocdi/plugin_page_setup', 'logistica_ocdi_plugin_page_setup');


/* ============================================================================================================================================= */


	function logistica_ocdi_plugin_intro_text($default_text)
	{
		$default_text .= '<div class="notice notice-warning">';
		$default_text .= 	'<p>';
		$default_text .= 		'<b>' . esc_html__('Warning: ', 'logistica') . '<a target="_blank" href="https://elementor.com/help/requirements/">' . esc_html__('Please check out here for the system requirements you need in order to import demo data.', 'logistica') . '</a> ' . esc_html__('(If you are not sure whether or not your server support this, contact your host.)', 'logistica') . '</b>';
		$default_text .= 	'</p>';
		$default_text .= '</div>';
		
		return $default_text;
	}
	
	add_filter('ocdi/plugin_intro_text', 'logistica_ocdi_plugin_intro_text');


/* ============================================================================================================================================= */


	function logistica_ocdi_register_plugins($plugins)
	{
		$theme_plugins = array(
			array(
				'name'        => esc_html__('Pixelwars Core', 'logistica'),
				'slug'        => 'pixelwars-core',
				'description' => esc_html__('Advanced features for Pixelwars themes.', 'logistica'),
				'source'      => get_template_directory_uri() . '/admin/plugins/pixelwars-core.zip',
				'required'    => false,
				'preselected' => true,
			),
			array(
				'name'        => esc_html__('Elementor - Drag & Drop Page Builder', 'logistica'),
				'slug'        => 'elementor',
				'description' => esc_html__('Instant drag & drop lets you easily place every element on the page.', 'logistica'),
				'required'    => false,
				'preselected' => true,
			),
			array(
				'name'        => esc_html__('Prime Slider - Addon for Elementor', 'logistica'),
				'slug'        => 'bdthemes-prime-slider-lite',
				'description' => esc_html__('A fast, fully customizable, functional slider builder.', 'logistica'),
				'required'    => false,
				'preselected' => true,
			),
			array(
				'name'        => esc_html__('Qi - Addon for Elementor', 'logistica'),
				'slug'        => 'qi-addons-for-elementor',
				'description' => esc_html__('The largest free library of custom and fully flexible Elementor widgets.', 'logistica'),
				'required'    => false,
				'preselected' => true,
			),
			array(
				'name'        => esc_html__('WPForms - Drag & Drop Form Builder', 'logistica'),
				'slug'        => 'wpforms-lite',
				'description' => esc_html__('Allows you to create beautiful contact forms for your site in minutes.', 'logistica'),
				'required'    => false,
				'preselected' => true,
			),
			array(
				'name'        => esc_html__('SVG Support', 'logistica'),
				'slug'        => 'svg-support',
				'description' => esc_html__('Safely upload SVG files to your media library and use them like any other image.', 'logistica'),
				'required'    => false,
				'preselected' => true,
			),
			array(
				'name'        => esc_html__('Envato Market', 'logistica'),
				'slug'        => 'envato-market',
				'description' => esc_html__('This plugin will periodically check for updates, so keeping your theme up to date is as simple as a few clicks.', 'logistica'),
				'source'      => get_template_directory_uri() . '/admin/plugins/envato-market.zip',
				'required'    => false,
				'preselected' => true,
			)
		);
		
		return array_merge($plugins, $theme_plugins);
	}
	
	add_filter('ocdi/register_plugins', 'logistica_ocdi_register_plugins');


/* ============================================================================================================================================= */


	function logistica_ocdi_after_import()
	{
		// Assign menus to their locations.
		
		$main_menu = get_term_by('name', 'Main Menu', 'nav_menu');
		
		set_theme_mod(
			'nav_menu_locations',
			array(
				'logistica_theme_menu_location' => $main_menu->term_id,
			)
		);
		
		// Assign Homepage and Blog page.
		
		$homepage  = get_page_by_title('Home'); // Get homepage.
		$blog_page = get_page_by_title('News'); // Get blog page.
		
		update_option('show_on_front', 'page');
		update_option('page_on_front', $homepage->ID); // Set homepage.
		update_option('page_for_posts', $blog_page->ID); // Set blog page.
	}
	
	add_action('ocdi/after_import', 'logistica_ocdi_after_import');


/* ============================================================================================================================================= */


	function logistica_ocdi_import_files()
	{
		$theme_directory     = trailingslashit(get_template_directory());
		$theme_directory_url = trailingslashit(get_template_directory_uri());
		
		return array(
			array(
				'import_file_name'             => esc_html__('Theme Demo', 'logistica'),
				'local_import_file'            => $theme_directory     . 'admin/demo-data/01/content.xml',
				'local_import_widget_file'     => $theme_directory     . 'admin/demo-data/01/widgets.wie',
				'local_import_customizer_file' => $theme_directory     . 'admin/demo-data/01/customizer.dat',
				'import_preview_image_url'     => $theme_directory_url . 'admin/demo-data/01/screenshot.jpg',
				'preview_url'                  => 'https://themes.pixelwars.org/logistica/demo-01/'
			),
			array(
				'import_file_name'             => esc_html__('Theme Demo Helper', 'logistica'),
				'local_import_file'            => $theme_directory     . 'admin/demo-data/01/content.xml',
				'local_import_widget_file'     => $theme_directory     . 'admin/demo-data/01/widgets.wie',
				'local_import_customizer_file' => $theme_directory     . 'admin/demo-data/01/customizer.dat',
				'import_preview_image_url'     => $theme_directory_url . 'admin/demo-data/01/screenshot.jpg',
				'preview_url'                  => 'https://themes.pixelwars.org/logistica/demo-01/'
			)
		);
	}
	
	add_filter('ocdi/import_files', 'logistica_ocdi_import_files');
