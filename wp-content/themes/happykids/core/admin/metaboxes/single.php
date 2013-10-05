<?php 
$config = array(
	'title' => __('Post Options', THEME_NAME . '_admin'),
	'id' => 'cws_single',
	'pages' => array('post'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);
$options = array(

	array(
		"name" => "Video",
		"desc" => "",
		"id" => "_format_video",
		"type" => "textarea",
		"default" => "",
		"placeholder" => "Embeded video block"
	),

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
								"Small" => array(
									"Small Blue" => "[button style='blue' type='small']{|}[/button]",
									"Small Red" => "[button style='red' type='small']{|}[/button]",
									"Small Green" => "[button style='green' type='small']{|}[/button]",
									"Small Brown" => "[button style='brown' type='small']{|}[/button]",
									"Small Peachy" => "[button style='peachy' type='small']{|}[/button]",
									"Small Violet" => "[button style='violet' type='small']{|}[/button]",
								),
								"Medium" => array(
									"Medium Blue" => "[button style='blue' type='medium']{|}[/button]",
									"Medium Red" => "[button style='red' type='medium']{|}[/button]",
									"Medium Green" => "[button style='green' type='medium']{|}[/button]",
									"Medium Brown" => "[button style='brown' type='medium']{|}[/button]",
									"Medium Peachy" => "[button style='peachy' type='medium']{|}[/button]",
									"Medium Violet" => "[button style='violet' type='medium']{|}[/button]",	
								),
								"Rectangle" => array(
									"Rectangle Blue" => "[button style='blue' type='rectangle']{|}[/button]",
									"Rectangle Red" => "[button style='red' type='rectangle']{|}[/button]",
									"Rectangle Green" => "[button style='green' type='rectangle']{|}[/button]",
									"Rectangle Brown" => "[button style='brown' type='rectangle']{|}[/button]",
									"Rectangle Peachy" => "[button style='peachy' type='rectangle']{|}[/button]",
									"Rectangle Violet" => "[button style='violet' type='rectangle']{|}[/button]",
								),
								"Rounded" => array(
									"Rounded Blue" => "[button style='blue' type='rounded']{|}[/button]",
									"Rounded Red" => "[button style='red' type='rounded']{|}[/button]",
									"Rounded Green" => "[button style='green' type='rounded']{|}[/button]",
									"Rounded Brown" => "[button style='brown' type='rounded']{|}[/button]",
									"Rounded Peachy" => "[button style='peachy' type='rounded']{|}[/button]",
									"Rounded Violet" => "[button style='violet' type='rounded']{|}[/button]",
								),
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

	array("type" => "button_list_end"),
	//shortcode button list END

);
new metaboxesGenerator($config,$options);