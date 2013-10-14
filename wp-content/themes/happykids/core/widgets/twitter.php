<?php
		/**
		 * Flickr Widget Class
		 */
	class CWS_Widget_Tweets extends WP_Widget {

		function CWS_Widget_Tweets() {
			// Instantiate the parent object
			parent::WP_Widget( false, THEME_NAME . ' - Twitter' );
		}

		function widget( $args, $instance ){
			extract($args);

			$gen_sets = theme_get_option('general', 'gen_sets');
			$ck = isset($gen_sets['twt_ck']) ? $gen_sets['twt_ck'] : '';
			$cs = isset($gen_sets['twt_cs']) ? $gen_sets['twt_cs'] : '';
			$ut = isset($gen_sets['twt_ut']) ? $gen_sets['twt_ut'] : '';
			$us = isset($gen_sets['twt_us']) ? $gen_sets['twt_us'] : '';

			$title = apply_filters('CWS_Widget_Tweets', $instance['titletweets'] );
			$username = ($instance['twitter_username']) ?  $instance['twitter_username'] : '';
			$number = isset($instance['show_num']) ? $instance['show_num'] : '';
			$rand = rand(1,1000);
			$head = '';

			if($title && $title != '') $head = '<h3 class="widget-title">' . $title . '</h3>';

			echo $args['before_widget'];
				echo '<div class="widget_recent_comments">';
				echo $head;
	?>
	<?php if (!$ck || !$cs || !$ut || !$us) : ?>
			<div id="tweet-<?php echo $rand;?>" class="block_recent_tweets">Please check your Twitter settings!</div>
	<?php else : ?>
			<script type="text/javascript">
				jQuery(function($){
					$("#tweet-<?php echo $rand;?>").tweet({
						username: '<?php echo $username; ?>',
						modpath: themeUrl +'/core/functions/twitter/',
						count: <?php echo $number?>,
						loading_text: 'loading tweets...',
						/* etc... */
					});
				});
			</script>
			<div id="tweet-<?php echo $rand;?>" class="block_recent_tweets"></div>
	<?php endif; ?>
		</div>
		<?php
			echo $args['after_widget'];
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			/* Strip tags for title and name to remove HTML (important for text inputs). */
			$instance['titletweets'] = strip_tags( $new_instance['titletweets'] );
			$instance['twitter_username'] = strip_tags( $new_instance['twitter_username'] );
			$instance['show_num'] = strip_tags( $new_instance['show_num'] );

			return $instance;
		}

		function form( $instance ) {
			$title = isset($instance['titletweets']) ? $instance['titletweets'] : '';
			$user = isset($instance['twitter_username']) ? $instance['twitter_username'] : '';
			$number = isset($instance['show_num']) ? $instance['show_num'] : '';
			
			  ?>
				<p><label for="<?php echo $this->get_field_id( 'titletweets' ); ?>">Title: <input id="<?php echo $this->get_field_id( 'titletweets' ); ?>" name="<?php echo $this->get_field_name( 'titletweets' ); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			  <p><label for="<?php echo $this->get_field_id( 'twitter_username' ); ?>">Twitter Username:<br />@<input id="<?php echo $this->get_field_id( 'twitter_username' ); ?>" name="<?php echo $this->get_field_name( 'twitter_username' ); ?>" type="text" value="<?php echo $user; ?>" /></label></p>
			  <p><label for="<?php echo $this->get_field_id( 'show_num' ); ?>">Tweets to Show:</label> 
			  <select id="<?php echo $this->get_field_id( 'show_num' ); ?>" name="<?php echo $this->get_field_name( 'show_num' ); ?>">
			<?php
				for ( $i = 0; $i <= 8; $i++){
					echo ' <option ';
					if ( $number == $i){echo 'selected="selected"';}
					echo ' value="'. $i .'">' . $i .'</option>';
				}
			?>		 
			</select></p>
			<p><b>Please note:</b> you need to generate the necessary keys, secrets and tokens for using Twitter plugin and fill the <a href="http://happykidswp.creaws.com/help/index.html#!/twitter" target="_blank">according fields</a>. </p>
	<?php
		}
	}
	
?>