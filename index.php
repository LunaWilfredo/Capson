<?php

//header
include_once 'View/Layout/header.php';
//body
if(isset($_GET['p'])&&!empty($_GET['p'])){
  $p=$_GET['p'];
  if($p=='body'){
    require_once 'View/cliente/'.$_GET['p'].'.php';
  }else{
    require_once 'body.php';
  }
}else{
  require_once 'body.php'; //body
}
//footer
include_once 'View/Layout/footer.php';

?>