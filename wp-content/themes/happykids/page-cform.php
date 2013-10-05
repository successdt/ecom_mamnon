<?php

	$gen_sets = theme_get_option('general', 'gen_sets');
	$gmap = ( isset($gen_sets['_gen_gmap']) ) ? $gen_sets['_gen_gmap'] : '';
	$gen_side = ( isset($gen_sets['_sidebar_main']) ) ? $gen_sets['_sidebar_main'] : '';

	$aemail = isset( $gen_sets["_cform_emails"] ) ? $gen_sets["_cform_emails"] : '';
	if (!$aemail) $aemail = get_option('admin_email');

	$page_custom = theme_get_post_custom();
	$custom_sidebar_trigger = ( isset($page_custom['_pagetype_check']) ) ? $page_custom['_pagetype_check'] : '';
	$custom_sidebar = ( isset($page_custom['_cform_sidebar']) ) ? $page_custom['_cform_sidebar'] : '';

	if ($gen_side == 'empty' || !$gen_side) $gen_side = 2;
	if ($custom_sidebar == 'empty' || !$custom_sidebar) $custom_sidebar = false;

	if(isset($_POST['submitted'])) {

		if(trim($_POST['contactName']) === '') {
			$nameError = 'Please enter your name.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
			$name = sanitize_text_field( $name );
		}

		if(trim($_POST['email']) === '')  {
			$emailError = 'Please enter your email address.';
			$hasError = true;
		} else if ( !is_email(trim($_POST['email'])) ) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}

		if(trim($_POST['comments']) === '') {
			$commentError = 'Please enter a message.';
			$hasError = true;
		} else {
			$comments = wp_kses_post( trim($_POST['comments']) );
			$comments = balanceTags($comments);
		}

		if(!isset($hasError)) {
			$emailTo = $aemail;
			if (!isset($emailTo) || ($emailTo == '') ){
				$emailTo = get_option('admin_email');
			}
			$subject = 'From '.$name;
			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

			wp_mail($emailTo, $subject, $body, $headers);
			$emailSent = true;
		}

	}

?>

<div id="sbr" class="entry-container creaws_contact">

	<?php if(have_posts()) :  while(have_posts()) : the_post(); ?>

		<div class="l-grid-9 l-float-left">

			<?php the_content(); ?>

			<?php

				$nameError = isset($nameError) ? $nameError : '';
				$emailError = isset($emailError) ? $emailError : '';
				$commentError = isset($commentError) ? $commentError : '';

				if(isset($emailSent) && $emailSent == true) { ?>

							<div class="thanks">
								<p class="success-box"><?php multitranslate("Thanks, your email was sent successfully", "_tr_mess_sussess"); ?>!</p>
							</div>
						<?php } else { ?>
							<?php if(isset($hasError) || isset($captchaError)) { ?>
								<p class="error-box"><?php multitranslate("Sorry, an error occured.", "_tr_send_later"); ?><p>
							<?php } ?>
						<form action="<?php the_permalink(); ?>" id="contactForm" method="post" class="contactForm contact_Form">
							<fieldset>
								<div class="row">
									<label for="contactName"><?php multitranslate("Name", "_comments_form_name"); ?>:</label>
									<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo sanitize_text_field( $_POST['contactName'] ); ?>" class="required requiredField" />
									<?php if($nameError != '') { ?>
										<span class="cform_error"><?php echo $nameError;?></span>
									<?php } ?>
								</div>
							<div class="row">
								<label for="email"><?php multitranslate("E-mail", "_comments_form_email"); ?>:</label>
								<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" />
								<?php if($emailError != '') { ?>
									<span class="cform_error"><?php echo $emailError;?></span>
								<?php } ?>
							</div>
							<div class="row messagefield">
								<label for="commentsText"><?php multitranslate("Message", "_tr_message"); ?>:</label>
								<textarea name="comments" id="commentsText" rows="20" cols="30" class="required requiredField"><?php if ( isset($_POST['comments']) ) { echo esc_textarea($_POST['comments']); } ?></textarea>
								<?php if($commentError != '') { ?>
									<span class="cform_error"><?php echo $commentError;?></span>
								<?php } ?>
							</div>
							<div class="row">
								<button type="submit" id="contSubmit" class="button medium button-style1 align-btn-right" value="send"><?php multitranslate("send", "_tr_send"); ?></button>
							</div>
							<input type="hidden" name="submitted" id="submitted" value="true" />
						</fieldset>
					</form>
				<?php } ?>

		</div><!--/ .l-grid-9-->

	<?php endwhile; endif;// LOOP END ?>

		<div class="l-grid-5 l-float-right">
			
		<?php if ($gmap) : ?>

			<h1><?php multitranslate('How To Find Us', '_contact_htfu'); ?></h1>
			<div class="map-substrate">
				<div class="border-shadow">
					<figure>
						<div id="map_canvas" class="pic">
							<?php

								$subject = stripslashes($gmap);
								$pattern = "/width=\"\d+\" height=\"\d+\"/";
								$replacement = "width=\"292\" height=\"254\"";
								$subject = preg_replace($pattern, $replacement, $subject);

								$cutter = '/<br \/>/';

								$map_result = preg_split($cutter, $subject);
								echo $map_result[0];

							?>
						</div>
					</figure>
				</div>
			</div>

		<?php endif ?>

		<aside id="sidebar">
			<?php
				if ( function_exists('dynamic_sidebar') && $custom_sidebar_trigger && $custom_sidebar ){
					dynamic_sidebar($custom_sidebar);
				}elseif( function_exists('dynamic_sidebar') ) {
					dynamic_sidebar($gen_side);
				}
			?>
		</aside><!--/ #sidebar-->

		</div>

	<div class="kids_clear"></div>                                
</div><!-- .entry-container -->