<?php

	function logistica__admin_notices_html($current_screen, $plugin_status__pixelwars_core, $plugin_status__one_click_demo_import)
	{
		?>
			<div class="notice logistica-admin-notice">
				<div class="logistica-admin-notice--header">
					<h1 class="logistica-admin-notice--title"><?php esc_html_e('Welcome to Logistica Theme', 'logistica'); ?></h1>
					
					<p><?php esc_html_e('Thank you for choosing our theme!', 'logistica'); ?></p>
				</div>
				
				<?php
					if (isset($_GET['pixelwars_core']))
					{
						if ($_GET['pixelwars_core'] == 'activate')
						{
							activate_plugin('pixelwars-core/pixelwars-core.php'); // Activate Plugin: "Pixelwars Core".
						}
					}
					else
					{
						if (($plugin_status__pixelwars_core == 'installed') && ($plugin_status__pixelwars_core != 'activated')) // Plugin: Installed but not activated.
						{
							?>
								<div class="logistica-admin-notice--activate-pixelwars-core-plugin">
									<p>
										<?php esc_html_e('Activate Pixelwars Core plugin for advanced features.', 'logistica'); ?>
										
										[<a href="<?php echo esc_url(admin_url('index.php?pixelwars_core=activate')); ?>"><?php esc_html_e('Activate Pixelwars Core', 'logistica'); ?></a>]
									</p>
								</div>
							<?php
						}
					}
				?>
				
				<div class="logistica-admin-notice--helpful-links">
					<div class="logistica-admin-notice--column">
						<h3 class="logistica-admin-notice--column-title"><?php esc_html_e('Customizer', 'logistica'); ?></h3>
						
						<p>
							<?php esc_html_e('The Customizer allows you to preview changes to your site before publishing them.', 'logistica'); ?>
						</p>
						
						<p>
							<a class="logistica-admin-notice--button logistica-admin-notice--button-primary" href="<?php echo esc_url(admin_url('customize.php')); ?>"><?php esc_html_e('Customize Your Site', 'logistica'); ?></a>
						</p>
					</div>
					
					<div class="logistica-admin-notice--column">
						<h3 class="logistica-admin-notice--column-title"><?php esc_html_e('Theme Demo', 'logistica'); ?></h3>
						
						<p>
							<?php
								esc_html_e('Importing demo data is the quickest and easiest way to set up your new theme.', 'logistica');
							?>
						</p>
						<p>
							<?php
								if (isset($_GET['one_click_demo_import']))
								{
									if ($_GET['one_click_demo_import'] == 'activate')
									{
										activate_plugin('one-click-demo-import/one-click-demo-import.php'); // Activate Plugin: "One Click Demo Import".
										
										?>
											<a class="logistica-admin-notice--button" href="<?php echo esc_url(admin_url('themes.php?page=logistica-import-theme-demos')); ?>"><?php esc_html_e('Run Importer', 'logistica'); ?></a>
										<?php
									}
								}
								else
								{
									if ($plugin_status__one_click_demo_import == 'activated') // Plugin: Activated.
									{
										?>
											<a class="logistica-admin-notice--button" href="<?php echo esc_url(admin_url('themes.php?page=logistica-import-theme-demos')); ?>"><?php esc_html_e('Run Importer', 'logistica'); ?></a>
										<?php
									}
									elseif (($plugin_status__one_click_demo_import == 'installed') && ($plugin_status__one_click_demo_import != 'activated')) // Plugin: Installed but not activated.
									{
										?>
											<a class="logistica-admin-notice--button" href="<?php echo esc_url(admin_url('index.php?one_click_demo_import=activate')); ?>"><?php esc_html_e('Activate Importer', 'logistica'); ?></a>
										<?php
									}
									else // Plugin: Not installed.
									{
										?>
											<a class="logistica-admin-notice--button" href="<?php echo esc_url(admin_url('themes.php?page=logistica-install-update-theme-plugins')); ?>"><?php esc_html_e('Install Importer', 'logistica'); ?></a>
										<?php
									}
								}
							?>
							
							<a target="_blank" href="https://elementor.com/help/requirements/" title="<?php esc_attr_e('The system requirements you need in order to import demo data', 'logistica'); ?>"><?php esc_html_e('Requirements', 'logistica'); ?></a>
						</p>
					</div>
					
					<div class="logistica-admin-notice--column">
						<h3 class="logistica-admin-notice--column-title"><?php esc_html_e('Need Help?', 'logistica'); ?></h3>
						
						<ul>
							<li>
								<a target="_blank" href="https://themes.pixelwars.org/doc/logistica/"><?php esc_html_e('Documentation', 'logistica'); ?></a>
							</li>
							<li>
								<a target="_blank" href="https://www.pixelwars.org/forums/"><?php esc_html_e('Get Support', 'logistica'); ?></a>
							</li>
							<li>
								<a target="_blank" href="https://themeforest.net/user/pixelwars/portfolio"><?php esc_html_e('Changelog', 'logistica'); ?></a>
							</li>
							<li>
								<a href="<?php echo esc_url(admin_url('site-health.php')); ?>"><?php esc_html_e('Site Health', 'logistica'); ?></a>
							</li>
						</ul>
					</div>
					
					<div class="logistica-admin-notice--column">
						<h3 class="logistica-admin-notice--column-title"><?php esc_html_e('Rate Theme', 'logistica'); ?></h3>
						
						<ul>
							<li>
								<a target="_blank" href="https://themeforest.net/downloads"><?php esc_html_e('Rate on ThemeForest', 'logistica'); ?></a>
							</li>
							<li>
								<a target="_blank" href="https://themeforest.net/user/pixelwars/portfolio"><?php esc_html_e('More Themes', 'logistica'); ?></a>
							</li>
							<li>
								<a target="_blank" href="https://www.pixelwars.org/newsletter/"><?php esc_html_e('Newsletter', 'logistica'); ?></a>
							</li>
							<li>
								<a target="_blank" href="https://themeforest.net/licenses"><?php esc_html_e('License', 'logistica'); ?></a>
							</li>
						</ul>
					</div>
					
					<div class="logistica-admin-notice--column">
						<h3 class="logistica-admin-notice--column-title"><?php esc_html_e('Follow Us', 'logistica'); ?></h3>
						
						<div class="logistica-admin-notice--social-media-links">
							<p>
								<a title="Follow us on Facebook" target="_blank" href="https://www.facebook.com/pixelwarsdesign"><span class="dashicons dashicons-facebook-alt"></span></a>
								
								<a title="Follow us on Twitter" target="_blank" href="https://twitter.com/pixelwarsdesign"><span class="dashicons dashicons-twitter"></span></a>
							</p>
							<p>
								<a title="Follow us on Instagram" target="_blank" href="https://www.instagram.com/pixelwarsdesign/"><span class="dashicons dashicons-instagram"></span></a>
								
								<a title="Follow us on YouTube" target="_blank" href="https://www.youtube.com/c/pixelwarsdesign"><span class="dashicons dashicons-youtube"></span></a>
							</p>
						</div>
					</div>
				</div>
				
				<div class="logistica-admin-notice--footer">
					<p>
						<?php esc_html_e('Could you please give it a 5-star rating on', 'logistica'); ?> <a target="_blank" href="https://themeforest.net/downloads"><?php esc_html_e('ThemeForest', 'logistica'); ?></a><?php esc_html_e('? Your feedback will boost our motivation and help us continue to improve this theme :)', 'logistica'); ?>
					</p>
					<p>
						&#x2014; <?php esc_html_e('Pixelwars Team', 'logistica'); ?>
					</p>
				</div>
			</div>
		<?php
	}


