
import $ from 'jquery'
import 'datatables.net-bs5';
import 'datatables.net-select';
import localeText from "./lenguaje";
// import 'datatables.net-bs4';
// import {Datatables} from 'datatables.net';
// require( 'datatables.net-bs4' )();

// import {Grid} from 'ag-grid-community';
// import {LicenseManager} from 'ag-grid-enterprise';
// import { AgCellRender } from '../grilla/ag-plugins/agCellRender';


/* Reutilizar código grilla */
/*
 * Nestor Alejandro Quintero Cardozo
 * 2021-03-17
 * Implementación de JS GLOBAL de grilla
*/

// Creamos funciones globales
(function ($) {

  // Configuramos

  /**
   * @property {any} dataTableOptions - Opciones de la grilla
  */

  // Eventos Globales
  /**
   * @param {ALEJODatatableConfig} options
   * @returns {jquery-datatablesL#14.$.fn.ALEJO_Datatable.jquery-datatablesAnonym$3}
  */
  $.fn.ALEJO_Datatable = function (options){

    // Parametros
    // const datasource = new Datasource();
    // const opcionesGrid = new GridOpciones();

    // Altura Automatica
    let buttons = options.buttons;
    let ajaxGetData = options.ajaxGetData;
    let datatableOption = options.datatableOption;

    // Renderizar Columnas
    datatableOption.defsColumn.columns.forEach( function( element, index ){
      if( element.cellRender ){
        // Botones
        if( element.cellRender.render == 'buttons' ){
          let aButtons = element.cellRender.buttons;
          aDfColumnsButtons.columns.columns[index].mRender = function ( data, type, row ){
            let sButtonsColumn = '';
            $.each(aButtons, function( indexButtons, elementButtons ){
              let sClass = '';
              switch( indexButtons ){
                case 'permisos': sClass = 'btn btn-outline-warning btn-sm fw-bold ms-2'; break;
                default: sClass = 'btn btn-light btn-sm'; break;
              }
              sButtonsColumn += `<button id="${options.idTable + '-' + elementButtons.id}" type="button" class="${sClass}">`;
              elementButtons.icons.forEach( icon =>{ sButtonsColumn += `<i class="${icon}"></i>`; });
              // if( elementButtons.text ) sButtonsColumn += `&nbsp;${elementButtons.text}`;
              sButtonsColumn += `</button>`;
            });
            return sButtonsColumn;
          }
        }
      }
    });
    


    // if( options.autoHeight == false ){
    //   // "scrollY": 200,
    //   // "scrollX": true
    //   // scrollCollapse
    // }else{

    // }

    // `#${options.idTable}`
    // let autoHeight = (  )
    // var padreSuperior = $(this).parent().parent();

    // setup the grid after the page has finished loading
    // var gridDiv = document.querySelector('#my-datatable');
    // new Grid(gridDiv);
    let sButtonsAdd = '';
    if( $(buttons.add).length > 0 ){
      let sClass = '';
      if( buttons.plugins ){
        console.log( buttons.plugins );
        $.each(buttons.plugins, function( indexPlugins, elementPlugins){
          sClass = '';
          let sIcono = '';
          switch( elementPlugins ){
            case 'refresh':
              sClass = 'btn btn-outline-primary btn-sm fw-bold ms-1';
              sIcono = 'fa-solid fa-arrows-rotate';
            break;
            case 'search':
              sClass = 'btn btn-outline-info btn-sm fw-bold ms-1';
              sIcono = 'fa-solid fa-magnifying-glass';
            break;
            default: sClass = 'btn btn-light btn-sm'; break;
          }
          sButtonsAdd += `<button id="${options.idTable + '-' + elementPlugins}" type="button" class="${sClass}">`;
          sButtonsAdd += `<i class="${sIcono}"></i>`;
          sButtonsAdd += `</button>`;
        });
      }

      // sButtonsAdd += '<div class="d-flex flex-wrap">';
      $.each(buttons.add, function(indexButtons, elementButtons){
        sClass = '';
        // console.log( indexButtons );
        switch( indexButtons ){
          case 'crear': sClass = 'btn btn-outline-success btn-sm fw-bold ms-1'; break;
          case 'editar': sClass = 'btn btn-outline-warning btn-sm fw-bold ms-1'; break;
          case 'eliminar': sClass = 'btn btn-outline-danger btn-sm fw-bold ms-1'; break;
          case 'descargar': sClass = 'btn btn-outline-success btn-sm fw-bold ms-1'; break;
          case 'ver': sClass = 'btn btn-outline-info btn-sm fw-bold ms-1'; break;
          case 'volver': sClass = 'btn btn-outline-primary btn-sm fw-bold ms-1'; break;
          default: sClass = 'btn btn-light btn-sm'; break;
        }
        // sButtonsAdd += '<div class="bd-highlight">';
        sButtonsAdd += `<button id="${options.idTable + '-' + elementButtons.id}" type="button" class="${sClass}">`;
        elementButtons.icons.forEach( function( elementIcon, indexIcon ){
          sButtonsAdd += `<i class="${elementIcon}"></i>`;
          if( indexIcon < (elementButtons.icons.length-1) ) sButtonsAdd += '&nbsp;';
        });
        if( elementButtons.text ) sButtonsAdd += `&nbsp;${elementButtons.text}`;
        sButtonsAdd += `</button>`;
        // sButtonsAdd += '</div>';
      });
      // sButtonsAdd += '</div>';
      $(`#${options.idTable}-tfoot-buttons`).append(sButtonsAdd);
    }

    var objTable = $(`#${options.idTable}`).DataTable({
      columns: datatableOption.defsColumn.columns,
      ajax: {
        url: ajaxGetData.urlAjax,
        type: 'POST',
        data: (ajaxGetData.dataAjax) ? ajaxGetData.dataAjax : {},
      },
      language: localeText,
      select: {
        style: 'single'
      },
      fixedHeader: {
        header: true,
        footer: true
      },
      // buttons: [
      //   {
      //     text: 'Reload',
      //     action: function ( e, dt, node, config ){
      //       dt.ajax.reload();
      //     }
      //   }
      // ]
      // "scrollY": true,
      // scrollX: true,
      // fixedColumns: true
    });

    

    return {
      getRowsSelect: function (){
        return objTable.rows('.selected').data();
      },
    };

  };

  // function buttons(data, type, row) {
  //   var xformatDate = data.slice(0, 10);
  //   var xreplaceCharDate = xformatDate.replace(/-/g, "/");
  //   var dateSplit = xreplaceCharDate.split('/');
  //   return '<button>aaa</button>';
  // }

}(jQuery));
export default $;