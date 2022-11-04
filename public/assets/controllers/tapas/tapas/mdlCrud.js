
// import IMask from 'imask';

export default class MdlCrud {

  constructor(){}
  init(){

    $('#tapas_bluetoothMacDos').removeAttr('required');

    $('#tapas_bluetoothMacUno').on( 'keyup', function ( oKey ){
      let sText = $('#tapas_bluetoothMacUno').val().toUpperCase();
      $('#tapas_bluetoothMacUno').val(sText);
    });
    $('#tapas_bluetoothMacDos').on( 'keyup', function ( oKey ){
      let sText = $('#tapas_bluetoothMacDos').val().toUpperCase();
      $('#tapas_bluetoothMacDos').val(sText);
    });

    $('#tapas_bluetoothMacUno').on( 'keydown', function ( oKey ){
      let bReturn = false;
      if( ( oKey.keyCode == 190 || oKey.keyCode == 8 || oKey.keyCode == 46 || oKey.keyCode == 17 || oKey.keyCode == 86 ) || 
        (oKey.keyCode >= 65 && oKey.keyCode <= 70) || ( oKey.keyCode >= 48 && oKey.keyCode <= 57 ) || ( oKey.keyCode >= 96 && oKey.keyCode <= 105 )
      ){
        bReturn = true;
      }
      return bReturn;
    });

    $('#tapas_bluetoothMacDos').on( 'keydown', function ( oKey ){
      let bReturn = false;
      if( ( oKey.keyCode == 190 || oKey.keyCode == 8 || oKey.keyCode == 46 || oKey.keyCode == 17 || oKey.keyCode == 86 ) || 
        (oKey.keyCode >= 65 && oKey.keyCode <= 70) || ( oKey.keyCode >= 48 && oKey.keyCode <= 57 ) || ( oKey.keyCode >= 96 && oKey.keyCode <= 105 )
      ){
        bReturn = true;
      }
      return bReturn;
    });

    $('#form-crud').submit(function (){

      $.ajax({
        url: aRoutesUrls.indexCrud,
        data: $('#form-crud').serialize(), // '&' + $.param({}),
        type: 'post',
        beforeSend: function(){
          $('#loading').show();
        },
        success: function(data){
          $("#loading").hide();
          Swal.fire({
            icon: ( data.status == 1 ) ? 'success' : 'warning',
            title: data.message,
            toast: true,
            timer: 4500,
            position: 'top-end',
            showConfirmButton: false,
            showCloseButton: true,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer),
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          });
          if( data.status == 1 ) location.reload();
        },
        error: function(data){
          $('#loading').hide();
        }
      });
      return false;
    });
  }
}