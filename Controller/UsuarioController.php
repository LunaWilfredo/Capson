<?php

require_once 'Model/UsuarioModel.php';

class UsuarioController{
    static public function registrar(){
        if(isset($_POST['nameu'])&&!empty($_POST['nameu'])){
            $tabla= "clientes";
            $datos= array(
                "name"=>$_POST['nameu'],
                "last"=>$_POST['apeu'],
                "mail"=>$_POST['correou'],
                "pass"=>$_POST['claveu']
            );
            var_dump($datos);
            var_dump($tabla);
            $respuesta=UsuarioModel::registrar($tabla,$datos);
            return $respuesta;
        }
    }

    static public function prelog(){
        if(isset($_POST['useri']) && !empty($_POST['useri']) && isset($_POST['passi']) && !empty($_POST['passi'])){
            $tabla="clientes";
            $useri=$_POST['useri'];
            $passi=$_POST['passi'];
            $respuesta=UsuarioModel::prelog($tabla,$useri,$passi);
            return $respuesta;
        }
    }
}

?>
