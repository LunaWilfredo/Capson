<?php
//listar carrito de compras
$car=CarController::listarCompras();

//Registro de pedido
//$pedido=CarController::Pedido();
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
                    <th scope="row"><?=$i;?></th>
                    <td style="vertical-align: middle;"><?=$c['codigo']?></td>
                    <td style="vertical-align: middle;"><?=$c['producto']?></td>
                    <td style="vertical-align: middle;"><?=$c['precio']?></td>
                    <td style="vertical-align: middle;"><?=$c['cantidad']?></td>
                    <td style="vertical-align: middle;"><?=$c['total']?></td>
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
                <a type="button" href="index.php?p=pedido" class="btn btn-success">Continuar Pedido</a>
              </div>
            <?php endif?>
            </div> 
          </div>
        </div>
      </section>
    </form>