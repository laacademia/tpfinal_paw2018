<?php
include './../datosCon.php';
   return array(
     'db'=>array('engine'=>'mysql',
         'dbname'=>$datosConf['base'],
         'host' => $datosConf['host'],
           'user' => $datosConf['user'],
           'password'=>$datosConf['password'],
           'port'=>''),
     'default_controller'=> array('controller'=>'home', 
                                 'action'=>'inicio'),
   );