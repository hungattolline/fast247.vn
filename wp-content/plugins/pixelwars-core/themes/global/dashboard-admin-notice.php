<?php

	function sample_admin_notice__success()
	{
		$current_directory_url = plugin_dir_url(__FILE__); // Get url of this file. (with trailing slash)
		
		?>
			<div class="notice notice-info is-dismissible">
				<table>
					<tr>
						<td>
							<img alt="Pixelwars Core" src="<?php echo esc_url($current_directory_url); ?>img/pixelwars-logo.png">
						</td>
						<td>
							<h3><?php _e( 'Pixelwars', 'sample-text-domain' ); ?></h3>
							
							<p><?php _e( 'Hello! Thank you for choosing our theme!', 'sample-text-domain' ); ?></p>
							
							<p><?php _e( 'Could you please give it a 5-star rating on <a target="_blank" href="https://themeforest.net/">ThemeForest</a>? We know its a big favor, but we have worked very much and very hard to release this great product. Your feedback will boost our motivation and help us promote and continue to improve this product.', 'sample-text-domain' ); ?></p>
						</td>
					</tr>
				</table>
			</div>
		<?php
	}
	
	add_action('admin_notices', 'sample_admin_notice__success');

?>