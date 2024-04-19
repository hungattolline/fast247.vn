<?php

	function logistica_check_font_type($font)
	{
		$font_local = strpos($font, 'FONT_LOCAL_'); // Check for local font.
		
		if ($font_local !== false)
		{
			$local_font_name = substr($font, 11); // Remove: FONT_LOCAL_
			
			// This "if" only for Jost* font.
			if ($local_font_name == 'Jost')
			{
				$local_font_name = 'Jost*';
			}
			
			$font = "'" . $local_font_name . "', sans-serif";
		}
		else
		{
			// This is a Google font.
			$font = "'" . $font . "'";
		}
		
		return $font;
	}
	
	
	function logistica_enqueue__inline_style()
	{
		$custom_css = "";
		
		
		// Font Family
		
		$logistica_setting_font_text_logo = get_theme_mod('logistica_setting_font_text_logo', logistica_default_fonts('text_logo'));
		
		if (! empty($logistica_setting_font_text_logo))
		{
			$logistica_setting_font_text_logo = logistica_check_font_type($logistica_setting_font_text_logo);
			$custom_css .= ".site-title { font-family: {$logistica_setting_font_text_logo}; }";
		}
		
		
		$logistica_setting_font_menu = get_theme_mod('logistica_setting_font_menu', logistica_default_fonts('menu'));
		
		if (! empty($logistica_setting_font_menu))
		{
			$logistica_setting_font_menu = logistica_check_font_type($logistica_setting_font_menu);
			$custom_css .= PHP_EOL . PHP_EOL . ".nav-menu, .entry-meta, .owl-nav, label, .page-links, .navigation, .entry-title i, .site-info, .filters { font-family: {$logistica_setting_font_menu}; }";
		}
		
		
		$logistica_setting_font_widget_title = get_theme_mod('logistica_setting_font_widget_title', logistica_default_fonts('widget_title'));
		
		if (! empty($logistica_setting_font_widget_title))
		{
			$logistica_setting_font_widget_title = logistica_check_font_type($logistica_setting_font_widget_title);
			$custom_css .= PHP_EOL . PHP_EOL . ".widget-title { font-family: {$logistica_setting_font_widget_title}; }";
		}
		
		
		$logistica_setting_font_h1 = get_theme_mod('logistica_setting_font_h1', logistica_default_fonts('h1'));
		
		if (! empty($logistica_setting_font_h1))
		{
			$logistica_setting_font_h1 = logistica_check_font_type($logistica_setting_font_h1);
			$custom_css .= PHP_EOL . PHP_EOL . "h1, .entry-title, .footer-subscribe h3, .widget_categories ul li, .widget_recent_entries ul li a, .widget_pages ul li, .widget_nav_menu ul li, .widget_archive ul li, .widget_most_recommended_posts ul li a, .widget_calendar table caption, .tptn_title, .nav-single a, .widget_recent_comments ul li, .widget_product_categories ul li, .widget_meta ul li, .widget_rss ul a.rsswidget { font-family: {$logistica_setting_font_h1}; }";
		}
		
		
		$logistica_setting_font_h2_h6 = get_theme_mod('logistica_setting_font_h2_h6', logistica_default_fonts('h2_h6'));
		
		if (! empty($logistica_setting_font_h2_h6))
		{
			$logistica_setting_font_h2_h6 = logistica_check_font_type($logistica_setting_font_h2_h6);
			$custom_css .= PHP_EOL . PHP_EOL . "h2, h3, h4, h5, h6, blockquote, .tab-titles { font-family: {$logistica_setting_font_h2_h6}; }";
		}
		
		
		$logistica_setting_font_slider_title = get_theme_mod('logistica_setting_font_slider_title', logistica_default_fonts('slider_title'));
		
		if (! empty($logistica_setting_font_slider_title))
		{
			$logistica_setting_font_slider_title = logistica_check_font_type($logistica_setting_font_slider_title);
			$custom_css .= PHP_EOL . PHP_EOL . ".slider-box .entry-title { font-family: {$logistica_setting_font_slider_title}; }";
		}
		
		
		$logistica_setting_font_body = get_theme_mod('logistica_setting_font_body', logistica_default_fonts('body'));
		
		if (! empty($logistica_setting_font_body))
		{
			$logistica_setting_font_body = logistica_check_font_type($logistica_setting_font_body);
			$custom_css .= PHP_EOL . PHP_EOL . "body { font-family: {$logistica_setting_font_body}; }";
		}
		
		
		$logistica_setting_intro_font = get_theme_mod('logistica_setting_intro_font', logistica_default_fonts('intro'));
		
		if (! empty($logistica_setting_intro_font))
		{
			$logistica_setting_intro_font = logistica_check_font_type($logistica_setting_intro_font);
			$custom_css .= PHP_EOL . PHP_EOL . ".intro h1 { font-family: {$logistica_setting_intro_font}; }";
		}
		
		
		$logistica_setting_font_link_box_title = get_theme_mod('logistica_setting_font_link_box_title', logistica_default_fonts('link_box_title'));
		
		if (! empty($logistica_setting_font_link_box_title))
		{
			$logistica_setting_font_link_box_title = logistica_check_font_type($logistica_setting_font_link_box_title);
			$custom_css .= PHP_EOL . PHP_EOL . ".link-box .entry-title { font-family: {$logistica_setting_font_link_box_title}; }";
		}
		
		
		$logistica_setting_font_buttons = get_theme_mod('logistica_setting_font_buttons', logistica_default_fonts('buttons'));
		
		if (! empty($logistica_setting_font_buttons))
		{
			$logistica_setting_font_buttons = logistica_check_font_type($logistica_setting_font_buttons);
			$custom_css .= PHP_EOL . PHP_EOL . ".button, button, html .elementor-button, html .ekit-wid-con .elementskit-btn, html .ekit-wid-con .ekit_creative_button, .more-link { font-family: {$logistica_setting_font_buttons}; }";
		}
		
		
		$logistica_setting_font_tagline = get_theme_mod('logistica_setting_font_tagline', logistica_default_fonts('tagline'));
		
		if (! empty($logistica_setting_font_tagline))
		{
			$logistica_setting_font_tagline = logistica_check_font_type($logistica_setting_font_tagline);
			$custom_css .= PHP_EOL . PHP_EOL . ".site-description { font-family: {$logistica_setting_font_tagline}; }";
		}
		
		
		$logistica_setting_font_top_bar = get_theme_mod('logistica_setting_font_top_bar', logistica_default_fonts('top_bar'));
		
		if (! empty($logistica_setting_font_top_bar))
		{
			$logistica_setting_font_top_bar = logistica_check_font_type($logistica_setting_font_top_bar);
			$custom_css .= PHP_EOL . PHP_EOL . ".top-bar { font-family: {$logistica_setting_font_top_bar}; }";
		}
		
		
		$logistica_setting_font_icon_box_title = get_theme_mod('logistica_setting_font_icon_box_title', logistica_default_fonts('icon_box_title'));
		
		if (! empty($logistica_setting_font_icon_box_title))
		{
			$logistica_setting_font_icon_box_title = logistica_check_font_type($logistica_setting_font_icon_box_title);
			$custom_css .= PHP_EOL . PHP_EOL . ".pw-icon-box h3 { font-family: {$logistica_setting_font_icon_box_title}; }";
		}
		
		
		// Font Size
		
		$logistica_setting_font_size_text_logo = get_theme_mod('logistica_setting_font_size_text_logo', '28');
		
		if ($logistica_setting_font_size_text_logo != '26')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .site-header .site-title { font-size: {$logistica_setting_font_size_text_logo}px; } }";
		}
		
		
		$logistica_setting_font_size_text_logo_sticky = get_theme_mod('logistica_setting_font_size_text_logo_sticky', '24');
		
		if ($logistica_setting_font_size_text_logo_sticky != '28')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .is-header-smaller .site-header.clone .site-title { font-size: {$logistica_setting_font_size_text_logo_sticky}px; } }";
		}
		
		
		$logistica_setting_font_size_text_logo_mobile = get_theme_mod('logistica_setting_font_size_text_logo_mobile', '24');
		
		if ($logistica_setting_font_size_text_logo_mobile != '22')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (max-width: 991px) { .site-header .site-title { font-size: {$logistica_setting_font_size_text_logo_mobile}px; } }";
		}
		
		
		$logistica_setting_font_size_tagline = get_theme_mod('logistica_setting_font_size_tagline', '12');
		
		if ($logistica_setting_font_size_tagline != '12')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .site-description { font-size: {$logistica_setting_font_size_tagline}px; } }";
		}
		
		
		$logistica_setting_font_size_blog_regular_post_title = get_theme_mod('logistica_setting_font_size_blog_regular_post_title', '34');
		
		if ($logistica_setting_font_size_blog_regular_post_title != '34')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .blog-regular .entry-title, .blog-stream.first-full .hentry:first-child .entry-title { font-size: {$logistica_setting_font_size_blog_regular_post_title}px; } }";
		}
		
		
		$logistica_setting_font_size_blog_grid_post_title = get_theme_mod('logistica_setting_font_size_blog_grid_post_title', '22');
		
		if ($logistica_setting_font_size_blog_grid_post_title != '22')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .blog-small .entry-title { font-size: {$logistica_setting_font_size_blog_grid_post_title}px; } }";
		}
		
		
		$logistica_setting_font_size_h1 = get_theme_mod('logistica_setting_font_size_h1', '98');
		
		if ($logistica_setting_font_size_h1 != '48')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { h1 { font-size: {$logistica_setting_font_size_h1}px; } }";
		}
		
		
		$logistica_setting_font_size_body = get_theme_mod('logistica_setting_font_size_body', '17');
		
		if ($logistica_setting_font_size_body != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { html { font-size: {$logistica_setting_font_size_body}px; } }";
		}
		
		
		$logistica_setting_font_size_body_mobile = get_theme_mod('logistica_setting_font_size_body_mobile', '16');
		
		if ($logistica_setting_font_size_body_mobile != '14')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (max-width: 991px) { html { font-size: {$logistica_setting_font_size_body_mobile}px; } }";
		}
		
		
		$logistica_setting_font_size_nav_menu = get_theme_mod('logistica_setting_font_size_nav_menu', '14');
		
		if ($logistica_setting_font_size_nav_menu != '11')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .nav-menu > ul { font-size: {$logistica_setting_font_size_nav_menu}px; } }";
		}
		
		
		$logistica_setting_font_size_excerpt = get_theme_mod('logistica_setting_font_size_excerpt', '16');
		
		if ($logistica_setting_font_size_excerpt != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .blog-stream .entry-content { font-size: {$logistica_setting_font_size_excerpt}px; } }";
		}
		
		
		$logistica_setting_font_size_blog_grid_excerpt = get_theme_mod('logistica_setting_font_size_blog_grid_excerpt', '15');
		
		if ($logistica_setting_font_size_blog_grid_excerpt != '13')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .blog-stream.blog-small .entry-content { font-size: {$logistica_setting_font_size_blog_grid_excerpt}px; } }";
		}
		
		
		$logistica_setting_font_size_sidebar = get_theme_mod('logistica_setting_font_size_sidebar', '13');
		
		if ($logistica_setting_font_size_sidebar != '13')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .sidebar { font-size: {$logistica_setting_font_size_sidebar}px; } }";
		}
		
		
		$logistica_setting_font_size_sidebar_widget_title = get_theme_mod('logistica_setting_font_size_sidebar_widget_title', '13');
		
		if ($logistica_setting_font_size_sidebar_widget_title != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".widget-title { font-size: {$logistica_setting_font_size_sidebar_widget_title}px; }";
		}
		
		
		$logistica_setting_font_size_nav_sub_menu = get_theme_mod('logistica_setting_font_size_nav_sub_menu', '14');
		
		if ($logistica_setting_font_size_nav_sub_menu != '9')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .nav-menu ul ul { font-size: {$logistica_setting_font_size_nav_sub_menu}px; } }";
		}
		
		
		$logistica_setting_intro_font_size = get_theme_mod('logistica_setting_intro_font_size', '38');
		
		if ($logistica_setting_intro_font_size != '38')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .intro h1 { font-size: {$logistica_setting_intro_font_size}px; } }";
		}
		
		
		$logistica_setting_font_size_meta = get_theme_mod('logistica_setting_font_size_meta', '11');
		
		if ($logistica_setting_font_size_meta != '11')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".entry-meta { font-size: {$logistica_setting_font_size_meta}px; }";
		}
		
		
		$logistica_setting_font_size_top_bar = get_theme_mod('logistica_setting_font_size_top_bar', '12');
		
		if ($logistica_setting_font_size_top_bar != '11')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".top-bar { font-size: {$logistica_setting_font_size_top_bar}px; }";
		}
		
		
		$logistica_setting_font_size_buttons = get_theme_mod('logistica_setting_font_size_buttons', '12');
		
		if ($logistica_setting_font_size_buttons != '12')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".button, button, html .elementor-button, .elementor-button.elementor-size-md, .elementor-button.elementor-size-xs, html .ekit-wid-con .elementskit-btn, html .ekit-wid-con .ekit_creative_button, .more-link { font-size: {$logistica_setting_font_size_buttons}px; }";
		}
		
		
		$logistica_setting_font_size_copyright = get_theme_mod('logistica_setting_font_size_copyright', '12');
		
		if ($logistica_setting_font_size_copyright != '11')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-footer .site-info { font-size: {$logistica_setting_font_size_copyright}px; }";
		}
		
		
		$logistica_setting_font_size_icon_box_title = get_theme_mod('logistica_setting_font_size_icon_box_title', '15');
		
		if ($logistica_setting_font_size_icon_box_title != '15')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".pw-icon-box h3 { font-size: {$logistica_setting_font_size_icon_box_title}px; }";
		}
		
		
		// Font Weight
		
		$logistica_setting_font_weight_text_logo = get_theme_mod('logistica_setting_font_weight_text_logo', '500');
		
		if ($logistica_setting_font_weight_text_logo != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-title { font-weight: {$logistica_setting_font_weight_text_logo}; }";
		}
		
		
		$logistica_setting_font_weight_h1 = get_theme_mod('logistica_setting_font_weight_h1', '700');
		
		if ($logistica_setting_font_weight_h1 != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "h1, .entry-title, .footer-subscribe h3 { font-weight: {$logistica_setting_font_weight_h1}; }";
		}
		
		
		$logistica_setting_font_weight_h2_h6 = get_theme_mod('logistica_setting_font_weight_h2_h6', '400');
		
		if ($logistica_setting_font_weight_h2_h6 != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "h2, h3, h4, h5, h6, blockquote, .comment-meta .fn { font-weight: {$logistica_setting_font_weight_h2_h6}; }";
		}
		
		
		$logistica_setting_font_weight_slider_title = get_theme_mod('logistica_setting_font_weight_slider_title', '700');
		
		if ($logistica_setting_font_weight_slider_title != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".slider-box .entry-title { font-weight: {$logistica_setting_font_weight_slider_title}; }";
		}
		
		
		$logistica_setting_font_weight_sidebar_widget_title = get_theme_mod('logistica_setting_font_weight_sidebar_widget_title', '700');
		
		if ($logistica_setting_font_weight_sidebar_widget_title != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".widget-title { font-weight: {$logistica_setting_font_weight_sidebar_widget_title}; }";
		}
		
		
		$logistica_setting_font_weight_nav_menu = get_theme_mod('logistica_setting_font_weight_nav_menu', '500');
		
		if ($logistica_setting_font_weight_nav_menu != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .nav-menu > ul { font-weight: {$logistica_setting_font_weight_nav_menu}; } }";
		}
		
		
		$logistica_setting_font_weight_nav_sub_menu = get_theme_mod('logistica_setting_font_weight_nav_sub_menu', '600');
		
		if ($logistica_setting_font_weight_nav_sub_menu != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .nav-menu ul ul { font-weight: {$logistica_setting_font_weight_nav_sub_menu}; } }";
		}
		
		
		$logistica_setting_intro_font_weight = get_theme_mod('logistica_setting_intro_font_weight', "");
		
		if ($logistica_setting_intro_font_weight != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".intro h1 { font-weight: {$logistica_setting_intro_font_weight}; }";
		}
		
		
		$logistica_setting_font_weight_link_box_title = get_theme_mod('logistica_setting_font_weight_link_box_title', '700');
		
		if ($logistica_setting_font_weight_link_box_title != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".link-box .entry-title { font-weight: {$logistica_setting_font_weight_link_box_title}; }";
		}
		
		
		$logistica_setting_font_weight_buttons = get_theme_mod('logistica_setting_font_weight_buttons', '500');
		
		if ($logistica_setting_font_weight_buttons != '500')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".button, button, html .elementor-button, html .ekit-wid-con .elementskit-btn, html .ekit-wid-con .ekit_creative_button, .more-link { font-weight: {$logistica_setting_font_weight_buttons}; }";
		}
		
		
		$logistica_setting_font_weight_tagline = get_theme_mod('logistica_setting_font_weight_tagline', "");
		
		if ($logistica_setting_font_weight_tagline != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-description { font-weight: {$logistica_setting_font_weight_tagline}; }";
		}
		
		
		$logistica_setting_font_weight_top_bar = get_theme_mod('logistica_setting_font_weight_top_bar', '500');
		
		if ($logistica_setting_font_weight_top_bar != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".top-bar { font-weight: {$logistica_setting_font_weight_top_bar}; }";
		}
		
		
		$logistica_setting_font_weight_copyright = get_theme_mod('logistica_setting_font_weight_copyright', '600');
		
		if ($logistica_setting_font_weight_copyright != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-footer .site-info { font-weight: {$logistica_setting_font_weight_copyright}; }";
		}
		
		
		$logistica_setting_font_weight_icon_box_title = get_theme_mod('logistica_setting_font_weight_icon_box_title', "");
		
		if ($logistica_setting_font_weight_icon_box_title != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".pw-icon-box h3 { font-weight: {$logistica_setting_font_weight_icon_box_title}; }";
		}
		
		
		$logistica_setting_font_weight_meta = get_theme_mod('logistica_setting_font_weight_meta', '700');
		
		if ($logistica_setting_font_weight_meta != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".entry-meta { font-weight: {$logistica_setting_font_weight_meta}; }";
		}
		
		
		// Letter Spacing
		
		$logistica_setting_letter_spacing_main_slider_title = get_theme_mod('logistica_setting_letter_spacing_main_slider_title', '0');
		
		if ($logistica_setting_letter_spacing_main_slider_title != '0')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .slider-box .entry-title { letter-spacing: {$logistica_setting_letter_spacing_main_slider_title}px; } }";
		}
		
		
		$logistica_setting_letter_spacing_nav_menu = get_theme_mod('logistica_setting_letter_spacing_nav_menu', '1');
		
		if ($logistica_setting_letter_spacing_nav_menu != '1')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .nav-menu > ul { letter-spacing: {$logistica_setting_letter_spacing_nav_menu}px; } }";
		}
		
		
		$logistica_setting_letter_spacing_nav_sub_menu = get_theme_mod('logistica_setting_letter_spacing_nav_sub_menu', '0');
		
		if ($logistica_setting_letter_spacing_nav_sub_menu != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .nav-menu ul ul { letter-spacing: {$logistica_setting_letter_spacing_nav_sub_menu}px; } }";
		}
		
		
		$logistica_setting_letter_spacing_sidebar_widget_title = get_theme_mod('logistica_setting_letter_spacing_sidebar_widget_title', '3');
		
		if ($logistica_setting_letter_spacing_sidebar_widget_title != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".widget-title { letter-spacing: {$logistica_setting_letter_spacing_sidebar_widget_title}px; }";
		}
		
		
		$logistica_setting_intro_letter_spacing = get_theme_mod('logistica_setting_intro_letter_spacing', '0');
		
		if ($logistica_setting_intro_letter_spacing != '0')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".intro h1 { letter-spacing: {$logistica_setting_intro_letter_spacing}px; }";
		}
		
		
		$logistica_setting_letter_spacing_link_box_title = get_theme_mod('logistica_setting_letter_spacing_link_box_title', '0');
		
		if ($logistica_setting_letter_spacing_link_box_title != '0')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .link-box .entry-title { letter-spacing: {$logistica_setting_letter_spacing_link_box_title}px; } }";
		}
		
		
		$logistica_setting_letter_spacing_tagline = get_theme_mod('logistica_setting_letter_spacing_tagline', '0');
		
		if ($logistica_setting_letter_spacing_tagline != '0')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .site-description { letter-spacing: {$logistica_setting_letter_spacing_tagline}px; } }";
		}
		
		
		$logistica_setting_letter_spacing_buttons = get_theme_mod('logistica_setting_letter_spacing_buttons', '1');
		
		if ($logistica_setting_letter_spacing_buttons != '1')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".button, button, html .elementor-button, html .ekit-wid-con .elementskit-btn, html .ekit-wid-con .ekit_creative_button, .more-link { letter-spacing: {$logistica_setting_letter_spacing_buttons}px; }";
		}
		
		
		$logistica_setting_letter_spacing_copyright = get_theme_mod('logistica_setting_letter_spacing_copyright', '5');
		
		if ($logistica_setting_letter_spacing_copyright != '1')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-footer .site-info { letter-spacing: {$logistica_setting_letter_spacing_copyright}px; }";
		}
		
		
		$logistica_setting_letter_spacing_icon_box_title = get_theme_mod('logistica_setting_letter_spacing_icon_box_title', '0');
		
		if ($logistica_setting_letter_spacing_icon_box_title != '0')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".pw-icon-box h3 { letter-spacing: {$logistica_setting_letter_spacing_icon_box_title}px; }";
		}
		
		
		// Text Transform
		
		$logistica_setting_intro_text_transform = get_theme_mod('logistica_setting_intro_text_transform', "");
		
		if ($logistica_setting_intro_text_transform != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".intro h1 { text-transform: {$logistica_setting_intro_text_transform}; }";
		}
		
		
		$logistica_setting_text_transform_h1 = get_theme_mod('logistica_setting_text_transform_h1', "");
		
		if ($logistica_setting_text_transform_h1 != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "h1, .entry-title, .footer-subscribe h3, .widget_categories ul li, .widget_recent_entries ul li, .widget_pages ul li, .widget_archive ul li, .widget_calendar table caption, .tptn_title, .nav-single a { text-transform: {$logistica_setting_text_transform_h1}; }";
		}
		
		
		$logistica_setting_text_transform_h2_h6 = get_theme_mod('logistica_setting_text_transform_h2_h6', "");
		
		if ($logistica_setting_text_transform_h2_h6 != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "h2, h3, h4, h5, h6, blockquote, .comment-meta .fn { text-transform: {$logistica_setting_text_transform_h2_h6}; }";
		}
		
		
		// Line Height
		
		$logistica_setting_body_line_height = get_theme_mod('logistica_setting_body_line_height', '1.7');
		
		if ($logistica_setting_body_line_height != '1.8')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { html { line-height: {$logistica_setting_body_line_height}; } }";
		}
		
		
		$logistica_setting_header_bg_shape_height = get_theme_mod('logistica_setting_header_bg_shape_height', '30');
		
		if ($logistica_setting_header_bg_shape_height != '30')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .header-bg-shape { height: {$logistica_setting_header_bg_shape_height}px; } }";
		}
		
		
		$logistica_setting_featured_area_top_padding = get_theme_mod('logistica_setting_featured_area_top_padding', '0');
		
		if ($logistica_setting_featured_area_top_padding != '0')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".featured-area { padding-top: {$logistica_setting_featured_area_top_padding}px; }";
		}
		
		
		$logistica_setting_featured_area_grid_spacing = get_theme_mod('logistica_setting_featured_area_grid_spacing', '5');
		
		if ($logistica_setting_featured_area_grid_spacing != '5')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 768px) {";
			
				$custom_css .= PHP_EOL . PHP_EOL . ".featured-area .block { padding: {$logistica_setting_featured_area_grid_spacing}px; }";
				
				$custom_css .= PHP_EOL . PHP_EOL . ".featured-area { margin: -{$logistica_setting_featured_area_grid_spacing}px; }";
				
			$custom_css .= PHP_EOL . PHP_EOL . "}";
		}
		
		
		$logistica_setting_header_border_top_width = get_theme_mod('logistica_setting_header_border_top_width', '0');
		
		if ($logistica_setting_header_border_top_width != '0')
		{
			$logistica_setting_header_border_top_width__after_top  = (-$logistica_setting_header_border_top_width);
			$logistica_setting_header_border_top_width__margin_top = $logistica_setting_header_border_top_width;
			$logistica_setting_header_border_top_width__int        = intval($logistica_setting_header_border_top_width);
			
			if ($logistica_setting_header_border_top_width__int <= 0)
			{
				$logistica_setting_header_border_top_width__margin_top = '0';
			}
			
			$custom_css .= PHP_EOL . PHP_EOL . ".header-wrap:after { top: {$logistica_setting_header_border_top_width__after_top}px; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".header-wrap { margin-top: {$logistica_setting_header_border_top_width__margin_top}px; }";
		}
		
		
		$logistica_setting_header_menu_border_top_width = get_theme_mod('logistica_setting_header_menu_border_top_width', '0');
		
		if ($logistica_setting_header_menu_border_top_width != '0')
		{
			$logistica_setting_header_menu_border_top_width__after_top  = (-$logistica_setting_header_menu_border_top_width);
			$logistica_setting_header_menu_border_top_width__margin_top = $logistica_setting_header_menu_border_top_width;
			$logistica_setting_header_menu_border_top_width__int        = intval($logistica_setting_header_menu_border_top_width);
			
			if ($logistica_setting_header_menu_border_top_width__int <= 0)
			{
				$logistica_setting_header_menu_border_top_width__margin_top = '0';
			}
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-menu-bar .menu-wrap:after { top: {$logistica_setting_header_menu_border_top_width__after_top}px; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-menu-bar .menu-wrap { margin-top: {$logistica_setting_header_menu_border_top_width__margin_top}px; }";
		}
		
		
		$logistica_setting_header_border_bottom_width = get_theme_mod('logistica_setting_header_border_bottom_width', '1');
		
		if ($logistica_setting_header_border_bottom_width != '0')
		{
			$logistica_setting_header_border_bottom_width__after_bottom  = (-$logistica_setting_header_border_bottom_width);
			
			$custom_css .= PHP_EOL . PHP_EOL . ".header-wrap:after { bottom: {$logistica_setting_header_border_bottom_width__after_bottom}px; }";
		}
		
		
		$logistica_setting_header_menu_border_bottom_width = get_theme_mod('logistica_setting_header_menu_border_bottom_width', '0');
		
		if ($logistica_setting_header_menu_border_bottom_width != '0')
		{
			$logistica_setting_header_menu_border_bottom_width__after_bottom = (-$logistica_setting_header_menu_border_bottom_width);
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-menu-bar .menu-wrap:after { bottom: {$logistica_setting_header_menu_border_bottom_width__after_bottom}px; }";
		}
		
		
		$logistica_setting_header_border_left_width = get_theme_mod('logistica_setting_header_border_left_width', '0');
		
		if ($logistica_setting_header_border_left_width != '0')
		{
			$logistica_setting_header_border_left_width__after_left = (-$logistica_setting_header_border_left_width);
			
			$custom_css .= PHP_EOL . PHP_EOL . ".header-wrap:after { left: {$logistica_setting_header_border_left_width__after_left}px; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .is-header-vertical-right .header-wrap:after { width: {$logistica_setting_header_border_left_width}px; } }";
		}
		
		
		$logistica_setting_header_menu_border_left_width = get_theme_mod('logistica_setting_header_menu_border_left_width', '0');
		
		if ($logistica_setting_header_menu_border_left_width != '0')
		{
			$logistica_setting_header_menu_border_left_width__after_left = (-$logistica_setting_header_menu_border_left_width);
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-menu-bar .menu-wrap:after { left: {$logistica_setting_header_menu_border_left_width__after_left}px; }";
		}
		
		
		$logistica_setting_header_border_right_width = get_theme_mod('logistica_setting_header_border_right_width', '0');
		
		if ($logistica_setting_header_border_right_width != '0')
		{
			$logistica_setting_header_border_right_width__after_right = (-$logistica_setting_header_border_right_width);
			
			$custom_css .= PHP_EOL . PHP_EOL . ".header-wrap:after { right: {$logistica_setting_header_border_right_width__after_right}px; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .is-header-vertical-left .header-wrap:after { width: {$logistica_setting_header_border_right_width}px; } }";
		}
		
		
		$logistica_setting_header_menu_border_right_width = get_theme_mod('logistica_setting_header_menu_border_right_width', '0');
		
		if ($logistica_setting_header_menu_border_right_width != '0')
		{
			$logistica_setting_header_menu_border_right_width__after_right = (-$logistica_setting_header_menu_border_right_width);
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-menu-bar .menu-wrap:after { right: {$logistica_setting_header_menu_border_right_width__after_right}px; }";
		}
		
		
		$logistica_setting_header_border_top_radius = get_theme_mod('logistica_setting_header_border_top_radius', '0');
		
		if ($logistica_setting_header_border_top_radius != '0')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".header-wrap, .header-wrap:after, .header-wrap:before { border-top-left-radius: {$logistica_setting_header_border_top_radius}px; border-top-right-radius: {$logistica_setting_header_border_top_radius}px; }";
		}
		
		
		$logistica_setting_header_menu_border_top_radius = get_theme_mod('logistica_setting_header_menu_border_top_radius', '0');
		
		if ($logistica_setting_header_menu_border_top_radius != '0')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".is-menu-bar .menu-wrap, .is-menu-bar .menu-wrap:after { border-top-left-radius: {$logistica_setting_header_menu_border_top_radius}px; border-top-right-radius: {$logistica_setting_header_menu_border_top_radius}px; }";
		}
		
		
		$logistica_setting_header_border_bottom_radius = get_theme_mod('logistica_setting_header_border_bottom_radius', '0');
		
		if ($logistica_setting_header_border_bottom_radius != '0')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".header-wrap, .header-wrap:after, .header-wrap:before { border-bottom-left-radius: {$logistica_setting_header_border_bottom_radius}px; border-bottom-right-radius: {$logistica_setting_header_border_bottom_radius}px; }";
		}
		
		
		$logistica_setting_header_menu_border_bottom_radius = get_theme_mod('logistica_setting_header_menu_border_bottom_radius', '0');
		
		if ($logistica_setting_header_menu_border_bottom_radius != '0')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".is-menu-bar .menu-wrap, .is-menu-bar .menu-wrap:after { border-bottom-left-radius: {$logistica_setting_header_menu_border_bottom_radius}px; border-bottom-right-radius: {$logistica_setting_header_menu_border_bottom_radius}px; }";
		}
		
		
		$logistica_setting_logo_height = get_theme_mod('logistica_setting_logo_height', '30');
		
		if ($logistica_setting_logo_height != '36')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .site-title img { max-height: {$logistica_setting_logo_height}px; } }";
		}
		
		
		$logistica_setting_logo_height_mobile = get_theme_mod('logistica_setting_logo_height_mobile', '26');
		
		if ($logistica_setting_logo_height_mobile != '26')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (max-width: 991px) { .site-title img { max-height: {$logistica_setting_logo_height_mobile}px; } }";
		}
		
		
		$logistica_setting_logo_height_sticky = get_theme_mod('logistica_setting_logo_height_sticky', '30');
		
		if ($logistica_setting_logo_height_sticky != '30')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .is-header-smaller .site-header.clone .site-title img { max-height: {$logistica_setting_logo_height_sticky}px; } }";
		}
		
		
		$logistica_setting_header_top_bar_height = get_theme_mod('logistica_setting_header_top_bar_height', '36');
		
		if ($logistica_setting_header_top_bar_height != '35')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".top-bar { line-height: {$logistica_setting_header_top_bar_height}px; }";
		}
		
		
		$logistica_setting_header_row_padding = get_theme_mod('logistica_setting_header_row_padding', '12');
		
		if ($logistica_setting_header_row_padding != '12')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .is-header-row .header-wrap-inner { padding: {$logistica_setting_header_row_padding}px 0; } }";
		}
		
		
		$logistica_setting_header_vertical_width = get_theme_mod('logistica_setting_header_vertical_width', '260');
		
		if ($logistica_setting_header_vertical_width != '260')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 1360px) {";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-header-vertical .site-header, .is-header-vertical .site-header .header-wrap { width: {$logistica_setting_header_vertical_width}px; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-header-vertical-left .site { padding-left: {$logistica_setting_header_vertical_width}px; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-header-vertical-right .site { padding-right: {$logistica_setting_header_vertical_width}px; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . "}";
		}
		
		
		// Other
		
		$logistica_setting_logo_margin = get_theme_mod('logistica_setting_logo_margin', '50');
		
		if ($logistica_setting_logo_margin != '50')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .site-branding-wrap { padding: {$logistica_setting_logo_margin}px 0; } }";
		}
		
		
		$logistica_setting_logo_margin_mobile = get_theme_mod('logistica_setting_logo_margin_mobile', '14');
		
		if ($logistica_setting_logo_margin_mobile != '14')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (max-width: 991px) { .site-branding-wrap { padding: {$logistica_setting_logo_margin_mobile}px 0; } }";
		}
		
		
		$logistica_setting_logo_padding = get_theme_mod('logistica_setting_logo_padding', '0');
		
		if ($logistica_setting_logo_padding != '0')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "html .site-header .site-title a { padding: {$logistica_setting_logo_padding}px " . (2 * $logistica_setting_logo_padding) . "px; }";
		}
		
		
		$logistica_setting_logo_border_radius = get_theme_mod('logistica_setting_logo_border_radius', '0');
		
		if ($logistica_setting_logo_border_radius != '0')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "html .site-header .site-title a { border-radius: {$logistica_setting_logo_border_radius}px; }";
		}
		
		
		$logistica_setting_intro_top_bottom_padding = get_theme_mod('logistica_setting_intro_top_bottom_padding', "");
		
		if ($logistica_setting_intro_top_bottom_padding != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .intro { padding: {$logistica_setting_intro_top_bottom_padding}px 0; } }";
		}
		
		
		$logistica_setting_body_top_bottom_margin = get_theme_mod('logistica_setting_body_top_bottom_margin', "");
		
		if ($logistica_setting_body_top_bottom_margin != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .site { margin-top: {$logistica_setting_body_top_bottom_margin}px; margin-bottom: {$logistica_setting_body_top_bottom_margin}px; } }";
		}
		
		
		$logistica_setting_content_width = get_theme_mod('logistica_setting_content_width', '1140');
		
		if ($logistica_setting_content_width != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".layout-medium, .is-header-row .header-wrap-inner, .is-header-small .header-wrap-inner, .is-menu-bar.is-menu-fixed-bg .menu-wrap, .is-header-fixed-width .header-wrap, .is-header-fixed-width.is-menu-bar .site-navigation, .is-header-float-box:not(.is-header-float-box-menu) .site-header:not(.clone) .header-wrap, .is-header-float-box.is-menu-bar .site-header:not(.clone) .site-navigation:not(.clone), .is-body-boxed .site, .is-body-boxed .header-wrap, .is-body-boxed.is-menu-bar .site-navigation, .is-body-boxed:not(.is-menu-bar) .site-header, .is-middle-boxed .site-main, .intro-content, .is-footer-boxed .site-footer, .is-content-boxed .site-main .layout-fixed, .top-bar .top-bar-wrap, .is-top-bar-fixed .top-bar, .is-top-bar-fixed-bg .top-bar, .is-menu-bottom.is-menu-bottom-overflow .site-header:not(.clone) .site-navigation:not(.clone) .menu-wrap, .site-branding-wrap, .is-header-border-fixed .header-wrap:after, .is-header-border-fixed .menu-wrap:after, html .tutor-container, html .lp-content-area, html .learn-press-breadcrumb { max-width: {$logistica_setting_content_width}px; margin-left: auto; margin-right: auto; }";
		}
		
		
		$logistica_setting_page_post_content_width = get_theme_mod('logistica_setting_page_post_content_width', '800');
		
		if ($logistica_setting_page_post_content_width != '740')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".layout-fixed, .blog-list, .blog-regular, .is-content-boxed .single .site-content, .is-content-boxed .page .site-content { max-width: {$logistica_setting_page_post_content_width}px; }";
		}
		
		
		$logistica_setting_menu_height = get_theme_mod('logistica_setting_menu_height', '64');
		
		if ($logistica_setting_menu_height != '64')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) {";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-header-small .header-wrap, .is-menu-bar .nav-menu > ul > li, .is-header-vertical .nav-menu > ul > li { line-height: {$logistica_setting_menu_height}px; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-header-small .site-branding { max-height: {$logistica_setting_menu_height}px; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . "}";
		}
		
		
		$logistica_setting_menu_sticky_height = get_theme_mod('logistica_setting_menu_sticky_height', '64');
		
		if ($logistica_setting_menu_sticky_height != '64')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) {";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-header-small.is-header-smaller .site-header.clone .header-wrap, .is-header-row.is-header-smaller .site-header.clone .nav-menu > ul > li, .is-menu-bar.is-header-smaller .site-navigation.clone .nav-menu > ul > li, .is-menu-bar.is-header-smaller .site-header.clone .site-navigation .nav-menu > ul > li { line-height: {$logistica_setting_menu_sticky_height}px; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-header-small.is-header-smaller .site-header.clone .site-branding { max-height: {$logistica_setting_menu_sticky_height}px; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . "}";
		}
		
		
		$logistica_setting_buttons__primary_button_border_radius = get_theme_mod('logistica_setting_buttons__primary_button_border_radius', "");
		
		if ($logistica_setting_buttons__primary_button_border_radius != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".button.is-primary, .button.is-primary:after, html .elementor-button, .elementor-button.elementor-size-xs, .elementor-button.elementor-size-sm, .elementor-button.elementor-size-md, .elementor-button.elementor-size-lg, .elementor-button.elementor-size-xl, html .ekit-wid-con .elementskit-btn, html .ekit-wid-con .ekit_creative_button { border-radius: {$logistica_setting_buttons__primary_button_border_radius}px; }";
		}
		
		
		$logistica_setting_buttons__secondary_button_border_radius = get_theme_mod('logistica_setting_buttons__secondary_button_border_radius', "");
		
		if ($logistica_setting_buttons__secondary_button_border_radius != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".button.is-secondary, .button.is-secondary:after, .elementor-element.elementor-button-info .elementor-button { border-radius: {$logistica_setting_buttons__secondary_button_border_radius}px; }";
		}
		
		
		$logistica_setting_header_sub_menu_animation_duration = get_theme_mod('logistica_setting_header_sub_menu_animation_duration', "");
		
		if ($logistica_setting_header_sub_menu_animation_duration != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".nav-menu ul ul { transition-duration: {$logistica_setting_header_sub_menu_animation_duration}s; }";
		}
		
		
		$logistica_setting_sidebar_width = get_theme_mod('logistica_setting_sidebar_width', "");
		
		if ($logistica_setting_sidebar_width != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) {";
			
				$custom_css .= PHP_EOL . PHP_EOL . ".with-sidebar { margin-right: -{$logistica_setting_sidebar_width}px; }";
				
				$custom_css .= PHP_EOL . PHP_EOL . ".with-sidebar .site-content { margin-right: {$logistica_setting_sidebar_width}px; }";
				
				$custom_css .= PHP_EOL . PHP_EOL . ".sidebar { width: {$logistica_setting_sidebar_width}px; }";
				
				$custom_css .= PHP_EOL . PHP_EOL . ".is-sidebar-left .with-sidebar { margin-left: -{$logistica_setting_sidebar_width}px; }";
				
				$custom_css .= PHP_EOL . PHP_EOL . ".is-sidebar-left .with-sidebar .site-content { margin-left: {$logistica_setting_sidebar_width}px; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . "}";
		}
		
		
		// Color
		
		$logistica_setting_color_link = get_theme_mod('logistica_setting_color_link', '#d84156');
		
		if ($logistica_setting_color_link != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "a { color: {$logistica_setting_color_link}; }";
		}
		
		
		$logistica_setting_color_link_hover = get_theme_mod('logistica_setting_color_link_hover', '#c60035');
		
		if ($logistica_setting_color_link_hover != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "a:hover { color: {$logistica_setting_color_link_hover}; }";
		}
		
		
		$logistica_setting_color_header_bg = get_theme_mod('logistica_setting_color_header_bg', "");
		
		if ($logistica_setting_color_header_bg != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-header .header-wrap { background-color: {$logistica_setting_color_header_bg}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . "html:not(.is-menu-bottom) .site-header .header-bg-shape { color: {$logistica_setting_color_header_bg}; }";
		}
		
		
		$logistica_setting_color_header_background_gradient = get_theme_mod('logistica_setting_color_header_background_gradient', "");
		
		if ($logistica_setting_color_header_background_gradient != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-header .header-wrap { background: linear-gradient(90deg, {$logistica_setting_color_header_bg} 30%, {$logistica_setting_color_header_background_gradient} 100%); }";
		}
		
		
		$logistica_setting_header_bg_img = get_theme_mod('logistica_setting_header_bg_img', "");
		
		if ($logistica_setting_header_bg_img != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-header .header-wrap { background-image: url({$logistica_setting_header_bg_img}); }";
		}
		
		
		// start Header Mask Style
		$logistica_setting_header_mask_style   = get_theme_mod('logistica_setting_header_mask_style', 'horizontal');
		$logistica_setting_color_header_mask_1 = get_theme_mod('logistica_setting_color_header_mask_1', "");
		$logistica_setting_color_header_mask_2 = get_theme_mod('logistica_setting_color_header_mask_2', "");
		
		if (($logistica_setting_header_mask_style == 'solid') && ($logistica_setting_color_header_mask_1 != ""))
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".header-wrap:before { background: {$logistica_setting_color_header_mask_1}; }";
		}
		elseif (($logistica_setting_header_mask_style == 'radial') && ($logistica_setting_color_header_mask_1 != "") && ($logistica_setting_color_header_mask_2 != ""))
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".header-wrap:before { background: radial-gradient(circle, {$logistica_setting_color_header_mask_1}, {$logistica_setting_color_header_mask_2}); }";
		}
		elseif (($logistica_setting_header_mask_style == 'vertical') && ($logistica_setting_color_header_mask_1 != "") && ($logistica_setting_color_header_mask_2 != ""))
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".header-wrap:before { background: linear-gradient({$logistica_setting_color_header_mask_1}, {$logistica_setting_color_header_mask_2}); }";
		}
		elseif (($logistica_setting_header_mask_style == 'horizontal') && ($logistica_setting_color_header_mask_1 != "") && ($logistica_setting_color_header_mask_2 != ""))
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".header-wrap:before { background: linear-gradient(130deg, {$logistica_setting_color_header_mask_1} 30%, {$logistica_setting_color_header_mask_2} 100%); }";
		}
		// end Header Mask Style
		
		
		$logistica_setting_header_mask_opacity = get_theme_mod('logistica_setting_header_mask_opacity', "");
		
		if ($logistica_setting_header_mask_opacity != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".header-wrap:before { opacity: {$logistica_setting_header_mask_opacity}; }";
		}
		
		
		$logistica_setting_header_half_transparent_bg_opacity = get_theme_mod('logistica_setting_header_half_transparent_bg_opacity', "");
		
		if ($logistica_setting_header_half_transparent_bg_opacity != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".is-header-half-transparent:not(.is-menu-toggled-on) .site-header:not(.clone) .header-wrap:before { opacity: {$logistica_setting_header_half_transparent_bg_opacity}; }";
		}
		
		
		$logistica_setting_header_border_opacity = get_theme_mod('logistica_setting_header_border_opacity', '0.08');
		
		if ($logistica_setting_header_border_opacity != '1')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".header-wrap:after { opacity: {$logistica_setting_header_border_opacity}; }";
		}
		
		
		$logistica_setting_menu_border_opacity = get_theme_mod('logistica_setting_menu_border_opacity', '1');
		
		if ($logistica_setting_menu_border_opacity != '1')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".is-menu-bar .menu-wrap:after { opacity: {$logistica_setting_menu_border_opacity}; }";
		}
		
		
		$logistica_setting_intro_mask_color = get_theme_mod('logistica_setting_intro_mask_color', "");
		
		if ($logistica_setting_intro_mask_color != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".intro:before { background: {$logistica_setting_intro_mask_color}; }";
		}
		
		
		$logistica_setting_intro_mask_opacity = get_theme_mod('logistica_setting_intro_mask_opacity', "");
		
		if ($logistica_setting_intro_mask_opacity != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".intro:before { opacity: {$logistica_setting_intro_mask_opacity}; }";
		}
		
		
		$logistica_setting_color_menu_bg = get_theme_mod('logistica_setting_color_menu_bg', "");
		
		if ($logistica_setting_color_menu_bg != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-header .menu-wrap { background-color: {$logistica_setting_color_menu_bg}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . "html.is-menu-bottom .site-header .header-bg-shape { color: {$logistica_setting_color_menu_bg}; }";
		}
		
		
		$logistica_setting_color_menu_background_gradient = get_theme_mod('logistica_setting_color_menu_background_gradient', "");
		
		if ($logistica_setting_color_menu_background_gradient != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-header .menu-wrap { background: linear-gradient(90deg, {$logistica_setting_color_menu_bg} 30%, {$logistica_setting_color_menu_background_gradient} 100%); }";
		}
		
		
		$logistica_setting_color_menu_active_link_text = get_theme_mod('logistica_setting_color_menu_active_link_text', '#ffffff');
		
		if ($logistica_setting_color_menu_active_link_text != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .nav-menu > ul > li.current-menu-item > a { color: {$logistica_setting_color_menu_active_link_text} !important; } }";
		}
		
		
		$logistica_setting_color_menu_active_link_bg_border = get_theme_mod('logistica_setting_color_menu_active_link_bg_border', '#0a0101');
		
		if ($logistica_setting_color_menu_active_link_bg_border != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .nav-menu li.current-menu-item > a .link-text:before { background-color: {$logistica_setting_color_menu_active_link_bg_border} !important; border-color: {$logistica_setting_color_menu_active_link_bg_border} !important; } }";
		}
		
		
		$logistica_setting_color_menu_link_hover_text = get_theme_mod('logistica_setting_color_menu_link_hover_text', '#0a0a0a');
		
		if ($logistica_setting_color_menu_link_hover_text != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { html .nav-menu > ul > li > a:hover, .nav-menu > ul > li.has-submenu:hover > a { color: {$logistica_setting_color_menu_link_hover_text}; } }";
		}
		
		
		$logistica_setting_color_menu_link_hover_bg_border = get_theme_mod('logistica_setting_color_menu_link_hover_bg_border', '#fcf1e5');
		
		if ($logistica_setting_color_menu_link_hover_bg_border != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { html.loaded .nav-menu ul li a .link-text:before, .nav-menu li.has-submenu:hover > a .link-text:before { background-color: {$logistica_setting_color_menu_link_hover_bg_border}; border-color: {$logistica_setting_color_menu_link_hover_bg_border}; } }";
		}
		
		
		$logistica_setting_color_headings_text = get_theme_mod('logistica_setting_color_headings_text', '#343842');
		
		if ($logistica_setting_color_headings_text != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "h1, h2, h3, h4, h5, h6, blockquote, .tab-titles { color: {$logistica_setting_color_headings_text}; }";
		}
		
		
		$logistica_setting_color_body_text = get_theme_mod('logistica_setting_color_body_text', '#56676d');
		
		if ($logistica_setting_color_body_text != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "body { color: {$logistica_setting_color_body_text}; }";
		}
		
		
		$logistica_setting_color_body_bg = get_theme_mod('logistica_setting_color_body_bg', '#ffffff');
		
		if ($logistica_setting_color_body_bg != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "body { background: {$logistica_setting_color_body_bg}; }";
		}
		
		
		$logistica_setting_color_footer_bg = get_theme_mod('logistica_setting_color_footer_bg', "");
		
		if ($logistica_setting_color_footer_bg != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-footer { background: {$logistica_setting_color_footer_bg}; }";
		}
		
		
		$logistica_setting_color_footer_background_gradient = get_theme_mod('logistica_setting_color_footer_background_gradient', "");
		
		if ($logistica_setting_color_footer_background_gradient != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-footer { background: linear-gradient(130deg, {$logistica_setting_color_footer_bg} 30%, {$logistica_setting_color_footer_background_gradient} 100%); }";
		}
		
		
		$logistica_setting_color_footer_subscribe_bg = get_theme_mod('logistica_setting_color_footer_subscribe_bg', '#ebe6da');
		
		if ($logistica_setting_color_footer_subscribe_bg != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site .footer-subscribe { background: {$logistica_setting_color_footer_subscribe_bg}; }";
		}
		
		
		$logistica_setting_color_footer_subscribe_background_gradient = get_theme_mod('logistica_setting_color_footer_subscribe_background_gradient', "");
		
		if ($logistica_setting_color_footer_subscribe_background_gradient != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site .footer-subscribe { background: linear-gradient(130deg, {$logistica_setting_color_footer_subscribe_bg} 30%, {$logistica_setting_color_footer_subscribe_background_gradient} 100%); }";
		}
		
		
		$logistica_setting_color_copyright_bar_bg = get_theme_mod('logistica_setting_color_copyright_bar_bg', "");
		
		if ($logistica_setting_color_copyright_bar_bg != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-footer .site-info { background-color: {$logistica_setting_color_copyright_bar_bg}; }";
		}
		
		
		$logistica_setting_color_copyright_bar_text = get_theme_mod('logistica_setting_color_copyright_bar_text', '#353535');
		
		if ($logistica_setting_color_copyright_bar_text != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-footer .site-info { color: {$logistica_setting_color_copyright_bar_text}; }";
		}
		
		
		$logistica_setting_color_footer_text = get_theme_mod('logistica_setting_color_footer_text', "");
		
		if ($logistica_setting_color_footer_text != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".footer-widgets { color: {$logistica_setting_color_footer_text}; }";
		}
		
		
		$logistica_setting_color_cat_link_bg_border = get_theme_mod('logistica_setting_color_cat_link_bg_border', "");
		
		if ($logistica_setting_color_cat_link_bg_border != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".is-cat-link-regular .cat-links a, .is-cat-link-borders .cat-links a, .is-cat-link-border-bottom .cat-links a, .is-cat-link-borders-light .cat-links a { color: {$logistica_setting_color_cat_link_bg_border}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-cat-link-borders .cat-links a, .is-cat-link-borders-light .cat-links a, .is-cat-link-border-bottom .cat-links a, .is-cat-link-ribbon .cat-links a:before, .is-cat-link-ribbon .cat-links a:after, .is-cat-link-ribbon-left .cat-links a:before, .is-cat-link-ribbon-right .cat-links a:after, .is-cat-link-ribbon.is-cat-link-ribbon-dark .cat-links a:before, .is-cat-link-ribbon.is-cat-link-ribbon-dark .cat-links a:after, .is-cat-link-ribbon-left.is-cat-link-ribbon-dark .cat-links a:before, .is-cat-link-ribbon-right.is-cat-link-ribbon-dark .cat-links a:after { border-color: {$logistica_setting_color_cat_link_bg_border}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-cat-link-solid .cat-links a, .is-cat-link-solid-light .cat-links a, .is-cat-link-ribbon .cat-links a, .is-cat-link-ribbon-left .cat-links a, .is-cat-link-ribbon-right .cat-links a, .is-cat-link-ribbon.is-cat-link-ribbon-dark .cat-links a, .is-cat-link-ribbon-left.is-cat-link-ribbon-dark .cat-links a, .is-cat-link-ribbon-right.is-cat-link-ribbon-dark .cat-links a { background: {$logistica_setting_color_cat_link_bg_border}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-cat-link-underline .cat-links a { box-shadow: inset 0 -7px 0 {$logistica_setting_color_cat_link_bg_border}; }";
		}
		
		
		$logistica_setting_color_slider_meta_bg_border = get_theme_mod('logistica_setting_color_slider_meta_bg_border', "");
		
		if ($logistica_setting_color_slider_meta_bg_border != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".main-slider-post.is-cat-link-regular .cat-links a, .main-slider-post.is-cat-link-border-bottom .cat-links a, .main-slider-post.is-cat-link-borders .cat-links a, .main-slider-post.is-cat-link-borders-light .cat-links a, .main-slider-post.is-cat-link-line-before .cat-links a, .main-slider-post.is-cat-link-dots-bottom .cat-links a:before { color: {$logistica_setting_color_slider_meta_bg_border}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".main-slider-post.is-cat-link-borders .cat-links a, .main-slider-post.is-cat-link-borders-light .cat-links a, .main-slider-post.is-cat-link-border-bottom .cat-links a, .main-slider-post.is-cat-link-line-before .cat-links a:before, .main-slider-post.is-cat-link-ribbon .cat-links a:before, .main-slider-post.is-cat-link-ribbon .cat-links a:after, .main-slider-post.is-cat-link-ribbon-left .cat-links a:before, .main-slider-post.is-cat-link-ribbon-right .cat-links a:after { border-color: {$logistica_setting_color_slider_meta_bg_border}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".main-slider-post.is-cat-link-solid .cat-links a, .main-slider-post.is-cat-link-solid-light .cat-links a, .main-slider-post.is-cat-link-ribbon .cat-links a, .main-slider-post.is-cat-link-ribbon-left .cat-links a, .main-slider-post.is-cat-link-ribbon-right .cat-links a { background: {$logistica_setting_color_slider_meta_bg_border}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".main-slider-post.is-cat-link-underline .cat-links a { box-shadow: inset 0 -7px 0 {$logistica_setting_color_slider_meta_bg_border}; }";
		}
		
		
		$logistica_setting_color_widget_witle_bg_border = get_theme_mod('logistica_setting_color_widget_witle_bg_border', "");
		
		if ($logistica_setting_color_widget_witle_bg_border != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".is-widget-ribbon .site-main .widget-title span, .is-widget-solid .site-main .widget-title span, .is-widget-solid-arrow .site-main .widget-title span, .is-widget-first-letter-solid .site-main .widget-title span:first-letter { background: {$logistica_setting_color_widget_witle_bg_border}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-widget-ribbon .site-main .widget-title span:before, .is-widget-ribbon .site-main .widget-title span:after, .is-widget-border .site-main .widget-title span, .is-widget-border-arrow .site-main .widget-title span, .is-widget-bottomline .site-main .widget-title:after, .is-widget-first-letter-border .site-main .widget-title span:first-letter, .is-widget-line-cut .site-main .widget-title span:before, .is-widget-line-cut .site-main .widget-title span:after, .is-widget-line-cut-center .site-main .widget-title span:before, .is-widget-line-cut-center .site-main .widget-title span:after { border-color: {$logistica_setting_color_widget_witle_bg_border}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-widget-border-arrow .site-main .widget-title span:before, .is-widget-solid-arrow .site-main .widget-title span:after { border-top-color: {$logistica_setting_color_widget_witle_bg_border}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-widget-underline .site-main .widget-title span { box-shadow: inset 0 -6px 0 {$logistica_setting_color_widget_witle_bg_border}; }";
		}
		
		
		$logistica_setting_color_primary_button = get_theme_mod('logistica_setting_color_primary_button', "");
		
		if ($logistica_setting_color_primary_button != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".button.is-primary { color: {$logistica_setting_color_primary_button}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".button.is-primary.is-shadow, .button.is-primary.is-solid, .button.is-primary.is-solid-light, html .elementor-button, html .ekit-wid-con .elementskit-btn { background-color: {$logistica_setting_color_primary_button}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".button.is-primary.is-shadow { box-shadow: 0px 18px 23px -6px {$logistica_setting_color_primary_button}; }";
		}
		
		
		$logistica_setting_color_primary_button_hover = get_theme_mod('logistica_setting_color_primary_button_hover', "");
		
		if ($logistica_setting_color_primary_button_hover != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".button.is-primary:hover { color: {$logistica_setting_color_primary_button_hover}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".button.is-primary.is-shadow:hover, .button.is-primary.is-solid:hover, .button.is-primary.is-solid-light:hover, .button.is-primary.is-shift:after, .button.is-primary.is-circle:before, html .elementor-button:hover, html .ekit-wid-con .elementskit-btn:hover { background-color: {$logistica_setting_color_primary_button_hover}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".button.is-primary.is-shadow:hover { box-shadow: 0px 2px 10px -5px {$logistica_setting_color_primary_button_hover}; }";
		}
		
		
		$logistica_setting_color_secondary_button = get_theme_mod('logistica_setting_color_secondary_button', "");
		
		if ($logistica_setting_color_secondary_button != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".button.is-secondary { color: {$logistica_setting_color_secondary_button}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".button.is-secondary.is-shadow, .button.is-secondary.is-solid, .button.is-secondary.is-solid-light, .elementor-element.elementor-button-info .elementor-button { background-color: {$logistica_setting_color_secondary_button}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".button.is-secondary.is-shadow { box-shadow: 0px 18px 23px -6px {$logistica_setting_color_secondary_button}; }";
		}
		
		
		$logistica_setting_color_secondary_button_hover = get_theme_mod('logistica_setting_color_secondary_button_hover', "");
		
		if ($logistica_setting_color_secondary_button_hover != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".button.is-secondary:hover { color: {$logistica_setting_color_secondary_button_hover}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".button.is-secondary.is-shadow:hover, .button.is-secondary.is-solid:hover, .button.is-secondary.is-solid-light:hover, .button.is-secondary.is-shift:after, .button.is-secondary.is-circle:before, .elementor-element.elementor-button-info .elementor-button:hover { background-color: {$logistica_setting_color_secondary_button_hover}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".button.is-secondary.is-shadow:hover { box-shadow: 0px 2px 10px -5px {$logistica_setting_color_secondary_button_hover}; }";
		}
		
		
		$logistica_setting_color_top_bar_background = get_theme_mod('logistica_setting_color_top_bar_background', '#495149');
		
		if ($logistica_setting_color_top_bar_background != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".top-bar, .top-bar select option { background-color: {$logistica_setting_color_top_bar_background}; }";
		}
		
		
		$logistica_setting_color_top_bar_background_gradient = get_theme_mod('logistica_setting_color_top_bar_background_gradient', "");
		
		if ($logistica_setting_color_top_bar_background_gradient != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".top-bar { background: linear-gradient(90deg, {$logistica_setting_color_top_bar_background} 30%, {$logistica_setting_color_top_bar_background_gradient} 100%); }";
		}
		
		
		$logistica_setting_color_header_text_custom = get_theme_mod('logistica_setting_color_header_text_custom', '#222222');
		
		if ($logistica_setting_color_header_text_custom != '#222222')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-header { color: {$logistica_setting_color_header_text_custom}; }";
		}
		
		
		$logistica_setting_color_header_border = get_theme_mod('logistica_setting_color_header_border', "");
		
		if ($logistica_setting_color_header_border != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".header-wrap:after { color: {$logistica_setting_color_header_border}; }";
		}
		else
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".header-wrap:after { color: {$logistica_setting_color_header_text_custom}; }";
		}
		
		
		$logistica_setting_color_header_border_gradient = get_theme_mod('logistica_setting_color_header_border_gradient', "");
		
		if ($logistica_setting_color_header_border_gradient != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".header-wrap:after { background: linear-gradient(90deg, currentColor 30%, {$logistica_setting_color_header_border_gradient} 100%); }";
		}
		
		
		$logistica_setting_color_menu_border = get_theme_mod('logistica_setting_color_menu_border', "");
		
		if ($logistica_setting_color_menu_border != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".is-menu-bar .menu-wrap:after { color: {$logistica_setting_color_menu_border}; }";
		}
		else
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".is-menu-bar .menu-wrap:after { color: {$logistica_setting_color_header_text_custom}; }";
		}
		
		
		$logistica_setting_color_menu_border_gradient = get_theme_mod('logistica_setting_color_menu_border_gradient', "");
		
		if ($logistica_setting_color_menu_border_gradient != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".is-menu-bar .menu-wrap:after { background: linear-gradient(90deg, currentColor 30%, {$logistica_setting_color_menu_border_gradient} 100%); }";
		}
		
		
		$logistica_setting_color_logo_text = get_theme_mod('logistica_setting_color_logo_text', "");
		
		if ($logistica_setting_color_logo_text != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "html .site-header .site-title a { color: {$logistica_setting_color_logo_text}; }";
		}
		
		
		$logistica_setting_color_logo_bg = get_theme_mod('logistica_setting_color_logo_bg', "");
		
		if ($logistica_setting_color_logo_bg != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "html .site-header .site-title a { background: {$logistica_setting_color_logo_bg}; }";
		}
		
		
		$logistica_setting_color_logo_bg_gradient = get_theme_mod('logistica_setting_color_logo_bg_gradient', "");
		
		if ($logistica_setting_color_logo_bg_gradient != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "html .site-header .site-title a { background: linear-gradient(140deg, {$logistica_setting_color_logo_bg} 0%, {$logistica_setting_color_logo_bg_gradient} 90%); }";
		}
		
		
		$custom_css = trim($custom_css);
		wp_add_inline_style('logistica-style', $custom_css);
	}
	
	function logistica_after_setup_theme__inline_style()
	{
		add_action('wp_enqueue_scripts', 'logistica_enqueue__inline_style');
	}
	
	add_action('after_setup_theme', 'logistica_after_setup_theme__inline_style');
