<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/main.js"></script>
    <title>POST</title>
</head>

<body id="bodypost">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><?php if(isset($_SESSION['usuario_logueado'])){
      echo $_SESSION['usuario_logueado'];
  }
  
  ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="login.php"><?php if(isset($_SESSION['usuario_logueado'])){
      echo 'cerrar session';
  }else{
      echo 'iniciar session';
  }
  
  ?></a>
      </li>
      
    </ul>
  </div>
</nav>
    <div class="container my-5 p-5 w-50">

    <h1>Listar POSTS</h1><br><br>
    <?php
    if (isset( $_SESSION['usuario_logueado'])){
    ?>
        <form action="" method="post" id="formalioregistropost" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Titulo" name="titulo" />
            </div>
            <div class="mb-3">
                <input type="Email" class="form-control" placeholder="Email" name="email" />
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" placeholder="Imagen" name="file" id="file" />
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Contenido" name="contenido" />
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <input type="hidden" name="tipoformulario" value="1">
        </form>
        <?php
    }
        ?>
    </div>
    <div id="listarpost"></div>
    
</body>

</html>