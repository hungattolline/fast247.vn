<?php

	class pixelwars_core_Widget__Button extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars_core_widget__button',
				esc_html__('(Pixelwars) Button', 'pixelwars-core'),
				array(
					'description'                 => esc_html__('Button module.', 'pixelwars-core'),
					'customize_selective_refresh' => true
				)
			);
		}
		
		public function form($instance)
		{
			if (isset($instance['title']))   { $title   = $instance['title']; }   else { $title   = ""; }
			if (isset($instance['text']))    { $text    = $instance['text']; }    else { $text    = ""; }
			if (isset($instance['url']))     { $url     = $instance['url']; }     else { $url     = ""; }
			if (isset($instance['new_tab'])) { $new_tab = $instance['new_tab']; } else { $new_tab = false; }
			if (isset($instance['type']))    { $type    = $instance['type']; }    else { $type    = 'is-primary'; }
			if (isset($instance['style']))   { $style   = $instance['style']; }   else { $style   = ""; }
			if (isset($instance['size']))    { $size    = $instance['size']; }    else { $size    = ""; }
			if (isset($instance['icon']))    { $icon    = $instance['icon']; }    else { $icon    = ""; }
			
			?>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'pixelwars-core'); ?></label>
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('text')); ?>"><?php esc_html_e('Text', 'pixelwars-core'); ?></label>
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('text')); ?>" name="<?php echo esc_attr($this->get_field_name('text')); ?>" value="<?php echo esc_attr($text); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('url')); ?>"><?php esc_html_e('URL', 'pixelwars-core'); ?></label>
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('url')); ?>" name="<?php echo esc_attr($this->get_field_name('url')); ?>" value="<?php echo esc_url($url); ?>" placeholder="http://">
					
					<input type="checkbox" <?php if ($new_tab) { echo 'checked="checked"'; } ?> id="<?php echo esc_attr($this->get_field_id('new_tab')); ?>" name="<?php echo esc_attr($this->get_field_name('new_tab')); ?>">
					<label for="<?php echo esc_attr($this->get_field_id('new_tab')); ?>"><?php esc_html_e('Open link in new tab', 'pixelwars-core'); ?></label>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('type')); ?>"><?php esc_html_e('Type', 'pixelwars-core'); ?></label>
					
					<select class="widefat" id="<?php echo esc_attr($this->get_field_id('type')); ?>" name="<?php echo esc_attr($this->get_field_name('type')); ?>">
						<option <?php if ($type == 'is-primary')   { echo 'selected="selected"'; } ?> value="is-primary"><?php   esc_html_e('Primary', 'pixelwars-core'); ?></option>
						<option <?php if ($type == 'is-secondary') { echo 'selected="selected"'; } ?> value="is-secondary"><?php esc_html_e('Secondary', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('style')); ?>"><?php esc_html_e('Style', 'pixelwars-core'); ?></label>
					
					<select class="widefat" id="<?php echo esc_attr($this->get_field_id('style')); ?>" name="<?php echo esc_attr($this->get_field_name('style')); ?>">
						<option <?php if ($style == "")                { echo 'selected="selected"'; } ?> value=""><?php                esc_html_e('Line', 'pixelwars-core'); ?></option>
						<option <?php if ($style == 'is-underline')    { echo 'selected="selected"'; } ?> value="is-underline"><?php    esc_html_e('Underline', 'pixelwars-core'); ?></option>
						<option <?php if ($style == 'is-solid')        { echo 'selected="selected"'; } ?> value="is-solid"><?php        esc_html_e('Solid', 'pixelwars-core'); ?></option>
						<option <?php if ($style == 'is-solid-light')  { echo 'selected="selected"'; } ?> value="is-solid-light"><?php  esc_html_e('Solid Light', 'pixelwars-core'); ?></option>
						<option <?php if ($style == 'is-3d')           { echo 'selected="selected"'; } ?> value="is-3d"><?php           esc_html_e('3D', 'pixelwars-core'); ?></option>
						<option <?php if ($style == 'is-shadow')       { echo 'selected="selected"'; } ?> value="is-shadow"><?php       esc_html_e('Shadow', 'pixelwars-core'); ?></option>
						<option <?php if ($style == 'is-shadow-light') { echo 'selected="selected"'; } ?> value="is-shadow-light"><?php esc_html_e('Shadow Light', 'pixelwars-core'); ?></option>
						<option <?php if ($style == 'is-paper')        { echo 'selected="selected"'; } ?> value="is-paper"><?php        esc_html_e('Paper', 'pixelwars-core'); ?></option>
						<option <?php if ($style == 'is-shift')        { echo 'selected="selected"'; } ?> value="is-shift"><?php        esc_html_e('Shift', 'pixelwars-core'); ?></option>
						<option <?php if ($style == 'is-circle')       { echo 'selected="selected"'; } ?> value="is-circle"><?php       esc_html_e('Circle', 'pixelwars-core'); ?></option>
						<option <?php if ($style == 'is-naked')        { echo 'selected="selected"'; } ?> value="is-naked"><?php        esc_html_e('Naked', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('size')); ?>"><?php esc_html_e('Size', 'pixelwars-core'); ?></label>
					
					<select class="widefat" id="<?php echo esc_attr($this->get_field_id('size')); ?>" name="<?php echo esc_attr($this->get_field_name('size')); ?>">
						<option <?php if ($size == "")      { echo 'selected="selected"'; } ?> value=""><?php      esc_html_e('Medium', 'pixelwars-core'); ?></option>
						<option <?php if ($size == 'small') { echo 'selected="selected"'; } ?> value="small"><?php esc_html_e('Small', 'pixelwars-core'); ?></option>
						<option <?php if ($size == 'mini')  { echo 'selected="selected"'; } ?> value="mini"><?php  esc_html_e('Mini', 'pixelwars-core'); ?></option>
						<option <?php if ($size == 'big')   { echo 'selected="selected"'; } ?> value="big"><?php   esc_html_e('Big', 'pixelwars-core'); ?></option>
						<option <?php if ($size == 'huge')  { echo 'selected="selected"'; } ?> value="huge"><?php  esc_html_e('Huge', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('icon')); ?>"><?php esc_html_e('Icon', 'pixelwars-core'); ?></label>
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('icon')); ?>" name="<?php echo esc_attr($this->get_field_name('icon')); ?>" value="<?php echo esc_attr($icon); ?>" placeholder="pw-icon-xxx">
					
					<?php
						$available_icons = get_template_directory_uri() . '/css/fonts/fontello/demo.html';
					?>
					<small>
						<a target="_blank" href="<?php echo esc_url($available_icons); ?>"><?php esc_html_e('View available icons', 'pixelwars-core'); ?></a>
					</small>
				</p>
				<p>
					<small>
						<?php esc_html_e('You can customize button colors and fonts from Customizer > General > Buttons section.', 'pixelwars-core'); ?>
					</small>
				</p>
			<?php
		}
		
		public function update( $new_instance, $old_instance )
		{
			$instance = array();
			$instance['title']   = strip_tags($new_instance['title']);
			$instance['text']    = strip_tags($new_instance['text']);
			$instance['url']     = strip_tags($new_instance['url']);
			$instance['new_tab'] = strip_tags($new_instance['new_tab']);
			$instance['type']    = strip_tags($new_instance['type']);
			$instance['style']   = strip_tags($new_instance['style']);
			$instance['size']    = strip_tags($new_instance['size']);
			$instance['icon']    = strip_tags($new_instance['icon']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title   = apply_filters('widget_title', $instance['title']);
			$text    = apply_filters('widget_text', $instance['text']);
			$url     = apply_filters('widget_url', $instance['url']);
			$new_tab = apply_filters('widget_new_tab', $instance['new_tab']);
			$type    = apply_filters('widget_type', $instance['type']);
			$style   = apply_filters('widget_style', $instance['style']);
			$size    = apply_filters('widget_size', $instance['size']);
			$icon    = apply_filters('widget_icon', $instance['icon']);
			
			echo $before_widget;
			
				if (! empty($title))
				{
					echo $before_title . $title . $after_title;
				}
				
				$button_class = $type . ' ' . $style . ' ' . $size;
				
				if ($new_tab)
				{
					$new_tab = 'target="_blank"';
				}
				else
				{
					$new_tab = "";
				}
				
				?>
					<a class="button <?php echo esc_attr($button_class); ?>" <?php echo $new_tab; ?> href="<?php echo esc_url($url); ?>"><?php if (! empty($icon)) { ?><i class="<?php echo esc_attr($icon); ?>"></i><?php } echo esc_html($text); ?></a> <!-- .button -->
				<?php
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', function() { register_widget('pixelwars_core_Widget__Button'); });

?>