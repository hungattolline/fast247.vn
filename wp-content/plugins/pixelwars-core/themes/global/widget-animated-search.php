<?php

	class pixelwars_core_Widget__Animated_Search extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars_core_widget__animated_search',
				esc_html__('(Pixelwars) Animated Search', 'pixelwars-core'),
				array(
					'description'                 => esc_html__('Animated search module.', 'pixelwars-core'),
					'customize_selective_refresh' => true
				)
			);
		}
		
		public function form($instance)
		{
			$title = ""; if (isset($instance['title'])) { $title = $instance['title']; } else { $title = ""; }
			
			?>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
				</p>
			<?php
		}
		
		public function update($new_instance, $old_instance)
		{
			$instance          = array();
			$instance['title'] = strip_tags($new_instance['title']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title = apply_filters('widget_title', $instance['title']);
			
			echo $before_widget;
			
				if (! empty($title))
				{
					echo $before_title . $title . $after_title;
				}
				
				?>
					<div class="pw-search">
						<form class="search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
							<input type="search" class="search-field" name="s" autocomplete="off" placeholder=" "> <!-- .search-field -->
							<div>
								<svg>
									<use xlink:href="#path"></use>
								</svg>
								<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
									<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 160 28" id="path">
										<path d="M32.9418651,-20.6880772 C37.9418651,-20.6880772 40.9418651,-16.6880772 40.9418651,-12.6880772 C40.9418651,-8.68807717 37.9418651,-4.68807717 32.9418651,-4.68807717 C27.9418651,-4.68807717 24.9418651,-8.68807717 24.9418651,-12.6880772 C24.9418651,-16.6880772 27.9418651,-20.6880772 32.9418651,-20.6880772 L32.9418651,-29.870624 C32.9418651,-30.3676803 33.3448089,-30.770624 33.8418651,-30.770624 C34.08056,-30.770624 34.3094785,-30.6758029 34.4782612,-30.5070201 L141.371843,76.386562" transform="translate(83.156854, 22.171573) rotate(-225.000000) translate(-83.156854, -22.171573)"></path>
									</symbol>
								</svg>
							</div>
						</form> <!-- .search-form -->
					</div> <!-- .pw-search -->
				<?php
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', function() { register_widget('pixelwars_core_Widget__Animated_Search'); });

?>