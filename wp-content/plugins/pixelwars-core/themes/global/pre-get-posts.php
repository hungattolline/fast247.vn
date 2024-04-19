<?php

	function pixelwars_core_exclude_sticky($query)
	{
		if (($query->is_main_query()) && is_home() && (! is_admin()))
		{
			if ($query->get('paged') == 0)
			{
				$num    = get_option('posts_per_page');
				$sticky = get_option('sticky_posts');
				$extras = $num - count($sticky);
				$query->set('posts_per_page', $extras);
			}
			else
			{
				$num    = get_option('posts_per_page');
				$sticky = get_option('sticky_posts');
				$extras = $num - count($sticky) - count($sticky);
				$query->set('posts_per_page', $extras);
			}
		}
	}
	
	add_action('pre_get_posts', 'pixelwars_core_exclude_sticky');

?>