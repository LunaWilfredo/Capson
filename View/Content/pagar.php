<?php

//listar carrito de compras
$car=CarController::listarCompras();

?>
    <header>
      <div class="container-fluid bg-secondary p-5">
        <div class="p-5 mx-5">
          <h1 class="display-1 mx-5 px-5 text-light">
            Detalles de Pedido
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
                    <td><?='$'.$c['precio']?></td>
                    <td><?=$c['cantidad']?></td>
                    <td><?='$'.$c['total']?></td>

                  </tr>
                  <?php $sub+=$c['total']?>
                  <?php endforeach?>
                </tbody>
              </table>
              <li class="list-group-item d-flex justify-content-between">
                <span class="" style="text-align: left;">
                  <strong>SubTotal($)</strong>
                </span>
                <strong style="text-align:left;">$<?=$sub?></strong>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span class="" style="text-align: left;">
                  <strong>IGV(18%)</strong>
                </span>
                <?php $igv=$sub*0.18?>
                <strong style="text-align:left;">$<?=$igv?></strong>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span class="" style="text-align: left;">
                  <strong>Total($)</strong>
                </span>
                <?php $total=$sub+$igv?>
                <strong style="text-align:left;">$<?=$total?></strong>
              </li>
              <div class="mt-2">
                <button type="submit" class="btn btn-success w-50">Pagar</button>
              </div>
            <?php endif?>
            </div> 
          </div>
        </div>
      </section>
    </form>

                                
                                

                                
