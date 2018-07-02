#!/usr/bin/env php
<?php

if (! isset($_SERVER['PATH_BASE'])) {	
	$_SERVER['PATH_BASE'] = realpath(__DIR__.'/../../');
}
include($_SERVER['PATH_BASE'] . '/conf/constants.php');

$dir_model = $_SERVER['PATH_BASE'] . DIRECTORY_SEPARATOR . DIRECTORY_MODEL . DIRECTORY_SEPARATOR;
array_shift($argv);
$name_model = ucfirst($argv[0]);
$file_model = $name_model . '.php';

echo "Creacion del Modelo $name_model...\n";

$content = 
"<?php

namespace App\models;

class $name_model extends \core\Model
{

}";
file_put_contents($dir_model . $file_model, $content);
