<?php

	function multitranslate($text = null , $id = null , $echo = true ){

		$gen_sets = theme_get_option('general', 'gen_sets');

		if($text && $id){
			$option =  isset($gen_sets[$id]) ? $gen_sets[$id] : '';

			if($option){
				if(!$echo)
					return $option;
				else
					echo $option;
			}else{
				if(!$echo){
					return $text;
				}else {
				   echo $text;
				}
			}
		}
	}

?>