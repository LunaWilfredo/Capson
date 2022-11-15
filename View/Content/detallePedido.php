<?php
if(isset($_GET['refp'])){
    $ref=$_GET['refp'];
    $ver=PedidosController::detallePedido($ref);
}

foreach($ver as $v){
    $referencia = $v['referencia'];
    $estado = $v['estado'];
    $medio = $v['mediopago'];
    $fecha = $v['fechapedido'];
}

if(isset($_POST['ctsd'])){
    $referencia=$_POST['ctsd'];
    $cambiar=PedidosController::cambiarEstPedido($referencia);
    if($cambiar){
        echo '<script>
            if(window.history.replaceState){
                window.history.repaceState(null,null,window.location.href);
            }
        </script>';
        echo "<div class='alert alert-success text-center'>
            Pedido Realizado Exitosamente
        </div>
        <script>
            setTimeout(function(){
                window.location = 'index.php?p=pedidosAdmin';
            },3000);
        </script>";
    }
}

?>
    <header>
      <div class="container-fluid bg-secondary p-5">
        <div class="p-5 mx-5">
          <h1 class="display-1 mx-5 px-5 text-light">
            Detalle de Pedido
          </h1>
        </div>
      </div>
    </header> 

      <section id="" class="">
        <div class="container p-5">
            <div class="row p-2">
                <?php if($_SESSION['rol']!=1):?>
                <div class="col-2">
                    <a href="index.php?p=pedidosCliente" class="btn btn-danger"><i class="fas fa-angle-left"></i> Lista de Pedidos
                    </a>
                </div>
                <?php elseif($_SESSION['rol']==1):?>
                <!-- Para administradores -->
                <div class="col d-flex">
                    <a href="index.php?p=pedidosAdmin" class="btn btn-danger"><i class="fas fa-angle-left"></i> Lista de Pedidos
                    </a>
                    <?php if($estado != 'Realizado'):?>
                    <!-- cambiar estado  -->
                    <form action="" method="post">
                        <input type="hidden" class="form-control w-50" value="<?=$_GET['refp']?>" name="ctsd">
                        <button class="btn btn-success mx-2">
                            <i class="fas fa-clipboard-check"></i>
                        </button>
                    </form>
                     <!-- end cambiar estado  -->
                    <?php endif;?>
                </div>
                <!-- end administrador -->
                <?php endif;?>
            </div>
            <div class="row p-2">
                <div class="col">
                <table class="table">
                        <tr>
                            <th>Codigo de Referencia</th>
                            <td><?=$referencia?></td>
                            <th>Estado Pedido</th>
                            <td><?=$estado?></td>
                            <th>Medio de Pago</th>
                            <td><?=$medio?></td>
                            <th>Fecha de Pedido</th>
                            <td><?=$fecha?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row p-3">
                <div class="col">
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
                    <?php $i=0;foreach($ver as $v):$i++;?>
                    <tr>
                        <th scope="row"><?=$i;?></th>
                        <td><?=$v['codproducto']?></td>
                        <td><?=$v['nombrep']?></td>
                        <td><?=$v['precio']?></td>
                        <td><?=$v['cantidad']?></td>
                        <td><?=$v['totalp']?></td>
                    </tr>
                    <?php endforeach?>
                    </tbody>
                </table>
                <li class="list-group-item d-flex justify-content-between">
                    <span class="" style="text-align: left;">
                    <strong>Total($)</strong>
                    </span>
                    <strong style="text-align:left;">$<?=$v['totalgeneral']?></strong>
                </li>
                <?php //endif?>
                </div> 
            </div>
        </div>
      </section>