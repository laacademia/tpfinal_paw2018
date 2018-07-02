#!/usr/bin/env php
<?php

if (! isset($_SERVER['PATH_BASE'])) {	
	$_SERVER['PATH_BASE'] = realpath(__DIR__.'/../../../');
}

include($_SERVER['PATH_BASE'] . '/conf/constants.php');
require($_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . PATH_CORE_VIEW);
require($_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . PATH_CORE_MODEL);

array_shift($argv);
$context = $argv[0];
$dir_view = $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . DIRECTORY_VIEWS . DIRECTORY_SEPARATOR;
$dir_new_view = $dir_view . DIRECTORY_SEPARATOR . $context;

exec("cd $dir_view; mkdir $context;");

//Creo inicio.php
$fileName = 'inicio.php';
$path_plantilla = $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . PATH_ABM_PLANTILLA_INICIO;
$content = file_get_contents($path_plantilla);
$content = str_replace('__controller__',$context,$content);
file_put_contents($dir_new_view . DIRECTORY_SEPARATOR .$fileName, $content);

//Creo alta.php
$fileName = 'alta.php';
$path_plantilla = $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . PATH_ABM_PLANTILLA_ALTA;
$content = file_get_contents($path_plantilla);
$content = str_replace('__controller__',$context,$content);
file_put_contents($dir_new_view . DIRECTORY_SEPARATOR .$fileName, $content);

//Creo edicion.php
$fileName = 'edicion.php';
$path_plantilla = $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . PATH_ABM_PLANTILLA_EDICION;
$content = file_get_contents($path_plantilla);
$content = str_replace('__controller__',$context,$content);
file_put_contents($dir_new_view . DIRECTORY_SEPARATOR .$fileName, $content);

//agregar operacion al menu
echo "Desea agregar la operacion al menu? (s/n)\n";
if(dialogo_simple("Desea agregar la operacion al menu?")){
	$fileName = 'menu.php';
	$path_plantilla = $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . PATH_ABM_PLANTILLA_ITEM_MENU;
	$path_menu = $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . PATH_MENU;
	$content_new_menu_item = file_get_contents($path_plantilla);
	$content_new_menu_item = str_replace('__controller__',$context,$content_new_menu_item);

	$content_menu = file_get_contents($path_menu);
	$content_menu .= "\n".$content_new_menu_item;
	file_put_contents($path_menu, $content_menu);
}


function dialogo_simple( $texto, $defecto = null, $extra=null)
	{
		echo ("$texto (Si o No)\n");
		do {
			echo ("(s/n):");
		
			$respuesta = trim( fgets( STDIN ) );
			if (isset($defecto) && $respuesta == '') {
				$respuesta = ($defecto) ? 's' : 'n';
			}
			$ok = ($respuesta == 's') || ( $respuesta == 'n');
		} while ( ! $ok );
		if( $respuesta == 's') return true;
		return false;
	}	





