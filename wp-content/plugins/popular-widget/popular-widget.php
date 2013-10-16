<?php 
	/*
	Plugin Name: Popular Widget
	Plugin URI: http://xparkmedia.com/plugins/popular-widget/
	Description: Display most viewed, most commented and tags in one widget (with tabs)
	Author: Hafid R. Trujillo Huizar
	Version: 1.6.5
	Author URI: http://www.xparkmedia.com
	Requires at least: 3.0.0
	Tested up to: 3.6.1
	
	Copyright 2011-2013 by Hafid Trujillo http://www.xparkmedia.com
	
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License,or
	(at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
	GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	along with this program; if not,write to the Free Software
	Foundation,Inc.,51 Franklin St,Fifth Floor,Boston,MA 02110-1301 USA
	*/

	// Stop direct access of the file
	if( !defined( 'ABSPATH' ) ) 
		die( );
	
	if( !class_exists( 'PopularWidget' )
	&& !class_exists( 'PopularWidgetFunctions' ) 
	&& file_exists( dirname( __FILE__ ) . "/_inc/functions.php" ) ){
		
	include_once( dirname( __FILE__ ) . "/_inc/functions.php" );
	
	class PopularWidget extends PopularWidgetFunctions {
		
		public $tabs = array();
		public $defaults = array();
		public $version = "1.6.5";
		public $current_tab = false;
		
		/**
		 * Constructor
		 *
		 * @return void
		 * @since 0.5.0
		 */
		function PopularWidget( ){
			
			$this->load_text_domain( );
			$this->PopularWidgetFunctions( ); 
			
			$this->WP_Widget( 'popular-widget', __( 'Popular Widget', 'pop-wid' ), 
				array( 'classname' => 'popular-widget', 'description' => __( "Display most popular posts and tags", 'pop-wid' ) ) 
			);
			
			define( 'POPWIDGET_FOLDER', plugin_basename( dirname( __FILE__ ) ) );
			define( 'POPWIDGET_ABSPATH', str_replace("\\","/", dirname( __FILE__ ) ) );
			define( 'POPWIDGET_URL', WP_PLUGIN_URL . "/" . plugin_basename(dirname(__FILE__)) . "/" );
			
			$this->defaults = apply_filters( 'pop_defaults_settings', array(
				'nocomments' => false, 'nocommented' => false, 'noviewed' => false, 'norecent' => false, 
				'userids' => false, 'imgsize' => 'thumbnail', 'counter' => false, 'excerptlength' => 15, 'tlength' => 20,
				'meta_key' => '_popular_views', 'calculate' => 'visits', 'title' => '', 'limit'=> 5, 'cats'=>'', 'lastdays' => 90,
				'taxonomy' => 'post_tag', 'exclude_users' => false, 'posttypes' => array( 'post' => 'on' ), 'thumb' => false,
				'excerpt' => false, 'notags'=> false, 'exclude_cats' => false
			) );
			
			$this->tabs = apply_filters( 'pop_defaults_tabs', array(
				 'recent' =>  __( 'Recent Posts', 'pop-wid' ) , 
				 'comments' => __( 'Recent Comments', 'pop-wid' ) , 
				 'commented' => __( 'Most Commented', 'pop-wid' ), 
				 'viewed' => __( 'Most Viewed', 'pop-wid' ), 
				 'tags' => __( 'Tags', 'pop-wid' ) 
			 ) );
			 
		}
		
		/**
		 * Display widget.
		 *
		 * @param array $args
		 * @param array $instance
		 * @return void
		 * @since 0.5.0
		 */
		function widget( $args, $instance ) {
			if( file_exists( POPWIDGET_ABSPATH . '/_inc/widget.php' ) )
				include( POPWIDGET_ABSPATH . '/_inc/widget.php'  );
		}
		
		/**
		 * Configuration form.
		 *
		 * @param array $instance
		 * @return void
		 * @since 0.5.0
		 */
		function form( $instance ) {
			if( file_exists( POPWIDGET_ABSPATH . '/_inc/form.php' ) )
				include( POPWIDGET_ABSPATH . '/_inc/form.php' );
		}
		
		/**
		 * Display widget.
		 *
		 * @param array $instance
		 * @return array
		 * @since 1.5.6
		 */
		function update( $new_instance, $old_instance ){
			foreach( $new_instance as $key => $val ){
				if( is_array( $val ) )
					$new_instance[$key] = $val;
					
				elseif( in_array( $key, array( 'lastdays', 'limit', 'tlength', 'excerptlength' ) ) )			
					$new_instance[$key] = intval( $val );
					
				elseif( in_array( $key,array( 'calculate', 'imgsize', 'cats', 'userids', 'title', 'meta_key' ) ) )	
					$new_instance[$key] = trim( $val,',' );	
			}
			
			if( empty($new_instance['meta_key'] ) )
				$new_instance['meta_key'] = $this->defaults['meta_key'];
				
			return $new_instance;
		}
	}
	
	// do that thing you do!
	add_action( 'widgets_init' , create_function( '', 'return register_widget("PopularWidget");' ) );
	
	}//end if