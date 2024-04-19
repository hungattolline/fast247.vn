<?php

	function logistica_customize_register__sections($wp_customize)
	{
		$wp_customize->add_panel(
			'logistica_panel_general',
			array(
				'title'       => esc_html__('General', 'logistica'),
				'description' => esc_html__('General options.', 'logistica'),
				'priority'    => 1
			)
		);
		
				$wp_customize->add_section(
					'logistica_section_layout',
					array(
						'title'       => esc_html__('Layout', 'logistica'),
						'description' => esc_html__('Theme layout settings.', 'logistica'),
						'panel'       => 'logistica_panel_general',
						'priority'    => 2
					)
				);
				
				$wp_customize->add_section(
					'logistica_section_fonts',
					array(
						'title'       => esc_html__('Fonts', 'logistica'),
						'description' => esc_html__('Theme font settings.', 'logistica'),
						'panel'       => 'logistica_panel_general',
						'priority'    => 3
					)
				);
				
				$wp_customize->add_section(
					'logistica_section_chars',
					array(
						'title'       => esc_html__('Characters', 'logistica'),
						'description' => esc_html__('Set character sets.', 'logistica'),
						'panel'       => 'logistica_panel_general',
						'priority'    => 4
					)
				);
				
				$wp_customize->add_section(
					'logistica_section_colors',
					array(
						'title'       => esc_html__('Colors', 'logistica'),
						'description' => esc_html__('Select theme colors.', 'logistica'),
						'panel'       => 'logistica_panel_general',
						'priority'    => 5
					)
				);
				
				$wp_customize->add_section(
					'logistica_section_buttons',
					array(
						'title'       => esc_html__('Buttons', 'logistica'),
						'description' => esc_html__('Theme buttons settings.', 'logistica'),
						'panel'       => 'logistica_panel_general',
						'priority'    => 6
					)
				);
		
		/* ================================================== */
		
		$wp_customize->add_panel(
			'logistica_panel_header',
			array(
				'title'       => esc_html__('Header', 'logistica'),
				'description' => esc_html__('Theme header settings.', 'logistica'),
				'priority'    => 21
			)
		);
		
				$wp_customize->add_section(
					'logistica_section_header_general',
					array(
						'title'       => esc_html__('General', 'logistica'),
						'description' => esc_html__('General header options.', 'logistica'),
						'panel'       => 'logistica_panel_header',
						'priority'    => 22
					)
				);
				
				$wp_customize->add_section(
					'logistica_section_header_menu',
					array(
						'title'       => esc_html__('Menu', 'logistica'),
						'description' => esc_html__('Navigation menu options.', 'logistica'),
						'panel'       => 'logistica_panel_header',
						'priority'    => 23
					)
				);
				
				$wp_customize->add_section(
					'logistica_section_header_top_bar',
					array(
						'title'       => esc_html__('Top Bar', 'logistica'),
						'description' => esc_html__('Theme top bar settings.', 'logistica'),
						'panel'       => 'logistica_panel_header',
						'priority'    => 24
					)
				);
				
				$wp_customize->add_section(
					'logistica_section_header_icon_box',
					array(
						'title'       => esc_html__('Icon Box', 'logistica'),
						'description' => esc_html__('Theme icon box settings.', 'logistica'),
						'panel'       => 'logistica_panel_header',
						'priority'    => 25
					)
				);
		
		/* ================================================== */
		
		$wp_customize->add_section(
			'logistica_section_footer',
			array(
				'title'       => esc_html__('Footer', 'logistica'),
				'description' => esc_html__('Theme footer settings.', 'logistica'),
				'priority'    => 26
			)
		);
		
		/* ================================================== */
		
		$wp_customize->add_panel(
			'logistica_panel_featured_area',
			array(
				'title'       => esc_html__('Featured Area', 'logistica'),
				'description' => esc_html__('Theme featured area settings.', 'logistica'),
				'priority'    => 27
			)
		);
		
				$wp_customize->add_section(
					'logistica_section_featured_area_general',
					array(
						'title'       => esc_html__('General', 'logistica'),
						'description' => esc_html__('Theme general featured area settings.', 'logistica'),
						'panel'       => 'logistica_panel_featured_area',
						'priority'    => 28
					)
				);
				
				$wp_customize->add_section(
					'logistica_section_featured_area_slider',
					array(
						'title'       => esc_html__('Slider', 'logistica'),
						'description' => esc_html__('Go to Widgets section and add Main Slider widget to any Featured Area.', 'logistica'),
						'panel'       => 'logistica_panel_featured_area',
						'priority'    => 29
					)
				);
				
				$wp_customize->add_section(
					'logistica_section_featured_area_link_box',
					array(
						'title'       => esc_html__('Link Box', 'logistica'),
						'description' => esc_html__('Go to Widgets section and drag and drop Link Box widgets to Blog/Page Featured Area.', 'logistica'),
						'panel'       => 'logistica_panel_featured_area',
						'priority'    => 30
					)
				);
				
				$wp_customize->add_section(
					'logistica_section_featured_area_intro',
					array(
						'title'       => esc_html__('Intro', 'logistica'),
						'description' => esc_html__('Go to Widgets section and drag and drop Intro widget to Blog/Page Featured Area.', 'logistica'),
						'panel'       => 'logistica_panel_featured_area',
						'priority'    => 31
					)
				);
		
		/* ================================================== */
		
		$wp_customize->add_section(
			'logistica_section_pages',
			array(
				'title'       => esc_html__('Pages', 'logistica'),
				'description' => esc_html__('Default page options.', 'logistica'),
				'priority'    => 32
			)
		);
		
		$wp_customize->add_section(
			'logistica_section_blog',
			array(
				'title'       => esc_html__('Blog', 'logistica'),
				'description' => esc_html__('Blog page options.', 'logistica'),
				'priority'    => 33
			)
		);
		
		$wp_customize->add_section(
			'logistica_section_post',
			array(
				'title'       => esc_html__('Single Post', 'logistica'),
				'description' => esc_html__('Individual post options.', 'logistica'),
				'priority'    => 34
			)
		);
		
		/* ================================================== */
		
		$wp_customize->add_panel(
			'logistica_panel_meta',
			array(
				'title'       => esc_html__('Meta', 'logistica'),
				'description' => esc_html__('Meta options.', 'logistica'),
				'priority'    => 35
			)
		);
		
				$wp_customize->add_section(
					'logistica_section_meta_style',
					array(
						'title'       => esc_html__('Style', 'logistica'),
						'description' => esc_html__('Meta style options.', 'logistica'),
						'panel'       => 'logistica_panel_meta',
						'priority'    => 36
					)
				);
				
				$wp_customize->add_section(
					'logistica_section_meta_blog',
					array(
						'title'       => esc_html__('Blog Meta', 'logistica'),
						'description' => esc_html__('Blog meta options.', 'logistica'),
						'panel'       => 'logistica_panel_meta',
						'priority'    => 37
					)
				);
				
				$wp_customize->add_section(
					'logistica_section_meta_post',
					array(
						'title'       => esc_html__('Single Post Meta', 'logistica'),
						'description' => esc_html__('Post meta options.', 'logistica'),
						'panel'       => 'logistica_panel_meta',
						'priority'    => 38
					)
				);
		
		/* ================================================== */
		
		$wp_customize->add_section(
			'logistica_section_sidebar',
			array(
				'title'       => esc_html__('Sidebar', 'logistica'),
				'description' => esc_html__('Theme sidebar settings.', 'logistica'),
				'priority'    => 39
			)
		);
		
		$wp_customize->add_section(
			'logistica_section_portfolio',
			array(
				'title'       => esc_html__('Portfolio', 'logistica'),
				'description' => esc_html__('Portfolio page options.', 'logistica'),
				'priority'    => 40
			)
		);
		
		$wp_customize->add_section(
			'logistica_section_shop',
			array(
				'title'       => esc_html__('Shop', 'logistica'),
				'description' => esc_html__('Shop page options.', 'logistica'),
				'priority'    => 41
			)
		);
		
		/* ================================================== */
		
		$wp_customize->add_panel(
			'widgets',
			array(
				'title'       => esc_html__('Widgets', 'logistica'),
				'description' => esc_html__('Widgets are independent sections of content that can be placed into widgetized areas provided by your theme (commonly called sidebars).', 'logistica'),
				'priority'    => 99
			)
		);
	}
	
	add_action('customize_register', 'logistica_customize_register__sections');
	
	
	function logistica_sanitize($value)
	{
		return $value;
	}

?>