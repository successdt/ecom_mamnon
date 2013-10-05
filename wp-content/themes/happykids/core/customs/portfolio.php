<?php
// Register Custom Post - Portfolio
	
	$permalink_slug = trim(theme_get_option('portfolio','permalink_slug'));
	if ( empty($permalink_slug) ) {
		$permalink_slug = '?post_type=portfolio';
	}
	register_post_type('portfolio', array(
		'labels' => array(
			'name' => 'Portfolio',
			'singular_name' => multitranslate("Item", "_port_admin_item", false),
			'add_new' => 'Add New',
			'add_new_item' =>'Add New Item',
			'edit_item' => 'Edit Item',
			'new_item' => 'New Item',
			'view_item' => 'View Item',
			'search_items' => 'Search Items',
			'not_found' =>  'No item found',
			'not_found_in_trash' => 'No items found in Trash',
			'menu_name' => 'Portfolio'
		),
		
		'singular_label' => 'Portfolio',
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 8,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes'),
		'has_archive' => true,
	//	'rewrite' => array( 'slug' => $permalink_slug, 'with_front' => true, 'pages' => true, 'feeds'=>false ),
		'query_var' => false,
		'can_export' => true,
		'show_in_nav_menus' => true,
	));

	//register taxonomy for portfolio
	register_taxonomy('portfolio_category','portfolio',array(
		'hierarchical' => true,
		'labels' => array(
			'name' => 'Portfolio Categories',
			'menu_name' => 'Categories',
			'singular_name' => 'Portfolio Category'
		),
		'show_ui' => true,
	));
