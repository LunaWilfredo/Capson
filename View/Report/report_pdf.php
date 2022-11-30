<?php
include_once 'Controller/PedidosController.php';

//listar pedido y vista detalle
if(isset($_GET['refp'])){
    $ref=$_GET['refp'];
    $ver=PedidosController::detallePedido($ref);
}
foreach($ver as $v){
    $referencia = $v['referencia'];
    $estado = $v['estado'];
    $medio = $v['mediopago'];
    $fecha = $v['fechapedido'];
    $cliente=$v['nombrec'].' '.$v['apellidoc'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Recibo
	</title>
	<style>
		*{
			padding:0;
			margin:0;
			box-sising:border-box;
		}
		.container{
			/* border:1px solid gray; */
		}
		.top{
			width:100%;
			height:1%;
			background:#548B2F;
		}
		.title-contenedor{
			margin-bottom:5px;
		}
		.datos{
			/* border:1px solid gray; */
			width: 40%;
			padding:5px;
		}
		.datos ul{
			list-style:none;
		}
		.detalles{
			margin-top:10px;
			/* border:1px solid black; */
			padding:5px;
		}
		table{
			padding:10px;
			text-align:center;
			width:100%;
			/* border:1px solid black; */
		}
		table tr th{
			border-bottom:1px solid black;
			padding:10px;
		}
		.total{
			width: 60%;
			margin-top:10px;
			padding:10px;
			border-top:1px solid black;
		}
	</style>
</head>
<body>
<page_header>Boleta de venta </page_header>
<div class="container"> 
	<div class="top"></div>
    <div class="title-contenedor">
		<h1 class="title">Boleta N° B00001</h1>
	</div>
	<div class="datos">
		<ul>
			<li> <b>N° Comprobante:</b> <span><?=$referencia?></span></li>
			<li> <b>Cliente:</b> <span><?=$cliente?></span></li>
			<li> <b>Codigo de Referencia:</b> <span><?=$referencia?></span></li>
			<li> <b>Estado Pedido:</b> <span><?=$estado?></span></li>
			<li> <b>Medio de Pago:</b> <span><?=$medio?></span></li>
			<li> <b>Fecha de Pedido:</b> <span><?=$fecha?></span></li>
		</ul>
	</div>
    <div class="detalles">
        <h2 class="title">Detalles de Compra</h2>
        <table>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Codigo</th>
                <th scope="col">Producto</th>
                <th scope="col">Precio($)</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Total</th>
                <th scope="col"></th>
            </tr>
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
        </table>
		<div class="total">
			<span class="" style="text-align: left;">
				<strong>Total($) + IGV(18%):</strong>
			</span>
            <strong style="text-align:left;">$<?=$v['totalgeneral']?></strong>
		</div>
    </div>
</div>
<page_footer>Design by Wluna &copy;2022</page_footer>
</body>
</html>