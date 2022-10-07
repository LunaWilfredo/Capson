<?php

class Conexion{
    static public function conexion(){
        try{
            $cn = new PDO("mysql:host=localhost;dbname=capson",'root','');
            $cn->exec("SET NAMES UTF8");
            return $cn;
        }catch(PDOException $e){
            echo $e->getMessage("Error de conexion de base de datos");
        }
    }
}
?>