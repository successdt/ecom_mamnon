<?php 
/*
Plugin Name: Happy kids
Plugin URI: https://facebook.com/successdt
Description: all in one plugin for happy kids site
Version: 1.0.0
Author: success.ddt@gmail.com
Author URI: https://facebook.com/successdt
License: GPL2
*/
require_once('happy-kids_admin.php');

/**
 * install plugin
 */

global $ewp_db_version;
$ewp_db_version = '1.0.1';

function ewp_install() {
    global $wpdb;
    global $ewp_db_version;
    
    $table_name = $wpdb->prefix . "book_ticket";
    $contact_table = $wpdb->prefix . "ewp_contact";
    
    $sql = "CREATE TABLE $table_name (
    		id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        	name VARCHAR(100),
        	email VARCHAR(100),
        	phone VARCHAR(25),
        	from_city VARCHAR(100),
        	to_city VARCHAR(100),
        	go_date DATE,
        	comeback_date DATE,
        	adult_count INT(2),
        	kid_count INT(2),
        	infant_count INT(2),
            booking_date DATE,
            status VARCHAR(50)
        );
		CREATE TABLE $contact_table (
    		id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        	email VARCHAR(100)
        );
		";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
    add_option("ewp_db_version", $ewp_db_version);
    update_option("ewp_db_version", $ewp_db_version);
}
//register_activation_hook( __FILE__, 'ewp_install' );

function ewp_update_db_check() {
    global $ewp_db_version;
    if (get_site_option( 'ewp_db_version' ) != $ewp_db_version) {
        ewp_install();
    }
}
//add_action( 'plugins_loaded', 'ewp_update_db_check' );


add_action( 'wp_enqueue_scripts', 'prefix_add_my_stylesheet' );

/**
 * Enqueue plugin style-file
 */
function prefix_add_my_stylesheet() {
	//add script
	wp_enqueue_script('ewp', plugins_url('js/ewp.js', __FILE__), array('jquery'));
//	wp_enqueue_script('ewp', plugins_url('fancybox/jquery.fancybox-1.3.4.pack.js', __FILE__), array('jquery'));
	
    // Respects SSL, Style.css is relative to the current file
    wp_register_style( 'prefix-style', plugins_url('css/style.css', __FILE__) );
//    wp_register_style( 'prefix-style', plugins_url('fancybox/jquery.fancybox-1.3.4.css', __FILE__) );
    wp_enqueue_style( 'prefix-style' );
}



function news_box($atts){
	extract(shortcode_atts(array(
		'category' => '',
		'title' => '',
		'url' => '',
		'inline' => 0
	), $atts));
	$str = '';
	$child = '';
	if($category){
		$queryObject = new  Wp_Query( array(
			'showposts' => 4,
			'post_type' => array('post'),
			'category_name' => $category,
			'orderby' => 1,
		));
		
		if($queryObject->have_posts()):
			$cat = get_category_by_slug($category);
			$class = ($inline) ? 'inline' : '';
			
			$str = '
			<div class="news-box ' . $class . '">
				<div class="news-box-title">';
					if($title)
						$str .= '<a href="' . $url . '" title="' . $title .'">' . $title .'</a>';
					else
						$str .= '<a href="' . get_category_link($cat->term_id) . '" title="' . $cat->name .'">' . $cat->name .'</a>';
				$str .='
				</div>
				<div class="news-box-nav">
					<ul>';
			$childCategories = get_categories(array('child_of' => $cat->term_id, 'hide_empty' => 0));
			foreach($childCategories as $category):
				$str .= '
				<li class="category-link">
					<a href="' . get_category_link($category->term_id) . '" title="' . $category->name . '">' . $category->name . '</a>
				</li>';
			endforeach;
			$str .= '
					</ul>
				</div>
				<ul>';
				$i = 0;
			while($queryObject->have_posts()):
				$queryObject->the_post();
				if(!$i):
					$str .= 
						'<li class="first-news news-post">
							<a class="title" href="' . get_permalink() . '" title="' . wp_specialchars(get_the_title(), 1) . '">
								' . wp_specialchars(get_the_title(), 1) . '
							</a>';
							
							add_image_size( 'news-post', 100, 100, true );
							$thumb = get_the_post_thumbnail(get_the_ID(), 'news-post', 'class=post-thumb');
							
							$str .=
							'<a class="title" href="' . get_permalink() . '" title="' . wp_specialchars(get_the_title(), 1) . '">' .
								$thumb .
							'</a>' .
							'<p>' . get_the_excerpt() . '</p>
							<div class="readmore-text">
								<a class="pull-right" href="' . get_permalink() . '" title="' . wp_specialchars(get_the_title(), 1) . '">
									Xem tiếp
								</a>						
							</div>
						</li>';
				else:
					$child .= '
					<li>
						<a class="title" href="' . get_permalink() . '" title="' . wp_specialchars(get_the_title(), 1) . '">
							' . wp_specialchars(get_the_title(), 1) . '
						</a>					
					</li>';
				endif;
				$i++;
			endwhile;
			
			$str .= 
				'<li class="news-post">
					<ul>
						' . $child . '
					</ul>
				</li>';
				
			$str .= '
				</ul>
			</div>';
		endif;		
	}
	return $str;
}

