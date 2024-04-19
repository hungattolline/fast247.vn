<?php
	get_header();
	
	logistica_core_featured_area();
?>

<div id="main" class="site-main">
	<div class="layout-medium">
		<div id="primary" class="content-area <?php logistica_blog_sidebar_class(); ?>">
			<div id="content" class="site-content" role="main">
				<?php
					logistica_archive_title();
				?>
				<div class="blog-stream blog-list blog-circles blog-small">
					<?php
						if (have_posts()) :
							while (have_posts()) : the_post();
								?>
									<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										<?php
											if (has_post_thumbnail())
											{
												$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'logistica_image_size_3');
												
												?>
													<div class="featured-image" style="background-image: url(<?php echo esc_url($feat_img[0]); ?>);">
														<a href="<?php the_permalink(); ?>">
															<?php
																the_post_thumbnail('logistica_image_size_3');
															?>
														</a>
													</div>
												<?php
											}
										?>
										<div class="hentry-middle">
											<header class="entry-header">
												<?php
													logistica_meta('above_title');
												?>
												<h2 class="entry-title">
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h2>
												<?php
													logistica_meta('below_title');
												?>
											</header> <!-- .entry-header -->
											<div class="entry-content">
												<?php
													logistica_content();
												?>
											</div> <!-- .entry-content -->
											<?php
												logistica_meta('below_content');
											?>
										</div> <!-- .hentry-middle -->
									</article>
								<?php
							endwhile;
						else :
						
							logistica_content_none();
						
						endif;
					?>
				</div> <!-- .blog-stream .blog-list .blog-circles .blog-small -->
				<?php
					logistica_blog_navigation();
				?>
			</div> <!-- #content .site-content -->
		</div> <!-- #primary .content-area -->
		<?php
			logistica_blog_sidebar();
		?>
	</div> <!-- .layout-medium -->
</div> <!-- #main .site-main -->

<?php

	get_footer();
