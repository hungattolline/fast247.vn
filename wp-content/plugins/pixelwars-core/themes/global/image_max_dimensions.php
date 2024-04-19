<?php

	function pixelwars_core_image_attributes__max_dimensions($image_id, $image_size_width_crop, $image_size_height_crop)
	{
		/*
			Return: Array of image data, or boolean false if no image is available.
			[0] - Image source URL.
			[1] - Image width  in pixels.
			[2] - Image height in pixels.
		*/
		
		$image_attributes    = array();
		$image_width_cropped = wp_get_attachment_image_src($image_id, $image_size_width_crop);
		
		if ($image_width_cropped[1] >= $image_width_cropped[2]) // Landscape image. (width >= height)
		{
			$image_attributes = $image_width_cropped;
		}
		else // Portrait image. (width < height)
		{
			$image_height_cropped = wp_get_attachment_image_src($image_id, $image_size_height_crop);
			$image_attributes     = $image_height_cropped;
		}
		
		return $image_attributes;
	}

?>