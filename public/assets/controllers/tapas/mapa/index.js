// --- --- --- Css --- --- ---
import './../../../styles/app/google-map.scss';
// --- --- END Css --- --- ---

// --- --- --- Js --- --- ---
import swal from 'sweetalert2';
// --- --- END Js --- --- ---

// --- --- --- Variables globales --- --- ---
oSwal = swal;
// --- --- END Variables globales --- --- ---

$(function(){

  $('#nav-profile').on('click', '.btn-movimientos-tapa', function(){
    let oBtn = $(this);
    // Loading Hide
    $("#loader").show();
    $('.modal-dialog').addClass('modal-lg');
    $('#tituloModalGlobal').html('Movimientos Tapa:&nbsp;');
    $('#contenidoModalGlobal').empty().load( aRoutesUrls.mdlMovimientosTapa, {registroId: oBtn.data('registro-id') }, function (){
      $('#modalGlobal').modal({backdrop: true,keyboard: false});
      $('#modalGlobal').modal('show');
      // oMdlCrud.init();
      $("#loader").hide();
    });
  });

  console.log( aTapasMap );

  let map;
  function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: 4.655085031, lng: -74.11571807 },
      zoom: 11.3,
    });

    $.each( aTapasMap, function( index, element ){
      console.log( element );
      // sIconTapaMapOpen
      // sIconTapaMapClose
      new google.maps.Marker({
        position: { lat: parseFloat(element.latitud), lng: parseFloat(element.longitud) },
        map,
        icon: ( element.movimiento == 1 ) ? sIconTapaMapOpen : sIconTapaMapClose
      });
    });

  }

  window.initMap = initMap();

});

