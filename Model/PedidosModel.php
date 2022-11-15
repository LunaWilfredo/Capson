<?php
require_once './DB/db.php';

class PedidosModel{
    static public function listarPedidos($tabla,$idc){
        $sql = "SELECT pd.ref_f as 'codref',c.name_c as 'nombre', c.last_c as 'apellido',std.nombre_std as 'estado',pd.medio_f as 'mediop',pd.total_f as'total',pd.fecha_f as 'fecha' from $tabla pd INNER JOIN clientes c ON pd.fk_id_cl = c.id_c INNER JOIN estados std ON pd.fk_id_std_f=std.id_std WHERE fk_id_cl = $idc";
        $cn = Conexion::conexion()->prepare($sql);
        $cn->execute();
        return $cn->fetchAll();
    }

    static public function verDetalle($tabla,$ref){
        $sql="SELECT pd.id_f as 'factura',pcl.ref_pd as 'referencia',pcl.cantidad_pd as 'cantidad',p.code_p as 'codproducto',p.name_p as 'nombrep', pcl.precio_pd as 'precio',pcl.total_p as 'totalp',cl.name_c as 'nombrec',cl.last_c as 'apellidoc',std.nombre_std as 'estado',pd.medio_f as 'mediopago',pd.total_f as 'totalgeneral',pd.fecha_f as 'fechapedido' FROM $tabla pcl INNER JOIN productos p ON pcl.producto_pd = p.id_p INNER JOIN pedidos pd ON pcl.ref_pd = pd.ref_f INNER JOIN clientes cl ON pd.fk_id_cl=cl.id_c INNER JOIN estados std ON pd.fk_id_std_f = std.id_std WHERE pcl.ref_pd = '$ref' ";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->execute();
        return $cn->fetchAll();
    }
    //cambiar estado de pedido
    static public function cambiarEstPedido($tabla,$datos){
        $sql="UPDATE $tabla SET fk_id_std_f=:estado WHERE ref_f=:refe";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->bindParam(':refe',$datos['refe'],PDO::PARAM_STR);
        $cn->bindParam(':estado',$datos['estado'],PDO::PARAM_INT);
        if(!$cn->execute()){
            return 'error';
        }
        return 'ok';
    }
}