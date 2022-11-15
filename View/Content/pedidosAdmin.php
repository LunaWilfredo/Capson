<?php
$listap=AdminController::listarPedidosG();
?>
<section>
    <div class="container p-5">
        <div class="row">
            <div class="col">
                <h2 class="h2 ">Pedidos</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pedido</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Medio de Pago</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Estado</th>
                            <th scope="col"></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;foreach($listap as $lp):$i++;?>
                        <tr>
                            <th scope="row"><?=$i?></th>
                            <td><?=$lp['codref']?></td>
                            <td><?=$lp['nombre']." ".$lp['apellido']?></td>
                            <td><?=$lp['mediop']?></td>
                            <td><?=$lp['fecha']?></td>
                            <td>
                                <?=$lp['estado']?>
                                <?php if($lp['estado']=="Realizado"):?>
                                <!-- si estado != pendiente -->
                                <span class="text-success"><i class="fas fa-check"></i></span>
                                <!-- end pendiente -->
                                <?php endif?>
                            </td>
                            <td>
                                <a href="index.php?p=detallePedido&refp=<?=$lp['codref']?>" class="btn btn-primary text-light"><i class="fas fa-clipboard-list"></i></a>
                            </td>
                        </tr>                 
                    <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

                            