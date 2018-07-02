<?php 
include($_SERVER['PATH_BASE'] . '/conf/constants.php');
/**
* 
*/
class Link
{
	static function html($link, $text=null, $img=null, $alt=null,$style=null){
		$text = ($text) ? $text :"";		
		$img = ($img) ? '<img src="' . DIRECTORY_IMG . DIRECTORY_SEPARATOR . $img .'" alt="'.$alt.'" width="20px">' : "";
		return "<a href=\"$link\">$text $img</a>";
	}

	static function html2($link, $text=null, $attr=null, $img=null){
		$text = ($text) ? $text :"";		

		//armo los atributos de el tag "a"
		$str_attr = '';
		if(isset($attr)){
			foreach ($att as $key => $value) {
				$str_attr .= " $key=\"$value\"";
			}
		}

		$str_img = '';
		//armo la imagen
		
		if(isset($img['nombre'])){

			//armo los atributos del tag img
			$attr_img = "";
			if( isset($img['attr']) && is_array($img['attr']) )
				foreach ($img['attr'] as $key => $value) {
					$attr_img .= " $key=\"$value\"";
				}
			$str_img = "<img src=\"" . DIRECTORY_IMG . DIRECTORY_SEPARATOR . $img['nombre'] . "\" $attr_img>";
		}

		
		return "<a href=\"$link\">$text $str_img</a>";
	}

}

?>