function large_news_box($atts){
	extract(shortcode_atts(array(
		'category' => '',
		'title' => '',
		'url' => ''
	), $atts));
	$str = '';
	$child = '';
	if($category){
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$queryObject = new  Wp_Query( array(
			'showposts' => 10,
			'post_type' => array('post'),
			'category_name' => $category,
			'orderby' => 1,
			'paged' => $paged
		));
		
		if($queryObject->have_posts()):
			$cat = get_category_by_slug($category);
			$str = '
			<div class="news-box large-news-box">
				<div class="news-box-title">';
					if($title)
						$str .= '<a href="' . $url . '" title="' . $title .'">' . $title .'</a>';
					else
						$str .= '<a href="' . get_category_link($cat->term_id) . '" title="' . $cat->name .'">' . $cat->name .'</a>';
				$str .='
				</div>
				<div class="news-box-nav">
					<ul>';
			$childCategories = get_categories(array('child_of' => $cat->term_id, 'hide_empty' => 0));
			foreach($childCategories as $category):
				$str .= '
				<li class="category-link">
					<a href="' . get_category_link($category->term_id) . '" title="' . $category->name . '">' . $category->name . '</a>
				</li>';
			endforeach;
			$str .= '
					</ul>
				</div>
				<ul>';
				$i = 0;
			while($queryObject->have_posts()):
				$queryObject->the_post();
				if(!$i):
					$str .= 
						'<li class="first-news news-post">
							<a class="title" href="' . get_permalink() . '" title="' . wp_specialchars(get_the_title(), 1) . '">
								' . wp_specialchars(get_the_title(), 1) . '
							</a>';
							
							add_image_size( 'news-post', 100, 100, true );
							$thumb = get_the_post_thumbnail(get_the_ID(), 'news-post', 'class=post-thumb');
							
							$str .=
							'<a class="title" href="' . get_permalink() . '" title="' . wp_specialchars(get_the_title(), 1) . '">' .
								$thumb .
							'</a>' .
							'<p>' . get_the_excerpt() . '</p>
							<div class="readmore-text">
								<a class="pull-right" href="' . get_permalink() . '" title="' . wp_specialchars(get_the_title(), 1) . '">
									Xem tiếp
								</a>						
							</div>
						</li>';
				else:
					$child .= '
					<li>
						<a class="title" href="' . get_permalink() . '" title="' . wp_specialchars(get_the_title(), 1) . '">
							' . wp_specialchars(get_the_title(), 1) . '
						</a>					
					</li>';
				endif;
				$i++;
			endwhile;
			
			$str .= 
				'<li class="news-post">
					<ul>
						' . $child . '
					</ul>
				</li>';
				
			$str .= '
				</ul>';
			$str .= '</div>';
			$str .= wpbeginner_numeric_posts_nav($queryObject);
		endif;		
	}
	
	return $str;
}

