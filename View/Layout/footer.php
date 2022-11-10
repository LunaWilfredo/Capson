
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



<!-- Modal Login-->
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesion</h5>
        </div>
        <form action="" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="">Usuario</label>
              <input type="text" name="useri" value="" class="form-control">
              <label for="">Contraseña</label>
              <input type="text" name="passi" value="" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Ingresar</button>
          </div>
        </form>
      </div>
    </div>
</div>

<!-- Modal Registro -->
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
<!-- Modal carrito -->
<div class="modal fade" id="carrito" tabindex="-1" aria-labelledby="carrito b" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="carrito">Carrito</h5>
        </div>
        <form action="" method="post">
          
          <div class="modal-body">
            <div class="">
              <div class="p-2">
                <ul class="list-group mb-3">
                <?php foreach($vercar as $ct):?>
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div class="row col-12">
                      <div class="col-6 p-0" style="text-align: left;">
                        <h6 class="my-0">Cantidad: <?=$ct['cantidad']?> : <?=$ct['producto']?> </h6>
                      </div>
                      <div class="col-6 p-0" style="text-align: right">
                        <span class="text-muted" style="text-align: right;">$<?=$ct['precio']*$ct['cantidad']?></span>
                      </div>
                    </div>
                  </li>
                  <?php $total = $total + $ct['total']?>
                  <input type="hidden" name="total" id="total" value="<?php $total?>">
                  <?php endforeach?>
                  <li class="list-group-item d-flex justify-content-between">
                    <span class="" style="text-align: left;">Total(DLR):</span>
                    <strong style="text-align: left;">$<?=$total?></strong>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            <a href="index.php?p=car" class="btn btn-success">Continuar Pedido</a>
          </div>

        </form>
      </div>
    </div>
</div>