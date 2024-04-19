<?php

	function logistica_entry_header()
	{
		?>
			<header class="entry-header" <?php logistica_core_title_visibility(); ?>>
				<?php
					if (is_singular('post'))
					{
						logistica_meta('above_title');
					}
					
					the_title('<h1 class="entry-title">', '</h1>');
					
					if (is_singular('post'))
					{
						logistica_meta('below_title');
					}
					
					logistica_single_portfolio_meta();
				?>
			</header> <!-- .entry-header -->
		<?php
	}
	
	
	function logistica_featured_image($post_header_top, $parallax, $overlay)
	{
		if ($parallax)
		{
			?>
				<div class="post-thumbnail" style="background-image: url(<?php the_post_thumbnail_url('logistica_image_size_2'); ?>);" data-medium-image="<?php the_post_thumbnail_url('logistica_image_size_1'); ?>" data-large-image="<?php the_post_thumbnail_url('logistica_image_size_7'); ?>">
					<div class="post-wrap">
						<?php
							if ($overlay)
							{
								logistica_entry_header();
							}
						?>
						<span class="scrolldown"></span> <!-- .scrolldown -->
					</div> <!-- .post-wrap -->
				</div> <!-- .post-thumbnail -->
			<?php
		}
		else
		{
			if (has_post_thumbnail())
			{
				?>
					<div class="featured-image">
						<?php
							if (($post_header_top == 'is-top-content-single-medium') ||
								($post_header_top == 'is-top-content-single-full') ||
								($post_header_top == 'is-top-content-single-full-margins') ||
								($post_header_top == 'is-top-content-single-full-screen'))
							{
								the_post_thumbnail('logistica_image_size_7');
							}
							else
							{
								the_post_thumbnail('logistica_image_size_1');
							}
						?>
					</div> <!-- .featured-image -->
				<?php
			}
		}
	}
	
	
	function logistica_featured_video($browser_address_url, $parallax, $overlay)
	{
		if ($parallax)
		{
			?>
				<div class="post-thumbnail" data-parallax-video="<?php echo esc_url($browser_address_url); ?>">
					<div class="post-wrap">
						<?php
							if ($overlay)
							{
								logistica_entry_header();
							}
						?>
						<span class="scrolldown"></span> <!-- .scrolldown -->
					</div> <!-- .post-wrap -->
				</div> <!-- .post-thumbnail -->
			<?php
		}
		else
		{
			echo logistica_iframe_from_xml($browser_address_url);
		}
	}
	
	
	function logistica_featured_media($post_header_top, $post_header_inline, $featured_image_position, $where = "", $parallax = "", $overlay = "")
	{
		$browser_address_url = logistica_core_featured_media__url();
		$browser_address_url = trim($browser_address_url); // Strip whitespace (or other characters) from the beginning and end of the string.
		
		if (($where == $featured_image_position) || ($post_header_inline == 'is-top-content-single-medium with-title-full'))
		{
			if (($post_header_inline == 'post-header-classic is-featured-image-left') ||
				($post_header_inline == 'post-header-classic is-featured-image-right')) // Force for Image Left and Image Right.
			{
				if (has_post_thumbnail())
				{
					logistica_featured_image($post_header_top, $parallax, $overlay);
				}
				elseif (! empty($browser_address_url))
				{
					logistica_featured_video($browser_address_url, $parallax, $overlay);
				}
			}
			elseif (! empty($browser_address_url))
			{
				logistica_featured_video($browser_address_url, $parallax, $overlay);
			}
			else
			{
				logistica_featured_image($post_header_top, $parallax, $overlay);
			}
		}
	}
	
	
	function logistica_post_header__content($post_header_top, $post_header_inline, $featured_image_position, $parallax, $overlay, $only_title, $only_media)
	{
		$post_header_inline_out = $post_header_inline;
		
		if (((($post_header_inline == 'post-header-classic is-featured-image-left') || ($post_header_inline == 'post-header-classic is-featured-image-right')) && (! has_post_thumbnail())) ||
			  ($post_header_inline == 'is-top-content-single-medium with-title-full')) // Force for: Image Left, Image Right and Title Full.
		{
			$post_header_inline_out = 'post-header-classic';
		}
		
		$category_link_style = logistica_category_link_style();
		
		?>
			<div class="post-header <?php echo esc_attr($post_header_inline_out); ?> <?php echo esc_attr($category_link_style); ?>">
				<?php
					if ($parallax)
					{
						if ((! $overlay) && ($featured_image_position != 'above_title'))
						{
							logistica_entry_header();
						}
						
						logistica_featured_media(
							$post_header_top,
							$post_header_inline,
							$featured_image_position,
							$where = $featured_image_position,
							$parallax,
							$overlay
						);
					}
					else
					{
						if ($only_title)
						{
							logistica_entry_header();
						}
						elseif ($only_media)
						{
							logistica_featured_media(
								$post_header_top,
								$post_header_inline,
								$featured_image_position,
								$where = $featured_image_position,
								$parallax,
								$overlay
							);
						}
						else
						{
							if (($post_header_inline == 'post-header-classic is-featured-image-left') ||
								($post_header_inline == 'post-header-classic is-featured-image-right')) // Force for Image Left and Image Right.
							{
								logistica_entry_header();
								logistica_featured_media(
									$post_header_top,
									$post_header_inline,
									$featured_image_position,
									$where = $featured_image_position,
									$parallax,
									$overlay
								);
							}
							else
							{
								logistica_featured_media(
									$post_header_top,
									$post_header_inline,
									$featured_image_position,
									$where = 'above_title',
									$parallax,
									$overlay
								);
								logistica_entry_header();
								logistica_featured_media(
									$post_header_top,
									$post_header_inline,
									$featured_image_position,
									$where = 'below_title',
									$parallax,
									$overlay
								);
							}
						}
					}
				?>
			</div> <!-- .post-header -->
		<?php
	}
	
	
	function logistica_post_header__inline($post_header_top, $post_header_inline, $featured_image_position, $parallax, $overlay, $only_title, $only_media)
	{
		logistica_post_header__content(
			$post_header_top,
			$post_header_inline,
			$featured_image_position,
			$parallax,
			$overlay,
			$only_title,
			$only_media
		);
	}
	
	
	function logistica_post_header__top($post_header_top, $post_header_inline, $featured_image_position, $parallax, $overlay, $only_title, $only_media)
	{
		?>
			<section class="top-content-single <?php echo esc_attr($post_header_top); ?>">
				<div class="layout-medium">
					<?php
						logistica_post_header__content(
							$post_header_top,
							$post_header_inline,
							$featured_image_position,
							$parallax,
							$overlay,
							$only_title,
							$only_media
						);
					?>
				</div> <!-- .layout-medium -->
			</section> <!-- .top-content-single -->
		<?php
	}
	
	
	function logistica_post_header__inline_chooser($post_style, $post_header_top, $featured_image_position, $only_title, $only_media)
	{
		switch ($post_style)
		{
			case 'post-header-classic':
			case 'post-header-classic is-featured-image-left':
			case 'post-header-classic is-featured-image-right':
			case 'is-top-content-single-medium with-title-full':
			
				logistica_post_header__inline(
					$post_header_top,
					$post_header_inline = $post_style,
					$featured_image_position,
					$parallax = false,
					$overlay  = false,
					$only_title,
					$only_media
				); // POST STYLE: Classic, Image Left, Image Right, Title Full.
			
			break;
			
			case 'post-header-overlay post-header-overlay-inline is-post-dark':
			
				logistica_post_header__inline(
					$post_header_top,
					$post_header_inline = $post_style,
					$featured_image_position,
					$parallax = true,
					$overlay  = true,
					$only_title,
					$only_media
				); // POST STYLE: Overlay.
			
			break;
		}
	}
	
	
	function logistica_post_header__top_chooser($post_style, $post_header_top, $featured_image_position, $only_title, $only_media)
	{
		switch ($post_style)
		{
			case 'is-top-content-single-medium':
			case 'is-top-content-single-full':
			case 'is-top-content-single-full-margins':
			case 'is-top-content-single-full-screen':
			case 'is-top-content-single-medium with-title-full':
			
				logistica_post_header__top(
					$post_header_top = $post_style,
					$post_header_inline = 'post-header-classic',
					$featured_image_position,
					$parallax = false,
					$overlay = false,
					$only_title,
					$only_media
				); // POST STYLE: Classic Medium, Classic Full, Classic Full with Margins, Title Full.
			
			break;
			
			case 'is-top-content-single-medium with-parallax':
			case 'is-top-content-single-full with-parallax':
			case 'is-top-content-single-full-margins with-parallax':
			case 'is-top-content-single-full-screen with-parallax':
			
				logistica_post_header__top(
					$post_header_top = $post_style,
					$post_header_inline = 'post-header-classic',
					$featured_image_position,
					$parallax = true,
					$overlay = false,
					$only_title,
					$only_media
				); // POST STYLE: Classic Medium Parallax, Classic Full Parallax, Classic Full with Margins Parallax.
			
			break;
			
			case 'is-top-content-single-medium with-overlay':
			case 'is-top-content-single-full with-overlay':
			case 'is-top-content-single-full-margins with-overlay':
			case 'is-top-content-single-full-screen with-overlay':
			
				logistica_post_header__top(
					$post_header_top = $post_style,
					$post_header_inline = 'post-header-overlay is-post-dark',
					$featured_image_position,
					$parallax = true,
					$overlay = true,
					$only_title,
					$only_media
				); // POST STYLE: Overlay Medium, Overlay Full, Overlay Full with Margins.
			
			break;
		}
	}
	
	
	function logistica_post_header($post_header_top)
	{
		$featured_image_position = get_theme_mod('logistica_setting_post_featured_image_position', 'below_title');
		$post_style              = logistica_core_post_style();
		
		if (($post_style == 'inherit') || ($post_style == null) || ($post_style == false))
		{
			if (is_singular('page'))
			{
				$post_style = get_theme_mod('logistica_setting_page_style_global', 'post-header-classic'); // Get page style class. (customizer) --- PAGE
			}
			elseif (is_singular('post'))
			{
				$post_style = get_theme_mod('logistica_setting_post_style_global', 'is-top-content-single-full with-parallax'); // Get post style class. (customizer) --- POST
			}
			else
			{
				$post_style = get_theme_mod('logistica_setting_custom_post_style_global', 'is-top-content-single-full with-overlay'); // Get post style class. (customizer) --- CUSTOM POST TYPES
			}
		}
		
		$only_title = false; // Top header with just title w/ meta.
		$only_media = false; // Inline header with just featured image/video.
		
		if ($post_header_top && ($post_style == 'is-top-content-single-medium with-title-full')) // Title Full. (top header)
		{
			$only_title = true;
			$only_media = false;
			logistica_post_header__top_chooser(
				$post_style,
				$post_header_top,
				$featured_image_position,
				$only_title,
				$only_media
			);
		}
		elseif ((! $post_header_top) && ($post_style == 'is-top-content-single-medium with-title-full')) // Title Full. (inline header)
		{
			$only_title = false;
			$only_media = true;
			logistica_post_header__inline_chooser(
				$post_style,
				$post_header_top,
				$featured_image_position,
				$only_title,
				$only_media
			);
		}
		elseif ($post_style != 'is-top-content-single-medium with-title-full') // NOT "Title Full".
		{
			$browser_address_url = logistica_core_featured_media__url();
			$browser_address_url = trim($browser_address_url); // Strip whitespace (or other characters) from the beginning and end of the string.
			
			if ((! $post_header_top) && empty($browser_address_url) && (! has_post_thumbnail())) // NO featured media.
			{
				logistica_post_header__inline_chooser(
					$post_style = 'post-header-classic',
					$post_header_top,
					$featured_image_position,
					$only_title,
					$only_media
				); // Force for Classic style.
			}
			elseif ($post_header_top && ((! empty($browser_address_url)) || has_post_thumbnail()))
			{
				switch ($post_style)
				{
					case 'is-top-content-single-medium':
					case 'is-top-content-single-medium with-parallax':
					case 'is-top-content-single-full':
					case 'is-top-content-single-full with-parallax':
					case 'is-top-content-single-full-margins':
					case 'is-top-content-single-full-screen':
					case 'is-top-content-single-full-margins with-parallax':
					case 'is-top-content-single-full-screen with-parallax':
					
						if ($featured_image_position == 'above_title')  // Force for Classic style.
						{
							$only_media = true;
						}
					
					break;
				}
				
				logistica_post_header__top_chooser(
					$post_style,
					$post_header_top,
					$featured_image_position,
					$only_title,
					$only_media
				);
			}
			elseif (! $post_header_top)
			{
				switch ($post_style)
				{
					case 'is-top-content-single-medium':
					case 'is-top-content-single-medium with-parallax':
					case 'is-top-content-single-full':
					case 'is-top-content-single-full with-parallax':
					case 'is-top-content-single-full-margins':
					case 'is-top-content-single-full-screen':
					case 'is-top-content-single-full-margins with-parallax':
					case 'is-top-content-single-full-screen with-parallax':
					
						if ($featured_image_position == 'above_title')  // Force for Classic style.
						{
							$only_title = true;
							$post_style = 'post-header-classic';
						}
					
					break;
				}
				
				logistica_post_header__inline_chooser(
					$post_style,
					$post_header_top,
					$featured_image_position,
					$only_title,
					$only_media
				);
			}
		}
	}

?>