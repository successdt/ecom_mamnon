<?php
	/**
	 * Navigation Widget Class
	 */
	class CWS_Widget_Nav extends WP_Widget {

		function CWS_Widget_Nav() {
			// Instantiate the parent object
			parent::WP_Widget( false, THEME_NAME . ' - Navigation' );
		}
		
		function widget( $args, $instance ){
			extract($args);
			$title = apply_filters('CWS_Widget_Nav', $instance['title']);
			$head = '';
			$menu = isset($instance['menus']) ? $instance['menus'] : '';

			if($title && $title != '') $head = '<h3 class="widget-title">' . $title . '</h3>';
			$rand = rand(1,200);

			$menu_args = array(
				'menu'=> $menu,
				'container' => '',
				'menu_id' => 'nav-' . $rand,
				'echo' => false,
				'fallback_cb' => 'wp_page_menu',
				'depth' => 1,
			);

			echo $args['before_widget'];

			echo '<div class="nav_cat">';
			if ($head) echo '<div style="height: 46px;">'. $head .'</div>';

			echo wp_nav_menu($menu_args) . 
					'</div>
					<script>
						jQuery(document).ready(function($) {
							if($("#nav-'. $rand . '").length) {
								$(this).find(".current-menu-item a").addClass("selectedLava");
								$("#nav-'. $rand . '").lavaLamp({
									target: "li > a",
									container: "li",
									fx: "easeOutCubic",
									speed: 400
								});	
							}
						});
					</script>' .

				$args['after_widget'];
		}
		
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title'] = strip_tags($new_instance['title']);
			$instance['menus'] = strip_tags($new_instance['menus']);

			return $instance;
			
		}
		
		function form( $instance ){
			$menus = isset($instance['menus']) ? $instance['menus'] : '';
			$menus_list = get_terms('nav_menu');
			$title = isset($instance['title']) ? $instance['title'] : '';
		?>
		<div class="testimonial_item_container">
			<p>
				<label style="margin-right: 30px;">Title: <input name="<?php echo $this->get_field_name('title')?>" type="text" value="<?php echo $title; ?>" style="width: 216px;" /></label>
	<?php
				if (!$menus_list){
					echo 'Create menu in admin panel -> appearance -> menus';
				}else {
					echo '<label>Select menu:</label><br/><select name="'. $this->get_field_name('menus') .'">';
						foreach($menus_list as $menu_item){
							echo ' <option ';
							if ($menus == $menu_item->slug) echo 'selected="selected"';
							echo ' value="'. $menu_item->slug .'">' . $menu_item->name .'</option>';
						}
					echo '</select>';
				}
	?>
			</p>
		</div>
			
		<?php
		
		}
		
	}

?>