<?php
	get_header();
	
	logistica_core_featured_area();
	
	while (have_posts()) : the_post();
	
	logistica_post_header($post_header_top = true); // Top header.
?>

<div id="main" class="site-main">
	<div class="<?php logistica_singular_layout_class(); ?>">
		<div id="primary" class="content-area <?php logistica_singular_sidebar_class(); ?>">
			<div id="content" class="site-content" role="main">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="hentry-wrap">
						<?php
							logistica_post_header($post_header_top = false); // Inline header.
						?>
						<div class="entry-content">
							<?php
								logistica_portfolio_item__format_chooser();
								logistica_content();
							?>
						</div> <!-- .entry-content -->
					</div> <!-- .hentry-wrap -->
					<?php
						if (is_singular('post'))
						{
							logistica_post_tags();
							logistica_meta('below_content');
							logistica_core_share_links();
						}
						
						if (is_singular('post') || is_singular('portfolio'))
						{
							logistica_single_navigation();
						}
						
						if (is_singular('post'))
						{
							logistica_about_author();
							logistica_core_related_posts();
						}
					?>
				</article> <!-- .post -->
				<?php
					comments_template("", true);
				?>
			</div> <!-- #content .site-content -->
		</div> <!-- #primary .content-area -->
<?php
	endwhile;
	
			logistica_singular_sidebar();
		?>
	</div> <!-- layout -->
</div> <!-- #main .site-main -->

<?php

	get_footer();
