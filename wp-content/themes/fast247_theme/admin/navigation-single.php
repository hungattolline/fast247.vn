<?php

	if (! function_exists('logistica_single_navigation_html'))
	{
		function logistica_single_navigation_html()
		{
			if (wp_attachment_is_image())
			{
				?>
					<nav class="nav-single">
						<div class="nav-previous">
							<div class="nav-desc">
								<?php
									previous_image_link(
										false,
										'<span class="meta-nav">&#8592;</span>' . esc_html__('Previous Image', 'logistica')
									);
								?>
							</div> <!-- .nav-desc -->
						</div> <!-- .nav-previous -->
						<div class="nav-next">
							<div class="nav-desc">
								<?php
									next_image_link(
										false,
										esc_html__('Next Image', 'logistica') . '<span class="meta-nav">&#8594;</span>'
									);
								?>
							</div> <!-- .nav-desc -->
						</div> <!-- .nav-next -->
					</nav> <!-- .nav-single -->
				<?php
			}
			else
			{
				$previous_post_link = get_previous_post_link();
				$next_post_link     = get_next_post_link();
				
				if (($previous_post_link != "") || ($next_post_link != ""))
				{
					$previous_post = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
					$next_post     = get_adjacent_post(false, '', false);
					
					?>
						<nav class="nav-single">
							<?php
								if ($previous_post_link != "")
								{
									?>
										<div class="nav-previous">
											<?php
												if ($previous_post &&  has_post_thumbnail($previous_post->ID))
												{
													$feat_img     = wp_get_attachment_image_src(get_post_thumbnail_id($previous_post->ID), 'logistica_image_size_5');
													$feat_img_alt = get_post_meta(get_post_thumbnail_id($previous_post->ID), '_wp_attachment_image_alt', true);
													
													?>
														<a class="nav-image-link" href="<?php echo get_permalink($previous_post->ID); ?>">
															<img alt="<?php echo esc_attr($feat_img_alt); ?>" src="<?php echo esc_url($feat_img[0]); ?>">
														</a> <!-- .nav-image-link -->
													<?php
												}
												
												previous_post_link(
													'<div class="nav-desc"><h4>' . esc_html__('Previous Post', 'logistica') . '</h4>%link</div>',
													'<span class="meta-nav">&#8592;</span> %title'
												);
												
												if ($previous_post)
												{
													?>
														<a class="nav-overlay-link" href="<?php echo get_permalink($previous_post->ID); ?>" rel="prev">
															<?php
																echo esc_html($previous_post->post_title);
															?>
														</a> <!-- .nav-overlay-link -->
													<?php
												}
											?>
										</div> <!-- .nav-previous -->
									<?php
								}
							?>
							
							<?php
								if ($next_post_link != "")
								{
									?>
										<div class="nav-next">
											<?php
												if ($next_post && has_post_thumbnail($next_post->ID))
												{
													$feat_img     = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID), 'logistica_image_size_5');
													$feat_img_alt = get_post_meta(get_post_thumbnail_id($next_post->ID), '_wp_attachment_image_alt', true);
													
													?>
														<a class="nav-image-link" href="<?php echo get_permalink($next_post->ID); ?>">
															<img alt="<?php echo esc_attr($feat_img_alt); ?>" src="<?php echo esc_url($feat_img[0]); ?>">
														</a> <!-- .nav-image-link -->
													<?php
												}
												
												next_post_link(
													'<div class="nav-desc"><h4>' . esc_html__('Next Post', 'logistica') . '</h4>%link</div>',
													'%title <span class="meta-nav">&#8594;</span>'
												);
												
												if ($next_post)
												{
													?>
														<a class="nav-overlay-link" href="<?php echo get_permalink($next_post->ID); ?>" rel="next">
															<?php
																echo esc_html($next_post->post_title);
															?>
														</a> <!-- .nav-overlay-link -->
													<?php
												}
											?>
										</div> <!-- .nav-next -->
									<?php
								}
							?>
						</nav> <!-- .nav-single -->
					<?php
				}
			}
		}
	}
	
	
	if (! function_exists('logistica_single_navigation'))
	{
		function logistica_single_navigation()
		{
			$post_navigation = get_theme_mod('logistica_setting_post_navigation', 'Yes');
			
			if ($post_navigation != 'No')
			{
				logistica_single_navigation_html();
			}
		}
	}
