<?php
	class Template{
		static function load($contents,$data=null){
			/*
			<?php

			 Se supone que $var_array es un array devuelto desde wddx_deserialize 
			$tamaño = "grande";
			$var_array = array("color" => "azul",
			                   "tamaño"  => "medio",
			                   "forma" => "esfera");
			extract($var_array, EXTR_PREFIX_SAME, "wddx");

			echo "$color, $tamaño, $forma, $wddx_tamaño\n";

			?>
			*/

			if(is_array($data)){extract($data);}
			include APP.'tpl/head.php';	
			if(isset($_SESSION['user'])){include APP.'tpl/header2.php';}else{include APP.'tpl/header.php';}
			include APP.'tpl/menu.php';
			include APP.'tpl/'.$contents.'.php';
			include APP.'tpl/footer.php';
		}
	}
