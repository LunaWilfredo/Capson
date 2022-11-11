<?php
require_once './DB/db.php';

class PedidosModel{
    static public function listarPedidos($tabla){
        $sql = "SELECT * from $tabla ";
        $cn = Conexion::conexion()->prepare($sql);
        $cn->execute();
        return $cn->fetchAll();
    }
}