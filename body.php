<?php include_once 'View/Layout/header.php';
//lista de productos
$productos = ProductosController::listarProductos();
?>
    <header>
      <div class="container-fluid bg-secondary p-5">
        <div class="p-5 mx-5">
          <h1 class="display-1 mx-5 px-5 text-light">
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
            class="col d-flex m-auto justify-content-center align-content-center display-6"
          >
            Somos una empresa productora de productos de salud para hospitales nacionales o privados.Con mas de 30 años en el mercado de la salud.
          </div>
        </div>
      </div>
    </section>

    <section id="productos">
      <div class="container p-4">
        <form action="index.php" name="formulario" method="POST">

          <div class="row">
            <?php foreach($productos as $prod):?>
            <!-- producto inicio -->
            <div class="col-4 p-4">
              <div class="row">
                <!-- precio -->
                <div class="col-12">
                  <input type="hidden" name="id_p" id="id_p" value="<?=$prod['id_p']?>">
                  <span class="text-light btn btn-warning">
                    <?=$prod['price_p'].'$'?>
                  </span>
                  <input type="hidden" name="precio" id="precio" value="<?=$prod['price_p']?>">
                </div> <!-- fin precio -->
              </div>
              <div class="row text-center">
                <div class="col-12">
                  <img src="./App/Img/Productos/image 2.png" alt="" class="img-fluid"/>
                </div>
              </div>
              <div class="row p-2">
                <div class="col-12 text-center">
                  <h6 class="text-dark"><?=$prod['name_p']?></h6>
                  <input type="hidden" name="titulo" id="titulo" value="<?=$prod['name_p']?>">
                </div>
              </div>
              <div class="row">
                <input type="hidden" name="cantidad" id="cantidad" value="1">
                <!-- <a href="index.php?p=car&idp=" class="btn btn-primary"> -->
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-cart-plus"></i> Añadir a carrito
                </button>
                <!-- </a> -->
              </div>
            </div>
            <!-- producto end -->
            <?php endforeach;?>
          </div>

        </form>
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