/* ============================================================================================================================================= */
/* ============================================================================================================================================= */


	function logistica__is_plugin_installed($plugin)
	{
		$installed_plugins = get_plugins();
		
		return isset($installed_plugins[$plugin]);
	}
	
	
	function logistica__is_plugin_activated($plugin)
	{
		return in_array($plugin, (array) get_option('active_plugins', array()), true ) || is_plugin_active_for_network($plugin);
	}
	
	
	function logistica__get_plugin_status($plugin)
	{
		$plugin_status = 'not_installed';
		
		if (logistica__is_plugin_activated($plugin))
		{
			$plugin_status = 'activated';
		}
		elseif (logistica__is_plugin_installed($plugin))
		{
			$plugin_status = 'installed';
		}
		
		return $plugin_status;
	}


/* ============================================================================================================================================= */


	function logistica__admin_notices()
	{
		$plugin_status__pixelwars_core        = logistica__get_plugin_status('pixelwars-core/pixelwars-core.php');
		$plugin_status__one_click_demo_import = logistica__get_plugin_status('one-click-demo-import/one-click-demo-import.php');
		
		$current_screen = get_current_screen();
		
		if ($current_screen->id === 'dashboard')
		{
			logistica__admin_notices_html($current_screen, $plugin_status__pixelwars_core, $plugin_status__one_click_demo_import);
		}
	}
	
	add_action('admin_notices', 'logistica__admin_notices', 1);
