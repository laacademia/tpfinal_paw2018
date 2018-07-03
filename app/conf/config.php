<?php

return array(
  'db'=>array('engine'=>'postgresql',
        'dbname'=>'paw_tpfinal',
        'host' => 'localhost',
        'user' => 'postgres',
        'password'=>'postgres',
        'port'=>'5435'),
  'default_controller'=> array('controller'=>'home', 
                'action'=>'inicio'),
  'login_controller'=> array('controller'=>'login', 
                            'action'=>'inicio'),
);