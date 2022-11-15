<?php
$cu=AdminController::cantidadU();
$cpt=AdminController::cantidadPd();
$cpr=AdminController::cantidadPdr();
$cpp=AdminController::cantidadPdp();
?>
<section>
    <div class="container p-5">
        <div class="row p-3">
            <div class="col">
                <h2 class="h2 ">Dashboard</h2>
            </div>
        </div>
        <div class="row p-3">
            <div class="col">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Usuarios</div>
                    <div class="card-body">
                        <h5 class="card-title">Registrados</h5>
                        <p class="card-text display-1 text-center"><?=count($cu);?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Pedidos</div>
                    <div class="card-body">
                        <h5 class="card-title">Totales</h5>
                        <p class="card-text display-1 text-center"><?=count($cpt);?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">Pedidos</div>
                    <div class="card-body">
                        <h5 class="card-title">Realizados</h5>
                        <p class="card-text display-1 text-center"><?=count($cpr);?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Pedidos</div>
                    <div class="card-body">
                        <h5 class="card-title">Pendiente</h5>
                        <p class="card-text display-1 text-center"><?=count($cpp);?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-3">
            <div class="col">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Usuarios</div>
                    <div class="card-body">
                        <h5 class="card-title">Registrados</h5>
                        <p class="card-text display-1 text-center"><?=count($cu);?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Pedidos</div>
                    <div class="card-body">
                        <h5 class="card-title">Totales</h5>
                        <p class="card-text display-1 text-center"><?=count($cpt);?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">Pedidos</div>
                    <div class="card-body">
                        <h5 class="card-title">Realizados</h5>
                        <p class="card-text display-1 text-center"><?=count($cpr);?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Pedidos</div>
                    <div class="card-body">
                        <h5 class="card-title">Pendiente</h5>
                        <p class="card-text display-1 text-center"><?=count($cpp);?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>