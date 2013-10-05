<?php

	add_action('init', 'cws_shortcodes_button');

	function cws_shortcodes_button() {

	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
		return;
	}
	 
		if ( get_user_option('rich_editing') == 'true' ) {
			add_filter( 'mce_external_plugins', 'add_plugin' );
			add_filter( 'mce_buttons', 'register_button' );
		}
	 
	}
 
	function register_button( $buttons ) {
		array_push( $buttons, "|", "cws_shortcodes" );
		return $buttons;
	}

	function add_plugin( $plugin_array ) {
		$plugin_array['cws_shortcodes'] = THEME_ADMIN_SHORTCODES_URI . '/button.js';
		return $plugin_array;
	}

?>