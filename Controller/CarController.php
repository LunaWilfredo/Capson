<?php

require_once 'Model/CarModel.php';

class CarController{
    static public function addProducto(){
        //añadir producto a carrito de compras
        if(isset($_GET['idp']) && !empty($_GET['idp'])){
            $table='carritos';
            $datos=array(
                "idp"=>$_GET['idp'],
                "idc"=>$_SESSION['idc']
            );
            $respuesta=CarModel::addProducto($table,$datos);
            return $respuesta;
            var_dump($respuesta);
        }
    }
    static public function CarritoCompras(){
        //mostrar productos en carrito de compras
    }
}