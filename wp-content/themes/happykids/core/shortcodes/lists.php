<?php

	function theme_list($atts, $content = null , $code) {
		$the_code = $code;

		if ($code == 'arrow') $the_code = 'type-1';
		if ($code == 'arrow-2') $the_code = 'type-2';
		if ($code == 'arrow-3') $the_code = 'type-3';
		if ($code == 'arrow-4') $the_code = 'type-4';
		if ($code == 'arrow-5') $the_code = 'type-5';
		if ($code == 'arrow-6') $the_code = 'type-6';
		if ($code == 'arrow-7') $the_code = 'type-11';

		if ($code == 'diamond') $the_code = 'type-7';
		if ($code == 'diamond-2') $the_code = 'type-8';

		if ($code == 'number') $the_code = 'type-9';
		if ($code == 'bullet') $the_code = 'type-10';

		$to_return = str_replace( '<ul>', '<ul class="list '. $the_code .'">', do_shortcode($content) );

		return $to_return;
	}

	add_shortcode('arrow','theme_list');
	add_shortcode('arrow-2','theme_list');
	add_shortcode('arrow-3','theme_list');
	add_shortcode('arrow-4','theme_list');
	add_shortcode('arrow-5','theme_list');
	add_shortcode('arrow-6','theme_list');
	add_shortcode('arrow-7','theme_list');
	add_shortcode('diamond','theme_list');
	add_shortcode('diamond-2','theme_list');
	add_shortcode('number','theme_list');
	add_shortcode('bullet','theme_list');

?>