<?php
	/**
	 * Latest Posts Widget Class
	 */
	class CWS_Widget_Latest_Posts extends WP_Widget {

		function CWS_Widget_Latest_Posts() {
			// Instantiate the parent object
			parent::WP_Widget( false,  THEME_NAME . ' - Latest Posts with thumbnails' );

		}

		function widget( $args, $instance ){
			extract($args);
			$title = apply_filters('CWS_Widget_Latest_Posts', $instance['title'] );
			$head = '';
			
			if($title && $title != '') $head = '<h3 class="widget-title">' . $title . '</h3>';

			global $post;
			$post_query = array( 'numberposts' => 3 );
			if( $instance['num_to_show'] ) $post_query['numberposts'] = $instance['num_to_show'];
			
			$myposts = get_posts( $post_query );
			
			echo $before_widget;
				echo '<div class="latest-posts-widget">';
				echo $head;
				echo "<ul>";

			$myposts = get_posts( $post_query );

			foreach( $myposts as $post ){
			
				$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'full', true);
							
				setup_postdata($post);

				echo '<li>';
				
				if ( has_post_thumbnail() ) {
					echo '<div class="kids_image_wrapper ">';
					
					echo '<a href="'. $thumbnail[0] .'" class="prettyPhoto kids_mini_picture"  data-rel="prettyPhoto[rpwt]">';
					echo '<img src="' . bfi_thumb( $thumbnail[0], array('width' => 78, 'height' => 68, 'crop' => true) ) . '" width="60" height="54" alt=""></a></div>';
				}

				echo '<div class="kids_post_content"><h4><a href="' . get_permalink() . '">'. get_the_title() . '</a></h4>';
				echo '<p>'. the_excerpt_max_charlength(50) .'</p></div></li>';

			}  wp_reset_postdata();

			echo '</ul>' . $args['after_widget'];
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['num_to_show'] = strip_tags($new_instance['num_to_show']);
			
			return $instance;
		}

		function form( $instance ) {
			$title = isset($instance['title']) ? $instance['title'] : '';
			$num_to_show = isset($instance['num_to_show']) ? $instance['num_to_show'] : '';

			  ?>			
			  <p><label>Title: <input name="<?php echo $this->get_field_name('title'); ?>"
			type="text" value="<?php echo $title; ?>" /></label></p>
			  </p>
			  <p><label># of posts to show:</label> 
			  <select name="<?php echo $this->get_field_name('num_to_show'); ?>">
			<?php
				for ( $i = 0; $i <= 8; $i++){
					echo ' <option ';
					if ($num_to_show == $i){echo 'selected="selected"';}
					echo ' value="'. $i .'">' . $i .'</option>';
				}
			?>		 
			</select></p>
			  <?php
		}
	}

?>