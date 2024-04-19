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
				<div class="blog-stream blog-regular">
					<?php
						if (have_posts()) :
							
							while (have_posts()) : the_post();
							
								?>
									<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
										<?php
											logistica_featured_media__layout_regular();
										?>
										<div class="entry-content">
											<?php
												logistica_content();
											?>
										</div> <!-- .entry-content -->
										<?php
											logistica_meta('below_content');
										?>
									</article>
								<?php
							endwhile;
						else :
						
							logistica_content_none();
						
						endif;
					?>
					<?php
						logistica_blog_navigation();
					?>
				</div> <!-- .blog-stream .blog-regular -->
			</div> <!-- #content .site-content -->
		</div> <!-- #primary .content-area -->
		
		<?php
			logistica_blog_sidebar();
		?>
	</div> <!-- .layout-medium -->
</div> <!-- #main .site-main -->

<?php

	get_footer();
