<?php

	function cws_register_sidebars(){

		$gen_sets = theme_get_option('general', 'gen_sets');
		$custom_sidebars = isset( $gen_sets['_sidebars_list'] ) ? $gen_sets['_sidebars_list'] : '';

		if ( function_exists('register_sidebars') ) {
			register_sidebar(array(
				'name'=>'Twitter top panel',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>'
			));
			register_sidebar(array(
				'name'=>'Right Sidebar Area',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>'
			));
			register_sidebar(array(
				'name'=>'Left Sidebar Area',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>'
			));
			register_sidebar(array(
				'name'=>'Footer 1',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>'
			));
			register_sidebar(array(
				'name'=>'Footer 2',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>'
			));
			register_sidebar(array(
				'name'=>'Footer 3',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>'
			));
			register_sidebar(array(
				'name'=>'Footer 4',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>'
			));
			
			if(!empty($custom_sidebars)){
				$sidebars_arr = explode("|", $custom_sidebars);

				foreach ($sidebars_arr as $sidebar) {
					if ( $sidebar != '' )
					if ( function_exists('register_sidebar') )
					register_sidebar(array('name'=>$sidebar,
						'before_title' => '<h3 class="widget-title">',
						'after_title' => '</h3>'
					));
				}
			}

		}
	}

?>