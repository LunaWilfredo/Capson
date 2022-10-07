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
}

?>
