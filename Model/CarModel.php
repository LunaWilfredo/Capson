<?php

require_once './DB/db.php';

class CarModel
{
    //añadir producto a carrito de compra
    static public function addProducto($table, $datos)
    {
        $sql = "INSERT INTO $table (fk_id_p,fk_id_c) VALUES(:idp,:idc)";
        $cn = Conexion::conexion()->prepare($sql);
        $cn->bindParam(':idp', $datos['idp'], PDO::PARAM_INT);
        $cn->bindParam(':idc', $datos['idc'], PDO::PARAM_INT);
        if ($cn->execute()) {
            return 'ok';
        } else {
            print_r(Conexion::conexion()->errorInfo());
        }
    }

    //listar prodrctos de carrito
    static public function listarCompras($table, $idc)
    {
        $sql = "SELECT c.id_ct as 'carid',p.code_p as 'codigo',p.name_p as 'producto',p.price_p as 'precio' from $table c inner join productos p on c.fk_id_p = p.id_p where fk_id_c = $idc";
        $cn = Conexion::conexion()->prepare($sql);
        $cn->execute();
        return $cn->fetchAll();
    }

    //Eliminar productos de carrito de compras
    static public function deleteProducto($table,$idd,$idc){
        $sql="DELETE FROM $table where id_ct=$idd AND fk_id_c = $idc";
        $cn = Conexion::conexion()->prepare($sql);
        if($cn->execute()){
            return 'ok';
        }else{
            print_r(Conexion::conexion()->errorInfo());
        }
    }
    //registro de pedido
    static public function Pedido($datos,$tabla){
        $sql="INSERT INTO $tabla (num_cp,total_cp,sub_total,fk_p_id,fk_cl_id) VALUES(:comprobante,0,0,:producto,:cliente)";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->bindParam(':comprobante',$datos['comprobante'],PDO::PARAM_STR);
        //$cn->bindParam(':total',$datos['total'],PDO::PARAM_INT);
        $cn->bindParam(':producto',$datos['producto'],PDO::PARAM_INT);
        $cn->bindParam(':cliente',$datos['cliente'],PDO::PARAM_INT);

        if($cn->execute()){
            return 'ok';
        }else{
            print_r(Conexion::conexion()->errorInfo());
        }
    }
}
