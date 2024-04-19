<?php

	function pixelwars_core_share_links__facebook_title()
	{
		echo esc_attr__('Share this post on Facebook', 'pixelwars-core');
	}
	
	
	function pixelwars_core_share_links__facebook_url()
	{
		$share_url = 'https://www.facebook.com/sharer.php?u=' . get_permalink() . '&amp;t=' . the_title_attribute('echo=0');
		
		echo esc_url($share_url);
	}


/* ============================================================================================================================================= */


	function pixelwars_core_share_links__twitter_title()
	{
		echo esc_attr__('Tweet this post to your followers', 'pixelwars-core');
	}
	
	
	function pixelwars_core_share_links__twitter_url()
	{
		$share_url = 'https://twitter.com/intent/tweet?text=' . esc_attr__('Currently reading:', 'pixelwars-core') . ' ' . "'" . the_title_attribute('echo=0') . "'" . ' ' . esc_attr__('on', 'pixelwars-core') . ' ' . get_permalink();
		
		echo esc_url($share_url);
	}


/* ============================================================================================================================================= */


	function pixelwars_core_share_links__pinterest_title()
	{
		echo esc_attr__('Pin it', 'pixelwars-core');
	}
	
	
	function pixelwars_core_share_links__pinterest_url()
	{
		$media = "";
		
		if (has_post_thumbnail())
		{
			$media = '&media=' . get_the_post_thumbnail_url();
		}
		
		$share_url = 'https://pinterest.com/pin/create/button/?url=' . get_permalink() . $media . '&description=' . the_title_attribute('echo=0');
		
		echo esc_url($share_url);
	}


/* ============================================================================================================================================= */


	function pixelwars_core_share_links__mail_title()
	{
		echo esc_attr__('Email this post to a friend', 'pixelwars-core');
	}
	
	
	function pixelwars_core_share_links__mail_url()
	{
		$share_url = 'mailto:?subject=' . esc_attr__('I wanted you to see this post', 'pixelwars-core') . '&amp;body=' . esc_attr__('Check out this post:', 'pixelwars-core') . ' ' . the_title_attribute('echo=0') . ' - ' . get_permalink();
		
		echo esc_url($share_url);
	}


/* ============================================================================================================================================= */
/* ============================================================================================================================================= */


	function pixelwars_core_share_links_meta()
	{
		?>
			<span class="entry-share">
				<span class="entry-share-text"><?php esc_html_e('Share', 'pixelwars-core'); ?></span> <!-- .entry-share-text -->
				
				<span class="entry-share-wrap">
					<span class="entry-share-inner-wrap">
						<a class="share-facebook" rel="nofollow" target="_blank" href="<?php pixelwars_core_share_links__facebook_url(); ?>" title="<?php pixelwars_core_share_links__facebook_title(); ?>"><?php esc_html_e('Facebook', 'pixelwars-core'); ?></a>
						
						<a class="share-twitter" rel="nofollow" target="_blank" href="<?php pixelwars_core_share_links__twitter_url(); ?>" title="<?php pixelwars_core_share_links__twitter_title(); ?>"><?php esc_html_e('Twitter', 'pixelwars-core'); ?></a>
						
						<a class="share-pinterest" rel="nofollow" target="_blank" href="<?php pixelwars_core_share_links__pinterest_url(); ?>" title="<?php pixelwars_core_share_links__pinterest_title(); ?>"><?php esc_html_e('Pinterest', 'pixelwars-core'); ?></a>
						
						<a class="share-mail" rel="nofollow" target="_blank" href="<?php pixelwars_core_share_links__mail_url(); ?>" title="<?php pixelwars_core_share_links__mail_title(); ?>"><?php esc_attr_e('Email', 'pixelwars-core'); ?></a>
					</span> <!-- .entry-share-inner-wrap -->
				</span> <!-- .entry-share-wrap -->
			</span> <!-- .entry-share -->
		<?php
	}
	
	
	function pixelwars_core_share_links()
	{
		?>
			<div class="share-links">
				<h3><?php esc_html_e('Share This', 'pixelwars-core'); ?></h3>
				
				<a class="share-facebook" rel="nofollow" target="_blank" href="<?php pixelwars_core_share_links__facebook_url(); ?>" title="<?php pixelwars_core_share_links__facebook_title(); ?>">
					<i class="pw-icon-facebook"></i>
				</a>
				
				<a class="share-twitter" rel="nofollow" target="_blank" href="<?php pixelwars_core_share_links__twitter_url(); ?>" title="<?php pixelwars_core_share_links__twitter_title(); ?>">
					<i class="pw-icon-twitter"></i>
				</a>
				
				<a class="share-pinterest" rel="nofollow" target="_blank" href="<?php pixelwars_core_share_links__pinterest_url(); ?>" title="<?php pixelwars_core_share_links__pinterest_title(); ?>">
					<i class="pw-icon-pinterest"></i>
				</a>
				
				<a class="share-mail" rel="nofollow" target="_blank" href="<?php pixelwars_core_share_links__mail_url(); ?>" title="<?php pixelwars_core_share_links__mail_title(); ?>">
					<i class="pw-icon-mail"></i>
				</a>
			</div> <!-- .share-links -->
		<?php
	}

?>