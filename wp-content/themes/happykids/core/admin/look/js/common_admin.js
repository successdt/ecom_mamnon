
jQuery(document).ready(function($){

var pageType = $("#_pagetype_check").val();
	if (pageType == "page"){
		$("#cws_page_general .meta_content .meta-box-item").hide();
		$("#cws_page_general .meta_content ._page_check").show();

		var page_value = $("#_page_templ").val();
		if ( page_value == "double" ){
			$(".meta_content ._sidebar_double").addClass('sideActive');
		}else if ( page_value == "left" || page_value == "right" ){
			$(".meta_content ._sidebar_name").addClass('sideActive');
		}

	}else if (pageType == "blog"){
		$("#cws_page_general .meta_content .meta-box-item").hide();
		$("#cws_page_general .meta_content ._blog_check").show();

		var blog_value = $("#_blog_templ").val();
		if ( blog_value == "one" || blog_value == "two" ){
			$(".meta_content ._sidebar_name").addClass('sideActive');
		}else if ( blog_value == "double" ){
			$(".meta_content ._sidebar_double").addClass('sideActive');
		}

	}else if (pageType == "port"){
		$("#cws_page_general .meta_content .meta-box-item").hide();
		$("#cws_page_general .meta_content ._port_check").show();

		var port_value = $("#_page_port_templ").val();
		if ( port_value == "1col" ){
			$(".meta_content ._sidebar_name").show();
		}

	}else if (pageType == "gall"){
		$("#cws_page_general .meta_content .meta-box-item").hide();
		$("#cws_page_general .meta_content ._gallery_check").show();

		var port_value = $("#_gall_templ").val();
		if ( port_value == "with_sidebar" ){
			$(".meta_content ._sidebar_name").show();
		}

	}else if (pageType == "cform"){
		$("#cws_page_general .meta_content .meta-box-item").hide();
		$("#cws_page_general .meta_content ._cform_check").show();
	}else {
		$("#cws_page_general .meta_content .meta-box-item").hide();
	}

	$("#_pagetype_check").live("change" , function(){
		var pageType = $("#_pagetype_check").val();
		if (pageType == "page"){
			$("#cws_page_general .meta_content .meta-box-item").hide();
			$("#cws_page_general .meta_content ._page_check").slideDown();
		}else if (pageType == "blog"){
			$("#cws_page_general .meta_content .meta-box-item").hide();
			$("#cws_page_general .meta_content ._blog_check").slideDown();
		}else if (pageType == "port"){
			$("#cws_page_general .meta_content .meta-box-item").hide();
			$("#cws_page_general .meta_content ._port_check").slideDown();
		}else if (pageType == "gall"){
			$("#cws_page_general .meta_content .meta-box-item").hide();
			$("#cws_page_general .meta_content ._gallery_check").slideDown();
		}else if (pageType == "cform"){
			$("#cws_page_general .meta_content .meta-box-item").hide();
			$("#cws_page_general .meta_content ._cform_check").slideDown();
		}else {
			$("#cws_page_general .meta_content .meta-box-item").slideUp();
		}
	});

//page type `Page` js
	$("#_page_templ").live("change" , function(){
		var page_value = $(this).val();
		$(".meta_content .sub_page_templ").removeClass('sideActive');
		if ( page_value == "double" ){
			$(".meta_content .sub_page_templ").hide();
			$(".meta_content ._sidebar_double").slideDown();
		}else if ( page_value == "left" || page_value == "right" ){
			$(".meta_content .sub_page_templ").hide();
			$(".meta_content ._sidebar_name").slideDown();
		}else {
			$(".meta_content .sub_page_templ").hide();
		}
	});
	// console.log(page_value);
//page type `Page` js END

//page type `Blog` js
	$("#_blog_templ").live("change" , function(){
		var blog_value = $(this).val();
		$(".meta_content .sub_page_templ").removeClass('sideActive');
		if ( blog_value == "one" || blog_value == "two" ){
			$(".meta_content .sub_page_templ").hide();
			$(".meta_content ._sidebar_name").slideDown();
		}else if ( blog_value == "double" ){
			$(".meta_content .sub_page_templ").hide();
			$(".meta_content ._sidebar_double").slideDown();
		}else {
			$(".meta_content .sub_page_templ").hide();
		}
	});
//page type `Blog` js END

//page type `Portfolio` js
	$("#_page_port_templ").live("change" , function(){
		$(".meta_content .sub_page_templ").removeClass('sideActive');
		var port_value = $(this).val();
		if ( port_value == "1col" ){
			$(".meta_content ._sidebar_name").slideDown();
		}else {
			$(".meta_content .sub_page_templ").hide();
		}
	});
//page type `Portfolio` js END

//page type `Gallery` js
	$("#_gall_templ").live("change" , function(){
		var port_value = $(this).val();
		$(".meta_content .sub_page_templ").removeClass('sideActive');
		if ( port_value == "with_sidebar" ){
			$(".meta_content ._sidebar_name").slideDown();
		}else {
			$(".meta_content .sub_page_templ").hide();
		}
	});
//page type `Gallery` js END

	var checked = $('#post-format-video').attr('checked');
	if (!checked){$("#cws_single.postbox ").hide();}
	$('#post-formats-select input').click(function(){
		var id = $(this).attr('id');
		if (id != 'post-format-video'){
			$("#cws_single.postbox ").slideUp();
		}else if (id == 'post-format-video'){
			$("#cws_single.postbox ").slideDown();
		}
	});

});