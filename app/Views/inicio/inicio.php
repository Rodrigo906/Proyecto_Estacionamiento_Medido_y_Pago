<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Inicio </h1>
    </div>

    <div class="row">
        <!-- Inicio -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-center">
                        <div class="col-auto">
                            <a class="nav-link" href="<?= base_url('inicio') ?>">
                                <i class="fas fa-fw bi bi-house-door-fill fa-2x text-gray-600"></i>
                            </a>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                Inicio
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (session('rol') == 'Administrador') : ?>
            <!-- Usuarios -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="col-auto">
                                <a href="<?php echo base_url('listado-usuarios') ?>">
                                    <i class="fas bi bi-people-fill fa-2x text-gray-600"></i>
                                </a>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    Usuarios
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vehiculos estacionados -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="col-auto">
                                <a class="nav-link" href="<?= base_url('listar-vehiculos-estacionados') ?>">
                                    <i class="fas fa-car fa-2x text-gray-600"></i>
                                </a>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    Vehiculos estacionados
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Multas -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="col-auto">
                                <a class="nav-link" href="">
                                    <i class="fas fa-list-alt fa-2x text-gray-600"></i>
                                </a>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    Multas
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (session('rol') == 'Cliente') : ?>
            <!-- Registrar vehiculo -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="col-auto">
                                <a class="nav-link" href="<?= base_url('registro-auto') ?>">
                                    <i class="fas bi bi-plus-circle-fill fa-2x text-gray-600"></i>
                                </a>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    Registrar vehiculo
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Estacionar vehiculo -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="col-auto">
                                <a class="nav-link" href="<?= base_url('estacionar-vehiculo') ?>">
                                    <i class="fas fa-car fa-2x text-gray-600"></i>
                                </a>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    Estacionar vehiculo
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DesEstacionar vehiculo -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="col-auto">
                                <a class="nav-link" href="<?= base_url('des_estacionar-vehiculo') ?>">
                                    <i class="fas fa-car-side fa-2x text-gray-600"></i>
                                </a>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    DesEstacionar vehiculo
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (session('rol') == 'Inspector') : ?>
            <!-- Consultar estadia -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="col-auto">
                                <a class="nav-link" href="<?= base_url('consultar-estadia') ?>">
                                    <i class="fas bi bi-cone-striped fa-2x text-gray-600"></i>
                                </a>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    Consultar estadia
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (session('rol') == 'Vendedor') : ?>
            <!-- Vender estadia -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="col-auto">
                                <a class="nav-link" href="<?= base_url('formulario-venta') ?>">
                                    <i class="fas fa-hand-holding-usd fa-2x text-gray-600"></i>
                                </a>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    Vender estadia
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Listar ventas -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="col-auto">
                                <a class="nav-link" href="<?= base_url('listar-ventas') ?>">
                                    <i class="fas fa-list-alt fa-2x text-gray-600"></i>
                                </a>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    Listar ventas
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
    <!-- Content Row -->
</div>