<?php

class Router{

  private $_uri = array();
  private $_action = array();

  // private $oRequest = null;
  public function __construct( $oRequest = null ){
    // $this->oRequest = $oRequest;
  }

  /**
   * Agregar Ruta
   * @param $uri    Url Ruta sin base URL
   * @param $action Accion a realizar
  */
  public function add($uri, $action = null){
    $this->_uri[] = '/' . trim($uri, '/');
    if( $action != null ){
      $this->_action[] = $action;
    }
  }

  /**
   * Iniciar libreria
  */
  public function run(){
    // $uriGet = isset($_GET['uri']) ? '/' . $_GET['uri'] : '/';
    $uriGet = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
    foreach( $this->_uri as $key => $value ){
      if( preg_match("#^$value$#", $uriGet) ){
        $action = $this->_action[$key];
        $this->runAction($action);
      }
    }
  }

  /**
   * Iniciar libreria con el action
  */
  private function runAction($action){
    if( $action instanceof \Closure ){
      $action( $this->oRequest );
    }else{
      $params = explode('@', $action);
      $obj = new $params[0];
      $obj->{$params[1]}();
    }
  }

}