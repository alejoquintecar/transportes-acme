<?php

// --- Rutas
require_once __DIR__."/../config/routing.php";
// --- Controladores
require_once __DIR__."/../src/Controller/LoginController.php";
require_once __DIR__."/../src/Controller/UsersController.php";
// --- Security
require_once __DIR__."/../src/Security/AppAuthenticator.php";

// --- --- --- Variables --- --- ---
$GLOBALS["app"] = (object)[
  "module" => "",
  "base_url" => __DIR__."/../",
  "html" => array(),
  "block" => array()
];
// --- --- END Variables --- --- ---

// --- --- --- Rutas --- --- ---

// var_dump( $_SERVER );exit();

$oRouter = new Router( $_REQUEST );
// --- Security
$oRouter->add('/users',       'AppAuthenticator@authenticate');
// --- Usuarios
$oRouter->add('/users',       'UsersController@index');
$oRouter->add('/users-json',  'UsersController@indexJson');
// --- Login
$oRouter->add('/',      'LoginController@index');
$oRouter->add('/login', 'LoginController@index');

$oRouter->run();
// --- --- END Rutas --- --- ---


$sFilePath = __DIR__."/../templates/base.php";
ob_start();
include($sFilePath);
$oTemplate = ob_get_contents();
ob_end_clean();
echo $oTemplate;
unset($oTemplate);

?>