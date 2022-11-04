// --- --- --- Css --- --- ---
// import './../../../styles/app/header.css';
// --- --- END Css --- --- ---

// --- --- --- Js --- --- ---
import swal from 'sweetalert2';
// import IMask from 'imask';
// import '../../globales/datatables/jquery-config';
import '../../globales/datatables/jquery-datatables';
// import { Tooltip, Modal } from "bootstrap/dist/js/bootstrap.min.js";
import MdlCrud from "./mdlCrud";
import MdlPermisos from "./mdlPermisos";
// --- --- END Js --- --- ---

// --- --- --- Variables globales --- --- ---
oSwal = swal;
let oMdlCrud = new MdlCrud();
let oMdlPermisos = new MdlPermisos();
var _btn = {
  'themeIcon': 'square',
  'plugins': ['refresh', 'search'],
  'add': []
};
// --- --- END Variables globales --- --- ---

$(function(){

  oMyDatatable = $.fn.ALEJO_Datatable({
    idDiv: "div-datatable",
    idTable: "my-datatable",
    ajaxGetData: {
      urlAjax: aRoutesUrls.indexJson, ORDER_SORD: "DESC", ORDER_SIDX: "id"
    },
    datatableOption:{
      defsColumn: aDfColumnsButtons.columns
    },
    buttons:{
      'plugins': ['refresh', 'search'],
      'add': aDfColumnsButtons.buttons
    }
  });

  // Crear Registro
  $('#my-datatable').on('click', '#my-datatable-crear-registro', function(){
    let oBtn = $(this);
    // Loading Hide
    $("#loader").show();
    $('.modal-dialog').removeClass('modal-xl');
    $('.modal-dialog').addClass('modal-lg');
    $('#tituloModalGlobal').html( 'Nuevo Usuario:&nbsp;'+ oBtn.find('i').map(function( index, icon ){ return icon }) );
    $('#contenidoModalGlobal').empty().load(aRoutesUrls.indexNew, function (){
      $('#modalGlobal').modal({backdrop: true,keyboard: false});
      $('#modalGlobal').modal('show');
      oMdlCrud.init();
      $("#loader").hide();
    });
  });

  $('#my-datatable').on('click', '#my-datatable-editar-registro', function(){

    let aRowsSelected = oMyDatatable.getRowsSelect();
    if( aRowsSelected[0] ){
      $('#loader').show();
      $('.modal-dialog').removeClass('modal-xl');
      $('.modal-dialog').addClass('modal-lg');
      // Titulo Modal
      $('#tituloModalGlobal').html('Editar Usuario Diario:&nbsp;<i class="fas fa-user"></i>&nbsp;' );
      $('#contenidoModalGlobal').empty().load(aRoutesUrls.indexEdit, {registroId: aRowsSelected[0].id}, function (){
        $('#modalGlobal').modal({backdrop: true,keyboard: false});
        $('#modalGlobal').modal('show');
        oMdlCrud.init();
        $('#loader').hide();
      });
    }else{
      Swal.fire({
        icon: 'info',
        toast: true,
        timer: 4500,
        position: 'top-end',
        text: 'Por favor seleccione una fila de la tabla.',
        showConfirmButton: false,
        showCloseButton: true,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer),
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      });
    }
  });

  // Eliminar registro
  $('#my-datatable').on('click', '#my-datatable-eliminar-registro', function(){

    let aRowsSelected = oMyDatatable.getRowsSelect();
    if( aRowsSelected[0] ){

      aRowsSelected = aRowsSelected[0],

      Swal.fire({
        icon: 'warning',
        title: "Desea eliminar este usuario?",
        html: `<b>Usuario:</b> ${aRowsSelected.username}<br><b>Nombre:</b> ${aRowsSelected.nombres}`,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#198754',
        position: 'center',
        showConfirmButton: true,
        showCloseButton: true,
        showCancelButton: true
      }).then((result) => {
        if( result.isConfirmed ){
          $.ajax({
            url: aRoutesUrls.indexDelete,
            data: { registroId: aRowsSelected.id },
            type: 'post',
            beforeSend: function(){
              $('#loading').show();
            },
            success: function(data){
              $("#loading").hide();
              Swal.fire({
                icon: ( data.status == 1 ) ? 'success' : 'info',
                title: data.message,
                toast: true,
                timer: 6000,
                position: 'top-end',
                showConfirmButton: false,
                showCloseButton: true,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer),
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              });
              if( data.status == 1 || data.status == 2 ) location.reload();
            },
            error: function(data){
              $('#loading').hide();
            }
          });
        }
      });
    }else{
      Swal.fire({
        icon: 'info',
        toast: true,
        timer: 4500,
        position: 'top-end',
        text: 'Por favor seleccione una fila de la tabla.',
        showConfirmButton: false,
        showCloseButton: true,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer),
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      });
    }
  });

  $('#my-datatable').on('click', '#my-datatable-permisos-registro', function(){

    let oBtn = $(this);
    $("#loader").show();
    setTimeout(() => {
      let aRowsSelected = oMyDatatable.getRowsSelect()[0];
      if( aRowsSelected ){
        // Loading Hide
        $('.modal-dialog').removeClass('modal-lg');
        $('.modal-dialog').addClass('modal-xl');
        $('#tituloModalGlobal').html( 'Permisos Usuario:&nbsp;'+ oBtn.find('i').map(function( index, icon ){ return icon }) );
        $('#contenidoModalGlobal').empty().load(aRoutesUrls.indexPermisos, { registroId: aRowsSelected.id }, function (){
          $('#modalGlobal').modal({backdrop: true,keyboard: false});
          $('#modalGlobal').modal('show');
          oMdlPermisos.init();
          $("#loader").hide();
        });
      }else{
        $("#loader").hide();
        Swal.fire({
          icon: 'info',
          toast: true,
          timer: 4500,
          position: 'top-end',
          text: 'Por favor seleccione una fila de la tabla.',
          showConfirmButton: false,
          showCloseButton: true,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer),
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        });
      }
    }, 120);

  });

  
});