function gallery_box($atts){
		extract(shortcode_atts(array(
			'category' => ''
		), $atts));
		if($category){
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$queryObject = new  Wp_Query( array(
				'showposts' => 20,
				'post_type' => 'post',
				'orderby' => 1,
				'category_name' => $category,
				'post_status' => 'publish',
				'paged' => $paged
			));
			$str = '';

			$str .= '<div class="gallery-items">';
			while($queryObject->have_posts()):
				$queryObject->the_post();
				$gallery = get_post_gallery_images(get_the_ID());
				if(isset($gallery[0]))
					$thumb = '<img src="'. $gallery[0] .'" alt="' . wp_specialchars(get_the_title(), 1) . '" class="album-thumb">';
//				add_image_size( 'news-post', 100, 100, true );
//				$thumb = get_the_post_thumbnail(get_the_ID(), 'news-post', 'class=post-thumb');				
				$str .= 
					'<li class="gallery-item gallery-post">
						<a class="title" href="' . get_permalink() . '" title="' . wp_specialchars(get_the_title(), 1) . '">' .
							$thumb .
						'</a>';						
						$str .=
						'<a class="title" href="' . get_permalink() . '" title="' . wp_specialchars(get_the_title(), 1) . '">' .
							wp_specialchars(get_the_title(), 1) .
						'</a>' .
					'</li>';
				$i++;
			endwhile;
			$str .= '</div>';			
			$str .= wpbeginner_numeric_posts_nav($queryObject);			
		}
		
		return $str;
}

function videos_box($atts){
		extract(shortcode_atts(array(
			'category' => ''
		), $atts));
		if($category){
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$queryObject = new  Wp_Query( array(
				'showposts' => 20,
				'post_type' => 'post',
				'orderby' => 1,
				'category_name' => $category,
				'post_status' => 'publish',
				'paged' => $paged
			));
			$str = '';

			$str .= '<div class="videos-items">';
			while($queryObject->have_posts()):
				$queryObject->the_post();
				$page_custom = theme_get_post_custom(get_the_ID());
				$youtube['link'] = ( isset($page_custom['_format_video_youtube']) ) ? $page_custom['_format_video_youtube'] : '';
			 	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube['link'], $youtubeMatch);
			 	$youtube['id'] = isset($youtubeMatch[1]) ? $youtubeMatch[1] : '';
				$gallery = get_post_gallery_images(get_the_ID());
				
				if(isset($youtube['id']))
					$thumb = '<img src="http://img.youtube.com/vi/'. $youtube['id'].'/sddefault.jpg" alt="' . wp_specialchars(get_the_title(), 1) . '" class="album-thumb">';
//				add_image_size( 'news-post', 100, 100, true );
//				$thumb = get_the_post_thumbnail(get_the_ID(), 'news-post', 'class=post-thumb');				
				$str .= 
					'<li class="gallery-item gallery-post">
						<a class="title" href="' . get_permalink() . '" title="' . wp_specialchars(get_the_title(), 1) . '">' .
							$thumb .
						'</a>';						
						$str .=
						'<a class="title" href="' . get_permalink() . '" title="' . wp_specialchars(get_the_title(), 1) . '">' .
							wp_specialchars(get_the_title(), 1) .
						'</a>' .
					'</li>';
				$i++;
			endwhile;
			$str .= '</div>';			
			$str .= wpbeginner_numeric_posts_nav($queryObject);			
		}
		
		return $str;
}

function wpbeginner_numeric_posts_nav($wp_query) {

	$str = '';
	
	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'page' ) ? absint( get_query_var( 'page' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	$str .= '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		$str .= sprintf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		$str .= sprintf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			$str .= '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		$str .= sprintf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		$str .= sprintf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), 'Trang cuối' );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		$str .= sprintf( '<li>%s</li>' . "\n", get_next_posts_link() );

	$str .= '</ul></div>' . "\n";
	return $str;
}

function register_shortcode(){
	add_shortcode('news-box', 'news_box');
	add_shortcode('large-news-box', 'large_news_box');
	add_shortcode('gallery-box', 'gallery_box');
	add_shortcode('videos-box', 'videos_box');
}

add_action('init', 'register_shortcode');

function new_excerpt_more( $more ) {
	return '.';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*********Amin area*******/

?>