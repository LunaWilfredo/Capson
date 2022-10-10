<?php 
require_once './Controller/UsuarioController.php';

if(isset($_POST['nameu'])){
  $registro=UsuarioController::registrar();
  //alertas
  if($registro ='ok'){
    echo '<div class="alert alert-success">Registro Exitoso</div>';
    }
}

if(isset($_POST['useri']) && isset($_POST['passi'])){
    $user=$_POST['useri'];
    $clave=$_POST['passi'];
    //validacion de datos
    $login=UsuarioController::login($user,$clave);
}else{
    echo '
        <div class="container">
            <div class="alert alert-danger" role="alert">
                Usuario no registrado!
            </div>
        </div>';
}

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LBY Store</title>
    <!-- Icono de pestaña -->
    <link rel="icon" href="App/Img/image 1.png" type="image/x-icon">
    <!-- Bootstap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="" type="style/css" />
    <!-- Font Anwesome -->
    <script src="https://kit.fontawesome.com/57b38ed15d.js"crossorigin="anonymous"></script>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="./App/Img/image 1.png" alt=""/>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <button type="button" class="btn btn-primary position-relative">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"> 
                                99+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </button>
                    </li>
                    <?php if(empty($_SESSION['user'])):?>
                    <li class="nav-item">
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#login">
                            Iniciar Sesion
                        </button>
                    </li>
                    <li class="nav-item bg-primary rounded-3">
                        <button type="button" class="btn text-light" data-bs-toggle="modal" data-bs-target="#registro">
                            Registrarse
                        </button>
                    </li>
                    <?php else:?>
                        <li class="nav-item rounded-3 px-3">
                            <div class="form-control">
                                <?=$_SESSION['user'];?>
                            </div>
                        </li> 
                    <?php endif;?>
                </ul>
            </div>
        </div>
      </nav>