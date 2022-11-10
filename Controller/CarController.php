<?php

require_once 'Model/CarModel.php';

class CarController{
    //añadir producto a carrito de compras
    static public function addProducto(){
        if(isset($_POST['idp']) && isset($_SESSION['idc'])){
            $cliente=$_SESSION['idc'];
            $table = "carritos";
            $datos = array(
                'ref'=>date('dmyh').$cliente,
                'cantidad'=>$_POST['cantidad'],
                'precio'=>$_POST['precio'],
                'total'=>$_POST['precio']*$_POST['cantidad'],
                'fecha'=>date('d/m/Y'),
                'product'=>$_POST['idp'],
                'cliente'=>$cliente
            );
            $respuesta=CarModel::addProducto($table,$datos);
            return $respuesta;
        }
    }
    //listar productos de carrito
    static public function listarCompras(){
        $table = 'carritos';
        $idc = $_SESSION['idc'];
        $respuesta = CarModel::listarCompras($table,$idc);
        return $respuesta;
    }
    //Eliminar producto de carrito
    static public function deleteProducto($idd){
        if(isset($idd)&& !empty($idd)){
            $tabla="carritos";
            $respuesta=CarModel::deleteProducto($tabla,$idd);
            return $respuesta;
        }
    }
    //Actualizar cantidad
    static public function cantidadUpdate($idu,$cant){
        if(isset($idu) && !empty($cant)){
            $tabla="carritos";
            $datos=array(
                'idu'=>$idu,
                'cantidad'=>$cant
            );
            $respuesta=CarModel::cantidadUpdate($tabla,$datos);
            return $respuesta;
        }
    }
    //Realizar Pedido-comprobante
    static public function Pedido(){
       ///content
    }
}