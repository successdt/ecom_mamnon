<?php
	/**
	 * Flickr Widget Class
	 */
	class CWS_Widget_Flickr extends WP_Widget {

		function CWS_Widget_Flickr() {
			// Instantiate the parent object
			parent::WP_Widget( false,  THEME_NAME . ' - Flickr' );

		}

		function widget( $args, $instance ){
			extract($args);
			$title = apply_filters('CWS_Widget_Flickr', $instance['title'] );
			$id = ($instance['name']) ? $instance['name'] : '';
			$max_number = ($instance['show']) ? $instance['show'] : 9;
			$rand = rand(1, 200);
			$head = '';

			if($title && $title != '') $head = '<h3 class="widget-title">' . $title . '</h3>';

	echo $args['before_widget'];

		echo '<div class="flickr widget_flickr_feed">';
		echo $head;

	if ($id){
		echo <<<FLICKR
					<ul id="flickr-badge-{$rand}" class="flickr-badge clearfix"></ul>
					<script type="text/javascript">
						if(jQuery('ul#flickr-badge-{$rand}').length) {
							jQuery('ul#flickr-badge-{$rand}').jflickrfeed({
								limit: {$max_number},
								qstrings: {
								id: '{$id}'
							},
							itemTemplate: '<li><a href="http://www.flickr.com/photos/{$id}"><img src="{{image_s}}" alt="{{title}}" /></a></li>'
							}, function() {jQuery('#flickr-badge-{$rand} li:nth-child(3n)').addClass('last');});
						}
					</script>
FLICKR;
	}
			echo '</div>';
			echo $args['after_widget'];
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['name'] = strip_tags($new_instance['name']);
			$instance['show'] = strip_tags($new_instance['show']);

			return $instance;
			//	update_option('ww_flickr', $data);
		}

		function form( $instance ) {

			$title = isset($instance['title']) ? $instance['title'] : '';
			$name = isset($instance['name']) ? $instance['name'] : '';
			$show = isset($instance['show']) ? $instance['show'] : 9;
			
			  ?>
				<p><label>Title: <input name="<?php echo $this->get_field_name('title'); ?>"
			type="text" value="<?php echo $title; ?>" /></label></p>
			  <p><label>Flickr Username:<br />@<input name="<?php echo $this->get_field_name('name'); ?>"
			type="text" value="<?php echo $name; ?>" /></label></p>
			  <p><label># of images to Show:</label>
			  <select name="<?php echo $this->get_field_name('show'); ?>">
			<?php
				for ( $i = 0; $i <= 18; $i = $i + 3){
					echo ' <option ';
					if ( $show == $i){echo 'selected="selected"';}
					echo ' value="'. $i .'">' . $i .'</option>';
				}
			?>
			</select></p>
			  <?php
		}
	}

?>