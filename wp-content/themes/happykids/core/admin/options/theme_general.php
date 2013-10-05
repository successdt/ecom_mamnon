<?php
$options = array(
	array("type" => "start"),

//CWS SIDEBAR START

		array(
			"type" => "cws_sidebar",
			"options" => array(
						"_cws_controls_general" => "General",
						"_cws_controls_appearence" => "Appearence",
						"_cws_controls_fonts" => "Fonts",
						"_cws_controls_slider" => "Slider",
						"_cws_controls_sidebars" => "Sidebars",
						"_cws_controls_translations" => "Translations",
						"_cws_controls_socials" => "Socials",
						"_cws_controls_contacts" => "Contacts",
						"_cws_controls_help" => "Help"
					)
		),

//CWS SIDEBAR END

// CWS CONTENT START

		array("type" => "creaws_content"),


// General Fonts section
			array( "type" => "creaws_section", "class" => "_cws_controls_general", "id" => "General"),

				array("type" => "creaws_content_title", "name" => "General"),

				array(
					"name" => __("Custom Logo", 'creaws_admin'),
					"desc" => "Paste the full URL of your logo image here.",
					"id" => "_logo",
					"default" => THEME_IMAGES . "/logo.png",
					"preview" => "show",
					"type" => "uploader",
				),
				array(
					"name" => __("Logo height", 'creaws_admin'),
					"desc" => "",
					"id" => "_logo_h",
					"type" => "text",
					"styles" => "width: 60px;",
					"size" => "3",
					"placeholder" => "px",
					"default" => ""
				),
				array(
					"name" => __("Logo width", 'creaws_admin'),
					"desc" => "",
					"id" => "_logo_w",
					"type" => "text",
					"styles" => "width: 60px;",
					"size" => "3",
					"placeholder" => "px",
					"default" => ""
				),
				array(
					"name" => __("Logo top indention", 'creaws_admin'),
					"desc" => "",
					"id" => "_logo_it",
					"type" => "text",
					"styles" => "width: 60px;",
					"size" => "3",
					"placeholder" => "px",
					"default" => ""
				),
				array(
					"name" => __("Logo right indention", 'creaws_admin'),
					"desc" => "",
					"id" => "_logo_ir",
					"type" => "text",
					"styles" => "width: 60px;",
					"size" => "3",
					"placeholder" => "px",
					"default" => ""
				),
				array(
					"name" => __("Logo left indention", 'creaws_admin'),
					"desc" => "",
					"id" => "_logo_il",
					"type" => "text",
					"styles" => "width: 60px;",
					"size" => "3",
					"placeholder" => "px",
					"default" => ""
				),
				array(
					"name" => __("Logo bottom indention", 'creaws_admin'),
					"desc" => "",
					"id" => "_logo_ib",
					"type" => "text",
					"styles" => "width: 60px;",
					"size" => "3",
					"placeholder" => "px",
					"default" => ""
				),
				array(
					"name" => __("Favicon", 'creaws_admin'),
					"desc" => "Paste the full URL of your favicon here.",
					"id" => "_fav",
					"default" => THEME_URI . "/core/admin/look/images/favicon.png",
					"preview" => "show",
					"type" => "uploader"
				),
				array(
					"name" => __("Google analytics tracking code", 'creaws_admin'),
					"desc" => "",
					"id" => "_ganalytics",
					"default" => '',
					"placeholder" => "Your Code...",
					"type" => "textarea",
					"class" => ""
				),

				array("name" => "", "type" => "serv_buttons" ),

			array( "type" => "creaws_section_end"),
// General fonts section END

// General Fonts section
			array( "type" => "creaws_section", "class" => "_cws_controls_appearence", "id" => "Appearence"),

				array("type" => "creaws_content_title", "name" => "Appearence"),

				array(
					"name" => __("Color scheme", 'creaws_admin'),
					"desc" => "",
					"id" => "_theme_skin_color",
					"default" => "t-blue",
					"type" => "color_select",
					"options" => array(
									"t-blue" => "Blue",
									"t-red" => "Red",
									"t-green" => "Green",
									"t-brown" => "Brown",
									"t-peachy" => "Peacy",
									"t-violet" => "Violet",
								)
				),
				array(
					"name" => __("Allow Theme Patterns", 'creaws_admin'),
					"desc" => "",
					"id" => "_theme_skin_pallow",
					"default" => true,
					"type" => "checkbox",
				),
				array(
					"name" => __("Theme Pattern", 'creaws_admin'),
					"desc" => "",
					"id" => "_theme_skin_pattern",
					"default" => "t-pattern-1",
					"type" => "pattern_select",
					"options" => array(
									"t-pattern-1" => "1",
									"t-pattern-2" => "2",
									"t-pattern-3" => "3",
									"t-pattern-4" => "4",
									"t-pattern-5" => "5",
									"t-pattern-6" => "6",
									"t-pattern-7" => "7",
									"t-pattern-8" => "8",
									"t-pattern-9" => "9",
								)
				),
				array(
					"name" => __("Load Custom Pattern", 'creaws_admin'),
					"desc" => "",
					"id" => "_theme_load_pattern",
					"default" => "",
					"preview" => "show",
					"preview_width" => '110',
					"preview_height" => '110',
					"type" => "uploader"
				),

				array(
					"name" => __("Default Widget Type", 'creaws_admin'),
					"desc" => "",
					"id" => "_widget_type",
					"default" => "type-1",
					"type" => "select",
					"options" => array(
									"type-1" => "Type 1",
									"type-2" => "Type 2"
								)
				),
				array(
					"name" => __("Breadcrumbs", 'creaws_admin'),
					"desc" => "",
					"id" => "_gen_breadcrumbs",
					"label" => "",
					"default" => "show",
					"type" => "select",
					"options" => array(
									"show" => "Show crumbs",
									"hide" => "Hide crumbs",
								),
				),

				array("type" => "creaws_content_title", "name" => "HomePage settings"),

				array(
					"name" => __("HomePage slogan", 'creaws_admin'),
					"desc" => "",
					"id" => "_gen_slogan",
					"default" => "",
					"type" => "textarea"
				),
				array(
					"name" => __("Show slogan divider", 'creaws_admin'),
					"desc" => "",
					"id" => "_gen_slogan_divider",
					"default" => true,
					"type" => "checkbox"
				),
				array(
					"name" => __("Homepage adds block", 'creaws_admin'),
					"id" => "_home_top",
					"type" => "editor",
					"default" => "",
					"value" => "Home Top",
				),
				array(
					"name" => __("Homepage content block", 'creaws_admin'),
					"id" => "_home_bottom",
					"type" => "editor",
					"default" => "",
					"value" => "Home bottom",
				),

				array("type" => "creaws_content_title", "name" => "Default page settings"),

				array(
					"name" => __("Default Page Layout", 'creaws_admin'),
					"desc" => "",
					"id" => "_gen_template_select",
					"default" => "right",
					"type" => "select",
					"options" => array(
									"right" => "Page with right sidebar",
									"left" => "Page with left sidebar",
									"full" => "Full width page",
									"double" => "Page with double sidebars",
								),
				),
				array(
						"name" => "Left Sidebar Area",
						"desc" => "",
						"id" => "_sidebar_main_l",
						"default" => '',
						"type" => "sidebar_name_select",
						"class" => ""
				),
				array(
						"name" => "Right Sidebar Area",
						"desc" => "",
						"id" => "_sidebar_main",
						"default" => 2,
						"type" => "sidebar_name_select",
						"class" => ""
				),
				array(
					"name" => __("Search page sidebar", 'creaws_admin'),
					"desc" => "",
					"id" => "_sidebar_search",
					"type" => "sidebar_name_select",
					"default" => "2",
					"class" => ""
					),
				array(
					"name" => __("Page 404 sidebar", 'creaws_admin'),
					"desc" => "",
					"id" => "_sidebar_404",
					"type" => "sidebar_name_select",
					"default" => "",
					"class" => ""
					),
				array("type" => "creaws_content_title", "name" => "Default blog settings"),

				array(
					"name" => __("Default Blog Layout", 'creaws_admin'),
					"desc" => "",
					"id" => "_blog_template_select",
					"default" => "one",
					"type" => "select",
					"options" => array(
									"one" => "Blog with one sidebar",
									"full" => "Full width blog",
									"double" => "Blog with double sidebars",
								),
				),
				array(
						"name" => "Blog Left Sidebar Area",
						"desc" => "",
						"id" => "_sidebar_main_blog_l",
						"default" => 2,
						"type" => "sidebar_name_select",
						"class" => ""
				),
				array(
						"name" => "Blog Right Sidebar Area",
						"desc" => "",
						"id" => "_sidebar_main_blog_r",
						"default" => 3,
						"type" => "sidebar_name_select",
						"class" => ""
				),
				
				array("type" => "creaws_content_title", "name" => "Default portfolio & gallery settings"),

				array(
					"name" => __("Portfolio item per page", 'creaws_admin'),
					"desc" => "",
					"id" => "_gen_port_ipp",
					"default" => 6,
					"type" => "text"
				),
				array(
					"name" => __("Show portfolio button", 'creaws_admin'),
					"desc" => "",
					"id" => "_gen_port_butt_show",
					"type" => "select",
					"default" => 'show',
					"options" => array(
									"show" => "Show button",
									"hide" => "Hide button"
								)
				),
				array(
					"name" => __("Portfolio button text", 'creaws_admin'),
					"desc" => "",
					"id" => "_gen_port_butt_txt",
					"default" => "Read more",
					"type" => "text"
				),
				array(
					"name" => __("Gallery item per page", 'creaws_admin'),
					"desc" => "",
					"id" => "_gen_gall_ipp",
					"default" => 8,
					"type" => "text"
				),

				array("type" => "creaws_content_title", "name" => "Video settings"),

				array(
					"name" => __("YouTube Pregressbar color", 'creaws_admin'),
					"desc" => "",
					"id" => "_yt_color",
					"default" => "red",
					"type" => "select",
					"options" => array(
									"red" => "Red",
									"white" => "White"
								)
				),
				array(
					"name" => __("Youtube scheme color", 'creaws_admin'),
					"desc" => "",
					"id" => "_yt_theme",
					"default" => "light",
					"type" => "select",
					"options" => array(
									"light" => "Light",
									"dark" => "Dark"
								)
				),
				array(
					"name" => __("Vimeo scheme color", 'creaws_admin'),
					"desc" => "",
					"id" => "_vim_color",
					"default" => "#5693C2",
					"type" => "color_picker"
				),
				array(
					"name" => __("Show Vimeo Caption", 'creaws_admin'),
					"desc" => "",
					"id" => "_vim_header",
					"default" => "",
					"type" => "checkbox"
				),

			array( "type" => "creaws_section_end"),
// General fonts section END

// Google Fonts section
			array( "type" => "creaws_section", "class" => "_cws_controls_fonts"),

				array("type" => "creaws_content_title", "name" => "Fonts"),

				array(
					"name" => __("Menu font", 'creaws_admin'),
					"desc" => "",
					"id" => "_menu_gfont",
					"default" => "Salsa",
					"font_size" => 18,
					"type" => "font_select"
				),
				array(
					"name" => __("Header font", 'creaws_admin'),
					"desc" => "",
					"id" => "_headers_gfont",
					"default" => "Jockey One",
					"font_size" => 24,
					"type" => "font_select"
				),
				array(
					"name" => __("Text font", 'creaws_admin'),
					"desc" => "",
					"id" => "_text_gfont",
					"default" => "Tahoma",
					"font_size" => 13,
					"type" => "font_select"
				),

				array(
					"name" => __("Main menu font color", 'creaws_admin'),
					"desc" => "",
					"id" => "_mmf_color",
					"default" => "",
					"type" => "color_picker"
				),
				array(
					"name" => __("Content text header color", 'creaws_admin'),
					"desc" => "",
					"id" => "_cth_color",
					"default" => "",
					"type" => "color_picker"
				),
				array(
					"name" => __("Content text color", 'creaws_admin'),
					"desc" => "",
					"id" => "_ct_color",
					"default" => "",
					"type" => "color_picker"
				),

				array(
					"name" => __("H1 font size", 'creaws_admin'),
					"desc" => "",
					"id" => "_h1_size",
					"default" => "",
					"placeholder" => "22",
					"type" => "text"
				),

				array(
					"name" => __("H2 font size", 'creaws_admin'),
					"desc" => "",
					"id" => "_h2_size",
					"default" => "",
					"placeholder" => "21",
					"type" => "text"
				),
				array(
					"name" => __("H3 font size", 'creaws_admin'),
					"desc" => "",
					"id" => "_h3_size",
					"default" => "",
					"placeholder" => "18",
					"type" => "text"
				),
				array(
					"name" => __("H4 font size", 'creaws_admin'),
					"desc" => "",
					"id" => "_h4_size",
					"default" => "",
					"placeholder" => "15",
					"type" => "text"
				),				
				array(
					"name" => __("H5 font size", 'creaws_admin'),
					"desc" => "",
					"id" => "_h5_size",
					"default" => "",
					"placeholder" => "14",
					"type" => "text"
				),
				array(
					"name" => __("H6 font size", 'creaws_admin'),
					"desc" => "",
					"id" => "_h6_size",
					"placeholder" => "12",
					"default" => "",
					"type" => "text"
				),
				array(
					"name" => __("Content font size", 'creaws_admin'),
					"desc" => "",
					"id" => "_content_fsize",
					"default" => "",
					"placeholder" => "13",
					"type" => "text"
				),
				array(
					"name" => __("Content line height", 'creaws_admin'),
					"desc" => "",
					"id" => "_content_lineheight",
					"default" => "",
					"type" => "text",
					"placeholder" => "19"
				),

			array( "type" => "creaws_section_end"),
// Goole fonts section END

// General Fonts section
			array( "type" => "creaws_section", "class" => "_cws_controls_slider"),

				array("type" => "creaws_content_title", "name" => "Slider"),

				array(
					"name" => __("Show slider on Homepage", 'creaws_admin'),
					"desc" => "",
					"id" => "_gen_slider_select",
					"default" => true,
					"type" => "checkbox",
				),
				array(
					"name" => __("Slider type", 'creaws_admin'),
					"desc" => "You can set your preffered slider type.",
					"id" => "_what_slider_select",
					"default" => "camera",
					"type" => "select",
					"options" => array(
									"camera" => "Camera Slider",
									"flex" => "Flex Slider.",
									"video" => "Show video",
									"image" => "Show static image",
								)
				),
				array(
					"name" => "Slides Category",
					"desc" => "",
					"id" => "_gen_slide_cat",
					"type" => "slide_cat_select",
					"options" => array("option1","option2"),
					"default" => '',
					"class" => ""
				),
				array(
					"name" => __("Show camera slider pagination instead of captions", 'creaws_admin'),
					"desc" => "",
					"id" => "_camera_pagination",
					"default" => true,
					"type" => "checkbox",
				),
				array(
					"name" => __("Camera slider caption animation", 'creaws_admin'),
					"desc" => "You can set your preffered caption animation type here.",
					"id" => "_cam_slider_caption",
					"default" => "",
					"type" => "select",
					"options" => array(
									"random" => "Random",
									"moveFromLeft" => "Move from left",
									"moveFromRight" => "Move from right",
									"moveFromTop" => "Move from top",
									"moveFromBottom" => "Move from bottom",
									"fadeIn" => "Fade in",
									"fadeFromLeft" => "Fade from left",
									"fadeFromRight" => "Fade from right",
									"fadeFromTop" => "Fade from top",
									"fadeFromBottom" => "Fade from bottom",
								)
				),
				array(
					"name" => __("Camera slider text color", 'creaws_admin'),
					"desc" => "",
					"id" => "_camera_caption_txt_color",
					"default" => "",
					"type" => "color_picker"
				),
				array(
					"name" => __("Camera slider caption color", 'creaws_admin'),
					"desc" => "",
					"id" => "_camera_caption_color",
					"default" => "",
					"type" => "color_picker"
				),
				array(
					"name" => __("Slider static image", 'creaws_admin'),
					"desc" => "Paste the full URL of the image here.",
					"id" => "_gen_slider_image",
					"default" => "",
					"preview" => "show",
					"preview_width" => '250',
					"preview_height" => '100',
					"type" => "uploader"
				),
				array(
					"name" => "Video Slider source",
					"desc" => "",
					"id" => "_gen_video_host",
					"type" => "select",
					"options" => array(
									"youtube" => "YouTube",
									"vimeo" => "Vimeo"
								)
				),
				array(
					"name" => __("Video ID", 'creaws_admin'),
					"desc" => "",
					"id" => "_slider_video",
					"default" => "",
					"type" => "text"
				),
				array(
					"name" => __("AutoPlay Video", 'creaws_admin'),
					"desc" => "",
					"id" => "_gen_video_autoplay",
					"default" => "",
					"type" => "checkbox"
				),

			array( "type" => "creaws_section_end"),
// General fonts section END

// General Fonts section
			array( "type" => "creaws_section", "class" => "_cws_controls_sidebars"),

				array("type" => "creaws_content_title", "name" => "Sidebars"),

				array(
					"name" => __("Custom Sidebars", 'creaws_admin'),
					"desc" => "",
					"id" => "_sidebars_list",
					"type" => "sidebars_list",
					"default" => ""
				),

			array( "type" => "creaws_section_end"),
// General fonts section END

// General Fonts section
			array( "type" => "creaws_section", "class" => "_cws_controls_translations"),

				array("type" => "creaws_content_title", "name" => "Translations"),

				array(
					"name" => "Category",
					"desc" => "",
					"id" => "cws_post_under_cat",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),
				array(
					"name" => "Search",
					"desc" => "",
					"id" => "_cws_search",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),
				array(
					"name" => "Tags",
					"desc" => "",
					"id" => "cws_post_under_tags",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),

				array(
					"name" => "No Comments",
					"desc" => "",
					"id" => "_comments_no_comments",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),

				array(
					"name" => "One Comment",
					"desc" => "",
					"id" => "_comments_one_comment",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),

				array(
					"name" => "% Comments",
					"desc" => "",
					"id" => "_comments_x_comments",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),

				array(
					"name" => "Password protected comments text",
					"desc" => "",
					"id" => "_comments_password",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),
				array(
					"name" => "Older Comments",
					"desc" => "",
					"id" => "_comments_older",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),

				array(
					"name" => "Newer Comments",
					"desc" => "",
					"id" => "_comments_newer",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),

				array(
					"name" => "Comments are closed",
					"desc" => "",
					"id" => "_comments_closed",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),
				array(
					"name" => "Leave a comment",
					"desc" => "",
					"id" => "_comments_reply",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),

				array(
					"name" => "Name",
					"desc" => "",
					"id" => "_comments_form_name",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),

				array(
					"name" => "Email Address",
					"desc" => "",
					"id" => "_comments_form_email",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),
				array(
					"name" => "Website URL",
					"desc" => "",
					"id" => "_comments_form_web",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),

				array(
					"name" => "Submit comment",
					"desc" => "",
					"id" => "_comments_submit",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),

				array(
					"name" => "Page",
					"desc" => "",
					"id" => "_tr_paginat_page",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),
				array(
					"name" => "How To Find Us",
					"desc" => "",
					"id" => "_contact_htfu",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),
				array(
					"name" => "send",
					"desc" => "",
					"id" => "_tr_send",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),
				array(
					"name" => "Page not found",
					"desc" => "",
					"id" => "_404_not_found",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),

				array(
					"name" => "404 Page text",
					"desc" => "",
					"id" => "_404_unfortunately",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),
				array(
					"name" => "Message",
					"desc" => "",
					"id" => "_tr_message",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),
				array(
					"name" => "Thanks, your email was sent successfully",
					"desc" => "",
					"id" => "_tr_mess_sussess",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),
				array(
					"name" => "Sorry, an error occured.",
					"desc" => "",
					"id" => "_tr_send_later",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),
				array(
					"name" => "Nothing found search page text",
					"desc" => "",
					"id" => "_tr_nothing_search",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),
				array(
					"name" => "All",
					"desc" => "",
					"id" => "_tr_all",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),
				array(
					"name" => "Read more...",
					"desc" => "",
					"id" => "_tr_moar",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),
				array(
					"name" => "Edit",
					"desc" => "",
					"id" => "_comments_edit",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),
				array(
					"name" => "Portfolio singular name",
					"desc" => "(i.e. \"Item\", used in breadcrumbs)",
					"id" => "_port_admin_item",
					"type" => "text",
					"styles" => "",
					"size" => "",
					"placeholder" => "",
					"default" => ""
				),

			array( "type" => "creaws_section_end"),
// General fonts section END

// General Fonts section
			array( "type" => "creaws_section", "class" => "_cws_controls_socials"),

				array("type" => "creaws_content_title", "name" => "Socials"),

				array(
					"name" => __("Vimeo link", 'creaws_admin'),
					"desc" => "Paste your Vimeo link here.",
					"id" => "_vimeo",
					"default" => "",
					"type" => "text"
				),
				array(
					"name" => __("Twitter link", 'creaws_admin'),
					"desc" => "Paste your Twitter link here.",
					"id" => "_flickr",
					"default" => "",
					"type" => "text"
				),
				array(
					"name" => __("Facebook link", 'creaws_admin'),
					"desc" => "Paste your Facebook link here.",
					"id" => "_facebook",
					"default" => "",
					"type" => "text"
				),
				array(
					"name" => __("Show/Hide Top Panel", 'creaws_admin'),
					"desc" => "",
					"id" => "_show_top_panel",
					"default" => true,
					"type" => "checkbox"
				),
				array(
					"name" => __("Show RSS link", 'creaws_admin'),
					"desc" => "",
					"id" => "_rss",
					"default" => "",
					"type" => "checkbox"
				),
				array(
					"name" => __("Show social links in PrettyPhoto popups", 'creaws_admin'),
					"desc" => "",
					"id" => "_pretty_social",
					"default" => "",
					"type" => "checkbox"
				),
array("type" => "creaws_content_title", "name" => "Twitter App Credentials"),
				array(
					"name" => __("Consumer Key", 'creaws_admin'),
					"desc" => "",
					"id" => "twt_ck",
					"default" => "",
					"type" => "text"
				),				array(
					"name" => __("Consumer Secret", 'creaws_admin'),
					"desc" => "",
					"id" => "twt_cs",
					"default" => "",
					"type" => "text"
				),				array(
					"name" => __("Access Token", 'creaws_admin'),
					"desc" => "",
					"id" => "twt_ut",
					"default" => "",
					"type" => "text"
				),				array(
					"name" => __("Access Token Secret", 'creaws_admin'),
					"desc" => "",
					"id" => "twt_us",
					"default" => "",
					"type" => "text"
				),
			array( "type" => "creaws_section_end"),
// General fonts section END

// General Fonts section
			array( "type" => "creaws_section", "class" => "_cws_controls_contacts"),

				array("type" => "creaws_content_title", "name" => "Contacts"),

				array(
					"name" => __("E-mail for contact forms", 'creaws_admin'),
					"desc" => "",
					"id" => "_cform_emails",
					"default" => "",
					"type" => "text"
				),

				array(
					"name" => __("Google Maps URL", 'creaws_admin'),
					"desc" => "",
					"id" => "_gen_gmap",
					"default" => "",
					"type" => "textarea"
				),

			array( "type" => "creaws_section_end"),
// General fonts section END

		array("type" => "creaws_content_end"),

//shortcode button list
array("type" => "button_list"),

	array(
		"type" => "shortcodes_item", "id" => "_columns", "name" => "Columns",
		"options" => array(
						"1/2 Column" => array(
											"Basic" => "[one_half]{|}[/one_half]",
											"Last" => "[one_half_last]{|}[/one_half_last]",
											"Complete Syntax" => "[one_half top='' bottom='']{|}[/one_half]",
											"Complete Syntax Last" => "[one_half_last top='' bottom='']{|}[/one_half_last]"
										),
						"1/3 Column" => array(
											"Basic" => "[one_third]{|}[/one_third]",
											"Last" => "[one_third_last]{|}[/one_third_last]",
											"Complete Syntax" => "[one_third top='' bottom='']{|}[/one_third]",
											"Complete Syntax Last" => "[one_third_last top='' bottom='']{|}[/one_third_last]"
										),
						"2/3 Column" => array(
											"Basic" => "[two_thirds]{|}[/two_thirds]",
											"Last" => "[two_thirds_last]{|}[/two_thirds_last]",
											"Complete Syntax" => "[two_thirds top='' bottom='']{|}[/two_thirds]",
											"Complete Syntax Last" => "[two_thirds_last top='' bottom='']{|}[/two_thirds_last]"
										),
						"1/4 Column" => array(
											"Basic" => "[one_fourth]{|}[/one_fourth]",
											"Last" => "[one_fourth_last]{|}[/one_fourth_last]",
											"Complete Syntax" => "[one_fourth top='' bottom='']{|}[/one_fourth]",
											"Complete Syntax Last" => "[one_fourth_last top='' bottom='']{|}[/one_fourth_last]"
										),
						"3/4 Column" => array(
											"Basic" => "[three_fourth]{|}[/three_fourth]",
											"Last" => "[three_fourth_last]{|}[/three_fourth_last]",
											"Complete Syntax" => "[three_fourth top='' bottom='']{|}[/three_fourth]",
											"Complete Syntax Last" => "[three_fourth_last top='' bottom='']{|}[/three_fourth_last]"
										),
						"1/5 Column" => array(
											"Basic" => "[one_fifth]{|}[/one_fifth]",
											"Last" => "[one_fifth_last]{|}[/one_fifth_last]",
											"Complete Syntax" => "[one_fifth top='' bottom='']{|}[/one_fifth]",
											"Complete Syntax Last" => "[one_fifth_last top='' bottom='']{|}[/one_fifth_last]"
										),
						"4/5 Column" => array(
											"Basic" => "[four_fifth]{|}[/four_fifth]",
											"Last" => "[four_fifth_last]{|}[/four_fifth_last]",
											"Complete Syntax" => "[four_fifth top='' bottom='']{|}[/four_fifth]",
											"Complete Syntax Last" => "[four_fifth_last top='' bottom='']{|}[/four_fifth_last]"
										),

					),
	),
	array(
		"type" => "shortcodes_item", "id" => "_columns", "name" => "Typography",
		"options" => array(
						"Essentials" => array(
											"Abbreviation" => "[abbr]{|}[/abbr]",
											"Strong" => "[strong]{|}[/strong]",
											"Emphasis" => "[em]{|}[/em]",
											"Defining instance" => "[dfn]{|}[/dfn]",
											"Highlighted text" => "[highlight]{|}[/highlight]",
											"Superscript" => "[sup]{|}[/sup]",
											"Subscript" => "[sub]{|}[/sub]",
											"Small text" => "[small]{|}[/small]",
											"Big text" => "[big]{|}[/big]",
											"Deleted text" => "[del]{|}[/del]",
											"Quotation" => "[quot]{|}[/quot]",
										),
						"Text Highlights" => array(
											"Orange" => "[highlighted_text type='7']{|}[/highlighted_text]",
											"Yellow" => "[highlighted_text type='6']{|}[/highlighted_text]",
											"Green" => "[highlighted_text type='5']{|}[/highlighted_text]",
											"Cyan" => "[highlighted_text type='4']{|}[/highlighted_text]",
											"Purple" => "[highlighted_text type='3']{|}[/highlighted_text]",
											"Pink" => "[highlighted_text type='2']{|}[/highlighted_text]",
											"Red" => "[highlighted_text type='1']{|}[/highlighted_text]",
											"Custom" => "[highlighted_text color='' bgcolor='']{|}[/highlighted_text]",
										),
						"Lists" => array(
											"Arrow type 1" => "[arrow]{|}[/arrow]",
											"Arrow type 2" => "[arrow-2]{|}[/arrow-2]",
											"Arrow type 3" => "[arrow-3]{|}[/arrow-3]",
											"Arrow type 4" => "[arrow-4]{|}[/arrow-4]",
											"Arrow type 5" => "[arrow-5]{|}[/arrow-5]",
											"Arrow type 6" => "[arrow-6]{|}[/arrow-6]",
											"Arrow type 7" => "[arrow-7]{|}[/arrow-7]",
											"Diamond type 1" => "[diamond]{|}[/diamond]",
											"Diamond type 2" => "[diamond-2]{|}[/diamond-2]",
											"Number" => "[number]{|}[/number]",
											"Bullet" => "[bullet]{|}[/bullet]",
										),
						"Toggle" => "[toggle][item title=''][/item][item title=''][/item][item title=''][/item][/toggle]",

						"Accordion" => "[accordion top='' bottom=''][item title='' inner_title=''][/item][item title='' inner_title=''][/item][item title='' inner_title=''][/item][/accordion]",

						"Pullquotes" => array(
											"Basic" => "[pullquote]{|}[/pullquote]",
											"Complete Syntax	" => "[pullquote align='' top='' bottom='' left='' right='']{|}[/pullquote]",
										),
						"Dropcaps" => array(
											"Style 1 Basic" => "[cap]{|}[/cap]",
											"Style 1 Complete Syntax" => "[cap top='' bottom='' right='' left='']{|}[/cap]",
											"Style 2 Basic" => "[cap style='2']{|}[/cap]",
											"Style 2 Complete Syntax" => "[cap style='2' top='' bottom='' right='' left='']{|}[/cap]",
										),
						"Tabs" => array(
										"Tabs Basic" => "[tabs][tab title='' inner_title=''][/tab][tab title='' inner_title=''][/tab][tab title='' inner_title=''][/tab][/tabs]",
										"Tabs Complete Syntax" => "[tabs top='' bottom=''][tab title='' inner_title=''][/tab][tab title='' inner_title=''][/tab][tab title='' inner_title=''][/tab][/tabs]"
									),
						"Info boxes" => array(
											"Info" => "[box type='info' top='' bottom='']{|}[/box]",
											"Success" => "[box type='success' top='' bottom='']{|}[/box]",
											"Arrow" => "[box type='arrow' top='' bottom='']{|}[/box]",
											"Error" => "[box type='error' top='' bottom='']{|}[/box]",
											"Alert" => "[box type='alert' top='' bottom='']{|}[/box]",
											"Notice" => "[box type='notice' top='' bottom='']{|}[/box]",
										),
						"Notification Boxes" => array(
											"Success" => "[infobox type='success' top='' bottom='']{|}[/infobox]",
											"Error" => "[infobox type='error' top='' bottom='']{|}[/infobox]",
											"Inform" => "[infobox type='inform' top='' bottom='']{|}[/infobox]",
											"Warning" => "[infobox type='warning' top='' bottom='']{|}[/infobox]",
											"Edit" => "[infobox type='edit' top='' bottom='']{|}[/infobox]",
											"Members" => "[infobox type='members' top='' bottom='']{|}[/infobox]",
											"Tip" => "[infobox type='tip' top='' bottom='']{|}[/infobox]",
											"Download" => "[infobox type='download' top='' bottom='']{|}[/infobox]",
											"Hello" => "[infobox type='hello' top='' bottom='']{|}[/infobox]",
										),
						"Divider" => array(
											"Divider basic" => "[divider][/divider]",
											"Line" => "[divider type='line'][/divider]",
											"Shadow" => "[divider type='shadow'][/divider]",
											"Curve" => "[divider type='curve'][/divider]",
											"Gap (Empty devider)" => "[divider type='gap'][/divider]",
											"Complete Syntax" => "[divider bottom='' top='' width='' type=''][/divider]"
										),
						"Table" => array(
										"Basic Table" => "[table]{|}[/table]",
										"Table Complete Syntax" => "[table top='' bottom='']{|}[/table]"
									),
					)
	),
	array(
		"type" => "shortcodes_item", "id" => "_columns", "name" => "Images",
		"options" => array(
							"Small" => "[image width='small']{|}[/image]",
							"Medium" => "[image width='medium']{|}[/image]",
							"Large" => "[image width='large']{|}[/image]",
							"Original" => "[image]{|}[/image]",
							"Full Syntax" => "[image width='' height='' title='' lightbox='' group='' top='' right='' bottom='' left='' align='']{|}[/image]"
					),
	),
	array(
		"type" => "shortcodes_item", "id" => "_columns", "name" => "LightBox",
		"options" => array(
							"Basic" => "[image lightbox='']{|}[/image]",
							"Group" => "[image lightbox='' group='']{|}[/image]",
							"Complete Syntax" => "[image title='' lightbox='' group='' top='' right='' bottom='' left='' align='']{|}[/image]"
					),
	),
	array(
		"type" => "shortcodes_item", "id" => "_columns", "name" => "Buttons",
		"options" => array(
							"Default" => "[button]{|}[/button]",
							"Small Blue" => "[button style='blue' type='small']{|}[/button]",
							"Small Red" => "[button style='red' type='small']{|}[/button]",
							"Small Green" => "[button style='green' type='small']{|}[/button]",
							"Small Brown" => "[button style='brown' type='small']{|}[/button]",
							"Small Peachy" => "[button style='peachy' type='small']{|}[/button]",
							"Small Violet" => "[button style='violet' type='small']{|}[/button]",
							"Medium Blue" => "[button style='blue' type='medium']{|}[/button]",
							"Medium Red" => "[button style='red' type='medium']{|}[/button]",
							"Medium Green" => "[button style='green' type='medium']{|}[/button]",
							"Medium Brown" => "[button style='brown' type='medium']{|}[/button]",
							"Medium Peachy" => "[button style='peachy' type='medium']{|}[/button]",
							"Medium Violet" => "[button style='violet' type='medium']{|}[/button]",
							"Rectangle Blue" => "[button style='blue' type='rectangle']{|}[/button]",
							"Rectangle Red" => "[button style='red' type='rectangle']{|}[/button]",
							"Rectangle Green" => "[button style='green' type='rectangle']{|}[/button]",
							"Rectangle Brown" => "[button style='brown' type='rectangle']{|}[/button]",
							"Rectangle Peachy" => "[button style='peachy' type='rectangle']{|}[/button]",
							"Rectangle Violet" => "[button style='violet' type='rectangle']{|}[/button]",
							"Rounded Blue" => "[button style='blue' type='rounded']{|}[/button]",
							"Rounded Red" => "[button style='red' type='rounded']{|}[/button]",
							"Rounded Green" => "[button style='green' type='rounded']{|}[/button]",
							"Rounded Brown" => "[button style='brown' type='rounded']{|}[/button]",
							"Rounded Peachy" => "[button style='peachy' type='rounded']{|}[/button]",
							"Rounded Violet" => "[button style='violet' type='rounded']{|}[/button]",
							"Button Complete Syntax	" => "[button align='' style='' type='' link='' top='' bottom='' left='' right='']{|}[/button]"
					),
	),
	array(
		"type" => "shortcodes_item", "id" => "_columns", "name" => "Carousel",
		"options" => array(
							"Style 1" => "[carousel]{|}[/carousel]",
							"Style 2" => "[carousel style='2']{|}[/carousel]",
							"Complete Syntax" => "[carousel style='' category='' quantity='']{|}[/carousel]"
					)
	),
	array(
		"type" => "shortcodes_item", "id" => "_columns", "name" => "Recent Projects",
		"options" => "[recent_projects title='' category='' quantity='' button='']{|}[/recent_projects]"
	),
	array(
		"type" => "shortcodes_item", "id" => "_columns", "name" => "Media",
		"options" => array(
							"YouTube Basic" => "[youtube]{|}[/youtube]",
							"YouTube Custom" => "[youtube align='' autoplay='' theme='' color='' width='' height='' top='' bottom='' left='' right='']{|}[/youtube]",
							"Vimeo Basic" => "[vimeo]{|}[/vimeo]",
							"Vimeo Custom" => "[vimeo align='' width='' height='' color='' autoplay='']{|}[/vimeo]",
					)
	),
	array(
		"type" => "shortcodes_item", "id" => "_columns", "name" => "Pricing Tables",
		"options" => "[pricing_table][item title='' price='' link_text='' link=''][/item][item title='' price='' link_text='' link=''][/item][item title='' price='' link_text='' link='' best='this'][/item][item title='' price='' link_text='' link=''][/item][/pricing_table]"
	),
	array(
		"type" => "shortcodes_item", "id" => "_columns", "name" => "Ads Boxes",
		"options" => array(
							"Default" => "[ads_box top='' bottom=''][item icon='plane' title='' link='' link_text=''][/item][item icon='cubes' title='' link='' link_text=''][/item][item icon='ball' title='' link='' link_text=''][/item][/ads_box]",
							"Custom" => "[ads_box top='' bottom=''][item icon='custom' icon_link='' title='' link='' link_text='' width='' height=''][/item][item icon='custom' icon_link='' title='' link='' link_text='' width='' height=''][/item][item icon='custom' icon_link='' title='' link='' link_text='' width='' height=''][/item][/ads_box]"
					)
	),

	//-------------------------------------------------------------------------------------------------------------------------//
	array("type" => "shortcodes_separator"),
	//-------------------------------------------------------------------------------------------------------------------------//

array("type" => "button_list_end"),
//shortcode button list END

// CWS CONTENT END

	array("type" => "end"),

//CWS END
);

return array(
	'name' => 'general',
	'options' => $options
);