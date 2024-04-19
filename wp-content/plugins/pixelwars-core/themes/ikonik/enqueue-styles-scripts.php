<?php

	function pixelwars_core_styles_scripts__admin__ikonik()
	{
		$plugin_directory_url = plugin_dir_url(__FILE__); // http://www.example.com/wp-content/plugins/my-plugin/ ... /__FILE__ folder/
		
		wp_enqueue_style('pixelwars-core-admin-ikonik', $plugin_directory_url . 'css/ikonik.css');
	}
	
	add_action('admin_enqueue_scripts', 'pixelwars_core_styles_scripts__admin__ikonik', 10);

?>