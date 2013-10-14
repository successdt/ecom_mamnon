<?php

	class Theme_admin {
		function init(){
			$this->functions();
			add_action('admin_enqueue_scripts', array(&$this,'admin_styles'));
			add_action('admin_enqueue_scripts', array(&$this,'admin_scripts'));
			add_action('admin_menu', array(&$this,'menus'));
			$this->customs();
			$this->metaboxes();
			// add_action('wp_ajax_theme-flush-rewrite-rules', array(&$this,'flush_rewrite_rules'));
			add_action('after_switch_theme', array(&$this, 'flush_rewrite_rules'));
			add_action('admin_init', array(&$this,'after_theme_activated'));
			
		}
		
		function functions(){
			require_once(THEME_ADMIN_FUNCTIONS .'/common.php');
			require_once(THEME_ADMIN_FUNCTIONS .'/shortcodes_button.php');
		}
		
		/**
		 * Create theme options menu
		 */
		function menus(){
			add_menu_page(THEME_NAME, THEME_NAME, 'edit_theme_options', 'theme_general', array(&$this,'load_cws_main_page'));
		}

		function admin_styles(){
			wp_register_style( 'cws_common', get_template_directory_uri() .'/core/admin/look/css/cws_common.css', false, '1.0.0' );
			wp_register_style( 'theme_options', get_template_directory_uri() .'/core/admin/look/css/main.css', false, '1.0.0' );
			wp_register_style( 'grid', get_template_directory_uri() .'/core/admin/look/css/grid.css', false, '1.0.0' );

	        		wp_enqueue_style( 'cws_common' );
			// // first check that $hook_suffix is appropriate for your admin page
			wp_enqueue_style( 'wp-color-picker' );

			// if ( isset($_GET['page']) && $_GET['page'] == 'theme_general' ){
				wp_enqueue_style( 'grid' );
				wp_enqueue_style( 'theme_options' );
			// }
		}

		function admin_scripts(){
			wp_register_script( 'main-admin', get_template_directory_uri() .'/core/admin/look/js/main_admin.js', array('jquery', 'wp-color-picker'),'1.0');
			wp_register_script( 'common-admin', get_template_directory_uri() .'/core/admin/look/js/common_admin.js', array('jquery'),'1.0');

			if ( isset($_GET['page']) && $_GET['page'] == 'theme_general' ){
				wp_enqueue_script('main-admin');
				if(function_exists( 'wp_enqueue_media' ) ) wp_enqueue_media();
			}

			wp_enqueue_script('common-admin');
		}
		
		function load_cws_main_page(){
			include_once (THEME_GENERATORS . '/option_gen.php');
			$cws_admin = include(THEME_ADMIN_OPTIONS . "/theme_general.php");
		
			new optionGenerator($cws_admin['name'],$cws_admin['options']);
		}
		
		function customs(){
			require_once (THEME_ADMIN_CUSTOMS . '/portfolio.php');
			require_once (THEME_ADMIN_CUSTOMS . '/slider.php');
		}
		
		function metaboxes(){
			require_once (THEME_GENERATORS . '/metaboxes_gen.php');
			
			require_once (THEME_ADMIN_METABOXES . '/page_general.php');
			require_once (THEME_ADMIN_METABOXES . '/slider.php');
			require_once (THEME_ADMIN_METABOXES . '/portfolio.php');
			require_once (THEME_ADMIN_METABOXES . '/single.php');
		}

		function flush_rewrite_rules(){
			flush_rewrite_rules();
			die (1);
		}
		
		function after_theme_activated(){
			if ('themes.php' == basename($_SERVER['PHP_SELF']) && isset($_GET['activated']) && $_GET['activated']=='true' ) {
				update_option(THEME_SLUG.'_version', THEME_VERSION);
				wp_redirect( admin_url('admin.php?page=theme_general') );
			}
		}
		
	}

?>