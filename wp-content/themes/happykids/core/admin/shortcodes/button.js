// JavaScript Document
(function() {
	tinymce.create('tinymce.plugins.cws_shortcodes', {
		init : function(ed, url) {
			ed.addButton('cws_shortcodes', {
				image : url+'/shortcode-green.png',
				onclick : function() {
					var shortBox = jQuery('#cws_button_list');
					console.log(shortBox);
					jQuery('#content_cws_shortcodes').append(shortBox);
					jQuery('#cws_button_list').show();
					jQuery('#cws_button_list').mouseleave(function(){
						jQuery(this).hide();
					});
				}
			});
		},

		createControl : function(n, cm) {
			return null;
		},
	});

	tinymce.PluginManager.add('cws_shortcodes', tinymce.plugins.cws_shortcodes);
})();

jQuery(document).ready(function($){

	var field = $('#cws_button_list li a');
	$('#cws_button_list .top_ul li').each(function(){
		$(this).hover(
			function(){
				$(this).find('.sub_ul').show();
				$('.sub_ul li').hover(
					function(){
						$(this).find('.sub_ul_codes').show();
					},
					function(){
						$(this).find('.sub_ul_codes').hide();
					}
				);
			},
			function(){
				$(this).find('.sub_ul').hide();
			}
		);
	});
	field.click(function(){

		var selection = tinyMCE.activeEditor.selection.getContent();
	
		var attr = $(this).attr("data-attr");

		var replace_template = '"';

		var quotes = attr.replace(/'/g, replace_template);

		var result = quotes.replace('{|}', selection);

		send_to_editor(result);

		$('#cws_button_list').hide();
	});

});