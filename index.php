<?php 

require_once 'Controller/UsuarioController.php';

if(isset($_POST['nameu'])){
  $registro=UsuarioController::registrar();
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
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!-- css -->
    <link rel="stylesheet" href="" type="style/css" />
    <!-- Font Anwesome -->
    <script
      src="https://kit.fontawesome.com/57b38ed15d.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
    <!-- alertas -->
    <?php if($registro='ok'){?> 
      <div class="alert alert-success">Registro Exitoso</div>
    <?php }?>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"
            ><img src="./App/Img/image 1.png" alt=""
          /></a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div
            class="collapse navbar-collapse justify-content-end"
            id="navbarNavDropdown"
          >
            <ul class="navbar-nav">
              <li class="nav-item bg-primary rounded-circle">
                <button type="button" class="btn btn-primary position-relative">
                  <i class="fas fa-shopping-cart"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    99+
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </button>
              </li>
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
            </ul>
          </div>
        </div>
      </nav>
      <div class="container-fluid bg-primary p-5">
        <div class="border p-5 mx-5">
          <h1 class="display-1 border me-5 pe-5">
            Productos para el cuidado de la salud de tu familia
          </h1>
        </div>
      </div>
    </header>

    <section id="">
      <div class="container p-5">
        <div class="row">
          <div class="col">
            <img src="./App/Img/Rectangle 22.png" alt="" class="img rounded" />
          </div>
          <div
            class="col d-flex m-auto justify-content-center align-content-center"
          >
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi
            illo suscipit illum fugiat? Suscipit itaque cumque dicta deleniti
            ratione repellat dolore? Consequatur illum a deleniti corrupti quis
            dolorem quae itaque!
          </div>
        </div>
      </div>
    </section>

    <section id="">
      <div class="container p-4">
        <div class="row">
          <div class="col">
            <div class="card bg-secondary p-2 rounded-3">
              <img
                src="./App/Img/Productos/image 2.png"
                alt=""
                class="img mb-3"
              />
              <div class="">
                <h6 class="">Nombre de Producto</h6>
                <h5 class="">S/.20.00</h5>
              </div>
              <button type="" class="btn btn-success">
                <i class="fas fa-cart-plus"></i>
              </button>
            </div>
          </div>

          <div class="col">
            <div class="card bg-secondary p-2 rounded-3">
              <img
                src="./App/Img/Productos/image 3.png"
                alt=""
                class="img mb-3"
              />
              <div class="">
                <h6 class="">Nombre de Producto</h6>
                <h5 class="">S/.20.00</h5>
              </div>
              <button type="" class="btn btn-success">
                <i class="fas fa-cart-plus"></i>
              </button>
            </div>
          </div>

          <div class="col">
            <div class="card bg-secondary p-2 rounded-3">
              <img
                src="./App/Img/Productos/image 4.png"
                alt=""
                class="img mb-3"
              />
              <div class="">
                <h6 class="">Nombre de Producto</h6>
                <h5 class="">S/.20.00</h5>
              </div>
              <button type="" class="btn btn-success">
                <i class="fas fa-cart-plus"></i>
              </button>
            </div>
          </div>

          <div class="col">
            <div class="card bg-secondary p-2 rounded-3">
              <img
                src="./App/Img/Productos/image 6.png"
                alt=""
                class="img mb-3"
              />
              <div class="">
                <h6 class="">Nombre de Producto</h6>
                <h5 class="">S/.20.00</h5>
              </div>
              <button type="" class="btn btn-success">
                <i class="fas fa-cart-plus"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="">
      <div class="container-fluid text-center p-4">
        <div class="p-2 rounded">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.608209052997!2d-77.03725698459388!3d-12.07045559145159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c97a45085291%3A0x72197301ce8aa89e!2sParque%20De%20Las%20Aguas!5e0!3m2!1ses-419!2spe!4v1665038978724!5m2!1ses-419!2spe"
              width="1200"
              height="400"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
        </div>
      </div>
    </section>

    <footer class="text-light bg-primary">
        <div class="container p-4 text-center">
            <h6 class="">Design by Capson Proyect Group &copy; 2022</h6>
        </div>
    </footer>



    <!-- JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>



<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesion</h5>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="">Usuario</label>
            <input type="text" name="" value="" class="form-control">
            <label for="">Contraseña</label>
            <input type="text" name="" value="" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success">Ingresar</button>
        </div>
      </div>
    </div>
</div>

<!-- Registro -->
<div class="modal fade" id="registro" tabindex="-1" aria-labelledby="registro" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesion</h5>
        </div>
        <form action="" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="">Nombre</label>
              <input type="text" name="nameu" value="" class="form-control">
  
              <label for="">Apellido</label>
              <input type="text" name="apeu" value="" class="form-control">
  
              <label for="">Correo</label>
              <input type="text" name="correou" value="" class="form-control">
  
              <label for="">Contraseña</label>
              <input type="text" name="claveu" value="" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Registrarse</button>
          </div>
        </form>
      </div>
    </div>
</div>