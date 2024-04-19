<?php
/*
Template Name: Full width
*/


	get_header();
	
	logistica_core_featured_area();
?>

<div id="main" class="site-main">
	<div class="layout-full">
		<div id="primary" class="content-area <?php logistica_singular_sidebar_class(); ?>">
			<div id="content" class="site-content" role="main">
				<?php
					while (have_posts()) : the_post();
						?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="hentry-wrap">
									<div class="post-header page-header post-header-classic">
										<header class="entry-header" <?php logistica_core_title_visibility(); ?>>
											<?php
												the_title('<h1 class="entry-title">', '</h1>');
											?>
										</header> <!-- .entry-header -->
									</div> <!-- .post-header .page-header .post-header-classic -->
									<?php
										if (has_post_thumbnail())
										{
											?>
												<div class="featured-image">
													<?php
														the_post_thumbnail('logistica_image_size_7');
													?>
												</div> <!-- .featured-image -->
											<?php
										}
									?>
									<div class="entry-content">
										<?php
											logistica_content();
										?>
									</div> <!-- .entry-content -->
								</div> <!-- .hentry-wrap -->
							</article>
							<?php
								comments_template("", true);
							?>
						<?php
					endwhile;
				?>
			</div> <!-- #content .site-content -->
		</div> <!-- #primary .content-area -->
		
		<?php
			logistica_singular_sidebar();
		?>
	</div> <!-- .layout-full -->
</div> <!-- #main .site-main -->

<?php

	get_footer();
