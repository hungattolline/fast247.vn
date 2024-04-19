<?php

	function pixelwars_core_meta_box__featured_media($post)
	{
		?>
			<?php
				wp_nonce_field(
					'pixelwars_core_meta_box__featured_media',
					'pixelwars_core_meta_box_nonce__featured_media'
				);
			?>
			<p>
				<label for="pixelwars_core_featured_media__url"><?php esc_html_e('URL', 'pixelwars-core'); ?></label>
				
				<?php
					$pixelwars_core_featured_media__url = get_post_meta(get_the_ID(), 'pixelwars_core_featured_media__url', true);
				?>
				<input type="text" id="pixelwars_core_featured_media__url" name="pixelwars_core_featured_media__url" class="widefat" value="<?php echo esc_url($pixelwars_core_featured_media__url); ?>">
				
				<?php
					$pixelwars_core_featured_media__new_tab = get_post_meta(get_the_ID(), 'pixelwars_core_featured_media__new_tab', true);
				?>
				<label id="pixelwars_core_featured_media__new_tab_label" for="pixelwars_core_featured_media__new_tab">
					<input type="checkbox" id="pixelwars_core_featured_media__new_tab" name="pixelwars_core_featured_media__new_tab" <?php if ($pixelwars_core_featured_media__new_tab) { echo 'checked="checked"'; } ?>> <?php esc_html_e('Open "Link" in new tab', 'pixelwars-core'); ?>
				</label>
			</p>
			
			<p class="howto">
				<?php
					$current_screen = get_current_screen();
					
					if ($current_screen->id === 'portfolio')
					{
						esc_html_e('Use this URL field for Audio, Video and Link formats.', 'pixelwars-core');
						?>
						<br>
						<br>
						<?php
							esc_html_e('Link: Enter your custom url.', 'pixelwars-core');
						?>
						<br>
						<br>
						<?php
							esc_html_e('Audio: Use browser address url of an audio from SoundCloud. This audio will be shown in a lightbox in your portfolio page.', 'pixelwars-core');
						?>
						<br>
						<br>
						<?php
						esc_html_e('Video: Use browser address url of a video from YouTube or Vimeo. This video will be shown in a lightbox in your portfolio page.', 'pixelwars-core');
					}
					else
					{
						esc_html_e('Audio: Just paste the browser address url of an audio from SoundCloud. This audio will be shown in place of featured image.', 'pixelwars-core');
						?>
						<br>
						<br>
						<?php
						esc_html_e('Video: Just paste the browser address url of a video from YouTube or Vimeo. This video will be shown in place of featured image.', 'pixelwars-core');
					}
				?>
			</p>
		<?php
	}
	
	
	function pixelwars_core_meta_box_save__featured_video($post_id)
	{
		if (! isset($_POST['pixelwars_core_meta_box_nonce__featured_media']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['pixelwars_core_meta_box_nonce__featured_media'];
		
		if (! wp_verify_nonce($nonce, 'pixelwars_core_meta_box__featured_media'))
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
		
		update_post_meta($post_id, 'pixelwars_core_featured_media__url', $_POST['pixelwars_core_featured_media__url']);
		update_post_meta($post_id, 'pixelwars_core_featured_media__new_tab', $_POST['pixelwars_core_featured_media__new_tab']);
	}
	
	add_action('save_post', 'pixelwars_core_meta_box_save__featured_video');
	
	
	function pixelwars_core_add_meta_boxes__featured_media()
	{
		$meta_box_title = esc_html__('Featured Audio/Video', 'theblogger');
		$current_screen = get_current_screen();
		
		if ($current_screen->id === 'portfolio')
		{
			$meta_box_title = esc_html__('Featured Audio/Video/Link', 'theblogger');
		}
		
		$post_types = get_post_types();
		unset($post_types['attachment']);
		
		add_meta_box(
			'pixelwars_core_add_meta_box__featured_media',
			$meta_box_title,
			'pixelwars_core_meta_box__featured_media',
			$post_types,
			'side',
			'low'
		);
	}
	
	add_action('add_meta_boxes', 'pixelwars_core_add_meta_boxes__featured_media');


/* ============================================================================================================================================= */


	function pixelwars_core_featured_media__url()
	{
		return get_post_meta(get_the_ID(), 'pixelwars_core_featured_media__url', true);
	}
	
	
	function pixelwars_core_featured_media__new_tab()
	{
		return get_post_meta(get_the_ID(), 'pixelwars_core_featured_media__new_tab', true);
	}
	
	
	function pixelwars_core_iframe_from_xml($browser_address_url)
	{
		$browser_address_url__type_youtube    = strpos($browser_address_url, 'youtube.com');
		$browser_address_url__type_vimeo      = strpos($browser_address_url, 'vimeo.com');
		$browser_address_url__type_soundcloud = strpos($browser_address_url, 'soundcloud.com');
		
		if ($browser_address_url__type_youtube !== false)
		{
			$xml_url 	   = 'https://www.youtube.com/oembed?url=' . $browser_address_url . '&format=xml';
			$xml_content   = simplexml_load_file($xml_url);
			$xml_attribute = $xml_content->html; // Get iframe.
			return $xml_attribute;
		}
		elseif ($browser_address_url__type_vimeo !== false)
		{
			$xml_url 	   = 'http://vimeo.com/api/oembed.xml?url=' . $browser_address_url;
			$xml_content   = simplexml_load_file($xml_url);
			$xml_attribute = $xml_content->html; // Get iframe.
			return $xml_attribute;
		}
		elseif ($browser_address_url__type_soundcloud !== false)
		{
			$xml_url 	   = 'http://soundcloud.com/oembed?url=' . $browser_address_url;
			$xml_content   = simplexml_load_file($xml_url);
			$xml_attribute = $xml_content->html; // Get iframe.
			return $xml_attribute;
		}
	}

?>