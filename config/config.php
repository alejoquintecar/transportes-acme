<?php

  class Constants{

    private $app_config = array(
      'dbconfig' => array(
        'db_host_name' => 'localhost:3306',
        'db_user_name' => 'root',
        'db_password' => '',
        /**
         * Lo ideal es dejar un usuario, contrasenia con permisos a la medida
         * Lo dejo con valores por defecto por facilidad
        **/
        // 'db_user_name' => 'app_acme',
        // 'db_password' => '4cm3_s42022*',
        'db_name' => 'acme_sa',
        'db_type' => 'mysql',
        'db_port' => '3306',
        'db_manager' => 'MysqliManager',
        'collation' => 'utf8_general_ci',
        'charset' => 'utf8',
      )
    );

  }

?>