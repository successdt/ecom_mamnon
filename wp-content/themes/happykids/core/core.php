<?php

	class cwsPrime {

		function init($options) {
			/* Define theme's constants. */
			$this->constants($options);
			/* Add theme support. */
			add_action('after_setup_theme', array(&$this, 'supports'));
			/* Load theme's functions. */
			$this->functions();
			$this->sidebars();
			/* Register theme's custom post type. */
			$this->customs();
			/* Load theme's shortcodess. */
			$this->shortcodes();
			/* Initialize the theme's widgets. */
			add_action('widgets_init',array(&$this, 'widgets'));
			/* Load admin files. */
	        	$this->admin();
			add_action( 'admin_bar_menu', array(&$this,'admin_bar_menu') ,90);

			add_action('wp_ajax_send', 'send');

		}

		/*
		 Defines the constant paths for use within the theme.
		*/
		function constants($options) {
			define('THEME_NAME', $options['name']);
			define('THEME_SLUG', $options['slug']);
			define('THEME_VERSION', $options['version']);
			define('THEME_DIR', get_template_directory());
			define('THEME_URI', get_template_directory_uri());

			define('THEME_CORE', THEME_DIR . '/core');

			define('THEME_PLUGINS', THEME_CORE . '/plugins');
			define('THEME_GENERATORS', THEME_CORE . '/generators');
			define('THEME_FUNCTIONS', THEME_CORE . '/functions');
			define('THEME_CUSTOMS', THEME_CORE . '/customs');
			define('THEME_WIDGETS', THEME_CORE . '/widgets');
			define('THEME_SHORTCODES', THEME_CORE . '/shortcodes');

			define('THEME_FONT_URI', THEME_URI . '/front/fonts');
			define('THEME_FONT_DIR', THEME_DIR . '/front/fonts');
			define('THEME_PHP_DIR', THEME_DIR . '/front/php');

			define('THEME_IMAGES', THEME_URI . '/front/images');
			define('THEME_CSS', THEME_URI . '/front/css');
			define('THEME_JS', THEME_URI . '/front/js');

			define('THEME_ADMIN', THEME_CORE . '/admin');
			define('THEME_ADMIN_CUSTOMS', THEME_ADMIN . '/customs');
			define('THEME_ADMIN_FUNCTIONS', THEME_ADMIN . '/functions');
			define('THEME_ADMIN_OPTIONS', THEME_ADMIN . '/options');
			define('THEME_ADMIN_METABOXES', THEME_ADMIN . '/metaboxes');
			define('THEME_ADMIN_SHORTCODES_DIR', THEME_ADMIN . '/shortcodes');
			define('THEME_ADMIN_SHORTCODES_URI', THEME_URI.'/core/admin/shortcodes');
			define('THEME_ADMIN_IMAGES', THEME_URI.'/core/admin/look/images');
		}

		 	function supports(){
			if (function_exists('add_theme_support')) {
				add_theme_support('post-thumbnails', array( 'post', 'page', 'slideshow', 'portfolio' ));
				add_theme_support('menus');
				add_theme_support('automatic-feed-links');
				add_theme_support( 'post-formats', array('image', 'video') );

				register_nav_menus(array(
					'primary-menu' => THEME_NAME . ' Navigation Menu'
				));
			}
		}

		function sidebars(){
			require_once (THEME_GENERATORS . '/sidebar_gen.php');
			add_action('widgets_init', 'cws_register_sidebars');
		}

		function customs() {
			require_once (THEME_CUSTOMS . '/portfolio.php');
			require_once (THEME_CUSTOMS . '/slideshow.php');
		}

		/*
		 Loads the core theme functions.
		*/
		function functions() {
			require_once (THEME_FUNCTIONS . '/common.php');

			$this->options();

			require_once (THEME_FUNCTIONS . '/head.php');
			require_once (THEME_FUNCTIONS . '/multitranslate.php');
			require_once (THEME_FUNCTIONS . '/crumbs.php');
			require_once (THEME_FUNCTIONS . '/pagination.php');
			require_once (THEME_FUNCTIONS . '/google_fonts.php');
			require_once (THEME_FUNCTIONS . '/comments.php');
			require_once (THEME_FUNCTIONS . '/resizer.php');
			require_once (THEME_FUNCTIONS . '/header.php');
			// require_once (THEME_FUNCTIONS . '/twitter/index.php');
		}

		/*
		 Loads the theme options.
		*/
		function options() {
			global $theme_options;
			$theme_options = array();
			$option_files = array(
				'theme_general',
			);
			foreach($option_files as $file){
				$page = include (THEME_ADMIN_OPTIONS . "/" . $file.'.php');
				$theme_options[$page['name']] = array();
				foreach($page['options'] as $option) {
					if (isset($option['default'])) {
						$theme_options[$page['name']][$option['id']] = $option['default'];
					}
				}
				$theme_options[$page['name']] = array_merge((array) $theme_options[$page['name']], (array) get_option(THEME_SLUG . '_' . $page['name']));
			}

		}

		function widgets() {
			require_once (THEME_WIDGETS . '/twitter.php');
			require_once (THEME_WIDGETS . '/flickr.php');
			require_once (THEME_WIDGETS . '/contact_form.php');
			require_once (THEME_WIDGETS . '/latest_posts_w_thumbnails.php');
			require_once (THEME_WIDGETS . '/nav.php');
			require_once (THEME_WIDGETS . '/video.php');

			register_widget('CWS_Widget_Tweets');
			register_widget('CWS_Widget_Flickr');
			register_widget('CWS_Widget_Contact');
			register_widget('CWS_Widget_Latest_Posts');
			register_widget('CWS_Widget_Nav');
			register_widget('CWS_Widget_Video');
		}

		/*
		 Register theme's shortcodes.
		*/
		function shortcodes() {
			require_once (THEME_SHORTCODES . '/columns.php');
			require_once (THEME_SHORTCODES . '/images.php');
			require_once (THEME_SHORTCODES . '/lists.php');
			require_once (THEME_SHORTCODES . '/toggles.php');
			require_once (THEME_SHORTCODES . '/tabs.php');
			require_once (THEME_SHORTCODES . '/buttons.php');
			require_once (THEME_SHORTCODES . '/boxes.php');
			require_once (THEME_SHORTCODES . '/videos.php');
			require_once (THEME_SHORTCODES . '/typography.php');
			require_once (THEME_SHORTCODES . '/drops_n_pulls.php');
			require_once (THEME_SHORTCODES . '/tables.php');
			require_once (THEME_SHORTCODES . '/texthighlight.php');
			require_once (THEME_SHORTCODES . '/carousel.php');
			require_once (THEME_SHORTCODES . '/recent_projects.php');
			require_once (THEME_SHORTCODES . '/dividers.php');
			require_once (THEME_SHORTCODES . '/pricing.php');
			require_once (THEME_SHORTCODES . '/ads_box.php');
		}

		/*
		 Load admin files.
		*/
		function admin() {
			if (is_admin()) {
				require_once (THEME_ADMIN . '/admin.php');
				$admin = new Theme_admin();
				$admin->init();
			}
		}

		function admin_bar_menu(){
			 global $wp_admin_bar;
			 $wp_admin_bar->add_menu( array(
				'parent' => false,
				'id' => THEME_SLUG,
				'title' => THEME_NAME,
				'href' => admin_url('admin.php?page=theme_general')
			));
			$option_pages = array(
				'General'=>'theme_general',
			);
			foreach($option_pages as $title => $page){
				$wp_admin_bar->add_menu( array(
					'parent' => THEME_SLUG,
					'id' => $page,
					'title' => $title,
					'href' => admin_url('admin.php?page='.$page)
				));
			}
		}

	}