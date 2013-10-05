<?php

	class optionGenerator {
		var $name;
		var $options;
		var $saved_options;
		var $generator;
		
		function optionGenerator($name, $options, $defaults = null) {
			require_once (THEME_GENERATORS . '/elements_gen.php');
			$this->generator = new elementsGenerator();
			
			$this->name = $name;
			$this->options = $options;
			
			$this->save_options();
			$this->render();
		}
		
		function save_options() {
			$options = get_option(THEME_SLUG . '_' . $this->name);

			if (isset($_POST['save_theme_options'])) {

				foreach($this->options as $value) {
					if (isset($value['id']) && ! empty($value['id'])) {
						if (isset($_POST[$value['id']])) {
							switch($value['type']){
								case 'toggle':
									if($_POST[$value['id']] == 'true'){
										$options[$value['id']] = true;
									}else{
										$options[$value['id']] = false;
									}
									break;
								case '':
									break;
								default:
									$options[$value['id']] = $_POST[$value['id']];
							}
						} else {
							if ($value['type'] == 'multiselect') {
								$options[$value['id']] = array();
							} else {
								$options[$value['id']] = false;
							}
						}
					}
					if (isset($value['process']) && function_exists($value['process'])) {
						$options[$value['id']] = $value['process']($value,$options[$value['id']]);
					}
				}
				
				echo '
						<div id="creaws_save_confirm" class="creaws_cover_all" style="display: block;">
							<div class="creaws_popUp popUp_success" style="display: block;">
								<p class="creaws_message_done">Options Saved!</p>
								<div class="creaws_ok_button_wrapper">
									<a class="creaws_ok_button okay">Ok</a>
								</div>
							</div>
						</div>';
				
				if ($options != $this->options) {
					update_option(THEME_SLUG . '_' . $this->name, $options);
					global $theme_options;
					$theme_options[$this->name] = $options;
				}

			}
			
			$this->saved_options = $options;
		
		}

		function render() {
			echo '<div class="theme-options">';
			echo '<form method="post" action="">';
			
			foreach($this->options as $option) {
				$this->renderOption($option);
			}

			echo '</form>';
			echo '</div>';
		}

		function renderOption($option){
			
			global $post;
			if(isset($option['id'])){
				if (isset($this->saved_options[$option['id']])) {
					if( is_string($this->saved_options[$option['id']])){
						$option['value'] = stripslashes($this->saved_options[$option['id']]);
					}else{
						$option['value'] = $this->saved_options[$option['id']];
					}
				}else{
					if(isset($option['default'])){
						$option['value'] = $option['default'];
					}else{
						$option['value'] = '';
						$option['default'] = '';
					}
				}
			}
			if (isset($option['prepare']) && function_exists($option['prepare'])) {
				$option = $option['prepare']($option);
			}
			if (method_exists($this->generator, $option['type'])) { 
				echo '<div class="optitem"><h4><label for="'.$option['id'].'">' . $option['name'] . '</label></h4><div>';
				if(isset($option['desc'])){
					echo '<p class="description">' . $option['desc'] . '</p>';
				}
				$this->generator->$option['type']($option);
				echo '</div></div>';
			}elseif (method_exists($this, $option['type'])) {
				$this->$option['type']($option);
			}
		}

		function title($item) {
			echo '<h2>' . $item['name'] . '</h2>';
			if (isset($item['desc'])) {
				echo '<p>' . $item['desc'] . '</p>';
			}
		}

		function start($item) {
			echo '<div class="cws_page">
					<div class="siteTop">
						<header>
							<div id="creaws_admin_header">
								<div class="grid_3 alpha omega" id="creaws_logo"><a href="http://themeforest.net/user/CreativeWS"></a></div>
							</div>
						</header>
						<div id="creaws_main">';
		}

		function end($item) {
			echo '</div></div>';
			echo '<div id="creaws_footer">
				      <!-- Social icons -->
				      <div class="grid_3 alpha omega" id="creaws_social">
				         <p><a href="https://twitter.com/Creative_WS"><img alt="" src="'. THEME_ADMIN_IMAGES .'/social_icon1.png"></a><a href="http://www.facebook.com/CreaWS"><img alt="" src="'. THEME_ADMIN_IMAGES .'/social_icon2.png"></a><a href="http://themeforest.net/user/CreativeWS"><img alt="" src="'. THEME_ADMIN_IMAGES .'/social_icon4.png"></a></p>
				      </div>
				      <!-- Form Buttons -->
				      <div class="grid_3 alpha omega" id="creaws_form_buttons">
						<input class="creaws_form_button" type="submit" value="Save Changes" name="save_theme_options" style="width: 20%; height: 33px;">
				      </div>
				   <!-- End of Footer -->
				</div>';
			echo '</div>
					<div class="creaws_cover_all">
						<div class="creaws_popUp popUp_reset">
							<p class="creaws_message_done">All options have been resetted successfully.</p>
							<div class="creaws_ok_button_wrapper">
								<a class="creaws_ok_button okay resetwasok">Ok</a>
							</div>
						</div>
						<div class="creaws_popUp popUp_confirm">
							<p class="creaws_message_done">Are you sure you want to reset all settings to defaults?</p>
   							<div class="creaws_ok_button_wrapper">
								<a class="creaws_ok_button confirm">Yes</a>
								<a class="creaws_ok_button decline">No</a>
							</div>
						</div>
					</div>';
		}

		function serv_buttons(){
			echo '<h4 style="border-top:1px solid #fff; margin-top: 0px; padding-top: 10px;"><label for="">General</label></h4>';
			echo '<div style="text-align: center; padding: 20px;">';
			echo '<a href="'. admin_url() .'/import.php" class="creaws_form_button">Import demo content</a>';
			echo '<a href="#" id="cws_reset" class="creaws_form_button">Reset to default</a>';
			echo "</div>";
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
		
		function cws_sidebar($item){
			$ops = isset($item['options']) ? $item['options'] : '';

			echo '<aside id="creaws_aside">
					<div class="grid_3 alpha omega">
						<nav>
							<ul>';

								$i = 1;

								foreach ($ops as $ids => $texts) {
									echo '<li><a id="'. $ids .'" class="creaws_icon'. $i .'" href="#">'. $texts .'</a></li>';

									$i++;
								}

			echo			'</ul>
						</nav>
					</div>
					<!-- End of Left Part of Site with List of Buttons -->
				</aside>';
		}

		function creaws_content(){
			echo '<section>
						<div id="creaws_section">
							<div id="creaws_content" class="grid_9 alpha">';
			
		}

		function creaws_content_title($item){
			echo '<h1>'. $item['name'] .'</h1>';
		}

		function creaws_content_end(){
			
			echo '<div class="clear"></div>
				</div>
			</section>';
		}

		function creaws_section($item){
			echo '<section class="common_display_none '. $item['class'] .'">';
		}

		function creaws_section_end(){
			echo '</section>';
		}

	}

?>