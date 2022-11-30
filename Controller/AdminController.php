<?php

require_once 'Model/AdminModel.php';

class AdminController{

    static public function listarRol(){
        $tabla="roles";
        $respuesta=AdminModel::listarRol($tabla);
        return $respuesta;
    } 

    static public function registroRol(){
        if(isset($_POST['namer'])){
            $tabla="roles";
            $datos=array(
                'nombre'=>$_POST['namer'],
                'abrev'=>$_POST['abreviar'],
                'admin'=>$_SESSION['idc'],
                'estado'=>1
            );
            $resgistro=AdminModel::registroRol($tabla,$datos);
            return $resgistro;
        }
    }
    static public function listaEst(){
        $tabla="estados";
        $respuesta=AdminModel::listaEst($tabla);
        return $respuesta;
    }
    static public function updateEst($idu){
        if(isset($idu) && !empty($idu)){
            $tabla="roles";
            $datos=array(
                'id'=>$idu,
                'estado'=>$_POST['stdu']
            );
            $update=AdminModel::updateEst($tabla,$datos);
            return $update;
        }
    }
    static public function deleteRol($idd){
        if(isset($idd) && !empty($idd)){
            $tabla="roles";
            $update=AdminModel::deleteRol($tabla,$idd);
            return $update;
        }
    }
    static public function listarPedidosG(){
        $tabla = 'pedidos';
        $respuesta = AdminModel::listarPedidos($tabla);
        return $respuesta;
    }
    static public function listarUser(){
        $tabla = 'clientes';
        $respuesta = AdminModel::listarUser($tabla);
        return $respuesta;
    }
    //cambiar rol usuario
    static public function cambiarRol($idusr){
        if(isset($idusr) && !empty($idusr)){
            $tabla="clientes";
            $datos=array(
                'id'=>$idusr,
                'rol'=>$_POST['ru']
            );
            $rol=AdminModel::cambiarRol($tabla,$datos);
            return $rol;
        }
    }
    //cambiar estado usuario
    static public function cambiarEstdU($idusr){
        if(isset($idusr) && !empty($idusr)){
            $tabla="clientes";
            $datos=array(
                'id'=>$idusr,
                'estado'=>$_POST['stdu']
            );
            $estado=AdminModel::cambiarRol($tabla,$datos);
            return $estado;
        }
    }
    //dashboard
    static public function cantidadU(){
        $tabla="clientes";
        $respuesta=AdminModel::cantidadU($tabla);
        return $respuesta;
    }
    static public function cantidadPd(){
        $tabla="pedidos";
        $respuesta=AdminModel::cantidadPd($tabla);
        return $respuesta;
    }
    static public function cantidadPdr(){
        $tabla="pedidos";
        $respuesta=AdminModel::cantidadPdr($tabla);
        return $respuesta;
    }
    static public function cantidadPdp(){
        $tabla="pedidos";
        $respuesta=AdminModel::cantidadPdp($tabla);
        return $respuesta;
    }
    //grafico
    static public function cantidadPdxm(){
        $tabla="pedidos";
        for ($i=0; $i <= 12; $i++) { 
            $m=$i;
        }
        $respuesta=AdminModel::cantidadPdxm($tabla,$m);
        return $respuesta;
    }
    static public function cantidadPdxd(){
        $tabla="pedidos";
        $respuesta=AdminModel::cantidadPdxd($tabla);
        return $respuesta;
    }
}