<?php

//listar carrito de compras
$car=CarController::listarCompras();
//Eliminar producto de carrito
if(isset($_POST['idd'])){
  $idd=$_POST['idd'];
  $delete=CarController::deleteProducto($idd);
  if($delete=='ok'){
    echo '<script>
            if(window.history.replaceState){
                window.history.repaceState(null,null,window.location.href);
            }
        </script>';
    echo "<div class='alert alert-danger text-center'>
            Producto Eliminado!
        </div>
        <script>
            setTimeout(function(){
                window.location = 'index.php?p=pedido';
            },1000);
        </script>";
  }
}
//actualizar cantidad producto
if(isset($_POST['idu']) && isset($_POST['cantu'])){
  $idu=$_POST['idu'];
  $cant=$_POST['cantu'];
  $cantu=CarController::cantidadUpdate($idu,$cant);
  if($cantu=='ok'){
    echo '<script>
            if(window.history.replaceState){
                window.history.repaceState(null,null,window.location.href);
            }
        </script>';
    echo "<div class='alert alert-success text-center'>
            Actualizacion exitosa!
        </div>
        <script>
            setTimeout(function(){
                window.location = 'index.php?p=pedido';
            },1000);
        </script>";
  }
}

?>
    <header>
      <div class="container-fluid bg-secondary p-5">
        <div class="p-5 mx-5">
          <h1 class="display-1 mx-5 px-5 text-light">
            Carrito de compras
          </h1>
        </div>
      </div>
    </header>

    <form action="" method="post">
      <section id="">
        <div class="container p-5">
          <div class="row">
            <div class="col">
              <h3 class="h3">Detallado de Productos</h3>
              <hr>
            <?php if(empty($car)):?>
              <div class="h4">
                No hay productos seleccionados.
              </div>
            <?php else:?>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio($)</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0;foreach($car as $c):$i++;?>
                  <tr>
                    <th scope="row">
                      <?=$i;?>
                    </th>
                    <td><?=$c['codigo']?></td>
                    <td><?=$c['producto']?></td>
                    <td><?=$c['precio']?></td>
                    <td>
                      <!-- Editar cantidad -->
                      <form action="" method="post">
                        <div class="row">
                          <div class="col d-flex">
                            <input type="hidden" class="form-control" name="idu" value="<?=$c['carid']?>">

                            <input type="text" style="width:50px;" class="form-control align-middle text-center mx-2" name="cantu" value="<?=$c['cantidad']?>">
                            <button class="btn btn-primary" type="">
                              <i class="fas fa-retweet"></i>
                            </button>
                          </div>
                        </div>
                      </form>
                      <!-- end cantidad update -->
                    </td>
                    <td><?=$c['total']?></td>
                    <td>
                      <!-- Eliminar producto de carrito -->
                      <form action="" method="post">
                        <input type="hidden" class="form-control" value="<?=$c['carid']?>" name="idd">
                        <button class="btn btn-danger">
                          <i class="fas fa-trash"></i> Eliminar
                        </button>
                      </form>
                      <!-- end eliminar -->
                    </td>
                  </tr>
                  <?php $total+=$c['total']?>
                  <?php endforeach?>
                </tbody>
              </table>
              <li class="list-group-item d-flex justify-content-between">
                <span class="" style="text-align: left;">
                  <strong>Total($)</strong>
                </span>
                <strong style="text-align:left;">$<?=$total?></strong>
              </li>
              <div class="mt-2">
                <a type="button" href="index.php?p=pagar" class="btn btn-success">
                  Continuar Pedido
                </a>
              </div>
            <?php endif?>
            </div> 
          </div>
        </div>
      </section>
    </form>