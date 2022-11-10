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
                        $did=$d['id_c'];
                        $dname=$d['name_c'];
                        $dlast=$d['last_c'];
                    }
                    session_start();
                    $_SESSION['idc'] = $did; 
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

    //Funcion de validacion de datos
    static public function datosCliente(){
        if(isset($_SESSION['idc'])){
                $tabla="clientes";
                $idc=$_SESSION['idc'];
                $respuesta=UsuarioModel::datosCliente($tabla,$idc);
                return $respuesta;
        }
    }

    //funcion de actualizacion de datos de cliente
    static public function updateDatos($idc){
        if(isset($_POST['idcu']) && !empty($_POST['idcu'])){
            $tabla="clientes";
            $idc =$_POST['idcu'];
            $datos=array(
                'nameu'=>$_POST['nombreu'],
                'lastu'=>$_POST['apellidou'],
                'direccionu'=>$_POST['direccionu'],
                'paisu'=>$_POST['paisu'],
                'phoneu'=>$_POST['movilu'],
                'mailu'=>$_POST['correou'],
                'passwordu'=>$_POST['claveu']
            );
            $respuesta=UsuarioModel::updateDatos($tabla,$datos,$idc);
            return $respuesta;
        }
    }

    
}
?>
