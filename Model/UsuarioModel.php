<?php

require_once './DB/db.php';

class UsuarioModel{

   static public function registrar($tabla,$datos){
        $sql="INSERT INTO $tabla (name_c,last_c,mail_c,pass_c) VALUES(:name,:last,:mail,:pass)";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->bindParam(':name',$datos['name'],PDO::PARAM_STR);
        $cn->bindParam(':last',$datos['last'],PDO::PARAM_STR);
        $cn->bindParam(':mail',$datos['mail'],PDO::PARAM_STR);
        $cn->bindParam(':pass',$datos['pass'],PDO::PARAM_STR);

        if($cn->execute()){
            return 'ok';
        }else{
            return print_r(Conexion::conexion()->errorInfo());
        }
    
    }

    static public function prelog($tabla,$useri,$passi){
        $sql="SELECT * FROM $tabla WHERE mail_c = '$useri' AND pass_c = '$passi' ";
        $cn=Conexion::conexion()->prepare($sql);
        $cn->execute();
        return $cn->fetchAll();
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
}

?>