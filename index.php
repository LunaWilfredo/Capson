<?php
session_start();
//header
include_once 'View/Layout/header.php';
//body
if(isset($_GET['p'])&&!empty($_GET['p'])){
  $p=$_GET['p'];
  if($p=='body' || $p=='clienteHome' || $p='car'){
    require_once 'View/Content/'.$_GET['p'].'.php';
  }else{
    require_once 'body.php';
  }
}else{
  require_once 'body.php'; //body
}
//footer
include_once 'View/Layout/footer.php';

?>