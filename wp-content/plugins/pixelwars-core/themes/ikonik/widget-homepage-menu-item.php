<?php

	class pixelwars_core_Widget__Homepage_Menu_Item extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars_core_widget__homepage_menu_item',
				esc_html__('(Pixelwars) Homepage Menu Item', 'pixelwars-core'),
				array(
					'description' => esc_html__('Add a menu item to the "Homepage Navigation Menu" widget area.', 'pixelwars-core')
				)
			);
		}
		
		public function form($instance)
		{
			if (isset($instance['title']))            { $title            = $instance['title']; }            else { $title            = ""; }
			if (isset($instance['custom_page_slug'])) { $custom_page_slug = $instance['custom_page_slug']; } else { $custom_page_slug = ""; }
			if (isset($instance['disable_ajax']))     { $disable_ajax     = $instance['disable_ajax']; }     else { $disable_ajax     = false; }
			
			?>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Navigation Label', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('custom_page_slug')); ?>"><?php esc_html_e('Select Page', 'pixelwars-core'); ?></label>
					
					<select class="widefat" id="<?php echo esc_attr($this->get_field_id('custom_page_slug')); ?>" name="<?php echo esc_attr($this->get_field_name('custom_page_slug')); ?>">
						<option></option>
						<?php
							$pages = get_pages();
							
							foreach ($pages as $page)
							{
								if ($custom_page_slug == $page->post_name)
								{
									$option = '<option selected="selected" value="' . esc_attr($page->post_name) . '">' . esc_html($page->post_title) . '</option>';
									echo $option;
								}
								else
								{
									$option = '<option value="' . esc_attr($page->post_name) . '">' . esc_html($page->post_title) . '</option>';
									echo $option;
								}
							}
						?>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('disable_ajax')); ?>">
						<input type="checkbox" <?php if ($disable_ajax) { echo 'checked="checked"'; } ?> id="<?php echo esc_attr($this->get_field_id('disable_ajax')); ?>" name="<?php echo esc_attr($this->get_field_name('disable_ajax')); ?>">
						
						<?php esc_html_e('Disable AJAX feature for this link. Check this if a plugin generated content is not shown properly.', 'pixelwars-core'); ?>
						
						(<a title="<?php esc_attr_e('Asynchronous JavaScript and XML', 'pixelwars-core'); ?>" target="_blank" href="https://en.wikipedia.org/wiki/Ajax_(programming)"><i><?php esc_html_e('AJAX', 'pixelwars-core'); ?></i></a>)
					</label>
				</p>
			<?php
		}
		
		public function update( $new_instance, $old_instance )
		{
			$instance = array();
			$instance['title']            = strip_tags($new_instance['title']);
			$instance['custom_page_slug'] = strip_tags($new_instance['custom_page_slug']);
			$instance['disable_ajax']     = strip_tags($new_instance['disable_ajax']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title            = apply_filters('widget_title',            $instance['title']);
			$custom_page_slug = apply_filters('widget_custom_page_slug', $instance['custom_page_slug']);
			$disable_ajax     = apply_filters('widget_disable_ajax',     $instance['disable_ajax']);
			
			update_option('pixelwars_core_homepage_menu_item__disable_ajax_' . $custom_page_slug, $disable_ajax);
			
			echo $before_widget;
			
				if (! empty($custom_page_slug))
				{
					$args_custom_page = 'pagename=' . $custom_page_slug;
					$loop_custom_page = new WP_Query($args_custom_page);
					
					if ($loop_custom_page->have_posts()) :
						while ($loop_custom_page->have_posts()) : $loop_custom_page->the_post();
							?>
								<?php
									$page_template = get_post_meta(get_the_ID(), '_wp_page_template', true);
								?>
								<a <?php if ($page_template == 'page_template-portfolio.php') { echo 'id="portfolio-link"'; } ?> <?php if ($disable_ajax) { echo 'class="no-ajax"'; } else { echo 'data-slug="' . esc_attr($custom_page_slug) . '"'; } ?> href="<?php the_permalink(); ?>">
									<?php
										if (! empty($title))
										{
											?>
												<span class="item-name"><?php echo esc_html($title); ?></span>
											<?php
										}
										else
										{
											?>
												<span class="item-name"><?php the_title(); ?></span>
											<?php
										}
									?>
								</a>
							<?php
						endwhile;
					endif;
					wp_reset_postdata();
				}
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', function() { register_widget('pixelwars_core_Widget__Homepage_Menu_Item'); });


/* ============================================================================================================================================= */


	function pixelwars_core_homepage_menu_item__disable_ajax($custom_page_slug)
	{
		return get_option('pixelwars_core_homepage_menu_item__disable_ajax_' . $custom_page_slug, "");
	}

?>