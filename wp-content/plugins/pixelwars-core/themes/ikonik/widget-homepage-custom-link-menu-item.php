<?php

	class pixelwars_core_Widget__Homepage_Custom_Link_Menu_Item extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars_core_widget__homepage_custom_link_menu_item',
				esc_html__('(Pixelwars) Homepage Custom Link Menu Item', 'pixelwars-core'),
				array(
					'description' => esc_html__('Homepage Custom Link Menu Item: Add a menu item to the "Homepage Navigation Menu" widget area.', 'pixelwars-core')
				)
			);
		}
		
		public function form($instance)
		{
			if (isset($instance['title']))    { $title    = $instance['title']; }    else { $title    = ""; }
			if (isset($instance['link_url'])) { $link_url = $instance['link_url']; } else { $link_url = ""; }
			if (isset($instance['new_tab']))  { $new_tab  = $instance['new_tab']; }  else { $new_tab  = false; }
			
			?>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Navigation Label', 'pixelwars-core'); ?></label>
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('link_url')); ?>"><?php esc_html_e('URL', 'pixelwars-core'); ?></label>
					<input type="text" class="widefat code" id="<?php echo esc_attr($this->get_field_id('link_url')); ?>" name="<?php echo esc_attr($this->get_field_name('link_url')); ?>" value="<?php echo esc_url($link_url); ?>" placeholder="http://">
					
					<input type="checkbox" <?php if ($new_tab) { echo 'checked="checked"'; } ?> id="<?php echo esc_attr($this->get_field_id('new_tab')); ?>" name="<?php echo esc_attr($this->get_field_name('new_tab')); ?>">
					<label for="<?php echo esc_attr($this->get_field_id('new_tab')); ?>"><?php esc_html_e('Open link in new tab', 'pixelwars-core'); ?></label>
				</p>
			<?php
		}
		
		public function update($new_instance, $old_instance)
		{
			$instance = array();
			$instance['title']    = strip_tags($new_instance['title']);
			$instance['link_url'] = strip_tags($new_instance['link_url']);
			$instance['new_tab']  = strip_tags($new_instance['new_tab']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title    = apply_filters('widget_title',    $instance['title']);
			$link_url = apply_filters('widget_link_url', $instance['link_url']);
			$new_tab  = apply_filters('widget_new_tab',  $instance['new_tab']);
			
			echo $before_widget;
			
				if (! empty($title))
				{
					?>
						<a class="no-ajax" href="<?php echo esc_url($link_url); ?>" <?php if ($new_tab) { echo 'target="_blank"'; } ?>>
							<span class="item-name"><?php echo esc_html($title); ?></span>
						</a>
					<?php
				}
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', function() { register_widget('pixelwars_core_Widget__Homepage_Custom_Link_Menu_Item'); });
