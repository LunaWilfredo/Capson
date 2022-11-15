<?php

require_once './DB/db.php';

class CarModel
{
    //añadir producto a carrito de compra
    static public function addProducto($table, $datos)
    {
        $sql = "INSERT INTO $table (cantidad,precio_ct,total_ct,fecha,fk_id_p,fk_id_c) VALUES(:cantidad,:precio,:total,:fecha,:product,:cliente)";
        $cn = Conexion::conexion()->prepare($sql);
        $cn->bindParam(':cantidad', $datos['cantidad'], PDO::PARAM_STR);
        $cn->bindParam(':precio', $datos['precio'], PDO::PARAM_INT);
        $cn->bindParam(':total', $datos['total'], PDO::PARAM_INT);
        $cn->bindParam(':fecha', $datos['fecha'], PDO::PARAM_STR);
        $cn->bindParam(':product', $datos['product'], PDO::PARAM_INT);
        $cn->bindParam(':cliente', $datos['cliente'], PDO::PARAM_STR);
        if ($cn->execute()) {
            return 'ok';
        } else {
            print_r(Conexion::conexion()->errorInfo());
        }
    }

    //listar prodrctos de carrito
    static public function listarCompras($table, $idc)
    {
        $sql = "SELECT c.id_ct as 'carid',c.cantidad as 'cantidad',c.precio_ct as 'precio',c.total_ct as 'total',p.id_p as 'code',p.code_p as 'codigo',p.name_p as 'producto' from $table c inner join productos p on c.fk_id_p = p.id_p where fk_id_c = $idc";
        $cn = Conexion::conexion()->prepare($sql);
        $cn->execute();
        return $cn->fetchAll();
    }

    //Eliminar productos de carrito de compras
    static public function deleteProducto($table,$idd){
        $sql="DELETE FROM $table where id_ct=$idd";
        $cn = Conexion::conexion()->prepare($sql);
        if($cn->execute()){
            return 'ok';
        }else{
            print_r(Conexion::conexion()->errorInfo());
        }
    }

    //actualizacion de cantidad
    static public function cantidadUpdate($tabla,$datos){
        $sql="UPDATE $tabla SET `cantidad`= :cantidad,`total_ct`=(:cantidad *`precio_ct`) WHERE id_ct=:idu";
        $cn = Conexion::conexion()->prepare($sql);
        $cn->bindParam(':idu',$datos['idu'],PDO::PARAM_INT);
        $cn->bindParam(':cantidad',$datos['cantidad'],PDO::PARAM_INT);
    
        if($cn->execute()){
            return 'ok';
        }
        else{
            print_r(Conexion::conexion()->errorInfo());
        }
    }

    static public function productosPedido($tablap,$datos){
        $sql="INSERT INTO $tablap (`ref_pd`, `cantidad_pd`, `producto_pd`, `precio_pd`, `total_p`, `fecha_p`) VALUES (:ref,:cantidad,:producto,:precio,:total,:fecha)";
        $cn=Conexion::conexion()->prepare($sql);
        foreach($datos["producto"] as $key => $value) {
            $cn->bindParam(':ref',$datos['ref'],PDO::PARAM_STR);
            $cn->bindParam(':producto',$value,PDO::PARAM_STR);
            $cn->bindParam(':cantidad',$datos['cantidad'][$key],PDO::PARAM_STR);
            $cn->bindParam(':precio',$datos['precio'][$key],PDO::PARAM_STR);
            $cn->bindParam(':total',$datos['total'][$key],PDO::PARAM_STR);
            $cn->bindParam(':fecha',$datos['fecha'],PDO::PARAM_STR);
            if(!$cn->execute()){
                return 'error';            
            }
        }
        return 'ok'; 
    }

    //registro de pedido
   static public function Pedido($tablapd,$datos){
        $sql = "INSERT INTO $tablapd (`ref_f`, `fk_id_cl`, `fk_id_std_f`, `medio_f`, `total_f`, `fecha_f`) VALUES (:ref,:cliente,:estado,:medio,:total,:fecha)";
        $cn = Conexion::conexion()->prepare($sql);
        $cn->bindParam(':ref',$datos['ref'], PDO::PARAM_STR);
        $cn->bindParam(':cliente',$datos['cliente'], PDO::PARAM_INT);
        $cn->bindParam(':estado',$datos['estado'], PDO::PARAM_INT);
        $cn->bindParam(':medio',$datos['medio'], PDO::PARAM_STR);
        $cn->bindParam(':total',$datos['total'], PDO::PARAM_STR);
        $cn->bindParam(':fecha',$datos['fecha'], PDO::PARAM_STR);
        if ($cn->execute()) {
            return 'ok';
        } else {
            print_r(Conexion::conexion()->errorInfo());
        }
    }

    //limpiar carrito
    static public function limpiar($tablal){
        $sql= " TRUNCATE TABLE $tablal;";
        $cn=Conexion::conexion()->prepare($sql);
        if($cn->execute()){
            return 'ok';
        }
    }
}