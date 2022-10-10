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

    static public function login($user,$clave){
        if(isset($_POST['useri']) && !empty($_POST['useri']) && isset($_POST['passi']) && !empty($_POST['passi'])){
            $user=$_POST['useri'];
            $clave=$_POST['passi'];
            $tabla='clientes';
            $respuesta=UsuarioModel::login($user,$clave,$tabla);
            if($respuesta =='ok'){
                $info=UsuarioModel::prelog($tabla,$user,$clave);
                if($info){
                    foreach($info as $d){
                        $dname=$d['name_c'];
                        $dlast=$d['last_c'];
                    }
                }
                session_start();
                $_SESSION['user']= $dname." ".$dlast;
            }else{
                header('Location:index.php');
            }
        }
        return $respuesta;
    }
}
?>
