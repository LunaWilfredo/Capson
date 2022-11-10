<?php include_once 'View/Layout/header.php';
//lista de productos
$productos = ProductosController::listarProductos();
?>
    <header>
      <div class="container-fluid bg-secondary p-5">
        <div class="row">
          <div class="col-6">
            <h1 class="display-3 mx-5 p-5 text-light">
              Productos Medicos
            </h1>
          </div>
        </div>
        <div class="col-6">
          
        </div>
      </div>
    </header>

    <section id="productos">
      <div class="container d-flex justify-content-center">
        <div class="row p-2">
          <?php foreach($productos as $prod):?>
          <!-- inicio producto -->
            <div class="col bg-light p-2 text-center m-2 rounded">
              <form action="" name="" method="post" class="form">
                  <img src="./App/Img/Productos/image 2.png" alt="" class="img" style=""/>
                  <div class="py-2 d-flex justify-content-start">
                    <span class="text-light btn btn-warning ml-2"><?=$prod['price_p'].'$'?></span>
                    <span class=" btn btn-light"><?=$prod['name_p']?></span>
                  </div>
                  <div class="">
                    <input type="hidden" class="form-control" name="idp" id="idp" value="<?=$prod['id_p']?>">
                    <input type="hidden" class="form-control" name="precio" id="precio" value="<?=$prod['price_p']?>">
                    <input type="hidden" class="form-control" name="titulo" id="titulo" value="<?=$prod['name_p']?>">
                    <input type="hidden" class="form-control" name="cantidad" id="cantidad" value="1">

                    <button type="submit" class="btn btn-primary w-100">
                      <i class="fas fa-cart-plus"></i> Añadir a carrito
                    </button>
                  </div>
              </form>
            </div>
          <!-- end producto -->
          <?php endforeach;?>
        </div>
      </div>
    </section>

    <section id="">
      <div class="container p-5">
        <div class="row">
          <div class="col">
            <img src="./App/Img/Rectangle 22.png" alt="" class="img rounded" />
          </div>
          <div
            class="col d-flex m-auto justify-content-center align-content-center display-6">
            Somos una empresa distribuidora de productos de Medicos para hospitales nacionales o privados.
            Con mas de 30 años en el mercado de la salud.
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
<?php  include_once 'View/Layout/footer.php' ?>
