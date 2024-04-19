<?php

	class pixelwars_core_Widget__Icon_Box extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars_core_widget__icon_box',
				esc_html__('(Pixelwars) Icon Box', 'pixelwars-core'),
				array(
					'description'                 => esc_html__('Icon Box module.', 'pixelwars-core'),
					'customize_selective_refresh' => true
				)
			);
		}
		
		public function form($instance)
		{
			$title         = ""; if (isset($instance['title']))         { $title         = $instance['title']; }         else { $title         = ""; }
			$description   = ""; if (isset($instance['description']))   { $description   = $instance['description']; }   else { $description   = ""; }
			$icon_image_id = ""; if (isset($instance['icon_image_id'])) { $icon_image_id = $instance['icon_image_id']; } else { $icon_image_id = ""; }
			$url           = ""; if (isset($instance['url']))           { $url           = $instance['url']; }           else { $url           = ""; }
			$new_tab       = ""; if (isset($instance['new_tab']))       { $new_tab       = $instance['new_tab']; }       else { $new_tab       = false; }
			$icon_position = ""; if (isset($instance['icon_position'])) { $icon_position = $instance['icon_position']; } else { $icon_position = 'is-icon-top'; }
			$icon_size     = ""; if (isset($instance['icon_size']))     { $icon_size     = $instance['icon_size']; }     else { $icon_size     = 'is-size-lg'; }
			$display       = ""; if (isset($instance['display']))       { $display       = $instance['display']; }       else { $display       = ""; }
			
			?>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'pixelwars-core'); ?></label>
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_html_e('Description', 'pixelwars-core'); ?></label>
					<textarea rows="5" cols="20" class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>"><?php echo esc_textarea($description); ?></textarea>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('icon_image_id')); ?>"><?php esc_html_e('Icon', 'pixelwars-core'); ?></label>
					
					<br>
					
					<input type="hidden" id="<?php echo esc_attr($this->get_field_id('icon_image_id')); ?>" name="<?php echo esc_attr($this->get_field_name('icon_image_id')); ?>" value="<?php echo esc_attr($icon_image_id); ?>">
					
					<input type="button" class="button button-browse" value="<?php esc_html_e('Browse', 'pixelwars-core'); ?>">
					
					<?php
						$icon_image_url = wp_get_attachment_image_url($icon_image_id, 'pixelwars_core_image_size_1');
					?>
					<img class="pixelwars-core-widget-preview-image" src="<?php echo esc_url($icon_image_url); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('url')); ?>"><?php esc_html_e('URL', 'pixelwars-core'); ?></label>
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('url')); ?>" name="<?php echo esc_attr($this->get_field_name('url')); ?>" value="<?php echo esc_url($url); ?>" placeholder="http://">
					
					<label for="<?php echo esc_attr($this->get_field_id('new_tab')); ?>">
						<input type="checkbox" <?php if ($new_tab) { echo 'checked="checked"'; } ?> id="<?php echo esc_attr($this->get_field_id('new_tab')); ?>" name="<?php echo esc_attr($this->get_field_name('new_tab')); ?>">
						
						<?php esc_html_e('Open link in new tab', 'pixelwars-core'); ?>
					</label>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('icon_position')); ?>"><?php esc_html_e('Icon Position', 'pixelwars-core'); ?></label>
					
					<select class="widefat" id="<?php echo esc_attr($this->get_field_id('icon_position')); ?>" name="<?php echo esc_attr($this->get_field_name('icon_position')); ?>">
						<option <?php if ($icon_position == 'is-icon-top')   { echo 'selected="selected"'; } ?> value="is-icon-top"><?php   esc_html_e('Top', 'pixelwars-core'); ?></option>
						<option <?php if ($icon_position == 'is-icon-left')  { echo 'selected="selected"'; } ?> value="is-icon-left"><?php  esc_html_e('Left', 'pixelwars-core'); ?></option>
						<option <?php if ($icon_position == 'is-icon-right') { echo 'selected="selected"'; } ?> value="is-icon-right"><?php esc_html_e('Right', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('icon_size')); ?>"><?php esc_html_e('Icon Size', 'pixelwars-core'); ?></label>
					
					<select class="widefat" id="<?php echo esc_attr($this->get_field_id('icon_size')); ?>" name="<?php echo esc_attr($this->get_field_name('icon_size')); ?>">
						<option <?php if ($icon_size == 'is-size-xxxs') { echo 'selected="selected"'; } ?> value="is-size-xxxs"><?php esc_html_e('XXXS', 'pixelwars-core'); ?></option>
						<option <?php if ($icon_size == 'is-size-xxs')  { echo 'selected="selected"'; } ?> value="is-size-xxs"><?php  esc_html_e('XXS', 'pixelwars-core'); ?></option>
						<option <?php if ($icon_size == 'is-size-xs')   { echo 'selected="selected"'; } ?> value="is-size-xs"><?php   esc_html_e('XS', 'pixelwars-core'); ?></option>
						<option <?php if ($icon_size == 'is-size-sm')   { echo 'selected="selected"'; } ?> value="is-size-sm"><?php   esc_html_e('S', 'pixelwars-core'); ?></option>
						<option <?php if ($icon_size == 'is-size-md')   { echo 'selected="selected"'; } ?> value="is-size-md"><?php   esc_html_e('M', 'pixelwars-core'); ?></option>
						<option <?php if ($icon_size == 'is-size-lg')   { echo 'selected="selected"'; } ?> value="is-size-lg"><?php   esc_html_e('L', 'pixelwars-core'); ?></option>
						<option <?php if ($icon_size == 'is-size-xl')   { echo 'selected="selected"'; } ?> value="is-size-xl"><?php   esc_html_e('XL', 'pixelwars-core'); ?></option>
						<option <?php if ($icon_size == 'is-size-xxl')  { echo 'selected="selected"'; } ?> value="is-size-xxl"><?php  esc_html_e('XXL', 'pixelwars-core'); ?></option>
						<option <?php if ($icon_size == 'is-size-xxxl') { echo 'selected="selected"'; } ?> value="is-size-xxxl"><?php esc_html_e('XXXL', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('display')); ?>"><?php esc_html_e('Display', 'pixelwars-core'); ?></label>
					
					<select class="widefat" id="<?php echo esc_attr($this->get_field_id('display')); ?>" name="<?php echo esc_attr($this->get_field_name('display')); ?>">
						<option <?php if ($display == "")                { echo 'selected="selected"'; } ?> value=""><?php                esc_html_e('Inline', 'pixelwars-core'); ?></option>
						<option <?php if ($display == 'is-inline-block') { echo 'selected="selected"'; } ?> value="is-inline-block"><?php esc_html_e('Inline Block', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p>
					<small>
						<?php esc_html_e('You can customize typography from Customizer > Header > Icon Box section.', 'pixelwars-core'); ?>
					</small>
				</p>
			<?php
		}
		
		public function update($new_instance, $old_instance)
		{
			$instance                  = array();
			$instance['title']         = strip_tags($new_instance['title']);
			$instance['description']   = strip_tags($new_instance['description']);
			$instance['icon_image_id'] = strip_tags($new_instance['icon_image_id']);
			$instance['url']           = strip_tags($new_instance['url']);
			$instance['new_tab']       = strip_tags($new_instance['new_tab']);
			$instance['icon_position'] = strip_tags($new_instance['icon_position']);
			$instance['icon_size']     = strip_tags($new_instance['icon_size']);
			$instance['display']       = strip_tags($new_instance['display']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title         = apply_filters('widget_title', $instance['title']);
			$description   = apply_filters('widget_description', $instance['description']);
			$icon_image_id = apply_filters('widget_icon_image_id', $instance['icon_image_id']);
			$url           = apply_filters('widget_url', $instance['url']);
			$new_tab       = apply_filters('widget_new_tab', $instance['new_tab']);
			
			$icon_position = apply_filters('widget_icon_position', $instance['icon_position']);
			$icon_size     = apply_filters('widget_icon_size', $instance['icon_size']);
			$display       = apply_filters('widget_display', $instance['display']);
			
			echo $before_widget;
			
				$icon_box_class = $icon_position . ' ' . $icon_size . ' ' . $display;
				$icon_box_class = trim($icon_box_class);
				
				if ($new_tab)
				{
					$new_tab = 'target="_blank"';
				}
				else
				{
					$new_tab = "";
				}
				
				?>
					<div class="pw-icon-box <?php echo esc_attr($icon_box_class); ?>">
						<?php
							if (! empty($url))
							{
								?>
									<a <?php echo $new_tab; ?> href="<?php echo esc_url($url); ?>"><?php echo esc_html($title); ?></a>
								<?php
							}
						?>
						
						<?php
							$icon_image_url = wp_get_attachment_image_url($icon_image_id, 'pixelwars_core_image_size_1');
							
							if ($icon_image_url)
							{
								?>
									<img alt="<?php echo esc_attr($title); ?>" src="<?php echo esc_url($icon_image_url); ?>">
								<?php
							}
						?>
						
						<?php
							if ((! empty($title)) || (! empty($description)))
							{
								?>
									<div>
										<?php
											if (! empty($title))
											{
												?>
													<h3><?php echo esc_html($title); ?></h3>
												<?php
											}
											
											if (! empty($description))
											{
												?>
													<p><?php echo esc_html($description); ?></p>
												<?php
											}
										?>
										
									</div>
								<?php
							}
						?>
					</div> <!-- .pw-icon-box -->
				<?php
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', function() { register_widget('pixelwars_core_Widget__Icon_Box'); });

?>