<?php

	function pixelwars_core_meta_box__gallery_type($post)
	{
		?>
			<div class="admin-inside-box">
				<?php
					wp_nonce_field(
						'pixelwars_core_meta_box__gallery_type',
						'pixelwars_core_meta_box_nonce__gallery_type'
					);
				?>
				<p>
					<label for="pixelwars_core_gallery_type"><?php esc_html_e('Select Gallery Type:', 'pixelwars-core'); ?></label>
					<br>
					<?php
						$gallery_type = get_post_meta(get_the_ID(), 'pixelwars_core_gallery_type', true);
					?>
					<select id="pixelwars_core_gallery_type" name="pixelwars_core_gallery_type" style="min-width: 100px;">
						<option <?php if ($gallery_type == 'grid')   { echo 'selected="selected"'; } ?> value="grid"><?php   esc_html_e('Grid', 'pixelwars-core'); ?></option>
						<option <?php if ($gallery_type == 'slider') { echo 'selected="selected"'; } ?> value="slider"><?php esc_html_e('Slider', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p class="howto">
					<?php
						esc_html_e('Add "Classic" block to your block editor. Use "Add Media" button of the Classic block to create a gallery.', 'pixelwars-core');
					?>
					<br>
					<br>
					<?php
						esc_html_e('To show gallery images in a lightbox, select "Grid" type then edit your gallery in content and choose "Link To: Media File" from gallery settings.', 'pixelwars-core');
					?>
				</p>
			</div>
		<?php
	}
	
	
	function pixelwars_core_save_meta_box__gallery_type($post_id)
	{
		if (! isset($_POST['pixelwars_core_meta_box_nonce__gallery_type']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['pixelwars_core_meta_box_nonce__gallery_type'];
		
		if (! wp_verify_nonce($nonce, 'pixelwars_core_meta_box__gallery_type'))
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
		
		update_post_meta($post_id, 'pixelwars_core_gallery_type', $_POST['pixelwars_core_gallery_type']);
	}
	
	add_action('save_post', 'pixelwars_core_save_meta_box__gallery_type');
	
	
	function pixelwars_core_add_meta_boxes__gallery_type()
	{
		add_meta_box(
			'pixelwars_core_add_meta_box__gallery_type',
			esc_html__('Gallery Type', 'pixelwars-core'),
			'pixelwars_core_meta_box__gallery_type',
			array('post', 'page', 'portfolio'),
			'side',
			'low'
		);
	}
	
	add_action('add_meta_boxes', 'pixelwars_core_add_meta_boxes__gallery_type');


/* ============================================================================================================================================= */


	function pixelwars_core_gallery_type()
	{
		return get_post_meta(get_the_ID(), 'pixelwars_core_gallery_type', true);
	}

?>