<?php
//registrar de productos en carrito
//$carrito= CarController::addProducto();
//listar carrito de compras
//$car=CarController::listarCompras();
//Eliminar producto de carrito
$delete= CarController::deleteProducto();
//Registro de pedido
$pedido=CarController::Pedido();
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
                    <th scope="col">Monto</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0;foreach($car as $c):$i++;?>
                  <tr>
                    <th scope="row">
                      <?=$i;?>
                      <input type="text" value="<?=$i;?>" name="cont">
                      <input type="text" value="<?=$c['carid']?>" class="form-control" name="idct[]">
                    </th>
                    <td><?=$c['codigo']?></td>
                    <td><?=$c['producto']?></td>
                    <td>
                      <?=$c['precio']?>
                      <input type="text" class="form-control" value="<?=$c['precio']?>" name="prec[]">
                    </td>
                    <td>
                      <input type="text" class="form-control" value="1" name="cant[]">
                    </td>
                    <td>
                      <a href="index.php?p=car&idd=<?=$c['carid']?>" class="btn btn-danger" type="submit">D</a>
                    </td>
                  </tr>
                  <?php endforeach?>
                </tbody>
              </table>
              <div class="">

              </div>
              <div class="">
                <button class="btn btn-success" type="submit" name="btn-pago">
                  Realizar Pedido
                </button>
              </div>
            <?php endif?>
            </div> 
          </div>
        </div>
      </section>
    </form>