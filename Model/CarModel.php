<?php

require_once './DB/db.php';

class CarModel{
    //añadir producto a carrito de compra
    static public function addProducto($table,$datos){
        $sql="INSERT INTO $table (fk_id_p,fk_id_c) VALUES(:idp,:idc)";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->bindParam(':idp',$datos['idp'],PDO::PARAM_INT);
        $cn->bindParam(':idc',$datos['idc'],PDO::PARAM_INT);
        if($cn->execute()){
            return 'ok';
        }else{
            print_r(Conexion::conexion()->errorInfo());
        }
    }

    //listar prodructos de carrito
    static public function listarCompras(){
    }
}