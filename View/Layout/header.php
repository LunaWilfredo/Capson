<?php 
include_once './Controller/UsuarioController.php';
include_once './Controller/ProductosController.php';
include_once './Controller/CarController.php';
include_once './Controller/PedidosController.php';
include_once './Controller/AdminController.php';

if(isset($_POST['nameu'])){
  $registro=UsuarioController::registrar();
  //alertas
  $p=$_GET['p'];
  if($registro){
    echo '<script>
        if(window.history.replaceState){
            window.history.repaceState(null,null,window.location.href);
        }
    </script>';
    echo "<div class='alert alert-success text-center'>
            Registro Exitoso
    </div>
    <script>
        setTimeout(function(){
            window.location = 'index.php?p=$p';
        },02000);
    </script>";
    }
}

if(isset($_POST['useri']) && isset($_POST['passi'])){
    $user=$_POST['useri'];
    $clave=$_POST['passi'];
    //validacion de datos
    $login=UsuarioController::login($user,$clave);
}

if(isset($_GET['c'])){
    $cerrar= New UsuarioController;
    $cerrar->cerrarSesion($_GET['c']);
}

/*Pedidos*/
//Registrar producto a carrito
$carrito= CarController::addProducto();
//listar productos de carrito
if(isset($_SESSION['idc'])){
    $vercar=CarController::listarCompras();
}
//$indiceP=count($car);
$estados=AdminController::listaEst();

$g1=AdminController::cantidadPDxm();
$g2=AdminController::cantidadPdxd();
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
    <link rel="stylesheet" href="App/Css/styles.css">
    <!-- Font Anwesome -->
    <script src="https://kit.fontawesome.com/57b38ed15d.js"crossorigin="anonymous"></script>
    <!-- google charts -->
    <script src="https://www.gstatic.com/charts/loader.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="./App/Img/image 1.png" alt="" class="rounded-circle"/>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
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
                            <span class="text-ligth"></span>
                        </li>
                    <?php elseif(!empty($_SESSION['user']) && $_SESSION['estado']==1):?>
                        <li class="nav-item">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#carrito">
                                <i class="fas fa-shopping-cart"></i>
                                <?=$indiceP?>
                            </button>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?=$_SESSION['user'];?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php?p=clienteHome">Perfil</a></li>
                                <li><a class="dropdown-item" href="index.php?p=pedidosCliente">Mis Pedidos</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="index.php?c=ok">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    <?php endif;?>
                </ul>
            </div>
        </div>
      </nav>
      <!-- menu administrador -->
        <?php if($_SESSION['rol']==1):?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
            <div class="container">
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="index.php?p=adminHome" class="nav-link">Dashboard <i class="fas fa-tachometer-alt"></i></a></li>
                        <li class="nav-item"><a href="index.php?p=roles" class="nav-link">Roles <i class="fas fa-user-tag"></i></a></li>
                        <li class="nav-item dropdown"><a href="index.php?p=pedidosAdmin" class="nav-link">Pedidos <i class="fas fa-box-open"></i></a></li>
                        <li class="nav-item"><a href="index.php?p=usuariosAdmin" class="nav-link">Usuarios <i class="fas fa-users"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php endif;?>
      