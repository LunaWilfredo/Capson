<?php
//listar pedido y vista detalle
$pedido = PedidosController::listarPedidos();
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
                  <?php $i=0;foreach($pedido as $vd):$i++;?>
                  <tr>
                    <th scope="row"><?=$i;?></th>
                    <td><?=$vd['codref']?></td>
                    <td><?=$vd['nombre']." ".$vd['apellido']?></td>
                    <td><?=$vd['estado']?></td>
                    <td><?=$vd['mediop']?></td>
                    <td><?=$vd['total']?></td>
                    <td><?=$vd['fecha']?></td>
                    <td>
                        <a href="index.php?p=detallePedido&refp=<?=$vd['codref']?>" class="btn btn-info text-light"><i class="fas fa-eye"></i></a>
                    </td>
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