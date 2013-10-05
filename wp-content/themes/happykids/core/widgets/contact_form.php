<?php

	class CWS_Widget_Contact extends WP_Widget {

		function __construct() {
			$widget_ops = array('classname' => 'widget_cform', 'description' => 'Simple contact form' );
			parent::WP_Widget( false,  THEME_NAME . ' - Contact Form' );
			// parent::__construct('cform', 'Contact Form', $widget_ops);
		}

		function widget( $args, $instance ){
				extract($args);
				
				$title = apply_filters('Custom_Widget_Contact_Form', $instance['title'] );
				$tpl_dir =  get_template_directory_uri();
				
				echo $args['before_widget'];
				
				if ($title) {
					echo $args['before_title'] . $title . $args['after_title'];
				}
				
				$__name = multitranslate('Your Name', '_contact_form_name', false);
				$__email = multitranslate('Your Email', '_contact_form_email', false);
				$__message = multitranslate('Message', '_contact_form_message', false);
				$__send = multitranslate('Send Message', '_contact_form_send', false);
				$__status = multitranslate("Sending ...", "_contact_form_sending", false);

				$rand = rand(1, 200);

				echo <<<FORM
					<div class="contact-us">
						<form id="widget_cform-{$rand}" class="creaws_widget_cform" action="{$tpl_dir}/core/functions/mailsender.php" method="POST">
							<fieldset>
								<div class="row">
									<input type="text" class="required" placeholder="{$__name}" name="name" id="name title="{$__name}">
								</div>
								<div class="row">
									<input type="text" class="required email" placeholder="{$__email}" name="email" id="email title="{$__email}">
								</div>
								<div class="row">
									<textarea cols="60" rows="4" class="required" placeholder="{$__message}" name="message" id="message title="{$__message}"></textarea>
								</div>
								<div class="row">
									<input type="submit" id="send_message-{$rand}" class="button medium button-style1" value="{$__send}">
								</div>
								<div class="sending_status" style="margin-left:20px;width:100%;overflow:hidden;"></div>
								<div class="clearboth"></div>
						</form>

					</div>
					<script type="text/javascript">
					/* Contact form ajax */
						jQuery('#widget_cform-{$rand} #send_message-{$rand}').click(function(e){
							var form_item = jQuery('#widget_cform-{$rand}');
							var form_status = jQuery('#widget_cform-{$rand} .sending_status');
							var form_data = form_item.serialize();
							var form_url = form_item.attr('action');
							var form_method = form_item.attr('method');
							
							form_status.show().html('{$__status}');
							
							jQuery.ajax(form_url,{
								'data' : form_data ,
								'type' : form_method ,
								'success' : function(message){
									form_status.html(message);
								}
							});		
							e.preventDefault();
						});
					/* Contact form ajax END*/
					</script>
FORM;
				
				echo $args['after_widget'];
			}

			function update( $new_instance, $old_instance ) {
				$instance = $old_instance;

				/* Strip tags for title and name to remove HTML (important for text inputs). */
				$instance['title'] = strip_tags( $new_instance['title'] );
				
				return $instance;
			}

			function form( $instance ) {
				global $shortname;
				$title = isset($instance['title']) ? $instance['title'] : '';
				$email = theme_get_option($shortname . "_contactspage_mail");
				if (!$email || $email == '') $email = get_option('admin_email');
				?>			
				<p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title: <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
				<p><label>Email will be sent on: </label><u><?php echo $email; ?></u><br><br>
					You can set email adresses in <br>admin panel -> Happy Kids -> Contacts
				</p>
				<?php
			}
		}