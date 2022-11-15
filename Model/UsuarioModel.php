<?php

require_once './DB/db.php';

class UsuarioModel{

   static public function registrar($tabla,$datos){
        $sql="INSERT INTO $tabla(`name_c`, `last_c`,`mail_c`, `pass_c`, `fecha_c`, `fk_id_rol`, `fk_id_std`) VALUES (:name,:last,:mail,:pass,:fecha,:rol,:estado)";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->bindParam(':name',$datos['name'],PDO::PARAM_STR);
        $cn->bindParam(':last',$datos['last'],PDO::PARAM_STR);
        $cn->bindParam(':mail',$datos['mail'],PDO::PARAM_STR);
        $cn->bindParam(':pass',$datos['pass'],PDO::PARAM_STR);
        $cn->bindParam(':fecha',$datos['fecha'],PDO::PARAM_STR);
        $cn->bindParam(':rol',$datos['rol'],PDO::PARAM_INT);
        $cn->bindParam(':estado',$datos['estado'],PDO::PARAM_INT);
        
        if(!$cn->execute()){
            return 'error';
        }
        return 'ok';
    }

    //funcion para obtenes datos de usuario 
    static public function login($user,$clave,$tabla){
        $sql="SELECT * FROM $tabla WHERE mail_c = '$user' AND pass_c = '$clave' ";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->execute();
        if($cn->execute()){
            return $cn->fetchAll();
        }
    }

    static public function datosCliente($tabla,$idc){
        $sql="SELECT * FROM $tabla WHERE id_c = $idc";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->execute();
        return $cn->fetchAll();
    }

    static public function updateDatos($tabla,$datos,$idc){
        $sql="UPDATE $tabla SET `name_c`= :nameu,`last_c`=:lastu,`direccion_cl`=:direccionu,`pais_cl`=:paisu,`phone_cl`=:phoneu,`mail_c`=:mailu,`pass_c`=:passwordu WHERE id_c = $idc";
        $cn=Conexion::conexion()->prepare($sql);

        $cn->bindParam(':nameu',$datos['nameu'],PDO::PARAM_STR);
        $cn->bindParam(':lastu',$datos['lastu'],PDO::PARAM_STR);
        $cn->bindParam(':direccionu',$datos['direccionu'],PDO::PARAM_STR);
        $cn->bindParam(':paisu',$datos['paisu'],PDO::PARAM_STR);
        $cn->bindParam(':phoneu',$datos['phoneu'],PDO::PARAM_STR);
        $cn->bindParam(':mailu',$datos['mailu'],PDO::PARAM_STR);
        $cn->bindParam(':passwordu',$datos['passwordu'],PDO::PARAM_STR);

        if(!$cn->execute()){
            return 'error';
        }
        return 'ok';
    }
}

?>