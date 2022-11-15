<?php
$roles=AdminController::listarRol();
$usuarios=AdminController::listarUser();
//cambio roles
if(isset($_POST['idur'])){
    $idusr=$_POST['idur'];
    $crol=AdminController::cambiarRol($idusr);
    if($crol){
        echo '<script>
            if(window.history.replaceState){
                window.history.repaceState(null,null,window.location.href);
            }
        </script>';
        echo "<div class='alert alert-success text-center'>
            Cambio realizado correctamente
        </div>
        <script>
            setTimeout(function(){
                window.location = 'index.php?p=usuariosAdmin';
            },3000);
        </script>";
    }
}

//update estados 
if(isset($_POST['idue'])){
    $idusr=$_POST['idue'];
    $updates=AdminController::cambiarEstdU($idusr);
    if($updates){
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
                window.location = 'index.php?p=usuariosAdmin';
            },2000);
        </script>";
    }
}
?>
<section>
    <div class="container p-5">
        <div class="row">
            <div class="col">
                <h2 class="h2 ">Usuario</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registro">
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
                            <th scope="col">Nombre</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Fecha de Registro</th>
                            <th scope="col">Estado</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;foreach($usuarios as $usr):$i++;?>
                        <tr>
                            <th scope="row"><?=$i;?></th>
                            <td><?=$usr['nombre']." ".$usr['apellido']?></td>
                            <td><?=$usr['correo']?></td>
                            <td>
                                <?=$usr['rol']?>
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#c<?php echo $i ?>" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-retweet"></i>
                                </button>
                                <div class="collapse" id="c<?php echo $i ?>">
                                    <div class="mt-2">
                                        <!-- cambiar rol -->
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col d-flex">
                                                    <input type="hidden" class="form-control w-50" name="idur" value="<?=($usr['id_c'])?>">
                                                    <select name="ru" id="ru" class="form-control mx-2">
                                                        <?php foreach($roles as $rl):?>    
                                                            <option value="<?=$rl['id_r']?>" class=""><?=STRTOUPPER($rl['nombre_r'])." | ".STRTOUPPER($rl['abrev_r'])?></option>
                                                        <?php endforeach?>
                                                    </select>
                                                    <button class="btn btn-success me-2" type="submit">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                    <button class="btn btn-danger" type="button" data-bs-toggle="collapse" data-bs-target="#c<?php echo $i ?>" aria-expanded="false" >
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- end rol -->
                                    </div>
                                </div>
                            </td>
                            
                            <td><?=$usr['fecha']?></td>
                            <td>
                                <?=$usr['estado']?>
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#s<?php echo $i ?>" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-retweet"></i>
                                </button>
                                <div class="collapse" id="s<?php echo $i ?>">
                                    <div class="mt-2">
                                        <!-- cambiar estado -->
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col d-flex">
                                                    <input type="hidden" class="form-control w-50" name="idue" value="<?=($usr['id_c'])?>">

                                                    <select name="stdu" id="stdu" class="form-control w-50 me-2">
                                                    <?php foreach($estados as $std):?>
                                                        <option value="<?=$std['id_std']?>" class="form-control" select><?=$std['nombre_std']?></option>
                                                    <?php endforeach?>
                                                    </select>
                                                    <button class="btn btn-success me-2" type="">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                    <button class="btn btn-danger" type="button" data-bs-toggle="collapse" data-bs-target="#s<?php echo $i ?>" aria-expanded="false" >
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- end estado -->
                                    </div>
                                </div>
                                
                            </td0>
                        </tr>
                    <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
