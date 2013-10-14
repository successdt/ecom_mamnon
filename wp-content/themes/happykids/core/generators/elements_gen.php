<?php

	class elementsGenerator {

		function text($item) {
			extract($this->option_atts(array(
				"id" => "",
				// "default" => "",
				"value" => "",
				"size" => "",
				"class"=> "",
				"placeholder"=> "",
				"styles"=> "",
			), $item));

			$class = isset($class) ? ' class="'.$class.'"':'';
			$default = isset($item['default']) ? $item['default'] : '';
			$value = isset($value) ? sanitize_text_field($value) : '';
			if (!$value && $default) $value = $default;
			$size = isset($size) ? $size : '';
			$styles = isset($styles) ? $styles : '';

			echo '<div style="'.$styles.'"><input'.$class.' name="' . $id . '" id="' . $id . '" type="text" maxlength="' . $size . '" value="' . $value . '" placeholder="'. $placeholder .'" /></div>';
		}
		
		function textarea($item) {
			extract($this->option_atts(array(
				"id" => "",
				"default" => "",
				"value" => "",
				"rows" => "7",
				"class"=> "",
				"placeholder" => ""
			), $item));
			$class = $class?' class="'.$class.'"':'';
			
			$holder = isset($item['placeholder']) ? $item['placeholder'] : 'Message';

			echo '<textarea'.$class.' rows="' . $rows . '" name="' . $id . '" id="' . $id . '" type="textarea" placeholder="'.$holder.'">' . esc_textarea($value) . '</textarea>';
		}
		
		function select($item){

			extract($this->option_atts(array(
				"default" => ""
			), $item));

			$selected_value = isset ($item['value']) ? $item['value'] : '';
			if (!$selected_value) $selected_value = $default;

			$class = isset ($item['class']) ? $item['class'] : '';
			$select_content = '';
			foreach ($item['options'] as $option => $option_value) {
				$selected = ($selected_value == $option) ? ' selected="selected"' : '';
				$select_content .= '<option value="'. $option .'" '. $selected .'>'. $option_value .'</option>';
			}
			
			$select_description = $item['desc'] ? $item['desc'] : '';
			
			echo <<<SELECT
					<select name="{$item['id']}" id="{$item['id']}" data-type="select">
						{$select_content}
					</select>
					<span class="select_box"></span>
SELECT;
		}
		
		function checkbox($item){
			extract($this->option_atts(array("default" => "", "value" => ""), $item));

			$default = isset($default) ? $default : '';
			$value = isset($value) ? $value : $default;
			$checker = '';

			if( $value ){
				$checker = ' checked="checked" ';
			}
			
			$description = ( isset($item['desc']) && $item['desc'] ) ? '' : '';
			echo <<<CHECKBOX
					<div class="menu_option_item_container checkbox_item">
						<div class="_check">
							<label for="{$item['id']}"></label>
							<input type="checkbox" id="{$item['id']}" {$checker} name="{$item['id']}" data-type="checkbox" data-default="{$default}" />
						</div>
						{$description}
					</div>
CHECKBOX;
		}
		
		function color_picker($item) {
			extract($this->option_atts(array(
				"id" => "",
				"default" => "",
				"value" => "",
				"size" => "10",
				"class" => "",
			), $item));
			
			$class = isset($class) ? ' class="'.$class.'"':'';
			$default = isset($item['default']) ? $item['default'] : '';
			$value = isset($value) ? $value : '';
			if (!$value && $default) $value = $default;
			$size = isset($size) ? $size : '';

			$class = $class?' class="'.$class.'"':'';
			
			echo '<div class="color-input-wrap"><input class="cws_colorpicker" name="' . $id . '" id="' . $id . '" type="text" size="' . $size . '" value="' . $value . '" /></div>';
		}

		function sidebar_name_select ($item){
			global $wp_registered_sidebars;
			$selected_value = $item['value'] ? $item['value'] : '';
			$empty = '<option value="empty">--- Select Sidebar ---</option>';
			$select_content = $empty;
			
			foreach( $wp_registered_sidebars  as $sidebar => $name ){
				$selected = ($selected_value == $name['id']) ? ' selected="selected"' : '';
				$select_content .= '<option value="'. $name['id'] .'" '. $selected .'>'. $name['name'] .'</option>';
			}
			
			echo <<<SIDEBAR_NAME_SELECT
					<div class="menu_option_item_container {$item['class']}">
						<select name="{$item['id']}" id="{$item['id']}" data-type="select">
							{$select_content}
						</select>
					</div>
SIDEBAR_NAME_SELECT;
		}

		function slide_cat_select($item){
			$selected_value = $item['value'] ? $item['value'] : '';
			$select_content = '';
			$select_all	= '';
			$no_tax = '';
			$terms = get_terms('slideshow_category');
			if (!$terms){$no_tax = '<option value="none">--No Categories--</option>';}

			foreach(get_terms('slideshow_category') as $cur_term){
				$selected = ($selected_value == $cur_term->slug) ? ' selected="selected"' : '';
				$select_content .= '<option value="'. $cur_term->slug .'" '. $selected .'>'. $cur_term->name .'</option>';
				$select_all = '<option value="">All</option>';
			}
			echo <<<SLIDE_CAT_SELECT
					<div class="menu_option_item_container {$item['class']}">
						<select name="{$item['id']}" id="{$item['id']}" data-type="select">
							{$no_tax}
							{$select_all}
							{$select_content}
						</select>
						{$item['desc']}
					</div>
SLIDE_CAT_SELECT;
		}

		function pattern_select($item){
			$selected_value = $item['value'] ? $item['value'] : $item['default'];
			$select_content = '';
			$options = $item['options'];

			foreach($options as $key => $value){
				$select_content .= '<li><a class="'. $key .'" title="Pattern '. $value .'"></a></li>';
			}
			echo <<<PATTERN_SELECT
					<div class="menu_option_item_container">
						<div class="kids_theme_control_panel">
							<div id="patterns">
								<ul>
								{$select_content}
								</ul>
							</div>
							<input type="hidden" value="{$selected_value}" name="{$item['id']}" id="{$item['id']}" />
						</div>
						<script type="text/javascript">
							jQuery(document).ready(function($){
								$("#patterns a").each(function(){
									var savedVal = $("#{$item['id']}").val();
									var aClass = $(this).attr("class");
									if (savedVal == aClass){
										$(this).parent().addClass("active");
									}
								});

								$("#patterns a").click(function(){
									$("#patterns a").parent().removeClass("active");
									$(this).parent().addClass("active");
									var value = $(this).attr("class");
									$("#{$item['id']}").val(value);
								});
							});
						</script>
					</div>
PATTERN_SELECT;
		}

		function color_select($item){
			$selected_value = $item['value'] ? $item['value'] : $item['default'];
			$select_content = '';
			$options = $item['options'];

			foreach($options as $key => $value){
				$select_content .= '<li><a class="'. $key .'" title="'. $value .'"></a><span class="active_skin"></span></li>';
			}
			echo <<<COLOR_SELECT
					<div class="menu_option_item_container">
						<div class="kids_theme_control_panel">
							<div id="color_schema">
								<ul>
								{$select_content}
								</ul>
							</div>
							<input type="hidden" value="{$selected_value}" name="{$item['id']}" id="{$item['id']}" />
						</div>
						<script type="text/javascript">
							jQuery(document).ready(function($){
								$("#color_schema a").each(function(){
									var savedVal = $("#{$item['id']}").val();
									var aClass = $(this).attr("class");
									if (savedVal == aClass){
										$(this).parent().addClass("active");
									}
								});

								$("#color_schema a").click(function(){
									$("#color_schema a").parent().removeClass("active");
									$(this).parent().addClass("active");
									var value = $(this).attr("class");
									$("#{$item['id']}").val(value);
								});
							});
						</script>
					</div>
COLOR_SELECT;
		}

		function sidebars_list($item){
			$selected_value = $item['value'] ? $item['value'] : '';

			echo <<<SIDEBARS_LIST
				<div class="menu_option_item_container">
					<input type="text" value="" class="sidebars_list_formatter"/>
					<a herf="#" class="creaws_form_button" id="_add_sidebar">Add Sidebar</a>
					<div class="creaws_sidebars">
					</div>
					<input type="hidden" value="{$selected_value}" id="{$item['id']}" name="{$item['id']}" />
				</div>
				<script type="text/javascript">
					jQuery(document).ready(function($){

						var slideItems = $("#{$item['id']}").val();
						var elementsList = slideItems.split("|");

						for (var key in elementsList){
    						var val = elementsList [key];
    						if (val){
    							$(".creaws_sidebars").append("<div class=\"creaws_sidebar_items\" data-attr=\""+ val +"\"><p>" + val + "</p><a href=\"#\" class=\"creaws_x\"></a></div>");
    						}
						}

						$("#_add_sidebar").click(function(){
							var sideName = $(".sidebars_list_formatter").val();
							var sideList = $("#{$item['id']}").val();
							
							if (sideList && sideName){
								$("#{$item['id']}").val(sideList + "|" + sideName);
							}else if (sideName){
								$("#{$item['id']}").val("|" + sideName);
							}
							if (sideName){
								$(".creaws_sidebars").append("<div class=\"creaws_sidebar_items\" data-attr=\""+ sideName +"\"><p>" + sideName + "</p><a href=\"#\" class=\"creaws_x\"></a></div>");
							}
							$(".sidebars_list_formatter").val("");
						});
						
						$(".creaws_x").live('click', function(){
							var sideName = $(this).parent().attr("data-attr");
							var sideList = $("#{$item['id']}").val();
							var deleteResult = sideList.replace( "|" + sideName, "" );
							$("#{$item['id']}").val(deleteResult);

							$(this).parent().remove();
						});
					});
				</script>

SIDEBARS_LIST;

		}

		function slide_port_select($item){
			$selected_value = $item['value'] ? $item['value'] : '';
			$select_content = '';
			$select_all	= '';
			$no_tax = '';
			$terms = get_terms('portfolio_category');
			if (!$terms){$no_tax = '<option value="none">--No Categories--</option>';}

			foreach($terms as $cur_term){
				$selected = ($selected_value == $cur_term->slug) ? ' selected="selected"' : '';
				$select_content .= '<option value="'. $cur_term->slug .'" '. $selected .'>'. $cur_term->name .'</option>';
				$select_all = '<option value="">All</option>';
			}
			echo <<<SLIDE_PORT_SELECT
					<div class="menu_option_item_container {$item['class']}">
						<select name="{$item['id']}" id="{$item['id']}" data-type="select">
							{$no_tax}
							{$select_all}
							{$select_content}
						</select>
						{$item['desc']}
					</div>
SLIDE_PORT_SELECT;
		}

		function slide_blog_select($item){
			$selected_value = $item['value'] ? $item['value'] : '';
			$select_content = '';
			$select_all	= '';
			$no_tax = '';
			$terms = get_terms('category');
			if (!$terms){$no_tax = '<option value="none">--No Categories--</option>';}

			foreach($terms as $cur_term){
				$selected = ($selected_value == $cur_term->slug) ? ' selected="selected"' : '';
				$select_content .= '<option value="'. $cur_term->slug .'" '. $selected .'>'. $cur_term->name .'</option>';
				$select_all = '<option value="">All</option>';
			}
			echo <<<SLIDE_BLOG_SELECT
					<div class="menu_option_item_container {$item['class']}">
						<select name="{$item['id']}" id="{$item['id']}" data-type="select">
							{$no_tax}
							{$select_all}
							{$select_content}
						</select>
						{$item['desc']}
					</div>
SLIDE_BLOG_SELECT;
		}
	function editor($item) {
		extract($this->option_atts(array(
			"id" => "",
			"default" => "",
			"value" => "",
		), $item));
		
		$settings = array(
							"wpautop" => true,
							"media_buttons" => true
						);

		echo '<div class="cws_a_editor">';
			wp_editor($value,$id,$settings);
		echo '</div>';
	}

		function uploader($item){

			extract($this->option_atts(array(
				"preview_width" => "",
				"preview_height" => "",
			), $item));

			if (isset($item['value']) && $item['value'] != '') {
				// $medup_val = stripslashes($item['value']);			
				// $medup_val = str_replace ("\"", "&quot;", $medup_val);
				$medup_val = esc_url($item['value']);

			} else { 
				$medup_val = ''; 
			}

			if ($item['preview'] == 'show'){
				if (!$medup_val) $medup_val = $item['default'];
				if ($preview_height || $preview_width){
					$preview = '<div class="'. $item['id'] .'-preview uploader_preview"><img src="' . bfi_thumb( $medup_val, array('width' => $preview_width, 'height' => $preview_height, 'crop' => true) ) . '" alt="'.$item['name'].'" /></div>';
				}else {
					$preview = '<div class="'. $item['id'] .'-preview uploader_preview"><img src="'. $medup_val .'" alt="'. $item['name'] .'" /></div>';
				}
			}else{
				$preview = '';
			}
			echo <<<UPLOADER
					<div class="uploader_wrap">
					<div class="uploader">
						<input type="text" name="{$item['id']}" id="{$item['id']}" value="{$medup_val}" />
						<input type="button" class="button media_upload_button" name="{$item['id']}_u-button" id="{$item['id']}_u-button" value="Upload" />
						<input type="button" class="button" name="{$item['id']}_c-button" id="{$item['id']}_c-button" value="Clear" />
					</div>
					{$preview}
					<script type="text/javascript">
						// media uploader start
						jQuery(document).ready(function($){
						  var _custom_media = true,
						      _orig_send_attachment = wp.media.editor.send.attachment;
						  $('#{$item['id']}_u-button').click(function(e) {
						    var send_attachment_bkp = wp.media.editor.send.attachment;
						    var button = $(this);
						    var id = button.attr('id').replace('_button', '');
						    _custom_media = true;
						    wp.media.editor.send.attachment = function(props, attachment){
						      if ( _custom_media ) {
						        $('#{$item['id']}').val(attachment.url);
						      } else {
						        return _orig_send_attachment.apply( this, [props, attachment] );
						      };
						    }
						    wp.media.editor.open(button);
						    return false;
						  });
						  $('.add_media').on('click', function(){
						    _custom_media = false;
						  });
							
							$('#{$item['id']}_c-button').click(function(){
								$('#{$item['id']}').val('');
								$('.{$item['id']}-preview img').remove();
								$('.{$item['id']}-preview').append('<img src="{$item['default']}" alt="{$item['name']}" />');
							});

						});
						// media uploader ends
					</script>
					</div>
UPLOADER;
		}

		function option_atts($pairs, $atts){
			$atts = (array)$atts;
			$out = array();
			foreach($pairs as $name => $default) {
				if ( array_key_exists($name, $atts) )
					$out[$name] = $atts[$name];
				else
					$out[$name] = $default;
			}
			return $out;
		}

		function font_select($item){
?>
			<div class="font_cont">
				<?php echo $item['name']; ?>
				<select name="<?php echo $item['id']; ?>" id="<?php echo $item['id']; ?>" class="gfont_select" data-gfontajax="<?php echo admin_url( 'admin-ajax.php' ); ?>">
					<option value="<?php echo $item['default'] ?>">--- Select font ---</option>
				  <?php
					global $Fonts;

					$font_list = $Fonts->build_admin_font_selector();

					$font_size = isset($item['font_size']) ? $item['font_size'] : '';
					if ($font_size == '') $font_size = 16;
					
					$selected_value = isset($item['value']) ? $item['value'] : $item['default'];
					
					foreach ($font_list as $option => $option_value) { ?>
						<optgroup label="<?php echo $option; ?>">
						<?php foreach ($option_value as $font) { ?>
							<option data-gfonttype="<?php echo $option; ?>" value="<?php echo $font; ?>" <?php if ($selected_value == $font) { echo 'selected="selected"'; } ?>><?php echo $font; ?></option>
						<?php } ?>
						</optgroup>
						<?php 
					}
				  ?>
				</select>
				<div class="gfont_preview" <?php if( $selected_value ) echo ' style="font-size:'. $font_size .'px ;font-family:'. $selected_value .'"'; ?>>Grumpy wizards make toxic brew for the evil Queen and Jack.</div>
			</div>
<?php
		}
		
	}

?>