<?php

	function pixelwars_core_meta_box__featured_area($post)
	{
		?>
			<div class="admin-inside-box">
				<?php
					wp_nonce_field(
						'pixelwars_core_meta_box__featured_area',
						'pixelwars_core_meta_box_nonce__featured_area'
					);
				?>
				<p>
					<label for="pixelwars_core_select_page_featured_area"><?php esc_html_e('Select Featured Area:', 'pixelwars-core'); ?></label>
					<br>
					<?php
						$select_page_featured_area = get_post_meta(get_the_ID(), 'pixelwars_core_select_page_featured_area', true);
					?>
					<select id="pixelwars_core_select_page_featured_area" name="pixelwars_core_select_page_featured_area">
						<option <?php if ($select_page_featured_area == 'No Featured Area')   { echo 'selected="selected"'; } ?> value="No Featured Area"><?php                                                             esc_html_e('No Featured Area', 'pixelwars-core'); ?></option>
						<option <?php if ($select_page_featured_area == 'pixelwars_core_sidebar__blog_featured_area')      { echo 'selected="selected"'; } ?> value="pixelwars_core_sidebar__blog_featured_area"><?php      esc_html_e('Blog Featured Area', 'pixelwars-core'); ?></option>
						<option <?php if ($select_page_featured_area == 'pixelwars_core_sidebar__page_featured_area')      { echo 'selected="selected"'; } ?> value="pixelwars_core_sidebar__page_featured_area"><?php      esc_html_e('Page Featured Area', 'pixelwars-core'); ?></option>
						<option <?php if ($select_page_featured_area == 'pixelwars_core_sidebar__portfolio_featured_area') { echo 'selected="selected"'; } ?> value="pixelwars_core_sidebar__portfolio_featured_area"><?php esc_html_e('Portfolio Featured Area', 'pixelwars-core'); ?></option>
						<option <?php if ($select_page_featured_area == 'pixelwars_core_sidebar__shop_featured_area')      { echo 'selected="selected"'; } ?> value="pixelwars_core_sidebar__shop_featured_area"><?php      esc_html_e('Shop Featured Area', 'pixelwars-core'); ?></option>
						<?php
							$pixelwars_core_sidebars_with_commas = get_option('pixelwars_core_sidebars_with_commas');
							
							if ($pixelwars_core_sidebars_with_commas != "")
							{
								$sidebars = preg_split("/[\s]*[,][\s]*/", $pixelwars_core_sidebars_with_commas);
								
								foreach ($sidebars as $sidebar)
								{
									$sidebar_lowercase = strtolower($sidebar);
									$sidebar_id        = str_replace(" ", '_', $sidebar_lowercase); // Parameters: Old value, New value, String.
									
									$selected = "";
									
									if ($select_page_featured_area == $sidebar_id)
									{
										$selected = 'selected="selected"';
									}
									
									echo '<option ' . $selected . ' value="' . esc_attr($sidebar_id) . '">' . esc_html($sidebar) . '</option>';
								}
							}
						?>
					</select>
				</p>
				<p class="howto">
					<?php
						esc_html_e('Featured Area is a widget area like sidebars. So you can create new one from Appearance > Theme Options > Widget Areas.', 'pixelwars-core');
					?>
				</p>
				<p class="howto">
					<?php
						esc_html_e('Add Main Slider, Link Box or Intro widgets to your featured area. You can add many widgets to a featured area.', 'pixelwars-core');
					?>
				</p>
			</div>
		<?php
	}
	
	
	function pixelwars_core_save_meta_box__featured_area($post_id)
	{
		if (! isset($_POST['pixelwars_core_meta_box_nonce__featured_area']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['pixelwars_core_meta_box_nonce__featured_area'];
		
		if (! wp_verify_nonce($nonce, 'pixelwars_core_meta_box__featured_area'))
        {
			return $post_id;
		}
		
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) 
        {
			return $post_id;
		}
		
		if ('page' == $_POST['post_type'])
		{
			if (! current_user_can('edit_page', $post_id))
			{
				return $post_id;
			}
		}
		else
		{
			if (! current_user_can('edit_post', $post_id))
			{
				return $post_id;
			}
		}
		
		update_post_meta($post_id, 'pixelwars_core_select_page_featured_area', $_POST['pixelwars_core_select_page_featured_area']);
	}
	
	add_action('save_post', 'pixelwars_core_save_meta_box__featured_area');
	
	
	function pixelwars_core_add_meta_boxes__featured_area()
	{
		add_meta_box(
			'pixelwars_core_add_meta_box__featured_area',
			esc_html__('Featured Area', 'pixelwars-core'),
			'pixelwars_core_meta_box__featured_area',
			array('page'),
			'side',
			'low'
		);
	}
	
	add_action('add_meta_boxes', 'pixelwars_core_add_meta_boxes__featured_area');


/* ============================================================================================================================================= */


	function pixelwars_core_featured_area()
	{
		return get_post_meta(get_the_ID(), 'pixelwars_core_select_page_featured_area', true);
	}

?>