<?php
require_once './DB/db.php';
//->

class AdminModel{
    static public function listarRol($tabla){
        $sql="SELECT * FROM $tabla";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->execute();
        return $cn->fetchAll();
    }
    static public function registroRol($tabla,$datos){
        $sql="INSERT INTO $tabla (nombre_r,abrev_r,fk_id_adm,fk_id_std) VALUES(:nombre,:abrev,:admin,:estado)";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->bindParam(':nombre',$datos['nombre'],PDO::PARAM_STR);
        $cn->bindParam(':abrev',$datos['abrev'],PDO::PARAM_STR);
        $cn->bindParam(':admin',$datos['admin'],PDO::PARAM_INT);
        $cn->bindParam(':estado',$datos['estado'],PDO::PARAM_INT);
        if(!$cn->execute()){
            return 'error';
        }
        return 'ok';
    }
    static public function listaEst($tabla){
        $sql="SELECT * FROM $tabla WHERE id_std <=2";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->execute();
        return $cn->fetchAll();
    }
    static public function updateEst($tabla,$datos){
        $sql="UPDATE $tabla SET fk_id_std=:estado WHERE id_r=:id";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->bindParam(':id',$datos['id'],PDO::PARAM_INT);
        $cn->bindParam(':estado',$datos['estado'],PDO::PARAM_INT);
        if(!$cn->execute()){
            return 'error';
        }
        return 'ok';
    }
    static public function deleteRol($tabla,$idd){
        $sql=" DELETE FROM $tabla WHERE id_r=$idd";
        $cn=Conexion::conexion()->prepare($sql);
        if(!$cn->execute()){
            return 'error';
        }
        return 'ok';
    }
    static public function listarPedidos($tabla){
        $sql = "SELECT pd.id_f as 'factura',pd.ref_f as 'codref',c.name_c as 'nombre', c.last_c as 'apellido',std.nombre_std as 'estado',pd.medio_f as 'mediop',pd.total_f as'total',pd.fecha_f as 'fecha' from $tabla pd INNER JOIN clientes c ON pd.fk_id_cl = c.id_c INNER JOIN estados std ON pd.fk_id_std_f=std.id_std";
        $cn = Conexion::conexion()->prepare($sql);
        $cn->execute();
        return $cn->fetchAll();
    }
    static public function listarUser($tabla){
        $sql="SELECT *,cl.id_c as 'idc',cl.name_c as 'nombre',cl.last_c as 'apellido',cl.mail_c as 'correo',r.nombre_r as 'rol',cl.fecha_c as 'fecha',std.nombre_std as 'estado' FROM $tabla cl INNER JOIN roles r ON cl.fk_id_rol=r.id_r INNER JOIN estados std ON cl.fk_id_std = std.id_std";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->execute();
        return $cn->fetchAll();
    }
    static public function cambiarRol($tabla,$datos){
        $sql="UPDATE $tabla SET fk_id_std=:estado WHERE id_c=:id";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->bindParam(':id',$datos['id'],PDO::PARAM_INT);
        $cn->bindParam(':estado',$datos['estado'],PDO::PARAM_INT);
        if(!$cn->execute()){
            return 'error';
        }
        return 'ok';
    }
    //dashboard
    static public function cantidadU($tabla){
        $sql="SELECT * FROM $tabla";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->execute();
        return $cn->fetchAll();
    }
    static public function cantidadPd($tabla){
        $sql="SELECT * FROM $tabla";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->execute();
        return $cn->fetchAll();
    }
    static public function cantidadPdr($tabla){
        $sql="SELECT * FROM $tabla where fk_id_std_f=6";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->execute();
        return $cn->fetchAll();
    }
    static public function cantidadPdp($tabla){
        $sql="SELECT * FROM $tabla where fk_id_std_f=5";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->execute();
        return $cn->fetchAll();
    }

    //graficos
    static public function cantidadPdxm($tabla,$m){
        $sql="SELECT *,COUNT(`id_f`) as 'cantidad' FROM $tabla WHERE `fecha_f` BETWEEN '01-$m-2022' AND '30-$m-2022'GROUP BY `fecha_f` ";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->execute();
        return $cn->fetchAll();
    }
    static public function cantidadPdxd($tabla){
        $sql="SELECT *,COUNT(`id_f`) as 'cantidad' FROM $tabla GROUP BY `fecha_f`";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->execute();
        return $cn->fetchAll();
    }

}