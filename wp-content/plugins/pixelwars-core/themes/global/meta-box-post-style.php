<?php

	function pixelwars_core_meta_box__post_style($post)
	{
		?>
			<div class="admin-inside-box">
				<?php
					wp_nonce_field(
						'pixelwars_core_meta_box__post_style',
						'pixelwars_core_meta_box_nonce__post_style'
					);
				?>
				<p>
					<?php
						$post_style_label = esc_html__('Select Post Style:', 'pixelwars-core');
						$current_screen   = get_current_screen();
						
						if ($current_screen->id === 'page')
						{
							$post_style_label = esc_html__('Select Page Style:', 'pixelwars-core');
						}
					?>
					<label for="pixelwars_core_post_style"><?php echo esc_html($post_style_label); ?></label>
					<br>
					<?php
						$post_style = get_post_meta(get_the_ID(), 'pixelwars_core_post_style', true);
					?>
					<select id="pixelwars_core_post_style" name="pixelwars_core_post_style">
						<option <?php if ($post_style == 'inherit')                                                     { echo 'selected="selected"'; } ?> value="inherit"><?php                                                     esc_html_e('Inherit from Customizer', 'pixelwars-core'); ?></option>
						<option <?php if ($post_style == 'post-header-classic')                                         { echo 'selected="selected"'; } ?> value="post-header-classic"><?php                                         esc_html_e('Classic', 'pixelwars-core'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-medium')                                { echo 'selected="selected"'; } ?> value="is-top-content-single-medium"><?php                                esc_html_e('Classic Medium', 'pixelwars-core'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-medium with-parallax')                  { echo 'selected="selected"'; } ?> value="is-top-content-single-medium with-parallax"><?php                  esc_html_e('Classic Medium Parallax', 'pixelwars-core'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-full')                                  { echo 'selected="selected"'; } ?> value="is-top-content-single-full"><?php                                  esc_html_e('Classic Full', 'pixelwars-core'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-full with-parallax')                    { echo 'selected="selected"'; } ?> value="is-top-content-single-full with-parallax"><?php                    esc_html_e('Classic Full Parallax', 'pixelwars-core'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-full-margins')                          { echo 'selected="selected"'; } ?> value="is-top-content-single-full-margins"><?php                          esc_html_e('Classic Full with Margins', 'pixelwars-core'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-full-margins with-parallax')            { echo 'selected="selected"'; } ?> value="is-top-content-single-full-margins with-parallax"><?php            esc_html_e('Classic Full with Margins Parallax', 'pixelwars-core'); ?></option>
						<option <?php if ($post_style == 'post-header-overlay post-header-overlay-inline is-post-dark') { echo 'selected="selected"'; } ?> value="post-header-overlay post-header-overlay-inline is-post-dark"><?php esc_html_e('Overlay', 'pixelwars-core'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-medium with-overlay')                   { echo 'selected="selected"'; } ?> value="is-top-content-single-medium with-overlay"><?php                   esc_html_e('Overlay Medium', 'pixelwars-core'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-full with-overlay')                     { echo 'selected="selected"'; } ?> value="is-top-content-single-full with-overlay"><?php                     esc_html_e('Overlay Full', 'pixelwars-core'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-full-margins with-overlay')             { echo 'selected="selected"'; } ?> value="is-top-content-single-full-margins with-overlay"><?php             esc_html_e('Overlay Full with Margins', 'pixelwars-core'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-full-screen with-overlay')              { echo 'selected="selected"'; } ?> value="is-top-content-single-full-screen with-overlay"><?php              esc_html_e('Overlay Fullscreen', 'pixelwars-core'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-medium with-title-full')                { echo 'selected="selected"'; } ?> value="is-top-content-single-medium with-title-full"><?php                esc_html_e('Title Full', 'pixelwars-core'); ?></option>
						<option <?php if ($post_style == 'post-header-classic is-featured-image-left')                  { echo 'selected="selected"'; } ?> value="post-header-classic is-featured-image-left"><?php                  esc_html_e('Image Left', 'pixelwars-core'); ?></option>
						<option <?php if ($post_style == 'post-header-classic is-featured-image-right')                 { echo 'selected="selected"'; } ?> value="post-header-classic is-featured-image-right"><?php                 esc_html_e('Image Right', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p class="howto">
					<?php
						if ($current_screen->id === 'page')
						{
							esc_html_e('Inherit from Customizer: Appearance > Customize > Pages > Page Style.', 'pixelwars-core');
						}
						elseif ($current_screen->id === 'post')
						{
							esc_html_e('Inherit from Customizer: Appearance > Customize > Single Post > Post Style.', 'pixelwars-core');
						}
						else
						{
							esc_html_e('Inherit from Customizer: Appearance > Customize > Portfolio > Post Style.', 'pixelwars-core');
						}
					?>
					<br>
					<br>
					<?php
						esc_html_e('- Classic style applies if there is no featured media.', 'pixelwars-core');
					?>
					<br>
					<?php
						esc_html_e('- Image Left and Image Right layouts display as classic style when featured video is present.', 'pixelwars-core');
					?>
				</p>
			</div>
		<?php
	}
	
	
	function pixelwars_core_save_meta_box__post_style($post_id)
	{
		if (! isset($_POST['pixelwars_core_meta_box_nonce__post_style']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['pixelwars_core_meta_box_nonce__post_style'];
		
		if (! wp_verify_nonce($nonce, 'pixelwars_core_meta_box__post_style'))
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
		
		update_post_meta($post_id, 'pixelwars_core_post_style', $_POST['pixelwars_core_post_style']);
	}
	
	add_action('save_post', 'pixelwars_core_save_meta_box__post_style');
	
	
	function pixelwars_core_add_meta_boxes__post_style()
	{
		$meta_box_title = esc_html__('Post Style', 'pixelwars-core');
		$current_screen = get_current_screen();
		
		if ($current_screen->id === 'page')
		{
			$meta_box_title = esc_html__('Page Style', 'pixelwars-core');
		}
		
		$post_types = get_post_types();
		unset($post_types['attachment']);
		
		add_meta_box(
			'pixelwars_core_add_meta_box__post_style',
			$meta_box_title,
			'pixelwars_core_meta_box__post_style',
			$post_types,
			'side',
			'high'
		);
	}
	
	add_action('add_meta_boxes', 'pixelwars_core_add_meta_boxes__post_style');


/* ============================================================================================================================================= */


	function pixelwars_core_post_style()
	{
		return get_post_meta(get_the_ID(), 'pixelwars_core_post_style', true); // Get post style class. (edit screen)
	}

?>