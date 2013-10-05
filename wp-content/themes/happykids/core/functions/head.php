<?php

	function theme_enqueue_scripts() {

	// Template scripts
		wp_register_script( 'modernizr-custom', get_template_directory_uri() .'/front/js/modernizr.custom.js', array('jquery'),'1.0');
			wp_enqueue_script('modernizr-custom');
		wp_register_script( 'jquery-ui-custom', get_template_directory_uri() .'/front/js/jquery-ui-1.8.16.custom.min.js', array('jquery'),'1.8.16', true);
			wp_enqueue_script('jquery-ui-custom');
		wp_register_script( 'jquery-easing', get_template_directory_uri() .'/front/js/jquery.easing-1.3.min.js', array('jquery'),'1.3', true);
			wp_enqueue_script('jquery-easing');
		wp_register_script( 'jcarousel', get_template_directory_uri() .'/front/js/jquery.jcarousel.min.js', array('jquery'),'1.0', true);
			wp_enqueue_script('jcarousel');
		wp_register_script( 'video', get_template_directory_uri() .'/front/js/video.js', array('jquery'),'1.0', true);
			wp_enqueue_script('video');
		wp_register_script( 'jquery-prettyPhoto', get_template_directory_uri() .'/front/js/jquery.prettyPhoto.js', array('jquery'),'1.0', true);
			wp_enqueue_script('jquery-prettyPhoto');
		wp_register_script( 'camera', get_template_directory_uri() .'/front/js/camera.min.js', array('jquery'),'1.0', true);
			wp_enqueue_script('camera');
		wp_register_script( 'flexslider', get_template_directory_uri() .'/front/js/flexslider.js', array('jquery'),'1.0', true);
			wp_enqueue_script('flexslider');
		wp_register_script( 'jquery-isotope', get_template_directory_uri() .'/front/js/jquery.isotope.min.js', array('jquery'),'1.0', true);
			wp_enqueue_script('jquery-isotope');
		wp_register_script( 'jquery-lavalamp', get_template_directory_uri() .'/front/js/jquery.lavalamp-1.4.min.js', array('jquery'),'1.4', true);
			wp_enqueue_script('jquery-lavalamp');
		wp_register_script( 'jcarousellite', get_template_directory_uri() .'/front/js/jcarousellite_1.3.min.js', array('jquery'),'1.3', true);
			wp_enqueue_script('jcarousellite');
		wp_register_script( 'jquery-tweet', get_template_directory_uri() .'/front/js/jquery.tweet.js', array('jquery'),'1.0', true);
			wp_enqueue_script('jquery-tweet');
		wp_register_script( 'flickr', get_template_directory_uri() .'/front/js/flickr.js', array('jquery'),'1.0');
				wp_enqueue_script('flickr');

		wp_register_script( 'validate', get_template_directory_uri() .'/front/js/jquery.validate.min.js', array('jquery'),'1.0', true);
				wp_enqueue_script('validate');

		wp_register_script( 'flexnav', get_template_directory_uri() .'/front/js/jquery.flexnav.min.js', array('jquery'),'1.0', true);
				wp_enqueue_script('flexnav');

		wp_register_script( 'jquery-scripts', get_template_directory_uri() .'/front/js/scripts.js', array('jquery'),'1.0', true);

			wp_enqueue_script('jquery-scripts');
	// Template scripts END
			
	}

	add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

	function theme_enqueue_styles(){
		if((is_admin() && !is_shortcode_preview()) || 'wp-login.php' == basename($_SERVER['PHP_SELF'])){
			return;
		}
			wp_register_style( 'styles' , get_template_directory_uri() . '/front/css/styles.css' );
				wp_enqueue_style( 'styles' );
			wp_register_style( 'flexslider' , get_template_directory_uri() . '/front/css/flexslider.css' );
				wp_enqueue_style( 'flexslider' );
			wp_register_style( 'video-js' , get_template_directory_uri() . '/front/css/video-js.css' );
				wp_enqueue_style( 'video-js' );
			wp_register_style( 'prettyPhoto' , get_template_directory_uri() . '/front/css/prettyPhoto.css' );
				wp_enqueue_style( 'prettyPhoto' );
			wp_register_style( 'camera' , get_template_directory_uri() . '/front/css/camera.css' );
				wp_enqueue_style( 'camera' );
			wp_register_style( 'flexnav' , get_template_directory_uri() . '/front/css/flexnav.css' );
				wp_enqueue_style( 'flexnav' );
			wp_register_style( 'theme-skin-php' , get_template_directory_uri() . '/front/css/skin.php' );
				wp_enqueue_style( 'theme-skin-php' );
	}

	add_action('wp_print_styles', 'theme_enqueue_styles');

?>