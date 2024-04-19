<?php

	function pixelwars_core_manage_posts_columns__add_new_columns($columns)
	{
		return array_merge(
			$columns,
			array(
				'consultify_post_feat_img' => esc_html__('Featured Image', 'pixelwars-core')
			)
		);
	}
	
	add_filter('manage_post_posts_columns',      'pixelwars_core_manage_posts_columns__add_new_columns');
	add_filter('manage_page_posts_columns',      'pixelwars_core_manage_posts_columns__add_new_columns');
	add_filter('manage_portfolio_posts_columns', 'pixelwars_core_manage_posts_columns__add_new_columns');
	
	
	function pixelwars_core_manage_posts_custom_column__display_columns_data($column, $post_id)
	{
		if ($column == 'consultify_post_feat_img')
		{
			the_post_thumbnail(
				'thumbnail',
				array(
					'style' => 'max-height: 40px; max-width: 40px;'
				)
			);
		}
	}
	
	add_action('manage_post_posts_custom_column',      'pixelwars_core_manage_posts_custom_column__display_columns_data', 10, 2);
	add_action('manage_page_posts_custom_column',      'pixelwars_core_manage_posts_custom_column__display_columns_data', 10, 2);
	add_action('manage_portfolio_posts_custom_column', 'pixelwars_core_manage_posts_custom_column__display_columns_data', 10, 2);
