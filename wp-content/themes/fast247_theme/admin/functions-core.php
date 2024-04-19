<?php

	function logistica_core_header_style()
	{
		$post_header_style   = "";
		$front_page_displays = get_option('show_on_front'); // Reading Settings.
		
		if (is_home() && ($front_page_displays == 'posts')) // Blog page is homepage.
		{
			$post_header_style = get_theme_mod('logistica_setting_blog_homepage_header_style', ""); // Get blog homepage header style class. (customizer) --- BLOG HOMEPAGE
		}
		elseif (is_singular() || is_home()) // Blog page is a subpage.
		{
			if (function_exists('pixelwars_core_header_style'))
			{
				$post_header_style = pixelwars_core_header_style();
				
				if (($post_header_style == 'inherit') || empty($post_header_style))
				{
					if (is_singular('page') || is_home()) // Blog page AND other pages.
					{
						$post_header_style = get_theme_mod('logistica_setting_page_header_style_global', ""); // Get page header style class. (customizer) --- BLOG PAGE / PAGES
					}
					elseif (is_singular('post')) // Blog posts.
					{
						$post_header_style = get_theme_mod('logistica_setting_post_header_style_global', ""); // Get post header style class. (customizer) --- BLOG POSTS
					}
					else // Portfolio posts AND other custom post types.
					{
						if (! is_attachment())
						{
							$post_header_style = get_theme_mod('logistica_setting_custom_post_header_style_global', ""); // Get post header style class. (customizer) --- PORTFOLIO POSTS / CUSTOM POST TYPES
						}
					}
				}
			}
		}
		
		return $post_header_style;
	}


/* ============================================================================================================================================= */


	function logistica_core_post_style()
	{
		if (function_exists('pixelwars_core_post_style'))
		{
			return pixelwars_core_post_style();
		}
	}


/* ============================================================================================================================================= */


	function logistica_core_title_visibility()
	{
		if (function_exists('pixelwars_core_title_visibility'))
		{
			return pixelwars_core_title_visibility();
		}
	}


/* ============================================================================================================================================= */


	function logistica_core_featured_media__url()
	{
		if (function_exists('pixelwars_core_featured_media__url'))
		{
			return pixelwars_core_featured_media__url();
		}
	}
	
	
	function logistica_core_featured_media__new_tab()
	{
		if (function_exists('pixelwars_core_featured_media__new_tab'))
		{
			return pixelwars_core_featured_media__new_tab();
		}
	}


/* ============================================================================================================================================= */


	function logistica_core_iframe_from_xml($browser_address_url)
	{
		if (function_exists('pixelwars_core_iframe_from_xml'))
		{
			return pixelwars_core_iframe_from_xml($browser_address_url);
		}
	}
	
	
	function logistica_iframe_from_xml($browser_address_url)
	{
		return logistica_core_iframe_from_xml($browser_address_url);
	}


/* ============================================================================================================================================= */


	function logistica_core_gallery_type()
	{
		if (function_exists('pixelwars_core_gallery_type'))
		{
			return pixelwars_core_gallery_type();
		}
	}


/* ============================================================================================================================================= */


	function logistica_core_share_links_meta()
	{
		if (function_exists('pixelwars_core_share_links_meta'))
		{
			pixelwars_core_share_links_meta();
		}
	}
	
	
	function logistica_core_share_links()
	{
		$share_links = get_theme_mod('logistica_setting_share_links', 'Yes');
		
		if ($share_links != 'No')
		{
			if (function_exists('pixelwars_core_share_links'))
			{
				pixelwars_core_share_links();
			}
		}
	}


