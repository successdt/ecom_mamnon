<?php

	function theme_pagination($class = '', $_query = null, $num_pages = 9, $stepLink = 9, $echo = true) {

		/* ================ Settings ================ */
		$text_num_page = multitranslate("Page", "_tr_paginat_page", false).' ({current} of {last})';
		$dotright_text = '...';
		$dotright_text2 = '...';
		$backtext = 'Prev';
		$nexttext = 'Next';
		$first_page_text = '';
		$last_page_text = '';
		/* ============== Settings END ============== */ 

		if (!$_query) {
			global $wp_query;

			$posts_per_page = (int) $wp_query->query_vars['posts_per_page'];
			$paged = (int) $wp_query->query_vars['paged']; 
			$max_page = $wp_query->max_num_pages;
		}else {
			$posts_per_page = (int) $_query->query_vars['posts_per_page'];
			$paged = (int) $_query->query_vars['paged'];
			$max_page = $_query->max_num_pages;
		}

		if($max_page <= 1 ) return false;

		if(empty($paged) || $paged == 0) $paged = 1;

		$pages_to_show = intval($num_pages);
		$pages_to_show_minus_1 = $pages_to_show-1;

		$half_page_start = floor($pages_to_show_minus_1/2);
		$half_page_end = ceil($pages_to_show_minus_1/2);

		$start_page = $paged - $half_page_start;
		$end_page = $paged + $half_page_end;

		if($start_page <= 0) $start_page = 1;
		if(($end_page - $start_page) != $pages_to_show_minus_1) $end_page = $start_page + $pages_to_show_minus_1;
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = (int) $max_page;
		}

		if($start_page <= 0) $start_page = 1;

		$out='';
			$out.= "<div class='" . $class . "'>\n";
					if ($text_num_page){
						$text_num_page = preg_replace ('!{current}|{last}!','%s',$text_num_page);
						$out.= sprintf ("<span class='pages'>$text_num_page</span>",$paged,$max_page);
					}

					if ($backtext && $paged!=1){
						$out.= '<a class="prevpostslink" href="'.get_pagenum_link(($paged-1)).'">'.$backtext.'</a>';
					}elseif($backtext){
						$out.= '<a class="prevpostslink pagenavi_no_click" href="#" style="cursor:default;">'.$backtext.'</a>';
					}

					if ($start_page >= 2 && $pages_to_show < $max_page) {
						
						if($dotright_text && $start_page!=2) $out.= '<span class="extend page">'.$dotright_text.'</span>';
					}

					for($i = $start_page; $i <= $end_page; $i++) {
						if($i == $paged) {
							$out.= '<span class="current">'.$i.'</span>';
						} else {

							$out.= '<a class="page" href="'.get_pagenum_link($i).'">'.$i.'</a>';
						}
					}
					
					if ($stepLink && $end_page < $max_page){
						for($i=$end_page+1; $i<=$max_page; $i++) {
							if($i % $stepLink == 0 && $i!==$num_pages) {
								if (++$dd == 1) $out.= '<span class="extend page">'.$dotright_text2.'</span>';
								$out.= '<a class="page" href="'.get_pagenum_link($i).'">'.$i.'</a>';
							}
						}
					}

					if ($end_page < $max_page) {
						if($dotright_text && $end_page!=($max_page-1)) $out.= '<span class="extend page">'.$dotright_text2.'</span>';
						
					}
					
					if ($nexttext && $paged!=$end_page){
						$out.= '<a class="nextpostslink" href="'.get_pagenum_link(($paged+1)).'">'.$nexttext.'</a>';
					}elseif($nexttext){
						$out.= '<a class="nextpostslink pagenavi_no_click" href="#" style="cursor:default;">'.$nexttext.'</a>';
					}

			$out.= "</div>" . "\n";

		wp_reset_query();

		if ($echo) echo $out;
		else return $out;
	}

?>