<?php

	if (! defined(ABSPATH))
	{
		$pagePath = explode('/wp-content/', dirname(__FILE__));
		include_once(str_replace('wp-content/', '', $pagePath[0] . '/wp-load.php'));
	}


/* ============================================================================================================================================= */


	// Get data from database.
	
	$to            = trim(get_option('contact_form_to',            ""));
	$subject       = trim(get_option('contact_form_subject',       ""));
	$sender_domain = trim(get_option('contact_form_sender_domain', ""));
	$site_name     = trim(get_bloginfo('name'));


/* ============================================================================================================================================= */


	// Get data from contact form fields.
	
	$name          = trim($_POST['name']);
	$email         = trim($_POST['email']);
	$message       = trim($_POST['message']);
	$url           = trim($_POST['url']);
	
	$message = stripslashes($message);


/* ============================================================================================================================================= */


	// Check for errors.
	
	$error = false;
	
	if     ($name === "")    { $error = true; }
	elseif ($email === "")   { $error = true; }
	elseif ($message === "") { $error = true; }
	elseif ($to === "")      { $error = true; }


/* ============================================================================================================================================= */


	// Send mail.
	
	if (isset($url) && $url == "")
	{
		if ($error == false)
		{
			$headers  = "From: " . $site_name . " <" . $sender_domain . "> " . "\r\n";
			$headers .= "Reply-To: " . $name . " <" . $email . "> " . "\r\n";
			
			$body = "Name: " . $name . "\n" . "Email: " . $email . "\n\n" . "Message:" . "\n\n" . $message;
			
			$mail_result = wp_mail($to, $subject, $body, $headers); // Try to send mail.
			
			if ($mail_result == true)
			{
				echo 'success';
			}
			else
			{
				echo 'unsuccess';
			}
		}
		else
		{
			echo 'error';
		}
	}

?>