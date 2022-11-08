<style>
  .example-wrapper { margin: 1em auto; max-width: 800px; width: 95%; font: 18px/1.5 sans-serif; }
  .example-wrapper code { background: #F5F5F5; padding: 2px 6px; }
</style>

<link rel="stylesheet" href="assets/styles/app/login.css">

<form class='ms-auto me-auto' action="#" method="post" autocomplete="off">

  <img class="text-center" src="images/logo-acme.png" width="300">
  <!-- <img class="text-center" src="<img src='data:image/png;base64,<?php // echo base64_encode(file_get_contents("")); ?>'>" width="300" /> -->
  <!-- <img class="text-center" src="<?php // print logo-acme.png ?>" width="300" /> -->
  <label for="inputUserName">Usuario</label>
  <input type="text" class="form-control" id="username" name="username" value=""  autocomplete="username" required autofocus>
  <label for="inputPassword">Contraseña</label>
  <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" required>
  <!-- <input type="hidden" name="_csrf_token" value="{{ csrf_token('authenticate') }}"> -->

  <button class="btn btn-lg btn-primary w-100 fw-bold" type="submit">
    Iniciar sesión&nbsp;<i class="fas fa-sign-in-alt"></i>
  </button>
</form>