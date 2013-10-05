<?php

	require_once( '../../../../../wp-load.php' );

	$gen_sets = theme_get_option('general', 'gen_sets');

	$aemail = isset( $gen_sets["_cform_emails"] ) ? $gen_sets["_cform_emails"] : '';
	// if (!$aemail) $aemail = get_option('admin_email');

	$blogname = get_bloginfo('name');

	$to =  $aemail;
	if(!$to) $to = get_bloginfo('admin_email');
	$name = isset($_POST['name']) ? trim($_POST['name']) : '';
	$email = isset($_POST['email']) ? trim($_POST['email']) : '';
	$website = isset($_POST['website']) ? trim($_POST['website']) : '';
	$message = isset($_POST['message']) ? trim($_POST['message']) : '';

	$error = false;
	if( $to === '' || $email === '' || $message === '' || $name === ''){
		$error = true;
	}
	if(!preg_match('/^\w+[\w-\.]*\@\w+((-\w+)|(\w*))\.[a-z]{2,3}$/', $email)){
		$error = true;
	}

	if($error == false){

		$subject = multitranslate('Message from', '_contact_email_messagefrom', false) . ' ' . $blogname;
		
		$body = multitranslate('Name:', '_contact_email_name', false) . ' ' . $name . "\n\n";
		$body .= multitranslate('Email:', '_contact_email_mail', false) . ' ' . $email . "\n\n";
		if($website)
			$body .=  multitranslate('Website:', '_contact_email_site', false) . ' ' . $website . "\n\n";
		$body .=  multitranslate('Message:', '_contact_email_message', false) . ' ' . $message;
		
		$from = multitranslate('From:', '_contact_email_from', false);
		$reply_to = multitranslate('Reply-To:' ,'_contact_email_reply', false);

		$headers = "$from $name <$email>\r\n$reply_to $email\r\n";

		if( !wp_mail($to, $subject, $body, $headers) ){ 
			echo '<p class="error-box">'. multitranslate('Error!', '_contact_email_error', false) .'</p>';
		}else{
			echo '<p class="error-success">'. multitranslate('Mail sent!', '_contact_form_success', false) .'</p>';
		}
	} else {
		echo '<p class="error-box">'. multitranslate('Error. Check entered values', '_contact_email_error_check', false) .'</p>';
	}