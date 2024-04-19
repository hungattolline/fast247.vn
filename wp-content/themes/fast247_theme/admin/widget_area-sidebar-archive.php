<?php

	function logistica_is_global_sidebar_blog()
	{
		$blog_sidebar = get_theme_mod('logistica_setting_sidebar_blog', 'Yes'); // Blog Sidebar setting. (global setting)
		
		return $blog_sidebar;
	}
	
	
	function logistica_is_global_sidebar_archive()
	{
		$archive_sidebar = get_theme_mod('logistica_setting_sidebar_archive', 'No');  // Archives and Search results sidebar setting. (global setting)
		
		return $archive_sidebar;
	}


/* ============================================================================================================================================= */


	function logistica_is_blog_sidebar()
	{
		$is_blog_sidebar = false;
		
		if (isset($_GET['sidebar']))
		{
			if ($_GET['sidebar'] == 'yes')
			{
				$is_blog_sidebar = true;
			}
		}
		elseif (is_home()) // Blog posts.
		{
			$blog_sidebar = logistica_is_global_sidebar_blog(); // Blog sidebar setting. (global setting)
			
			if ($blog_sidebar != 'No') // If global Blog sidebar = Yes.
			{
				if (is_active_sidebar('logistica_sidebar_1')) // If there is any widget in Blog Sidebar area.
				{
					$is_blog_sidebar = true;
				}
			}
		}
		elseif (is_category() || is_tag() || is_author() || is_date() || is_search()) // Archives and Search results.
		{
			$archive_sidebar = logistica_is_global_sidebar_archive(); // Archives and Search results sidebar setting. (global setting)
			
			if ($archive_sidebar == 'Yes') // If global Archives and Search results sidebar sidebar = Yes.
			{
				if (is_active_sidebar('logistica_sidebar_1')) // If there is any widget in Blog Sidebar area.
				{
					$is_blog_sidebar = true;
				}
			}
		}
		else // Custom taxonomy.
		{
			$is_blog_sidebar = true;
		}
		
		return $is_blog_sidebar;
	}


/* ============================================================================================================================================= */


	function logistica_blog_sidebar_class()
	{
		$sidebar_class = 'with-sidebar';
		
		if (isset($_GET['sidebar']))
		{
			if ($_GET['sidebar'] == 'no')
			{
				$sidebar_class = "";
			}
		}
		else
		{
			if (is_home()) // Blog posts.
			{
				$blog_sidebar = logistica_is_global_sidebar_blog(); // Blog sidebar setting. (global setting)
				
				if ($blog_sidebar == 'No')
				{
					$sidebar_class = "";
				}
			}
			elseif (is_category() || is_tag() || is_author() || is_date() || is_search()) // Archives and Search results.
			{
				$archive_sidebar = logistica_is_global_sidebar_archive(); // Archives and Search results sidebar setting. (global setting)
				
				if ($archive_sidebar != 'Yes')
				{
					$sidebar_class = "";
				}
			}
		}
		
		if (is_active_sidebar('logistica_sidebar_1')) // If there is any widget in Blog Sidebar area.
		{
			echo esc_attr($sidebar_class);
		}
	}


/* ============================================================================================================================================= */


	function logistica_blog_sidebar_html()
	{
		?>
			<div id="secondary" class="widget-area sidebar" role="complementary">
				<div class="sidebar-wrap">
					<div class="sidebar-content">
						<?php
							$queried_taxonomy = "";
							
							if ((! is_home()) && (! is_post_type_archive()))
							{
								$queried_object   = get_queried_object();
								$queried_taxonomy = $queried_object->taxonomy;
							}
							
							if ($queried_taxonomy == 'course_category') // LearnPress plugin. (course category page)
							{
								dynamic_sidebar('logistica_sidebar_course'); // Get widgets from Course Sidebar area.
							}
							elseif (is_tax('portfolio-category')) // Portfolio category page.
							{
								dynamic_sidebar('logistica_sidebar_15'); // Get widgets from Portfolio Sidebar area.
							}
							else
							{
								dynamic_sidebar('logistica_sidebar_1'); // Get widgets from Blog Sidebar area.
							}
						?>
					</div> <!-- .sidebar-content -->
				</div> <!-- .sidebar-wrap -->
			</div> <!-- #secondary .widget-area .sidebar -->
		<?php
	}


/* ============================================================================================================================================= */


	function logistica_blog_sidebar()
	{
		if (logistica_is_blog_sidebar())
		{
			logistica_blog_sidebar_html();
		}
	}
