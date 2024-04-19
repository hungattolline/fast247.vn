<?php

	function pixelwars_core_theme_custom_box_show_portfolio($post)
	{
		?>
			<?php
				wp_nonce_field('pixelwars_core_theme_custom_box_show_portfolio', 'pixelwars_core_theme_custom_box_nonce_portfolio');
			?>
			
			<h4><?php esc_html_e('Type', 'pixelwars-core'); ?></h4>
			<p>
				<?php
					$pf_type = get_option($post->ID . 'pf_type', 'Standard');
				?>
				<label><input type="radio" name="pf_type" <?php if ($pf_type == 'Standard')         { echo 'checked="checked"'; } ?> value="Standard"> <?php         esc_html_e('Standard', 'pixelwars-core'); ?></label>
				<br>
				<label><input type="radio" name="pf_type" <?php if ($pf_type == 'Lightbox Gallery') { echo 'checked="checked"'; } ?> value="Lightbox Gallery"> <?php esc_html_e('Lightbox Gallery', 'pixelwars-core'); ?></label>
				<br>
				<label><input type="radio" name="pf_type" <?php if ($pf_type == 'Lightbox Audio')   { echo 'checked="checked"'; } ?> value="Lightbox Audio"> <?php   esc_html_e('Lightbox Audio', 'pixelwars-core'); ?></label>
				<br>
				<label><input type="radio" name="pf_type" <?php if ($pf_type == 'Lightbox Video')   { echo 'checked="checked"'; } ?> value="Lightbox Video"> <?php   esc_html_e('Lightbox Video', 'pixelwars-core'); ?></label>
				<br>
				<label><input type="radio" name="pf_type" <?php if ($pf_type == 'Direct URL')       { echo 'checked="checked"'; } ?> value="Direct URL"> <?php       esc_html_e('Direct URL', 'pixelwars-core'); ?></label>
			</p>
			<p>
				<?php
					$pf_direct_url   = get_option($post->ID . 'pf_direct_url');
					$pf_link_new_tab = get_option($post->ID . 'pf_link_new_tab', true);
				?>
				
				<label for="pf_direct_url"><?php esc_html_e('URL', 'pixelwars-core'); ?></label>
				
				<input type="text" id="pf_direct_url" name="pf_direct_url" class="widefat code2" placeholder="http://" value="<?php echo esc_url($pf_direct_url); ?>">
				
				<label><input type="checkbox" name="pf_link_new_tab" <?php if ($pf_link_new_tab != false) { echo 'checked="checked"'; } ?>> <?php echo esc_html__('Open link in new tab', 'pixelwars-core'); ?></label>
			</p>
		<?php
	}
	
	
	function pixelwars_theme_custom_box_add_portfolio()
	{
		add_meta_box(
			'pixelwars_theme_custom_box_portfolio',
			esc_html__('Details', 'pixelwars-core'),
			'pixelwars_core_theme_custom_box_show_portfolio',
			'portfolio',
			'side',
			'low'
		);
	}
	
	add_action('add_meta_boxes', 'pixelwars_theme_custom_box_add_portfolio');


/* ============================================================================================================================================= */


	function pixelwars_core_theme_custom_box_save_portfolio($post_id)
	{
		if (! isset($_POST['pixelwars_core_theme_custom_box_nonce_portfolio']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['pixelwars_core_theme_custom_box_nonce_portfolio'];
		
		if (! wp_verify_nonce($nonce, 'pixelwars_core_theme_custom_box_show_portfolio'))
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
		
		update_option($post_id . 'pf_type',         $_POST['pf_type']);
		update_option($post_id . 'pf_direct_url',   $_POST['pf_direct_url']);
		update_option($post_id . 'pf_link_new_tab', $_POST['pf_link_new_tab']);
	}
	
	add_action('save_post', 'pixelwars_core_theme_custom_box_save_portfolio');

?>