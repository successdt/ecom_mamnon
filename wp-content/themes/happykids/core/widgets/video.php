<?php
	/**
	 * Video Widget Class
	 */
	class CWS_Widget_Video extends WP_Widget {

		function CWS_Widget_Video() {
			parent::WP_Widget( false, THEME_NAME . ' - Video' );
		}
		
		function widget( $args, $instance ){
			extract($args);
			$title = apply_filters('CWS_Widget_Video', $instance['title']);
			$head = '';
			$gen_sets = theme_get_option('general', 'gen_sets');
			
			$yt_color = ( isset($gen_sets['_yt_color']) ) ? stripslashes($gen_sets['_yt_color']) : '';
			$yt_theme = ( isset($gen_sets['_yt_theme']) ) ? stripslashes($gen_sets['_yt_theme']) : '';
			$vim_color = ( isset($gen_sets['_vim_color']) ) ? stripslashes($gen_sets['_vim_color']) : '';
			$vim_title = isset($gen_sets['_vim_header']) ? stripslashes($gen_sets['_vim_header']) : '';
			$video_id = isset($instance['video_id']) ? $instance['video_id'] : '';
			$v_type = isset($instance['v_type']) ? $instance['v_type'] : '';

			if ($v_type == 'youtube') $parser_return = theme_youtube_parser($video_id, 178, 117, null, $yt_color, $yt_theme);
			if ($v_type == 'vimeo') $parser_return = theme_vimeo_parser($video_id, 178, 117, null, $vim_color, $vim_title);
			
			if($title && $title != '') $head = '<h3 class="widget-title">' . $title . '</h3>';
			$rand = rand(1,200);

			echo $args['before_widget'];

				echo '<div class="widget_video">';
				echo $head;
				
			echo '<div class="kids_video_wrapper"><figure>' . 

							$parser_return . 

						'</figure></div><!-- .video_wrapper -->
						<div class="kids_clear"></div>

					</div><!--/ widget_video -->' . 

				$args['after_widget'];
		}
		
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title'] = strip_tags($new_instance['title']);
			$instance['v_type'] = strip_tags($new_instance['v_type']);
			$instance['video_id'] = strip_tags($new_instance['video_id']);

			return $instance;
			
		}
		
		function form( $instance ){
			
			$title = isset($instance['title']) ? $instance['title'] : '';
			$video_id = isset($instance['video_id']) ? $instance['video_id'] : '';
			$v_type = isset($instance['v_type']) ? $instance['v_type'] : '';
			$v_hosts = array('youtube' => 'Youtube', 'vimeo' => 'Vimeo');
		?>
		<div class="testimonial_item_container">
			<p>
				<label style="margin-right: 30px;">Title: <input name="<?php echo $this->get_field_name('title')?>" type="text" value="<?php echo $title; ?>" style="width: 216px;" /></label>
				<label>Select video hosting:</label>
				<select name="<?php echo $this->get_field_name('v_type'); ?>">';
<?php
					foreach( $v_hosts as $key => $value ){
						echo '<option ';
						if ($v_type == $key) echo 'selected="selected"';
						echo ' value="'. $key .'">' . $value .'</option>';
					}
?>
				</select>
				<label style="margin-right: 30px;">Video ID: <input name="<?php echo $this->get_field_name('video_id')?>" type="text" value="<?php echo $video_id; ?>" style="width: 216px;" /></label>
			</p>
		</div>
			
		<?php
		
		}
		
	}

?>