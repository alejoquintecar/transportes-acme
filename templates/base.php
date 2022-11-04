<!DOCTYPE html>
<html>

  <?php global $app; ?>

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: Titulo :.</title>
    <!-- --- --- --- Css --- --- --- -->
    <style><?php // include __DIR__."/../assets/libraries/fonts/kanit/index.css"; ?></style>
    <link rel="stylesheet" href="assets/libraries/fonts/kanit/index.css">
    <link rel="stylesheet" href="assets/libraries/bootstrap-5.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/libraries/fontawesome-free-5.15-web/css/all.css">
    <!-- <link rel="stylesheet" href="assets/libraries/fontawesome-free-5.15-web/css/all.css"> -->
    <!-- --- --- END Css --- --- --- -->
  </head>

  <body>

    <!-- LOADER -->
    <div id="loading">
      <div id="loader-wrapper">
        <div id="loader"></div>
      </div>
    </div>

    <!-- --- --- --- Body --- --- --- -->
    <?php print $app->block['body'] ?><br>
    <!-- --- --- --- Print Modal --- --- --- -->
    <div class="modal fade" id="modalGlobal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalGlobalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-primary" id="tituloModalGlobal">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id='contenidoModalGlobal'>...</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-warning btn-sm" data-bs-dismiss="modal">
              Cerrar&nbsp;<i class="fa-solid fa-circle-xmark"></i>
            </button>
            <button type="button" class="btn btn-outline-success btn-sm" id='btn-save-modalGlobal'>
              Guardar&nbsp;<i class="fa-solid fa-floppy-disk"></i>
            </button>
          </div>
        </div>
      </div>
    </div>



  </body>

</html>