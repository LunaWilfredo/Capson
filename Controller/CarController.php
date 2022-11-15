<?php

require_once 'Model/CarModel.php';

class CarController{
    //añadir producto a carrito de compras
    static public function addProducto(){
        if(isset($_POST['idp']) && isset($_SESSION['idc'])){
            $cliente=$_SESSION['idc'];
            $table = "carritos";

            $datos = array(
                //'ref'=>$ref,
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
    //pedido realizado-productos
    static public function Pedido($idc){
       if(isset($idc)){
            $tablap = "pedidos_cliente";
            $fecha=date('d-m-Y');
            //codigo de referencia
            $str="ABCDEFGHIJKLMNOPQRSTUVXYZWabcdefghijklmnopqrstuvxyz";
            for($i=0;$i<5;$i++){
                $ref.=substr($str,rand(0,64),1);
            }
            //datos de productos
            $datos=array(
                'ref'=>$ref.$idc,
                'producto'=>$_POST['codep'],
                'cantidad'=>$_POST['cantp'],
                'precio'=>$_POST['preciop'],
                'total'=>$_POST['totalp'],
                'fecha'=>$fecha 
            );
        }
        $productos=CarModel::productosPedido($tablap,$datos);
        //return $productos;

        if($productos){
            $tablapd="pedidos";
            $datos=array(
                'ref'=>$ref.$idc,
                'cliente'=>$idc,
                'estado'=>5,
                'medio'=>'Pago en local',
                'total'=>$_POST['totalG'],
                'fecha'=>$fecha
            );
            $pedido=CarModel::Pedido($tablapd,$datos);
            return $pedido;    
        }
    }

    static public function limpiar(){
        $tablal='carritos';
        $limpiar=CarModel::limpiar($tablal);   
        return $limpiar; 
    }
}