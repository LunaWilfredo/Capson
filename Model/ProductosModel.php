<?php

require_once './DB/db.php';

class ProductosModel{
    static public function listarProductos($table){
        $sql="SELECT * FROM $table";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->execute();
        return $cn->fetchAll();
    }
}