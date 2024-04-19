<?php

	function pixelwars_core_dashboard_widget()
	{
		$current_directory_url = plugin_dir_url(__FILE__); // Get url directory of this file. (with trailing slash)
		
		?>
			<p>
				<img alt="Pixelwars Core" src="<?php echo esc_url($current_directory_url); ?>img/pixelwars-logo.png">
			</p>
			<p>
				<?php
					_e('Could you please give it a 5-star rating on <a target="_blank" href="https://themeforest.net/">ThemeForest</a>? We know its a big favor, but we have worked very much and very hard to release this great product. Your feedback will boost our motivation and help us promote and continue to improve this product.', 'pixelwars-core');
				?>
			</p>
		<?php
	}
	
	
	function pixelwars_core_dashboard_setup()
	{
		wp_add_dashboard_widget(
			'pixelwars_core_add_dashboard_widget',
			esc_html__('Pixelwars', 'pixelwars-core'),
			'pixelwars_core_dashboard_widget'
		); 
	}
	
	add_action('wp_dashboard_setup', 'pixelwars_core_dashboard_setup');

?>