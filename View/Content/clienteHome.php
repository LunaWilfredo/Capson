<?php 
if(isset($_SESSION['idc'])){
    $datosu=UsuarioController::datosCliente();
}
if(isset($_POST['idcu'])){
    $idcu=$_POST['idcu'];
    $update=UsuarioController::updateDatos($idcu);
    if($update=='ok'){

        echo '<script>
                if(window.history.replaceState){
                    window.history.repaceState(null,null,window.location.href);
                }
            </script>';
        echo "<div class='alert alert-success text-center'>
                Actualizacion exitosa!
            </div>
            <script>
                setTimeout(function(){
                    window.location = 'index.php?p=clienteHome';
                },3000);
            </script>";
    }
}
?>
<header>
    <div class="container-fluid bg-secondary p-5">
        <div class="row">
            <div class="col-7">
            <?php foreach($datosu as $dt):?>
                <h1 class="display-3 mx-5 p-5 text-light">
                <?=$dt['name_c']." ".$dt['last_c']?>
                </h1>
            <?php endforeach?>
            </div>
        </div>
    </div>
</header>
<section id="">
    <div class="container p-5">
        <form action="" method="post">
            <?php foreach($datosu as $dt):?>
                <div class="row p-5 m-auto">
                    <div class="col">
                        <!-- <img src="./App/Img/Rectangle 22.png" alt="" class="img rounded" /> -->
                        <div class="row">

                            <input type="hidden" class="form-control" name="idcu" value="<?=$_SESSION['idc']?>">

                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="label">Nombre</label>
                                    <input type="text" class="form-control" name="nombreu" value="<?=$dt['name_c']?>">
                                </div>
                            </div>
                            
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="label">Apellido</label>
                                    <input type="text" class="form-control" name="apellidou" value="<?=$dt['last_c']?>">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="label">Dirección</label>
                                    <input type="text" class="form-control" name="direccionu" value="">
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="label">Pais</label>
                                    <input type="text" class="form-control" name="paisu" value="<?=$dt['pais_cl']?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="label">Movil</label>
                                    <input type="text" class="form-control" name="movilu" value="<?=$dt['phone_cl']?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="label">Correo</label>
                                    <input type="text" class="form-control" name="correou" value="<?=$dt['mail_c']?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="label">Contraseña</label>
                                    <input type="password" class="form-control" name="claveu" value="<?=$dt['pass_c']?>">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer row mt-3">
                            <!-- <div class="col"> -->
                                <button type="submit" class="btn btn-success w-50">
                                    <i class="fas fa-save"></i> Actualizar
                                </button>
                            <!-- </div> -->
                        </div>
                    </div>
                    <div class="col d-flex m-auto justify-content-center align-content-center display-6">
                        <!-- contenido -->
                    </div>
                </div>
            <?php endforeach?>
        </form>
    </div>
</section>