<?php

	function logistica_is_global_sidebar_post()
	{
		$post_sidebar = get_theme_mod('logistica_setting_sidebar_post', 'Yes'); // Single Post Sidebar setting. (global setting)
		
		return $post_sidebar;
	}
	
	
	function logistica_is_global_sidebar_portfolio_category()
	{
		$portfolio_category_sidebar = get_theme_mod('logistica_setting_sidebar_portfolio_category', 'No'); // Portfolio Category sidebar setting. (global setting)
		
		return $portfolio_category_sidebar;
	}
	
	
	function logistica_is_global_sidebar_portfolio_post()
	{
		$portfolio_post_sidebar = get_theme_mod('logistica_setting_sidebar_portfolio_post', 'No'); // Single Portfolio Post Sidebar setting. (global setting)
		
		return $portfolio_post_sidebar;
	}
	
	
	function logistica_is_global_sidebar_course()
	{
		$course_sidebar = get_theme_mod('logistica_setting_sidebar_course', 'No'); // Single Course Sidebar setting. (global setting)
		
		return $course_sidebar;
	}


/* ============================================================================================================================================= */


	function logistica_individual_sidebar()
	{
		$sidebar_individual = "";
		
		if (is_post_type_archive('product') || is_tax('product_cat') || is_singular('product')) // WooCommerce plugin. (shop page, product category page, product page)
		{
			$shop_page_id       = get_option('woocommerce_shop_page_id');
			$sidebar_individual = logistica_core_sidebar($shop_page_id);
		}
		else
		{
			$post_id            = get_the_ID();
			$sidebar_individual = logistica_core_sidebar($post_id);
		}
		
		return $sidebar_individual;
	}


/* ============================================================================================================================================= */


	function logistica_is_singular_sidebar()
	{
		$is_singular_sidebar = false;
		
		if (isset($_GET['sidebar']))
		{
			if ($_GET['sidebar'] == 'yes')
			{
				$is_singular_sidebar = true;
			}
		}
		else
		{
			$sidebar_individual = logistica_individual_sidebar();
			
			if (is_active_sidebar($sidebar_individual)) // Individual sidebar area.
			{
				$is_singular_sidebar = true;
			}
			elseif (($sidebar_individual == 'inherit') || empty($sidebar_individual))
			{
				if (is_singular('portfolio'))
				{
					$is_global_sidebar_portfolio_post = logistica_is_global_sidebar_portfolio_post(); // Single Portfolio Post Sidebar setting. (global setting)
					
					if ($is_global_sidebar_portfolio_post == 'Yes')
					{
						if (is_active_sidebar('logistica_sidebar_15')) // Portfolio Sidebar area.
						{
							$is_singular_sidebar = true;
						}
					}
				}
				elseif (is_singular('lp_course'))
				{
					$is_global_sidebar_course = logistica_is_global_sidebar_course(); // Single Course Sidebar setting. (global setting)
					
					if ($is_global_sidebar_course == 'Yes')
					{
						if (is_active_sidebar('logistica_sidebar_course')) // Course Sidebar area.
						{
							$is_singular_sidebar = true;
						}
					}
				}
				elseif (is_singular('post'))
				{
					$is_global_sidebar_post = logistica_is_global_sidebar_post(); // Single Post Sidebar setting. (global setting)
					
					if ($is_global_sidebar_post != 'No')
					{
						if (is_active_sidebar('logistica_sidebar_2')) // Post Sidebar area.
						{
							$is_singular_sidebar = true;
						}
						elseif (is_active_sidebar('logistica_sidebar_1')) // Blog Sidebar area.
						{
							$is_singular_sidebar = true;
						}
					}
				}
			}
		}
		
		return $is_singular_sidebar;
	}


/* ============================================================================================================================================= */


	function logistica_singular_layout_class()
	{
		if (logistica_is_singular_sidebar() || is_singular('lp_course') || (is_page() && is_page_template('default'))) // Always use "layout-medium" class for LearnPress Course AND Default Page template.
		{
			echo 'layout-medium';
		}
		else
		{
			echo 'layout-fixed';
		}
	}
	
	
	function logistica_singular_sidebar_class()
	{
		if (logistica_is_singular_sidebar())
		{
			echo 'with-sidebar';
		}
	}
	
	
	// For Portfolio Page template and Portfolio Category archives.
	
	function logistica_portfolio_layout_class()
	{
		$sidebar_individual = "";
		
		if (is_page_template('page_template-portfolio.php'))
		{
			$sidebar_individual = logistica_individual_sidebar();
		}
		else
		{
			$sidebar_individual = logistica_is_global_sidebar_portfolio_category(); // Portfolio Category Sidebar setting. (global setting)
		}
		
		$page_layout = 'layout-medium';
		$page_layout = get_theme_mod('logistica_setting_portfolio_page_layout', 'layout-medium');
		
		if (($page_layout == 'layout-fixed') && (($sidebar_individual == 'Yes') || ($sidebar_individual != 'No Sidebar')))
		{
			$page_layout = 'layout-medium';
		}
		
		echo esc_attr($page_layout);
	}
	
	
	function logistica_portfolio_sidebar_class()
	{
		if (is_tax('portfolio-category'))
		{
			$portfolio_category_sidebar = logistica_is_global_sidebar_portfolio_category(); // Portfolio Category Sidebar setting. (global setting)
			
			if ($portfolio_category_sidebar == 'Yes')
			{
				echo 'with-sidebar';
			}
		}
		else
		{
			logistica_singular_sidebar_class();
		}
	}


/* ============================================================================================================================================= */


	function logistica_sidebar_html()
	{
		?>
			<div id="secondary" class="widget-area sidebar" role="complementary">
				<div class="sidebar-wrap">
					<div class="sidebar-content">
						<?php
							$sidebar_individual = logistica_individual_sidebar();
							
							if (($sidebar_individual == 'inherit') || empty($sidebar_individual))
							{
								if (is_singular('portfolio')) // Single portfolio.
								{
									dynamic_sidebar('logistica_sidebar_15'); // Portfolio Sidebar area.
								}
								elseif (is_singular('product') || is_post_type_archive('product') || is_tax('product_cat')) // WooCommerce plugin pages. (single product, shop page, product category)
								{
									dynamic_sidebar('logistica_sidebar_16'); // Shop Sidebar area.
								}
								elseif (is_post_type_archive('lp_course') || is_singular('lp_course')) // LearnPress plugin pages. (courses page, single course)
								{
									dynamic_sidebar('logistica_sidebar_course'); // Course Sidebar area.
								}
								elseif (is_singular('post')) // Single blog post.
								{
									if (is_active_sidebar('logistica_sidebar_2'))
									{
										dynamic_sidebar('logistica_sidebar_2'); // Post Sidebar area.
									}
									else
									{
										dynamic_sidebar('logistica_sidebar_1'); // Blog Sidebar area.
									}
								}
							}
							else
							{
								dynamic_sidebar($sidebar_individual);
							}
						?>
					</div> <!-- .sidebar-content -->
				</div> <!-- .sidebar-wrap -->
			</div> <!-- #secondary .widget-area .sidebar -->
		<?php
	}


/* ============================================================================================================================================= */


	function logistica_singular_sidebar()
	{
		if (logistica_is_singular_sidebar())
		{
			logistica_sidebar_html();
		}
	}
