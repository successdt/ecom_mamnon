<?php

	class metaboxesGenerator{
		var $settings;
		var $options;
		var $saved_options;
		var $generator;
		
		function metaboxesGenerator($settings, $options) {
			include_once (THEME_GENERATORS . '/elements_gen.php');
			$this->generator = new elementsGenerator();
			
			$this->settings = $settings;
			$this->options = $options;
			
			add_action('admin_menu', array(&$this, 'create'));
			add_action('save_post', array(&$this, 'save'));
		}
		
		function create() {
			if (function_exists('add_meta_box')) {
				if (! empty($this->settings['callback']) && function_exists($this->settings['callback'])) {
					$callback = $this->settings['callback'];
				} else {
					$callback = array(&$this, 'render');
				}
				if(is_array($this->settings['pages'])){
					foreach($this->settings['pages'] as $page) {
						add_meta_box($this->settings['id'], $this->settings['title'], $callback, $page, $this->settings['context'], $this->settings['priority']);
					}
				}
			}
		}
		
		function save($post_id) {
			if (! isset($_POST[$this->settings['id'] . '_noncename'])) {
				return $post_id;
			}
			
			if (! wp_verify_nonce($_POST[$this->settings['id'] . '_noncename'], plugin_basename(__FILE__))) {
				return $post_id;
			}
			
			if ('page' == $_POST['post_type']) {
				if (! current_user_can('edit_page', $post_id)) {
					return $post_id;
				}
			} else {
				if (! current_user_can('edit_post', $post_id)) {
					return $post_id;
				}
			}
			
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
				return $post_id;
			}
			
			foreach($this->options as $option) {
				if (isset($option['id']) && ! empty($option['id'])) {
					
					if (isset($_POST[$option['id']])) {
						switch ($option['type']) {
							case 'multidropdown':
								$value = array_unique(explode(',', $_POST[$option['id']]));
								break;
							case 'tritoggle':
								switch($_POST[$option['id']]){
									case 'true':
										$value = 'true';
										break;
									case 'false':
										$value = 'false';
										break;
									case 'default':
										$value = '';
								}
								break;
							case 'toggle':
								$value = 'true';
								break;
							default:
								$value = $_POST[$option['id']];
						}
					} else if ($option['type'] == 'toggle') {
						$value = 'false';
					} else {
						$value = false;
					}
					
					if (isset($option['process']) && function_exists($option['process'])) {
						$value = $option['process']($option,$value);
					}
					
					if (get_post_meta($post_id, $option['id']) == "") {
						add_post_meta($post_id, $option['id'], $value, true);
					} elseif ($value != get_post_meta($post_id, $option['id'], true)) {
						update_post_meta($post_id, $option['id'], $value);
					} elseif ($value == "") {
						delete_post_meta($post_id, $option['id'], get_post_meta($post_id, $option['id'], true));
					}
				}
			}
		}
		
		function render() {
			foreach($this->options as $option) {
				$this->renderOption($option);
			}
			
			echo '<input type="hidden" name="' . $this->settings['id'] . '_noncename" id="' . $this->settings['id'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';
		}
		
		function renderOption($option){
			global $post;
			if (isset($option['id'])) {
				$value = get_post_meta($post->ID, $option['id'], true);
				if ($value != "") {
					$option['value'] = $value;
				}else{
					$option['value'] = isset($option['default']) ? $option['default'] : '';
				}
			}
			if (isset($option['prepare']) && function_exists($option['prepare'])) {
				$option = $option['prepare']($option);
			}
			if (method_exists($this->generator, $option['type'])) {
				$class = isset($option['class']) ? $option['class'] : '';

				echo '<div class="meta-box-item ' . $class . '">';
				echo '<div class="meta-box-item-title"><h4>' . $option['name'] . '</h4>';
				if (isset($option['desc'])) {
					echo '</div><p class="description">' . $option['desc'] . '</p>';
				} else {
					echo '</div>';
				}
				echo '<div class="meta-box-item-content">';
				$this->generator->$option['type']($option);
				echo '</div>';
				echo '</div>';
			}elseif (method_exists($this, $option['type'])) {
				$this->$option['type']($option);
			}
		}
		
		
		function title($item) {
			echo '<div class="meta-box-item">';
			if (isset($item['name'])) {
				echo '<div class="meta-box-item-title"><h4>' . $item['name'] . '</h4></div>';
			}
			if (isset($item['desc'])) {
				echo '<p>' . $item['desc'] . '</p>';
			}
			echo '</div>';
		}
		
		function custom($item) {
			if(isset($item['layout']) && $item['layout']==false){
				if (isset($item['function']) && function_exists($item['function'])) {
					if(isset($item['default'])){
						$item['function']($item, $item['default']);
					}else{
						$item['function']($item);
					}
				} else {
					echo $item['html'];
				}
			}else{
				echo '<div class="meta-box-item' . $item['class'] . '">';
				echo '<div class="meta-box-item-title"><h5>' . $item['name'] . '</h5>';
				if (isset($item['desc'])) {
					echo '</div><p class="description">' . $item['desc'] . '</p>';
				} else {
					echo '</div>';
				}
				echo '<div class="meta-box-item-content">';
			
				if (isset($item['function']) && function_exists($item['function'])) {
					if(isset($item['default'])){
						$item['function']($item, $item['default']);
					}else{
						$item['function']($item);
					}
				} else {
					echo $item['html'];
				}
				echo '</div>';
				echo '</div>';
			}
		}




		function button_list($item){
			echo '<div id="cws_button_list"><ul class="top_ul">';
		}	
			function shortcodes_item($item){
				$id = isset($item['id']) ? $item['id'] : '';
				$name = isset($item['name']) ? $item['name'] : '';
				$opts = isset($item['options']) ? $item['options'] : '';

				$sublist = '';
				$dt_list = '';

				if ($opts && is_array($opts)){
					$sublist = '<ul class="sub_ul">';
					foreach ($opts as $arr_name => $arr_vals) {

						if ( $arr_vals && is_array($arr_vals) ){

							$dt_list = '<ul class="sub_ul_codes">';

								foreach ($arr_vals as $key => $value) {
									$dt_list .= '<li><a href="#" data-attr="'. $value .'">'. $key .'</a></li>';
								}

							$dt_list .= '</ul>';
						}elseif ( is_string($arr_vals) ) {
							$dt_list = '<a class="noarray_link" href="#" data-attr="'. $arr_vals .'"></a>';
						}

						$sublist .= '<li>'. $arr_name . $dt_list .'</li>';
					}

					$sublist .= '</ul>';
				}else{
					$sublist .= '<a class="noarray_link" href="#" data-attr="'. $opts .'"></a>';
				}

				echo '<li>'. $name . $sublist .'</li>';
			}

			function shortcodes_separator(){
				echo '<hr>';
			}

		function button_list_end(){
			echo '</ul></div>';
		}



		function meta_group($item){
			echo '<div class="meta_group">';
			if (isset($item['name'])) {
				echo '<h4>' . $item['name'] . '</h4>';
			}	
		}

		function meta_group_end(){
			echo '</div>';
		}

		function meta_sidebar(){
			echo '<div class="meta_sidebar" style="float:left; width:25%;">';
		}

		function meta_sidebar_end($item){
			echo '</div>';		
		}

		function meta_content($item){
			echo '<div class="meta_content" style="float:left;">';		
		}

		function meta_content_end($item){
			echo '</div><div class="clearboth" style="clear:both;"></div>';		
		}

	}

?>