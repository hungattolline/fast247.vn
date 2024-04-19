<?php

	function pixelwars_core_meta_box__sidebar($post)
	{
		?>
			<div class="admin-inside-box">
				<?php
					wp_nonce_field(
						'pixelwars_core_meta_box__sidebar',
						'pixelwars_core_meta_box_nonce__sidebar'
					);
				?>
				<p>
					<label for="pixelwars_core_select_page_sidebar"><?php esc_html_e('Select Sidebar:', 'pixelwars-core'); ?></label>
					<br>
					<?php
						$select_page_sidebar = get_post_meta(get_the_ID(), 'pixelwars_core_select_page_sidebar', true);
					?>
					<select id="pixelwars_core_select_page_sidebar" name="pixelwars_core_select_page_sidebar">
						<?php
							$current_screen = get_current_screen();
							
							if (($current_screen->id === 'post') || ($current_screen->id === 'portfolio') || ($current_screen->id === 'lp_course'))
							{
								$select_page_sidebar = get_post_meta(get_the_ID(), 'pixelwars_core_select_page_sidebar', true);
								
								?>
									<option <?php if ($select_page_sidebar == 'inherit') { echo 'selected="selected"'; } ?> value="inherit"><?php esc_html_e('Inherit from Customizer', 'pixelwars-core'); ?></option>
								<?php
							}
						?>
						<option <?php if ($select_page_sidebar == 'No Sidebar')                                    { echo 'selected="selected"'; } ?> value="No Sidebar"><?php                                esc_html_e('No Sidebar', 'pixelwars-core'); ?></option>
						<option <?php if ($select_page_sidebar == 'pixelwars_core_sidebar__blog_sidebar')          { echo 'selected="selected"'; } ?> value="pixelwars_core_sidebar__blog_sidebar"><?php      esc_html_e('Blog Sidebar', 'pixelwars-core'); ?></option>
						<option <?php if ($select_page_sidebar == 'pixelwars_core_sidebar__post_sidebar')          { echo 'selected="selected"'; } ?> value="pixelwars_core_sidebar__post_sidebar"><?php      esc_html_e('Post Sidebar', 'pixelwars-core'); ?></option>
						<option <?php if ($select_page_sidebar == 'pixelwars_core_sidebar__page_sidebar')          { echo 'selected="selected"'; } ?> value="pixelwars_core_sidebar__page_sidebar"><?php      esc_html_e('Page Sidebar', 'pixelwars-core'); ?></option>
						<option <?php if ($select_page_sidebar == 'pixelwars_core_sidebar__portfolio_sidebar')     { echo 'selected="selected"'; } ?> value="pixelwars_core_sidebar__portfolio_sidebar"><?php esc_html_e('Portfolio Sidebar', 'pixelwars-core'); ?></option>
						<option <?php if ($select_page_sidebar == 'pixelwars_core_sidebar__shop_sidebar')          { echo 'selected="selected"'; } ?> value="pixelwars_core_sidebar__shop_sidebar"><?php      esc_html_e('Shop Sidebar', 'pixelwars-core'); ?></option>
						<option <?php if ($select_page_sidebar == 'pixelwars_core_sidebar__course_sidebar')        { echo 'selected="selected"'; } ?> value="pixelwars_core_sidebar__course_sidebar"><?php    esc_html_e('Course Sidebar', 'pixelwars-core'); ?></option>
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
									
									if ($select_page_sidebar == $sidebar_id)
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
						if ($current_screen->id === 'post')
						{
							esc_html_e('Inherit from Customizer: Appearance > Customize > Sidebar > Post Sidebar.', 'pixelwars-core');
						}
						elseif ($current_screen->id === 'portfolio')
						{
							esc_html_e('Inherit from Customizer: Appearance > Customize > Sidebar > Portfolio Post Sidebar.', 'pixelwars-core');
						}
						elseif ($current_screen->id === 'lp_course')
						{
							esc_html_e('Inherit from Customizer: Appearance > Customize > Sidebar > Course Sidebar.', 'pixelwars-core');
						}
					?>
				</p>
				<p class="howto">
					<?php
						esc_html_e('- Sidebar is a widget area. You can find all available sidebars in your Widgets page under Appearance menu and Widgets section in Customizer.', 'pixelwars-core');
					?>
				</p>
				<p class="howto">
					<?php
						esc_html_e('- Also you can create new sidebars from Appearance > Theme Options > Widget Areas.', 'pixelwars-core');
					?>
				</p>
			</div>
		<?php
	}
	
	
	function pixelwars_core_save_meta_box__sidebar($post_id)
	{
		if (! isset($_POST['pixelwars_core_meta_box_nonce__sidebar']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['pixelwars_core_meta_box_nonce__sidebar'];
		
		if (! wp_verify_nonce($nonce, 'pixelwars_core_meta_box__sidebar'))
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
		
		update_post_meta($post_id, 'pixelwars_core_select_page_sidebar', $_POST['pixelwars_core_select_page_sidebar']);
	}
	
	add_action('save_post', 'pixelwars_core_save_meta_box__sidebar');
	
	
	function pixelwars_core_add_meta_boxes__sidebar()
	{
		$post_types = get_post_types();
		unset($post_types['attachment']);
		
		add_meta_box(
			'pixelwars_core_add_meta_box__sidebar',
			esc_html__('Sidebar', 'pixelwars-core'),
			'pixelwars_core_meta_box__sidebar',
			$post_types,
			'side',
			'low'
		);
	}
	
	add_action('add_meta_boxes', 'pixelwars_core_add_meta_boxes__sidebar');


/* ============================================================================================================================================= */


	function pixelwars_core_sidebar($post_id = "")
	{
		return get_post_meta($post_id, 'pixelwars_core_select_page_sidebar', true);
	}

?>