<?php
/*
Template Name: Latest Posts
*/


	get_header();
	
	logistica_core_featured_area();
?>

<div id="main" class="site-main">
	<div class="<?php logistica_singular_layout_class(); ?>">
		<div id="primary" class="content-area <?php logistica_singular_sidebar_class(); ?>">
			<div id="content" class="site-content" role="main">
				<?php
					while (have_posts()) : the_post();
						?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<?php
									if (has_post_thumbnail())
									{
										?>
											<div class="featured-image">
												<?php
													the_post_thumbnail('logistica_image_size_1');
												?>
											</div> <!-- .featured-image -->
										<?php
									}
								?>
								<div class="entry-content">
									<?php
										logistica_content();
										
										
										$logistica_query = new WP_Query(
											array(
												'post_type'      => 'post',
												'posts_per_page' => 5
											)
										);
										
										if ($logistica_query->have_posts()) :
											?>
												<h3 class="widget-title section-title">
													<span><?php esc_html_e('Latest From The Blog', 'logistica'); ?></span>
												</h3> <!-- .widget-title .section-title -->
												
												<div class="blog-simple">
													<?php
														while ($logistica_query->have_posts()) : $logistica_query->the_post();
															?>
																<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
																	<div class="hentry-left">
																		<div class="entry-date">
																			<span class="day">
																				<?php
																					echo get_the_date('d');
																				?>
																			</span>
																			<span class="month">
																				<?php
																					echo get_the_date('M');
																				?>
																			</span>
																			<span class="year">
																				<?php
																					echo get_the_date('Y');
																				?>
																			</span>
																		</div> <!-- .entry-date -->
																		<?php
																			if (has_post_thumbnail())
																			{
																				$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'logistica_image_size_5');
																				
																				?>
																					<div class="featured-image" style="background-image: url(<?php echo esc_url($feat_img[0]); ?>);"></div> <!-- .featured-image -->
																				<?php
																			}
																		?>
																	</div> <!-- .hentry-left -->
																	<div class="hentry-middle">
																		<h2 class="entry-title">
																			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
																		</h2> <!-- .entry-title -->
																	</div> <!-- .hentry-middle -->
																	<a class="post-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <!-- .post-link -->
																</article>
															<?php
														endwhile;
													?>
												</div> <!-- .blog-simple -->
											<?php
										endif;
										wp_reset_postdata();
									?>
									
									<?php
										logistica_blog_page_link();
									?>
								</div> <!-- .entry-content -->
							</article>
						<?php
					endwhile;
				?>
			</div> <!-- #content .site-content -->
		</div> <!-- #primary .content-area -->
		
		<?php
			logistica_singular_sidebar();
		?>
	</div> <!-- .layout -->
</div> <!-- #main .site-main -->

<?php

	get_footer();
