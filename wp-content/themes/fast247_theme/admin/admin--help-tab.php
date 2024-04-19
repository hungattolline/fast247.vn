<?php

	function logistica__admin_head__add_help_tab_content()
	{
		$content  = '<div class="logistica-admin-help-tab">';
		$content .= 	'<h3>' . esc_html__('Logistica Theme by Pixelwars', 'logistica') . '</h3>';
		
		$content .= 	'<h4>' . esc_html__('Need Help?', 'logistica') . '</h4>';
		
		$content .= 	'<ul>';
		$content .= 		'<li><a target="_blank" href="https://themes.pixelwars.org/doc/logistica/">' . esc_html__('Documentation', 'logistica') . '</a></li>';
		
		$content .= 		'<li><a target="_blank" href="https://www.pixelwars.org/forums/">' . esc_html__('Get Support', 'logistica') . '</a></li>';
		
		$content .= 		'<li><a target="_blank" href="https://themeforest.net/user/pixelwars/portfolio">' . esc_html__('Changelog', 'logistica') . '</a></li>';
		$content .= 	'</ul>';
		
		$content .= 	'<h4>' . esc_html__('Follow Us', 'logistica') . '</h4>';
		
		$content .= 	'<div class="logistica-admin-help-tab--social-media-links">';
		$content .= 		'<p>';
		$content .= 			'<a target="_blank" href="https://www.facebook.com/pixelwarsdesign"><span class="dashicons dashicons-facebook-alt"></span></a>';
		
		$content .= 			'<a target="_blank" href="https://twitter.com/pixelwarsdesign"><span class="dashicons dashicons-twitter"></span></a>';
		
		$content .= 			'<a target="_blank" href="https://www.instagram.com/pixelwarsdesign/"><span class="dashicons dashicons-instagram"></span></a>';
		
		$content .= 			'<a target="_blank" href="https://www.youtube.com/c/pixelwarsdesign"><span class="dashicons dashicons-youtube"></span></a>';
		$content .= 		'</p>';
		$content .= 	'</div>';
		$content .= '</div>';
		
		return $content;
	}
	
	
	function logistica__admin_head__add_help_tab()
	{
		$screen = get_current_screen();
		
		$screen->add_help_tab(
			array(
				'id'       => 'logistica__help_tab',
				'title'    => esc_html__('Theme Help', 'logistica'),
				'content'  => logistica__admin_head__add_help_tab_content(),
				'priority' => 1,
			)
		);
	}
	
	add_action('admin_head', 'logistica__admin_head__add_help_tab');
