<?php

require_once 'Model/PedidosModel.php';

class PedidosController{

    static public function listarCompras(){
        $table = 'pedidos';
        $idc = $_SESSION['idc'];
        $respuesta = PedidosModel::listarPedidos($tabla);
        return $respuesta;
    }

}