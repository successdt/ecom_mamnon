<?php
// Register Custom Post - Slideshow

	register_post_type('slideshow', array(
		'labels' => array(
			'name' => 'Slider',
			'singular_name' => 'Slide',
			'add_new' => 'Add New',
			'add_new_item' => 'Add New Item',
			'edit_item' => 'Edit Item',
			'new_item' => 'New Item',
			'view_item' => 'View Item',
			'search_items' => 'Search Items',
			'not_found' =>  'No items found',
			'not_found_in_trash' => 'No items found in Trash',
			'parent_item_colon' => '',
			'menu_name' => 'Slider',
		),
		'singular_label' => 'slideshow',
		'public' => false,
		'publicly_queryable' => false,
		'exclude_from_search' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array('title', 'page-attributes', 'thumbnail'),
		'has_archive' => false,
		'rewrite'=>array('slug'=>'slider', 'feeds'=>false, 'pages'=>false, 'with_front' => false),
		'can_export' => true,
		'show_in_nav_menus' => false,
	));
	
	//register taxonomy for slideshow
	register_taxonomy('slideshow_category','slideshow',array(
		'hierarchical' => true,
		'labels' => array(
			'name' => 'Slider Categories',
			'singular_name' => 'Slideshow Category',
			'search_items' => 'Search Categories',
			'popular_items' => 'Popular Categories',
			'all_items' => 'All Categories',
			'parent_item' => null,
			'parent_item_colon' => null,
			'menu_name' => 'Categories',
		),
		'public' => false,
		'show_ui' => true,
	));