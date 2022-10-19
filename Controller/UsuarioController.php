<?php

require_once 'Model/UsuarioModel.php';

class UsuarioController{
    //Funcion de registrar usuario
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

    //Funcion de validacion de datos
    static public function prelog(){
        if(isset($_POST['useri']) && !empty($_POST['useri']) && isset($_POST['passi']) && !empty($_POST['passi'])){
            $tabla="clientes";
            $useri=$_POST['useri'];
            $passi=$_POST['passi'];
            $respuesta=UsuarioModel::prelog($tabla,$useri,$passi);
            return $respuesta;
        }
    }

    //Funcion de inicio de sesion
    static public function login($user,$clave){
        if(isset($_POST['useri']) && !empty($_POST['useri']) && isset($_POST['passi']) && !empty($_POST['passi'])){
            $user=$_POST['useri'];
            $clave=$_POST['passi'];
            $tabla='clientes';
            $respuesta=UsuarioModel::login($user,$clave,$tabla);
            //var_dump($respuesta);
            if($respuesta >= 1 && $respuesta !=NULL){
                $info = $respuesta;
                if($info >=1 && $info !=NULL){
                    foreach($info as $d){
                        $dname=$d['name_c'];
                        $dlast=$d['last_c'];
                    }
                    session_start();
                    $_SESSION['user']= $dname." ".$dlast;
                }
            }else{
                echo '<script>
                    if(window.history.replaceState){
                        window.history.repaceState(null,null,window.location.href);
                    }
                </script>';
                echo " <div class='alert alert-danger'>Usuario o Contraseña incorrecto!</div>
                <script>
                    setTimeout(function(){
                        window.location = 'index.php';
                    },3000);
                </script>
            ";
            }
            //var_dump($info);
        }
        return $respuesta;
    }

    //Funcion de Cerrar Sesion
    public function cerrarSesion($cerrar){
        if(isset($_GET['c']) && $_GET['c']=='ok'){
            $cerrar=$_GET['c'];
            if($cerrar =='ok'){
                session_unset();
            }
            header('Location:index.php');
            $cerrar='ok';
        }
        return $cerrar;
    }
}
?>
