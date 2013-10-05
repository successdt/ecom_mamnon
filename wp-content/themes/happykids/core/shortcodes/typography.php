<?php

	function abbr($atts, $content = null) { 
		return '<abbr>'. $content .'</abbr>';
	}
	add_shortcode('abbr', 'abbr');

	function strong($atts, $content = null) {
		return '<strong>'. $content .'</strong>';
	}
	add_shortcode('strong', 'strong');

	function em($atts, $content = null) {
		return '<em>'. $content .'</em>';
	}
	add_shortcode('em', 'em');

	function bold($atts, $content = null) {
		return '<b>'. $content .'</b>';
	}
	add_shortcode('bold', 'bold');

	function dfn($atts, $content = null) {
		return '<b><i>'. $content .'</i></b>';
	}
	add_shortcode('dfn', 'dfn');

	function highlight($atts, $content = null) {
		return '<span class="highlight">'. $content .'</span>';
	}
	add_shortcode('highlight', 'highlight');

	function sup($atts, $content = null) {
		return '<sup>'. $content .'</sup>';
	}
	add_shortcode('sup', 'sup');

	function sub($atts, $content = null) {
		return '<sub>'. $content .'</sub>';
	}
	add_shortcode('sub', 'sub');

	function small($atts, $content = null) {
		return '<small>'. $content .'</small>';
	}
	add_shortcode('small', 'small');

	function big($atts, $content = null) {
		return '<big>'. $content .'</big>';
	}
	add_shortcode('big', 'big');

	function del($atts, $content = null) {
		return '<del>'. $content .'</del>';
	}
	add_shortcode('del', 'del');

	function quotation($atts, $content = null) {
		return '<q>'. $content .'</q>';
	}
	add_shortcode('quot', 'quotation');

?>