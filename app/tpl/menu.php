<?php

if(isset($_SESSION['rol'])){
$menu = '<div id="menu"><div><a href="'.APP_W.'home">Inicio</a></div>';

// if($_SESSION['rol']==1){
	$menu.= '<div><a href="'.APP_W.'reg">Insertar</a></div>
	<div><a href="'.APP_W.'modificar">Modificar</a></div>
	<div><a href="'.APP_W.'regeliminar">Eliminar</a></div>';
// }

$menu.= '</div>';

echo $menu;
}


?>