<?php

	function theme_check_wp_version(){
		global $wp_version;
		
		$check_WP   = '3.0';
		$is_ok  =  version_compare($wp_version, $check_WP, '>=');
		
		if ( ($is_ok == FALSE) ) {
			return false;
		}
		
		return true;
	}

	function theme_is_options() {
		if ('admin.php' == basename($_SERVER['PHP_SELF'])) {
			return true;
		}
		return false;
	}

	function theme_is_post_type($post_types = ''){
		if(theme_is_post_type_list($post_types) || theme_is_post_type_new($post_types) || theme_is_post_type_edit($post_types) || theme_is_post_type_post($post_types) || theme_is_post_type_taxonomy($post_types)){
			return true;
		}else{
			return false;
		}
	}

	function theme_is_post_type_list($post_types = '') {
		if ('edit.php' != basename($_SERVER['PHP_SELF'])) {
			return false;
		}
		if ($post_types == '') {
			return true;
		} else {
			$check = isset($_GET['post_type']) ? $_GET['post_type'] : (isset($_POST['post_type']) ? $_POST['post_type'] : 'post');
			if (is_string($post_types) && $check == $post_types) {
				return true;
			} elseif (is_array($post_types) && in_array($check, $post_types)) {
				return true;
			}
			return false;
		}
	}

	function theme_is_post_type_new($post_types = '') {
		if ('post-new.php' != basename($_SERVER['PHP_SELF'])) {
			return false;
		}
		if ($post_types == '') {
			return true;
		} else {
			$check = isset($_GET['post_type']) ? $_GET['post_type'] : (isset($_POST['post_type']) ? $_POST['post_type'] : 'post');
			if (is_string($post_types) && $check == $post_types) {
				return true;
			} elseif (is_array($post_types) && in_array($check, $post_types)) {
				return true;
			}
			return false;
		}
	}

	function theme_is_post_type_post($post_types = '') {
		if ('post.php' != basename($_SERVER['PHP_SELF'])) {
			return false;
		}
		if ($post_types == '') {
			return true;
		} else {
			$post = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post']) ? $_POST['post'] : false);
			$check = get_post_type($post);
			
			if (is_string($post_types) && $check == $post_types) {
				return true;
			} elseif (is_array($post_types) && in_array($check, $post_types)) {
				return true;
			}
			return false;
		}
	}

	function theme_is_post_type_edit($post_types = '') {
		if ('post.php' != basename($_SERVER['PHP_SELF'])) {
			return false;
		}
		$action = isset($_GET['action']) ? $_GET['action'] : (isset($_POST['action']) ? $_POST['action'] : '');
		if ('edit' != $action) {
			return false;
		}
		
		if ($post_types == '') {
			return true;
		} else {
			$post = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post']) ? $_POST['post'] : false);
			$check = get_post_type($post);
			
			if (is_string($post_types) && $check == $post_types) {
				return true;
			} elseif (is_array($post_types) && in_array($check, $post_types)) {
				return true;
			}
			return false;
		}
	}

	function theme_is_post_type_taxonomy($post_types = '') {
		if ('edit-tags.php' != basename($_SERVER['PHP_SELF'])) {
			return false;
		}
		if ($post_types == '') {
			return true;
		} else {
			$check = isset($_GET['post_type']) ? $_GET['post_type'] : (isset($_POST['post_type']) ? $_POST['post_type'] : 'post');
			if (is_string($post_types) && $check == $post_types) {
				return true;
			} elseif (is_array($post_types) && in_array($check, $post_types)) {
				return true;
			}
			return false;
		}
	}


	add_action( 'update_option_page_on_front', 'theme_set_page_on_front',10,2);

	function theme_set_page_on_front($old, $new){
		theme_set_option('homepage','home_page',$new);
	}

	function theme_set_page_for_posts($old, $new){
		theme_set_option('blog','blog_page',$new);
	}

?>