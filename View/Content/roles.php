<?php
$roles=AdminController::listarRol();
//registro roles
if(isset($_POST['namer'])){
    $rrol=AdminController::registroRol();
    if($rrol){
        echo '<script>
            if(window.history.replaceState){
                window.history.repaceState(null,null,window.location.href);
            }
        </script>';
        echo "<div class='alert alert-success text-center'>
            Registro realizado correctamente
        </div>
        <script>
            setTimeout(function(){
                window.location = 'index.php?p=roles';
            },5000);
        </script>";
    }
}
//update estados roles
if(isset($_POST['idur'])){
    $idu=$_POST['idur'];
    $updater=AdminController::updateEst($idu);
    if($updater){
        echo '<script>
            if(window.history.replaceState){
                window.history.repaceState(null,null,window.location.href);
            }
        </script>';
        echo "<div class='alert alert-success text-center'>
            Actualizacion Exitosa
        </div>
        <script>
            setTimeout(function(){
                window.location = 'index.php?p=roles';
            },5000);
        </script>";
    }
}
//borrar rol
if(isset($_POST['idd'])){
    $idd=$_POST['idd'];
    $delete=AdminController::deleteRol($idd);
    if($delete){
        echo '<script>
            if(window.history.replaceState){
                window.history.repaceState(null,null,window.location.href);
            }
        </script>';
        echo "<div class='alert alert-danger text-center'>
            Borrado Exitoso
        </div>
        <script>
            setTimeout(function(){
                window.location = 'index.php?p=roles';
            },3000);
        </script>";
    }
}
?>
<section>
    <div class="container p-5">
        <div class="row">
            <div class="col">
                <h2 class="h2 ">Roles</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#roles">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Abreviatura</th>
                            <th scope="col">Estado</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;foreach($roles as $rl):$i++;?>
                        <tr>
                            <th scope="row"><?=$i;?></th>
                            <td><?=STRTOUPPER($rl['nombre_r'])?></td>
                            <td><?=STRTOUPPER($rl['abrev_r'])?></td>
                            <td>
                                <!-- Editar cantidad -->
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col d-flex">
                                            <input type="hidden" class="form-control w-50" name="idur" value="<?=($rl['id_r'])?>">

                                            <select name="stdu" id="" class="form-control w-50 me-2">
                                            <?php foreach($estados as $std):?>
                                                <option value="<?=$std['id_std']?>" class="form-control" select><?=$std['nombre_std']?></option>
                                            <?php endforeach?>
                                            </select>
                                            <button class="btn btn-primary" type="">
                                            <i class="fas fa-retweet"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- end cantidad update -->
                            </td>
                            <td>
                                <!-- Eliminar producto de carrito -->
                                <form action="" method="post">
                                    <input type="hidden" class="form-control" value="<?=$rl['id_r']?>" name="idd">
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                <!-- end eliminar -->
                            </td>
                        </tr>
                    <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Modal roles-->
<div class="modal fade" id="roles" tabindex="-1" aria-labelledby="registro" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registro Rol</h5>
        </div>
        <form action="" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="">Nombre</label>
              <input type="text" name="namer" value="" class="form-control">
  
              <label for="">Abreviatura</label>
              <input type="text" name="abreviar" value="" class="form-control">
  
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Crear</button>
          </div>
        </form>
      </div>
    </div>
</div>