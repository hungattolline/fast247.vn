<?php

	function logistica_widgets_init()
	{
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar_1',
				'name'          => esc_html__('Blog Sidebar', 'logistica'),
				'description'   => esc_html__('Add widgets.', 'logistica'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar_2',
				'name'          => esc_html__('Post Sidebar', 'logistica'),
				'description'   => esc_html__('Add widgets.', 'logistica'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar_3',
				'name'          => esc_html__('Page Sidebar', 'logistica'),
				'description'   => esc_html__('- Add widgets. - Select this sidebar in edit screen of a page to display it with this sidebar.', 'logistica'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar_15',
				'name'          => esc_html__('Portfolio Sidebar', 'logistica'),
				'description'   => esc_html__('Select this sidebar in edit screen of your portfolio page. Also this sidebar can be used for portfolio categories and portfolio posts when activated from Customizer.', 'logistica'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar_16',
				'name'          => esc_html__('Shop Sidebar', 'logistica'),
				'description'   => esc_html__('Enable sidebar for shop category page and single product page from Customizer > Sidebar.', 'logistica'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar_course',
				'name'          => esc_html__('Course Sidebar', 'logistica'),
				'description'   => esc_html__('Enable sidebar for courses from Customizer > Sidebar > Course Sidebar. (Use with LearnPress plugin.)', 'logistica'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar_13',
				'name'          => esc_html__('Blog Featured Area', 'logistica'),
				'description'   => esc_html__('Add Main Slider/Link Box/Intro widgets.', 'logistica'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar_14',
				'name'          => esc_html__('Page Featured Area', 'logistica'),
				'description'   => esc_html__('Add Main Slider/Link Box/Intro widgets.', 'logistica'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar_17',
				'name'          => esc_html__('Portfolio Featured Area', 'logistica'),
				'description'   => esc_html__('Add Main Slider/Link Box/Intro widgets.', 'logistica'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar_18',
				'name'          => esc_html__('Shop Featured Area', 'logistica'),
				'description'   => esc_html__('Add Main Slider/Link Box/Intro widgets.', 'logistica'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar_4',
				'name'          => esc_html__('Header Social Media Icons', 'logistica'),
				'description'   => esc_html__('Add Social Media Icon widget per icon.', 'logistica'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar_8',
				'name'          => esc_html__('Author Social Media Icons', 'logistica'),
				'description'   => esc_html__('Add Social Media Icon widget per icon.', 'logistica'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar__top_bar_left',
				'name'          => esc_html__('Top Bar Left', 'logistica'),
				'description'   => esc_html__('Add widget.', 'logistica'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar__top_bar_right',
				'name'          => esc_html__('Top Bar Right', 'logistica'),
				'description'   => esc_html__('Add widget.', 'logistica'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar__logo_before',
				'name'          => esc_html__('Logo Before', 'logistica'),
				'description'   => esc_html__('Add widget.', 'logistica'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar__logo_after',
				'name'          => esc_html__('Logo After', 'logistica'),
				'description'   => esc_html__('Add widget.', 'logistica'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar_5',
				'name'          => esc_html__('Footer Subscribe', 'logistica'),
				'description'   => esc_html__('Add widget.', 'logistica'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar_6',
				'name'          => esc_html__('Footer Instagram', 'logistica'),
				'description'   => esc_html__('Add widget.', 'logistica'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar_9',
				'name'          => esc_html__('Footer 1', 'logistica'),
				'description'   => esc_html__('Add widgets.', 'logistica'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar_10',
				'name'          => esc_html__('Footer 2', 'logistica'),
				'description'   => esc_html__('Add widgets.', 'logistica'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar_11',
				'name'          => esc_html__('Footer 3', 'logistica'),
				'description'   => esc_html__('Add widgets.', 'logistica'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar_12',
				'name'          => esc_html__('Footer 4', 'logistica'),
				'description'   => esc_html__('Add widgets.', 'logistica'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'logistica_sidebar_7',
				'name'          => esc_html__('Footer Copyright Text', 'logistica'),
				'description'   => esc_html__('Add Text widget.', 'logistica'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>'
			)
		);
		
		
		$logistica_sidebars_with_commas = get_option('logistica_sidebars_with_commas');
		
		if ($logistica_sidebars_with_commas != "")
		{
			$sidebars = preg_split("/[\s]*[,][\s]*/", $logistica_sidebars_with_commas);
			
			foreach ($sidebars as $sidebar)
			{
				$sidebar_lowercase = strtolower($sidebar);
				$sidebar_id        = str_replace(" ", '_', $sidebar_lowercase); // Parameters: Old value, New value, String.
				
				register_sidebar(
					array(
						'id'            => $sidebar_id,
						'name'          => $sidebar,
						'description'   => esc_html__('Add widgets.', 'logistica'),
						'before_widget' => '<aside id="%1$s" class="widget %2$s">',
						'after_widget'  => '</aside>',
						'before_title'  => '<h3 class="widget-title"><span>',
						'after_title'   => '</span></h3>'
					)
				);
			}
		}
	}
	
	add_action('widgets_init', 'logistica_widgets_init');
