<?php 
require_once 'Model/ProductosModel.php';

class ProductosController{
    static public function listarProductos(){
        $table='productos';
        $respuesta=ProductosModel::listarProductos($table);
        return $respuesta;
    }
}