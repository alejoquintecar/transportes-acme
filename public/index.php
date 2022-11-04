<?php

// --- Rutas
require_once __DIR__."/../config/routing.php";
// --- Controladores
require_once __DIR__."/../src/Controller/LoginController.php";

// --- --- --- Variables --- --- ---
$GLOBALS["app"] = (object)[
  "module" => "",
  "base_url" => __DIR__."/../",
  "html" => array(),
  "block" => array()
];
// $GLOBALS["base_url"] = "";
// --- --- END Variables --- --- ---


// --- --- --- Rutas --- --- ---
$oRouter = new Router();
// --- Login
$oRouter->add('/', 'LoginController@Index');
$oRouter->add('/login', 'LoginController@Index');
// --- Vehiculos
// $oRouter->add('/vehiculos',  'HomeController@Index');
$oRouter->run();
// --- --- END Rutas --- --- ---

// --- --- --- Rutas --- --- ---

$sFilePath = __DIR__."/../templates/base.php";
ob_start();
include($sFilePath);
$oTemplate = ob_get_contents();
ob_end_clean();
echo $oTemplate;
// unset($oTemplate);

// echo __DIR__."/../templates/base.php";
// --- --- END Rutas --- --- ---

?>