<?php

	/*
	 * The Header for our theme.
	 *
	 * @package WordPress
	 * @subpackage HappyKids
	 * @since HappyKids 1.1
	 */

?>

<!DOCTYPE html>
<!--[if lte IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<html class="not-ie no-js" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<?php show_favicon(); ?>
		
		<title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>
	<?php
		put_ganalytics_code();

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
		wp_head();
	?>
	</head>
		<?php if ( is_front_page() ) : ?>
			<body <?php body_class( array('kids-front-page', show_skin()) ); ?><?php show_tcolor(); ?>>
		<?php else : ?>
			<body <?php body_class( array('secondary-page', show_skin()) ); ?><?php show_tcolor(); ?>>
		<?php endif; ?>

			<!-- HEADER BEGIN -->
			<div class="top-panel">
				<div class="l-page-width clearfix">
					<div class="tweets">
						<?php if ( function_exists('dynamic_sidebar') ){
							dynamic_sidebar('Twitter top panel');
						}?>
					</div>
				</div>
			</div><!--/ .top-panel-->
			
		<div class="kids-bg-level-1">
			
			<header id="kids_header">

				<div class="l-page-width clearfix">

					<div class="bg-level-1-left" id="bg-level-1-left"></div>
					<div class="bg-level-1-right" id="bg-level-1-right"></div>

					<ul class="kids_social">
						<?php show_top_panel(); ?>
						<?php show_social(); ?>
						<li class="search"><a href="#" title="Search"></a></li>
						<li>
							<?php get_search_form(); ?>
						</li>
					</ul><!-- .kids_social -->

					<div class="kids_clear"></div>

					<?php show_logo(); ?>

					<nav id="kids_main_nav">
						<div class="menu-button">
							<span class="menu-button-line"></span>
							<span class="menu-button-line"></span>
							<span class="menu-button-line"></span>
						</div>
<?php
							$menu_locations = get_nav_menu_locations();
							if( $menu_locations['primary-menu'] != 0){
								wp_nav_menu( array(
									'after'  => '',
									'before'  => '',
									'theme_location'  => 'primary-menu',
									'container'       => '',
									'menu_class'      => '', 
									'menu_id'         => 'menu-main',
									'items_wrap'      => '<ul id="%1$s" class="clearfix flexnav %2$s" data-breakpoint="800">%3$s</ul>'
								) );
							} else {
								echo '<h6 style="color:red;background-color:#fff;padding:10px;font-size:18px;margin: -6px 0 0;">Please enable menu in admin panel -> appearance -> menus -> theme location</h6>';
							}
?>

					</nav><!-- #kids_main_nav -->

				</div><!--/ .l-page-width-->

			</header><!--/ #kids_header-->
	                        
	<!-- HEADER END -->