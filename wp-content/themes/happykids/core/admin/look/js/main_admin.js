// // media uploader start
// 	var formfield=null;
// 	window.original_send_to_editor = window.send_to_editor;
// 	window.send_to_editor = function(html){
// 		if (formfield) {
// 			var fileurl = jQuery('img',html).attr('src');
// 			formfield.val(fileurl);
// 			tb_remove();
// 		} else {
// 			window.original_send_to_editor(html);
// 		}
// 		formfield=null;
// 	};
// 	jQuery('.media_upload_button').click(function(){
// 		formfield = jQuery(this).prev();
// 		tb_show('', 'media-upload.php?type=image&TB_iframe=true');
// 		jQuery('#TB_overlay,#TB_closeWindowButton').bind('click',function(){formfield=null;});
// 		return false;
// 	});
// // media uploader ends

jQuery(document).ready(function($){
	$(".cws_colorpicker").wpColorPicker();

	var windowWidht = $('body').outerWidth();
	var windowHeight = ($('#adminmenuback').outerHeight() + 28);

	$('.creaws_cover_all').css({'width' : windowWidht, 'height' : windowHeight});

// Google Font Preview
	$('.gfont_select').change(function(){

		var font_value = $(this).val();
		var ajax_url = $(this).attr('data-gfontajax');
		var sample = $(this).parent().find('.gfont_preview');
		var font_type = $(this).find(':selected').attr('data-gfonttype');
		
		if( font_type != 'System fonts' ){
			$.post(ajax_url,{ action: 'get_font_admin_preview_ajax', font_selected : font_value }, function(fn){
				
				if(fn){					
						jQuery('head').append('<link rel="stylesheet" type="text/css" href="' + fn.url + '" >');
						sample.css('font-family', font_value);
				}
				
			}, 'json');
		}else{	
			sample.css('font-family', font_value);
		}
		
	});

	$('.gfont_select').change();
// Google Font Preview

// Admin page sidebar
	$('#creaws_content ._cws_controls_general').show();
	$('#creaws_aside #_cws_controls_general').parent().addClass('active');

	$('#creaws_aside a').click(function(){
		var sidebar = $(this).attr('id');

		$('#creaws_content section.common_display_none').hide();
		$('#creaws_content .'+sidebar).show();
		$('#creaws_aside a').parent().removeClass('active');
		$(this).parent().addClass('active');
		// var windowHeight = ($('body').outerHeight() + 28);
		// $('.cws_page .siteTop').css({'height' : height});
		// console.log('height is = '+height);
	});
// Admin page sidebar END

					var pageType = $("#_pagetype_check").val();
						if (pageType == "page"){
							$("#page_general .meta_content .meta-box-item").hide();
							$("#page_general .meta_content ._page_check").show();
						}else if (pageType == "blog"){
							$("#page_general .meta_content .meta-box-item").hide();
							$("#page_general .meta_content ._blog_check").show();
						}else if (pageType == "port"){
							$("#page_general .meta_content .meta-box-item").hide();
							$("#page_general .meta_content ._port_check").show();
						}else if (pageType == "gall"){
							$("#page_general .meta_content .meta-box-item").hide();
							$("#page_general .meta_content ._gallery_check").show();
						}else if (pageType == "cform"){
							$("#page_general .meta_content .meta-box-item").hide();
							$("#page_general .meta_content ._cform_check").show();
						}

						$("#_pagetype_check").live("change" , function(){
							var pageType = $("#_pagetype_check").val();
							if (pageType == "page"){
								$("#page_general .meta_content .meta-box-item").hide();
								$("#page_general .meta_content ._page_check").show();
							}else if (pageType == "blog"){
								$("#page_general .meta_content .meta-box-item").hide();
								$("#page_general .meta_content ._blog_check").show();
							}else if (pageType == "port"){
								$("#page_general .meta_content .meta-box-item").hide();
								$("#page_general .meta_content ._port_check").show();
							}else if (pageType == "gall"){
								$("#page_general .meta_content .meta-box-item").hide();
								$("#page_general .meta_content ._gallery_check").show();
							}else if (pageType == "cform"){
								$("#page_general .meta_content .meta-box-item").hide();
								$("#page_general .meta_content ._cform_check").show();
							}
						});

	//page type `Page` js
						$("#_page_templ").live("change" , function(){
							var page_value = $(this).val();
							if ( page_value == "double" ){
								$(".meta_content .sub_page_templ").hide();
								$(".meta_content ._sidebar_double").show();
							}else if ( page_value == "left" || page_value == "right" ){
								$(".meta_content .sub_page_templ").hide();
								$(".meta_content ._sidebar_name").show();
							}else {
								$(".meta_content .sub_page_templ").hide();
							}
						});
						var page_value = $("#_page_templ").val();
						if ( page_value == "double" ){
							$(".meta_content .sub_page_templ").hide();
							$(".meta_content ._sidebar_double").show();
						}else if ( page_value == "left" || page_value == "right" ){
							$(".meta_content .sub_page_templ").hide();
							$(".meta_content ._sidebar_name").show();
						}else {
							$(".meta_content .sub_page_templ").hide();
						}
	//page type `Page` js END

	//page type `Blog` js
						$("#_blog_templ").live("change" , function(){
							var blog_value = $(this).val();
							if ( blog_value == "one" || blog_value == "two" ){
								$(".meta_content .sub_page_templ").hide();
								$(".meta_content ._sidebar_name").show();
							}else if ( blog_value == "double" ){
								$(".meta_content .sub_page_templ").hide();
								$(".meta_content ._sidebar_double").show();
							}else {
								$(".meta_content .sub_page_templ").hide();
							}
						});
						var blog_value = $("#_blog_templ").val();
						if ( blog_value == "one" || blog_value == "two" ){
							$(".meta_content .sub_page_templ").hide();
							$(".meta_content ._sidebar_name").show();
						}else if ( blog_value == "double" ){
							$(".meta_content .sub_page_templ").hide();
							$(".meta_content ._sidebar_double").show();
						}
	//page type `Blog` js END

	//page type `Portfolio` js
						$("#_page_port_templ").live("change" , function(){
							var port_value = $(this).val();
							if ( port_value == "1col" ){
								$(".meta_content ._sidebar_name").show();
							}else {
								$(".meta_content .sub_page_templ").hide();
							}
						});
						var port_value = $("#_page_port_templ").val();
						if ( port_value == "1col" ){
							$(".meta_content ._sidebar_name").show();
						}else {
							$(".meta_content .sub_page_templ").hide();
						}
	//page type `Portfolio` js END

	//page type `Gallery` js
						$("#_gall_templ").live("change" , function(){
							var port_value = $(this).val();
							if ( port_value == "with_sidebar" ){
								$(".meta_content ._sidebar_name").show();
							}else {
								$(".meta_content .sub_page_templ").hide();
							}
						});
						var port_value = $("#_gall_templ").val();
						if ( port_value == "with_sidebar" ){
							$(".meta_content ._sidebar_name").show();
						}else {
							$(".meta_content .sub_page_templ").hide();
						}
	//page type `Gallery` js END

// Reset
	$('#cws_reset').click(function(){
		$('.creaws_popUp').hide();
		$('.creaws_cover_all').fadeIn();
		$('.popUp_confirm').fadeIn(800);
	});

	// Dialogs

	$('.creaws_ok_button.alert').click(function(){
		$('.creaws_cover_all').fadeOut();
	});

	$('.creaws_ok_button.decline').click(function(){
		$('.creaws_cover_all').fadeOut();
	});


	$('.creaws_ok_button.confirm').click(function(){


		var defaults = ["_logo", "_fav", "_gen_template_select", "_sidebar_main", "_sidebar_main_l", "_gen_breadcrumbs", "_sidebar_404", "_widget_type", "_theme_skin_color", "_theme_skin_pattern", "_menu_gfont", "_headers_gfont", "_text_gfont", "_gen_video_host", "_gen_slider_select", "_slider_video", "_gen_slogan", "_gen_video_autoplay", "_what_slider_select", "_cam_slider_caption", "_gen_slider_image", "_gen_slide_cat", "_gen_port_butt_show", "_gen_port_butt_txt", "_yt_color", "_yt_theme", "_vim_color", "_vim_header", "_vimeo", "_flickr", "_facebook", "_cform_emails", "_gen_gmap", "_ganalytics", "_mmf_color", "_cth_color", "_ct_color", "_h1_size", "_h2_size", "_h3_size", "_h4_size", "_h5_size", "_h6_size", "_content_fsize", "_content_lineheight", "cws_mt_", "_cws_mt", "_sidebar_search", "_cws_mt", "_logo_h", "_logo_w", "_logo_it", "_logo_ir", "_logo_il", "_logo_ib", "cws_post_under_cat", "cws_post_under_tags", "_comments_no_comments", "_comments_one_comment", "_comments_x_comments", "_comments_password", "_comments_older", "_comments_newer", "_comments_closed", "_comments_reply", "_comments_form_name", "_comments_form_email", "_comments_form_web", "_comments_submit", "_home_top", "_home_bottom", "_rss", "_gen_port_ipp", "_gen_gall_ipp", "_blog_template_select", "_sidebar_main_blog_l", "_sidebar_main_blog_r", "_columns", "_pretty_social", "_tr_paginat_page", "_contact_htfu", "_tr_ver_code", "_tr_send", "_404_not_found", "_404_unfortunately", "_please_en_name", "_invalid_email", "_verif_wrong", "_was_sent", "_em_from_form", "_tr_message", "_comments_edit", "_tr_mess_sussess", "_tr_send_later", "_tr_nothing_search", "_cws_search", "_tr_all", "_tr_moar", "_theme_skin_pallow", "_camera_caption_color", "_camera_caption_txt_color", "_theme_load_pattern", "_show_top_panel", "_port_admin_item", "_camera_pagination", "_gen_slogan_divider"];

		for (var key in defaults){
			var val = defaults [key];
			if (val){
				var currentValue = $('#' + val).val();
				$('#' + val).val(null);
			}
		}

		$('[data-default="1"]').each(function(){
			$(this).val(1);
			$(this).attr("checked", true);
		});

		
		$('.creaws_popUp').fadeOut();
		$('.popUp_reset').fadeIn();
	});

	$('.creaws_ok_button.resetwasok').click(function(){
		// $('#creaws_save_confirm').stop();
		$('#creaws_save_confirm').fadeOut();
		$('.creaws_popUp').fadeOut();
		$('.creaws_cover_all').fadeOut();
		$('.creaws_form_button').click();
	});

	$('.creaws_ok_button.okay').click(function(){
		$('#creaws_save_confirm').stop();
		$('.creaws_popUp').fadeOut();
		$('.creaws_cover_all').fadeOut();
	});

	// Dialogs END

//Reset END	

// Help link
	$('#_cws_controls_help').attr('href', 'http://happykidswp.creaws.com/help/index.html');
	$('#_cws_controls_help').attr('target', '_blank');
	$('#_cws_controls_help').click(function(){
		$('#creaws_content ._cws_controls_general').show();
	});
// Help link

$("#creaws_save_confirm").delay(6000).fadeOut();

// Save ajax
	// $('#save_options').click(function(e){

	// 	var item = $(this);
	// 	var form = item.parents('form');
	// 	var form_content = form.serialize();
	// 	var form_url = form.attr('action');
		
	// 	$.ajax({
	// 		type: "POST",
	// 		url: form_url,
	// 		data: form_content,
	// 		success: function(msg){
	// 			// alert('Got this from the server: ' + msg);
	// 			$('.creaws_popUp').hide();
	// 			$('.creaws_cover_all').fadeIn();
	// 			$('.popUp_success').fadeIn(800);

	// 			// console.log('save button was pushed!');

	// 			$('.uploader_wrap').each(function(){
	// 				var imgURL = $(this).find('input[type=text]').val();
	// 				$(this).find('.uploader_preview').html('<img alt="" src="'+ imgURL +'" />');
	// 				console.log(imgURL);
	// 			});

	// 			// console.log('previews must be refreshed.');
	// 		}
	// 	});
	
	// 	e.preventDefault();

	// });
// Save ajax END

});