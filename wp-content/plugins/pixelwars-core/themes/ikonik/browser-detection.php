<?php

	function pixelwars_core_detect_browser__ie_11()
	{
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) // If Internet explorer 11.
		{
			return true;
		}
		else
		{
			return false;
		}
	}

?>