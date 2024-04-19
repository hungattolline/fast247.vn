<?php

	function pixelwars_core_related_posts_html__style_classic($query)
	{
		if ($query->have_posts()) :
			?>
				<div class="related-posts">
					<h3 class="widget-title">
						<span><?php esc_html_e('You May Also Like', 'pixelwars-core'); ?></span>
					</h3> <!-- .widget-title -->
					
					<div class="blocks">
						<?php
							while ($query->have_posts()) : $query->the_post();
								?>
									<div class="block">
										<div class="related-post post-classic">
											<?php
												if (has_post_thumbnail())
												{
													?>
														<div class="featured-image">
															<a href="<?php the_permalink(); ?>">
																<?php
																	the_post_thumbnail('pixelwars_core_image_size_3');
																?>
															</a>
														</div> <!-- .featured-image -->
													<?php
												}
											?>
											<header class="entry-header">
												<div class="entry-meta">
													<span class="posted-on">
														<span class="prefix"><?php esc_html_e('on', 'pixelwars-core'); ?></span> <!-- .prefix -->
														
														<a href="<?php the_permalink(); ?>" rel="bookmark">
															<time class="entry-date published" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time> <!-- .entry-date .published -->
														</a>
													</span> <!-- .posted-on -->
												</div> <!-- .entry-meta -->
												
												<h2 class="entry-title">
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h2> <!-- .entry-title -->
											</header> <!-- .entry-header -->
										</div> <!-- .related-post .post-classic -->
									</div> <!-- .block -->
								<?php
							endwhile;
						?>
					</div> <!-- .blocks -->
				</div> <!-- .related-posts -->
			<?php
		endif;
		wp_reset_postdata();
	}


/* ============================================================================================================================================= */


	function pixelwars_core_related_posts_html__style_overlay($query)
	{
		if ($query->have_posts()) :
			?>
				<div class="related-posts">
					<h3 class="widget-title">
						<span><?php esc_html_e('You May Also Like', 'pixelwars-core'); ?></span>
					</h3> <!-- .widget-title -->
					
					<div class="blocks">
						<?php
							while ($query->have_posts()) : $query->the_post();
								?>
									<div class="block">
										<?php
											$featured_image_url = wp_get_attachment_image_url(get_post_thumbnail_id(), 'pixelwars_core_image_size_3');
										?>
										<div class="post-thumbnail" style="background-image: url(<?php echo esc_url($featured_image_url); ?>);">
											<div class="post-wrap">
												<header class="entry-header">
													<div class="entry-meta">
														<span class="cat-links"><?php the_category(' '); ?></span> <!-- .cat-links -->
													</div> <!-- .entry-meta -->
													
													<h2 class="entry-title">
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													</h2> <!-- .entry-title -->
													
													<a class="more-link" href="<?php the_permalink(); ?>"><?php esc_html_e('View Post', 'pixelwars-core'); ?></a> <!-- .more-link -->
												</header> <!-- .entry-header -->
											</div> <!-- .post-wrap -->
										</div> <!-- .post-thumbnail -->
									</div> <!-- .block -->
								<?php
							endwhile;
						?>
					</div> <!-- .blocks -->
				</div> <!-- .related-posts -->
			<?php
		endif;
		wp_reset_postdata();
	}


/* ============================================================================================================================================= */
/* ============================================================================================================================================= */


	function pixelwars_core_related_posts($related_posts_category, $orderby, $posts_per_page, $related_posts_style)
	{
		$current_post_id         = get_the_ID();
		$current_post_categories = ""; // Empty string for all categories of blog.
		
		if ($related_posts_category == 'same')
		{
			$current_post_categories = wp_get_post_categories($current_post_id, array('fields' => 'ids')); // Get current post categories. (categories ids only)
		}
		
		$current_post_tags = wp_get_post_tags($current_post_id, array('fields' => 'ids')); // Get current post tags. (tags ids only)
		$exclude_ids       = array($current_post_id); // Exclude only the current post.
		
		if (! empty($posts_per_page))
		{
			$posts_per_page = intval($posts_per_page);
		}
		else
		{
			$posts_per_page = 3;
		}
		
		$query = new WP_Query(
			array(
				'post_type'           => 'post',
				'ignore_sticky_posts' => true,
				'category__in'        => $current_post_categories,
				'tag__in'             => $current_post_tags,
				'post__not_in'        => $exclude_ids,
				'orderby'             => $orderby,
				'posts_per_page'      => $posts_per_page
			)
		);
		
		if ($related_posts_style == 'classic')
		{
			pixelwars_core_related_posts_html__style_classic($query);
		}
		else
		{
			pixelwars_core_related_posts_html__style_overlay($query);
		}
	}

?>