<?php

	function pixelwars_core_meta_box__title_visibility($post)
	{
		?>
			<?php
				wp_nonce_field(
					'pixelwars_core_meta_box__title_visibility',
					'pixelwars_core_meta_box_nonce__title_visibility'
				);
			?>
			<p>
				<?php
					$title_visibility = get_post_meta(get_the_ID(), 'pixelwars_core_title_visibility', true);
				?>
				<label for="pixelwars_core_title_visibility">
					<input type="checkbox" id="pixelwars_core_title_visibility" name="pixelwars_core_title_visibility" <?php if ($title_visibility) { echo 'checked="checked"'; } ?>>
					
					<?php esc_html_e('Hide Title', 'pixelwars-core'); ?>
				</label>
			</p>
		<?php
	}
	
	
	function pixelwars_core_save_meta_box__title_visibility($post_id)
	{
		if (! isset($_POST['pixelwars_core_meta_box_nonce__title_visibility']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['pixelwars_core_meta_box_nonce__title_visibility'];
		
		if (! wp_verify_nonce($nonce, 'pixelwars_core_meta_box__title_visibility'))
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
		
		update_post_meta($post_id, 'pixelwars_core_title_visibility', $_POST['pixelwars_core_title_visibility']);
	}
	
	add_action('save_post', 'pixelwars_core_save_meta_box__title_visibility');
	
	
	function pixelwars_core_add_meta_boxes__title_visibility()
	{
		add_meta_box(
			'pixelwars_core_add_meta_box__title_visibility',
			esc_html__('Title Visibility', 'pixelwars-core'),
			'pixelwars_core_meta_box__title_visibility',
			array('page'),
			'side',
			'high'
		);
	}
	
	add_action('add_meta_boxes', 'pixelwars_core_add_meta_boxes__title_visibility');


/* ============================================================================================================================================= */


	function pixelwars_core_title_visibility()
	{
		$title_visibility = get_post_meta(get_the_ID(), 'pixelwars_core_title_visibility', true);
		
		if ($title_visibility)
		{
			echo 'style="display: none;"';
		}
	}

?>