/* ============================================================================================================================================= */


	function logistica_core_related_posts()
	{
		if (is_singular('post'))
		{
			if (function_exists('pixelwars_core_related_posts'))
			{
				$related_posts = get_theme_mod('logistica_setting_related_posts', 'Yes');
				
				if ($related_posts != 'No')
				{
					$related_posts_category = get_theme_mod('logistica_setting_related_posts_category', 'all');
					$orderby                = get_theme_mod('logistica_setting_related_posts_order', 'rand');
					$posts_per_page         = get_theme_mod('logistica_setting_related_posts_count', '3');
					$related_posts_style    = get_theme_mod('logistica_setting_related_posts_style', 'overlay');
					
					pixelwars_core_related_posts($related_posts_category, $orderby, $posts_per_page, $related_posts_style);
				}
			}
		}
	}


/* ============================================================================================================================================= */


	function logistica_core_featured_area()
	{
		if (function_exists('pixelwars_core_featured_area'))
		{
			if (is_singular('page'))
			{
				$select_page_featured_area = pixelwars_core_featured_area();
				
				if ($select_page_featured_area == 'pixelwars_core_sidebar__blog_featured_area')
				{
					$select_page_featured_area = 'logistica_sidebar_13';
				}
				elseif ($select_page_featured_area == 'pixelwars_core_sidebar__page_featured_area')
				{
					$select_page_featured_area = 'logistica_sidebar_14';
				}
				elseif ($select_page_featured_area == 'pixelwars_core_sidebar__portfolio_featured_area')
				{
					$select_page_featured_area = 'logistica_sidebar_17';
				}
				elseif ($select_page_featured_area == 'pixelwars_core_sidebar__shop_featured_area')
				{
					$select_page_featured_area = 'logistica_sidebar_18';
				}
				
				if ((! isset($_GET['featured_area'])) && is_active_sidebar($select_page_featured_area))
				{
					?>
						<section class="top-content">
							<div class="layout-medium">
								<div class="featured-area">
									<?php
										dynamic_sidebar($select_page_featured_area);
									?>
								</div> <!-- .featured-area -->
							</div> <!-- .layout-medium -->
						</section> <!-- .top-content -->
					<?php
				}
			}
			else
			{
				if ((! isset($_GET['featured_area'])) && is_home() && is_active_sidebar('logistica_sidebar_13'))
				{
					?>
						<section class="top-content">
							<div class="layout-medium">
								<div class="featured-area">
									<?php
										dynamic_sidebar('logistica_sidebar_13');
									?>
								</div> <!-- .featured-area -->
							</div> <!-- .layout-medium -->
						</section> <!-- .top-content -->
					<?php
				}
			}
		}
	}


/* ============================================================================================================================================= */


	function logistica_core_sidebar($post_id)
	{
		if (function_exists('pixelwars_core_sidebar'))
		{
			$select_sidebar = pixelwars_core_sidebar($post_id);
			
			if ($select_sidebar == 'pixelwars_core_sidebar__blog_sidebar')
			{
				$select_sidebar = 'logistica_sidebar_1';
			}
			elseif ($select_sidebar == 'pixelwars_core_sidebar__post_sidebar')
			{
				$select_sidebar = 'logistica_sidebar_2';
			}
			elseif ($select_sidebar == 'pixelwars_core_sidebar__page_sidebar')
			{
				$select_sidebar = 'logistica_sidebar_3';
			}
			elseif ($select_sidebar == 'pixelwars_core_sidebar__portfolio_sidebar')
			{
				$select_sidebar = 'logistica_sidebar_15';
			}
			elseif ($select_sidebar == 'pixelwars_core_sidebar__shop_sidebar')
			{
				$select_sidebar = 'logistica_sidebar_16';
			}
			elseif ($select_sidebar == 'pixelwars_core_sidebar__course_sidebar')
			{
				$select_sidebar = 'logistica_sidebar_course';
			}
			
			return $select_sidebar;
		}
	}


/* ============================================================================================================================================= */


	function logistica_core_fonts()
	{
		if (function_exists('pixelwars_core_fonts'))
		{
			return pixelwars_core_fonts();
		}
		else
		{
			return array("" => 'OS Default');
		}
	}

?>