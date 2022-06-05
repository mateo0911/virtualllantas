<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <!-- JavaScript Bundle with Popper -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../js/main.js"></script>
  <link rel="stylesheet" href="../css/estilosLogin.css">
  <title>REGISTRO</title>
</head>

<body class="text-center">

  <main class="form-signin w-100 m-auto">
    <form id="formulariologin">
      <img class="mb-4" src="../images/fox.png" alt="" width="92">
      <h1 class="h3 mb-3 fw-normal">LOGIN</h1>

      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" name="loginform" placeholder="name@example.com">
        <label for="floatingInput">Correo</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="loginpass" placeholder="Password">
        <label for="floatingPassword">Contrasena</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit" id="ingresaruser">Ingresar</button>
      <a href="#" id="registro">Registrarse</a>
      <input type="hidden" name="tipoformulario" value="1">
    </form>

    <form id="formularioregistro">
      <img class="mb-4" src="../images/fox.png" alt="" width="92">
      <h1 class="h3 mb-3 fw-normal">REGISTRO</h1>

      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" name="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Correo Electroncio</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Contrasena</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="confirPassword" name="confirPassword" placeholder="Password">
        <label for="floatingPassword">Confirmar Contrasena</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" id="registrouser" type="submit">Resgistrarse</button>
      <a href="#" id="login">Login</a>

      <input type="hidden" name="tipoformulario" value="2">
    </form>
  </main>



</body>

</html>