<?php
//listar pedido y vista detalle
$pedido=PedidosController::listarPedidos();
var_dump($pedido);
?>
    <header>
      <div class="container-fluid bg-secondary p-5">
        <div class="p-5 mx-5">
          <h1 class="display-1 mx-5 px-5 text-light">
          Mis Pedidos
          </h1>
        </div>
      </div>
    </header>

    <form action="" method="post">
      <section id="">
        <div class="container p-5">
          <div class="row">
            <div class="col">
            <?php if(empty($pedido)):?>
              <div class="h4">
                No hay pedidos realizados.
              </div>
            <?php else:?>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Codigo Pedido</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Medio de Pago</th>
                    <th scope="col">Total($)</th>
                    <th scope="col">Fecha de Pedido</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0;foreach($pedido as $pd):$i++;?>
                  <tr>
                    <th scope="row"><?=$i;?></th>
                    <td><?=$pd['id_f']?></td>
                    <td><?//=//$pd['ref_f']?></td>
                    <td><?//=//$pd['id_f']?></td>
                    <td><?//=$pd['id_f']?></td>
                    <td><?//=$pd['id_f']?></td>
                    <td><?//=$pd['id_f']?></td>
                  </tr>
                  <?php endforeach?>
                </tbody>
              </table>
            <?php endif?>
            </div> 
          </div>
        </div>
      </section>
    </form>