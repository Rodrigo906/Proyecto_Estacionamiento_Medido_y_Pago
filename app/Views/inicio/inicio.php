<div class="container-fluid">
    <!-- Page Heading -->

    <div class="row" style="margin-top: 40px;">
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
            <!-- Infracciones -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="col-auto">
                                <a class="nav-link" href="<?= base_url('listar-infracciones') ?>">
                                    <i class="fas fa-fw bi bi-cone-striped text-gray-600" style="font-size: 35px;"></i>
                                </a>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    Listar infracciones
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actualizar zona -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="col-auto">
                                <a href="<?php echo base_url('form-actualizar-zona') ?>">
                                    <i class="fas fa-map-marker-alt fa-2x text-gray-600"></i>
                                </a>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    Actualizar zona
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

            <!-- Asociar vehiculo -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="col-auto">
                                <a class="nav-link" href="<?= base_url('registro-auto') ?>">
                                    <i class="fas fa-key fa-2x text-gray-600"></i>
                                </a>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    Asociar vehiculo
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
            <!-- Cargar saldo -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="col-auto">
                                <a class="nav-link" href="<?= base_url('form-cargar-saldo') ?>">
                                    <i class="bi bi-currency-dollar text-gray-600" style="font-size: 30px;"></i>
                                </a>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    Cargar saldo
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Estadias pendientes -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="col-auto">
                                <a class="nav-link" href="<?= base_url('listar-estadias-pendientes') ?>">
                                    <i class="bi bi-card-list text-gray-600" style="font-size: 30px;"></i>
                                </a>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    Estadias pendientes
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

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="col-auto">
                                <a class="nav-link" href="<?= base_url('form-infraccion') ?>">
                                    <i class="fas bi bi-cone-striped fa-2x text-gray-600"></i>
                                </a>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    Registrar infraccion
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