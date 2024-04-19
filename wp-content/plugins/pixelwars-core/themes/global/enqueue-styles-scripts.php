<?php

	function pixelwars_core_enqueue_css()
	{
		$plugin_directory_url = plugin_dir_url(__FILE__); // URL directory for this file. (with trailing slash)
		
		wp_enqueue_style('fontello', $plugin_directory_url . 'css/fonts/fontello/css/fontello.css', null, null);
		wp_enqueue_style('pixelwars-core-shortcodes', $plugin_directory_url . 'css/shortcodes.css', array('fontello'), null);
	}
	
	add_action('wp_enqueue_scripts', 'pixelwars_core_enqueue_css', 10);
	
	
	function pixelwars_core_enqueue_js()
	{
		$plugin_directory_url = plugin_dir_url(__FILE__); // URL directory for this file. (with trailing slash)
		
		wp_enqueue_script('pixelwars-core-shortcodes', $plugin_directory_url . 'js/shortcodes.js', array('jquery', 'jqueryvalidation'), null, true);
	}
	
	add_action('wp_enqueue_scripts', 'pixelwars_core_enqueue_js', 15);


/* ============================================================================================================================================= */


	function pixelwars_core_enqueue_admin()
	{
		$plugin_directory_url = plugin_dir_url(__FILE__); // URL directory for this file. (with trailing slash)
		
		wp_enqueue_style('pixelwars-core-admin', $plugin_directory_url . 'css/pixelwars-core-admin.css');
	}
	
	add_action('admin_enqueue_scripts', 'pixelwars_core_enqueue_admin');


/* ============================================================================================================================================= */


	function pixelwars_core_customize_controls()
	{
		$plugin_directory_url = plugin_dir_url(__FILE__); // URL directory for this file. (with trailing slash)
		
		wp_enqueue_style('pixelwars-core-customize-controls', $plugin_directory_url . 'css/pixelwars-core-customize-controls.css');
	}
	
	add_action('customize_controls_enqueue_scripts', 'pixelwars_core_customize_controls');

?>