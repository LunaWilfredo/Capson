<?php

require_once 'Model/PedidosModel.php';

class PedidosController{

    static public function listarPedidos(){
        $tabla = 'pedidos';
        $idc=$_SESSION['idc'];
        $respuesta = PedidosModel::listarPedidos($tabla,$idc);
        return $respuesta;
    }

    static public function detallePedido($ref){
        $tabla="pedidos_cliente";
        $respuesta=PedidosModel::verDetalle($tabla,$ref);
        return $respuesta;
    }
    //cambiar estado de pedido
    static public function cambiarEstPedido($ref){
        if(isset($ref) && !empty($ref)){
            $tabla="pedidos";
            $datos=array(
                'refe'=>$ref,
                'estado'=>6
            );
            $cambiar=PedidosModel::cambiarEstPedido($tabla,$datos);
            return $cambiar;
        }
    }

}