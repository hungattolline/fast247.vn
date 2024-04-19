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
					
					$logistica_1st_full = logistica_1st_full_yes_no();
				?>
				<div class="blog-grid-wrap">
					<div class="blog-stream blog-grid blog-small masonry <?php if ($logistica_1st_full == 'Yes') { echo 'first-full'; } ?>" data-layout="<?php echo logistica_blog_grid_type(); ?>" data-item-width="<?php logistica_blog_grid_post_width(); ?>">
						<?php
							if (have_posts()) :
								while (have_posts()) : the_post();
									?>
										<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
											<div class="hentry-wrap">
												<?php
													if ($logistica_1st_full == 'Yes')
													{
														logistica_featured_media__layout_grid($first_full = 'Yes', logistica_blog_grid_type());
														$logistica_1st_full = 'No';
													}
													else
													{
														logistica_featured_media__layout_grid($first_full = 'No', logistica_blog_grid_type());
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
											</div> <!-- .hentry-wrap -->
										</article>
									<?php
								endwhile;
							else :
							
								logistica_content_none();
							
							endif;
						?>
					</div> <!-- .blog-stream .blog-grid .blog-small .masonry -->
				</div> <!-- .blog-grid-wrap -->
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
