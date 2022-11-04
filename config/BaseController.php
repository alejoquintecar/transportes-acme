<?php

require_once __DIR__."/config.php";

class BaseController extends Constants {

  // private $aVarHtml = array();
  public function __construct(){
    
  }

  /**
   * Render template y cargar argumentos template
  */
  function render( string $sFilePath, array $aArgs){

    global $app;
    $app->html = $aArgs;
    $sFilePath = __DIR__."/../templates/".$sFilePath;
    ob_start();
    include($sFilePath);
    $app->block['body'] = ob_get_contents();
    ob_end_clean();
  }

  /**
   * Inicia el Objeto de Conexion
   * @return array resultado Coneccion
  */
  public static function startConexion(){
    try{
      $aAuthDb = "Constants::conexionDefault()";
      // $aAuthDb = Constants::conexionDefault();
      $sConexionHost = 'host='.$aAuthDb['host'];
      $sConexionDBName = 'dbname='.$aAuthDb['db'];
      $sConexion = $aAuthDb['motor'].':'.$sConexionHost.';'.$sConexionDBName;
      $oConexion = new PDO( $sConexion, $aAuthDb['user'], $aAuthDb['pass'] );
      // ('mysql:host=localhost;dbname=prueba-calculadora', $this->usuario, $this->usuario);
      return $oConexion;
    }catch( \PDOException $e ){
      // throw new \PDOException($e->getMessage(), (int)$e->getCode());
      $aReturn['status'] = 0;
      $aReturn['message'] = $e->getMessage().'<br>Message Code: '.$e->getCode();
    }
    return $aReturn;
  }

  protected function closeConexion(){
    // $this->oConexion = Connections::closeConexion();
    $this->connection->query('KILL CONNECTION_ID()');
    $this->connection = null;
  }
}
