<?php

	function pixelwars_core_meta_box__header_style($post)
	{
		?>
			<div class="admin-inside-box">
				<?php
					wp_nonce_field(
						'pixelwars_core_meta_box__header_style',
						'pixelwars_core_meta_box_nonce__header_style'
					);
				?>
				<p>
					<?php
						$post_header_style_label = esc_html__('Select Post Header Style:', 'pixelwars-core');
						$current_screen          = get_current_screen();
						
						if ($current_screen->id === 'page')
						{
							$post_header_style_label = esc_html__('Select Page Header Style:', 'pixelwars-core');
						}
					?>
					<label for="pixelwars_core_header_style"><?php echo esc_html($post_header_style_label); ?></label>
					<br>
					<?php
						$post_header_style = get_post_meta(get_the_ID(), 'pixelwars_core_header_style', true);
					?>
					<select id="pixelwars_core_header_style" name="pixelwars_core_header_style">
						<option <?php if ($post_header_style == 'inherit')                                                                                                     { echo 'selected="selected"'; } ?> value="inherit"><?php                                                                                                     esc_html_e('Inherit from Customizer', 'pixelwars-core'); ?></option>
						<option <?php if ($post_header_style == 'is-header-style-default')                                                                                     { echo 'selected="selected"'; } ?> value="is-header-style-default"><?php                                                                                     esc_html_e('Default', 'pixelwars-core'); ?></option>
						<option <?php if ($post_header_style == 'is-header-float is-header-transparent')                                                                       { echo 'selected="selected"'; } ?> value="is-header-float is-header-transparent"><?php                                                                       esc_html_e('Transparent', 'pixelwars-core'); ?></option>
						<option <?php if ($post_header_style == 'is-header-float is-header-transparent is-header-float-margin')                                                { echo 'selected="selected"'; } ?> value="is-header-float is-header-transparent is-header-float-margin"><?php                                                esc_html_e('Transparent Margin', 'pixelwars-core'); ?></option>
						<option <?php if ($post_header_style == 'is-header-float is-header-transparent is-header-half-transparent')                                            { echo 'selected="selected"'; } ?> value="is-header-float is-header-transparent is-header-half-transparent"><?php                                            esc_html_e('Half Transparent', 'pixelwars-core'); ?></option>
						<option <?php if ($post_header_style == 'is-header-float is-header-transparent is-header-half-transparent is-header-float-box is-header-float-margin') { echo 'selected="selected"'; } ?> value="is-header-float is-header-transparent is-header-half-transparent is-header-float-box is-header-float-margin"><?php esc_html_e('Half Transparent Margin', 'pixelwars-core'); ?></option>
						<option <?php if ($post_header_style == 'is-header-float is-header-transparent-light')                                                                 { echo 'selected="selected"'; } ?> value="is-header-float is-header-transparent-light"><?php                                                                 esc_html_e('Transparent Light', 'pixelwars-core'); ?></option>
						<option <?php if ($post_header_style == 'is-header-float is-header-transparent-light is-header-float-margin')                                          { echo 'selected="selected"'; } ?> value="is-header-float is-header-transparent-light is-header-float-margin"><?php                                          esc_html_e('Transparent Light Margin', 'pixelwars-core'); ?></option>
						<option <?php if ($post_header_style == 'is-header-float is-header-float-box')                                                                         { echo 'selected="selected"'; } ?> value="is-header-float is-header-float-box"><?php                                                                         esc_html_e('Floating Box', 'pixelwars-core'); ?></option>
						<option <?php if ($post_header_style == 'is-header-float is-header-float-box is-header-float-margin')                                                  { echo 'selected="selected"'; } ?> value="is-header-float is-header-float-box is-header-float-margin"><?php                                                  esc_html_e('Floating Box Margin', 'pixelwars-core'); ?></option>
						<option <?php if ($post_header_style == 'is-header-float is-header-float-box is-header-float-box-menu')                                                { echo 'selected="selected"'; } ?> value="is-header-float is-header-float-box is-header-float-box-menu"><?php                                                esc_html_e('Floating Box Menu', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p class="howto">
					<?php
						if ($current_screen->id === 'page')
						{
							esc_html_e('Inherit from Customizer: Appearance > Customize > Pages > Page Header Style.', 'pixelwars-core');
						}
						elseif ($current_screen->id === 'post')
						{
							esc_html_e('Inherit from Customizer: Appearance > Customize > Single Post > Post Header Style.', 'pixelwars-core');
						}
						else
						{
							esc_html_e('Inherit from Customizer: Appearance > Customize > Portfolio > Post Header Style.', 'pixelwars-core');
						}
					?>
				</p>
			</div>
		<?php
	}
	
	
	function pixelwars_core_save_meta_box__header_style($post_id)
	{
		if (! isset($_POST['pixelwars_core_meta_box_nonce__header_style']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['pixelwars_core_meta_box_nonce__header_style'];
		
		if (! wp_verify_nonce($nonce, 'pixelwars_core_meta_box__header_style'))
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
		
		update_post_meta($post_id, 'pixelwars_core_header_style', $_POST['pixelwars_core_header_style']);
	}
	
	add_action('save_post', 'pixelwars_core_save_meta_box__header_style');
	
	
	function pixelwars_core_add_meta_boxes__header_style()
	{
		$meta_box_title = esc_html__('Post Header Style', 'pixelwars-core');
		$current_screen = get_current_screen();
		
		if ($current_screen->id === 'page')
		{
			$meta_box_title = esc_html__('Page Header Style', 'pixelwars-core');
		}
		
		$post_types = get_post_types();
		unset($post_types['attachment']);
		
		add_meta_box(
			'pixelwars_core_add_meta_box__header_style',
			$meta_box_title,
			'pixelwars_core_meta_box__header_style',
			$post_types,
			'side',
			'high'
		);
	}
	
	add_action('add_meta_boxes', 'pixelwars_core_add_meta_boxes__header_style');


/* ============================================================================================================================================= */


	function pixelwars_core_header_style()
	{
		$post_header_style = "";
		
		if (is_home()) // Blog page.
		{
			$blog_page_id      = get_option('page_for_posts'); // Reading Settings > Posts page: Blog.
			$post_header_style = get_post_meta($blog_page_id, 'pixelwars_core_header_style', true);
		}
		else // Pages, Posts, Custom Post Types.
		{
			$post_header_style = get_post_meta(get_the_ID(), 'pixelwars_core_header_style', true);
		}
		
		return $post_header_style;
	}

?>