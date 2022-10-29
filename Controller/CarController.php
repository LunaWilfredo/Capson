<?php

require_once 'Model/CarModel.php';

class CarController{
    //añadir producto a carrito de compras
    static public function addProducto(){
        /*if(isset($_GET['idp']) && !empty($_GET['idp'])){
            $table='carritos';
            $datos=array(
                "idp"=>$_GET['idp'],
                "idc"=>$_SESSION['idc']
            );
            $respuesta=CarModel::addProducto($table,$datos);
            return $respuesta;
        }*/
        if(isset($_POST['idp_p']) || isset($_SESSION['idc'])){
            if(isset($_SESSION['idc'])){
                $cliente=$_SESSION['idc'];
                if(isset($_POST['id_p'])){
                    $precio=$_POST['precio'];
                    $producto=$_POST['titulo'];
                    $cantidad=$_POST['cantidad'];
                    $ref=$_POST['id_p'];
                }
                var_dump($cliente);
                var_dump($precio);
                var_dump($producto);
                var_dump($cantidad);
                var_dump($ref);
            }
            //header("Location: ".$_SERVER['HTTP_REFERER']."");
            //$tabla="comprobantes";
            //$respuesta=CarModel::Pedido($datos,$tabla);
            //return $respuesta;
            //var_dump($respuesta);
        }
    }
    //listar productos de carrito
    static public function listarCompras(){
        $table = 'carritos';
        $idc = $_SESSION['idc'];
        $respuesta = CarModel::listarCompras($table,$idc);
        return $respuesta;
    }
    //Eliminar producto
    static public function deleteProducto(){
        if(isset($_GET['idd'])&&!empty($_GET['idd'])){
            $idd =$_GET['idd'];
            $idc =$_SESSION['idc'];
            $table='carritos';
            $respuesta=CarModel::deleteProducto($table,$idd,$idc);
            if($respuesta){
                echo'Producto ELiminado';
            }    
            return $respuesta;
        }
    }
    //Realizar Pedido-comprobante
    static public function Pedido(){
        /*if(isset($_POST['idp_p']) || isset($_SESSION['idc'])){
            if(isset($_SESSION['idc'])){
                $cliente=$_SESSION['idc'];
                if(isset('idc')){
                    $datos=array(
                        "comprobante"=>"C".date('dmY'),
                        "producto"=>$_POST['idct'],
                        "cliente"=>$_SESSION['idc']
                    );
                }
            }
                    var_dump($datos);
            $tabla="comprobantes";
            $respuesta=CarModel::Pedido($datos,$tabla);
            var_dump($respuesta);
            return $respuesta;
        }*/
    }
}