<?php

	// For single portfolio posts.
	
	function logistica_portfolio_item__short_description()
	{
		if (has_excerpt())
		{
			?>
				<p>
					<?php
						echo get_the_excerpt();
					?>
				</p>
			<?php
		}
	}
	
	
	function logistica_portfolio_item__feat_img($linked_url = "")
	{
		if (! empty($linked_url))
		{
			$image_big = $linked_url;
			
			?>
				<figure class="wp-caption aligncenter">
					<a href="<?php echo esc_url($image_big); ?>">
						<?php
							the_post_thumbnail('logistica_image_size_7');
						?>
					</a>
					<?php
						if (has_excerpt())
						{
							?>
								<figcaption class="wp-caption-text">
									<?php
										echo get_the_excerpt();
									?>
								</figcaption>
							<?php
						}
					?>
				</figure>
			<?php
		}
		else
		{
			if (has_post_thumbnail())
			{
				?>
					<p>
						<?php
							the_post_thumbnail('logistica_image_size_7');
						?>
					</p>
				<?php
			}
		}
	}
	
	
	function logistica_portfolio_item__format_image()
	{
		if (has_post_thumbnail())
		{
			$image_big 				 = "";
			$feat_img_id 			 = get_post_thumbnail_id();
			$image_big_width_cropped = wp_get_attachment_image_src($feat_img_id, 'logistica_image_size_7'); // magnific-popup-width
			
			if ($image_big_width_cropped[1] > $image_big_width_cropped[2])
			{
				$image_big = $image_big_width_cropped[0];
			}
			else
			{
				$image_big_height_cropped = wp_get_attachment_image_src($feat_img_id, 'logistica_image_size_8'); // magnific-popup-height
				$image_big 				  = $image_big_height_cropped[0];
			}
			
			logistica_portfolio_item__feat_img($linked_url = $image_big);
		}
	}
	
	
	function logistica_portfolio_item__format_link()
	{
		$direct_url = logistica_core_featured_media__url();
		
		if (! empty($direct_url))
		{
			$new_tab = logistica_core_featured_media__new_tab();
			
			?>
				<p>
					<a class="button" <?php if ($new_tab != false) { echo 'target="_blank"'; } ?> href="<?php echo esc_url($direct_url); ?>">
						<?php
							esc_html_e('Go To Link', 'logistica');
						?>
					</a>
				</p>
			<?php
		}
	}
	
	
	function logistica_portfolio_item__format_audio_video()
	{
		$browser_address_url = logistica_core_featured_media__url();
		
		if (! empty($browser_address_url))
		{
			echo logistica_iframe_from_xml($browser_address_url);
		}
	}
	
	
	function logistica_portfolio_item__format_chooser()
	{
		if (is_singular('portfolio'))
		{
			if (has_post_format('audio') || has_post_format('video'))
			{
				logistica_portfolio_item__format_audio_video();
				logistica_portfolio_item__short_description();
			}
			elseif (has_post_format('link'))
			{
				logistica_portfolio_item__format_link();
				logistica_portfolio_item__short_description();
				logistica_portfolio_item__feat_img();
			}
			elseif (has_post_format('image'))
			{
				logistica_portfolio_item__format_image();
			}
			elseif (has_post_format('gallery'))
			{
				logistica_portfolio_item__short_description();
			}
		}
	}

?>