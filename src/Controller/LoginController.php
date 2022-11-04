<?php


require_once __DIR__."/../../config/BaseController.php";

class LoginController extends BaseController{

  /** Iniciar variables
   * @author <Nestor Alejandro Quintero Cardozo>
  */
  public function __construct(){
    
  }

  /** Render template
   * @author <Nestor Alejandro Quintero Cardozo>
  */
  //LoginController@Index
  public function Index(){
    
    $this->render("app/login.php", array(
      "prueba" => "01"
    ));
  }

}

?>