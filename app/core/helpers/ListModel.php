<?php 
namespace core;

class ListModel {
    public static function getById($model,$ids)
    {
        $model = ucfirst($model);
		$model_path = $_SERVER{'PATH_BASE'} . DIRECTORY_SEPARATOR .  DIRECTORY_MODEL . DIRECTORY_SEPARATOR . $model .'.php';
		require_once($model_path);

		$model_class_name = "App\\models\\$model";
		require_once($_SERVER{'PATH_BASE'} . DIRECTORY_SEPARATOR .  'core/model' . DIRECTORY_SEPARATOR . 'PersistorMysql.php');
		
		$arr = array();
		foreach ($ids as $key => $id) {			
			$model_instance = new $model_class_name(new PersistorMysql());
			$arr[0] = $model_instance->load($id);
		}
		return $arr;
    }
}
?>