<?php


require_once __DIR__."/../../config/BaseController.php";

class UsersController extends BaseController{

  /** Iniciar variables
   * @author <Nestor Alejandro Quintero Cardozo>
  */
  public function __construct(){
    
  }

  /** Render template
   * @author <Nestor Alejandro Quintero Cardozo>
  */
  // UsersController@index
  public function index(){

    $aDfColumnsButtons = $this->indexDfColumnsButtons();

    $this->render('users/index.html.php', array(
      'dfColumnsButtons' => json_encode($aDfColumnsButtons)
    ));
  }

  public function indexJson( $bExportar = true ){

    $aJson = array();
    var_dump( $_SERVER, 'xxx' );exit();

    if( $_SERVER['REQUEST_SCHEME'] == 'http' || $bExportar == true ){

      // $session = $request->getSession();
      // $em = $this->oEntityManager;

      // --- --- --- --- Total Filas --- --- --- --- //
      $totalRegistros = 0;
      // if( $aDataGrilla["paginaActual"] == 1 && $exportar === false ){
        // $oContador = $em->createQuery("SELECT COUNT(u.id) AS totalRegistros
        //   FROM App\Entity\Users u"
        // );
        // $oContador->setParameters($aDataGrilla["valoresWhere"]);
        // $aContador = $oContador->getSingleResult();
        // $nTotalRegistros = $oContador->getSingleResult()['totalRegistros'];
        // $totalRegistros = $aContador['totalRegistros'];
        // dump( $totalRegistros );exit();
      // }

      // DQL Data
      // u.correo, u.roles, u.terminosCondiciones, u.estado, u.id, u.documento, u.nombre, u.sexo,
      // $oQueryUsuarios = $em->createQuery("SELECT u.id, u.nombres, u.apellidos, u.documento,
      //   u.username, u.tipoPermisos, u.roles, u.estado
      //   FROM App\Entity\Users u
      // ");
      // $aQueryUsuarios = $oQueryUsuarios->getScalarResult();

      // // --- --- --- Lógica --- --- --- //
      // $aUsuarios = array();
      // foreach( $aQueryUsuarios as $aElement ){

      //   // Variables
      //   $sRoles = '';
      //   $sEstado = '';
      //   $sTipoPermisos = '';

      //   // --- Llenar variables
      //   // Estado
      //   switch( $aElement['estado'] ){
      //     case '1': $sEstado = 'Activo'; break;
      //     case '2': $sEstado = 'Inactivo'; break;
      //     default: $sEstado = 'Estado no asignado'; break;
      //   }
      //   // Tipo permisos
      //   switch( $aElement['tipoPermisos'] ){
      //     case '1': $sTipoPermisos = 'Personalizados'; break;
      //     case '2': $sTipoPermisos = 'Por roles'; break;
      //     default: $sEstado = 'Tipo permisos no asignado'; break;
      //   }
      //   // END Llenar variables

      //   $aRoles = json_decode($aElement['roles']);
      //   $aUsuarios[] = array(
      //     'id'            => $aElement['id'],
      //     'nombres'       => $aElement['nombres'],
      //     'apellidos'     => $aElement['apellidos'],
      //     'documento'     => $aElement['documento'],
      //     'username'      => $aElement['username'],
      //     'tipoPermisos'  => $sTipoPermisos,
      //     'nTipoPermisos' => $aElement['tipoPermisos'],
      //     'estado'        => $sEstado
      //     // 'roles'      => $sRoles,
      //   );
      // }

      // // Cierre de conexion y Respuesta
      // $em->getConnection()->close();
      $response->setContent(json_encode(
        ['totalRows' => $totalRegistros, 'data' => $aUsuarios])
      );

    }else{
      $aJson['status'] = 0;
      $aJson['message'] = "Acción no valida";
    }

    echo json_encode($aJson);
  }

  // --- --- --- Definicion de columnas --- --- ---
  private function indexDfColumnsButtons( $aPermisos = array() ){

    $aDfColumns = [ 'columns' => [
      [ 'width' => 100,
        'data' => 'nombres',       'title' => 'Nombres'
      ],
      [ 'width' => 100,
        'data' => 'apellidos',     'title' => 'Apellidos'
      ],
      [ 'width' => 100,
        'data' => 'documento',     'title' => 'Núm. Documento'
      ],
      [ 'width' => 70,
        'data' => 'username',      'title' => 'Nombre Usuario '
      ],
      [ 'width' => 70,
        'data' => 'tipoPermisos',  'title' => 'Tipo permisos'
      ],
      [ 'width' => 70, 'visible' => (empty($aPermisos)) ? false : true,
        'data' => 'nTipoPermisos',  'title' => 'Permisos',
        'cellRender' => [
          'render'  => 'buttons',
          'buttons' => (empty($aPermisos)) ? $aPermisos : $this->oMenuPermisos->getButtons($aPermisos, 2)
        ]
      ],
      [ 'width' => 70,
        'data' => 'estado',         'title' => 'Estado'
      ],
    ]];

    $aDfButtons = [
      'crear' => array(
        'id' => 'crear-registro',
        'text' => 'Crear',
        'title' => 'Crear Registro',
        'icons' => array('fas fa-user-plus'),
        'class' => array('btn-outline-success')
      ),
      'editar' => array(
        'id' => 'editar-registro',
        'text' => 'Editar',
        'title' => 'Crear Registro',
        'icons' => array('fas fa-user-edit'),
        'class' => array('btn-outline-warning')
      ),
      'eliminar' => array(
        'id' => 'editar-registro',
        'text' => 'Editar',
        'title' => 'Crear Registro',
        'icons' => array('fas fa-user-minus'),
        'class' => array('btn-outline-danger')
      )
    ];

    return [ 'columns' => $aDfColumns, 'buttons' => $aDfButtons ];
  }

}

?>