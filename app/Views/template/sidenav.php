<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('inicio') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <!-- <i class="fas fa-laugh-wink"></i>-->
            <img center height="50" width="50" src="<?= base_url('assets/img/logo.png') ?>">
        </div>
        <div class="sidebar-brand-text mx-3"> PS 2021 </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Inicio -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('inicio') ?>">
            <i class="fas fa-fw bi bi-house-door-fill" style="font-size: 18px;"></i>
            <span>Inicio</span>
        </a>
    </li>

    <!-- Nav Item - Usuarios -->
    <?php if (session('rol') == 'Administrador') : ?>
        <li class="nav-item" id="usuarios">
            <a class="nav-link" href="<?php echo base_url('listado-usuarios') ?>">
                <i class="fas fa-fw bi bi-people-fill" style="font-size: 18px;"></i>
                <span> Usuarios </span>
            </a>
        </li>

        <!-- Nav Item - Vehiculos estacionados -->

        <li class="nav-item" id="vehiculos_estacionados">
            <a class="nav-link" href="<?= base_url('listar-vehiculos-estacionados') ?>">
                <i class="fas fa-fw fa-car" style="font-size: 18px;"></i>
                <span>Vehiculos estacionados</span>
            </a>
        </li>

        <li class="nav-item" id="listar_infracciones">
            <a class="nav-link" href="<?= base_url('listar-infracciones') ?>">
                <i class="fas fa-fw bi bi-cone-striped" style="font-size: 18px;"></i>
                <span> Listar infracciones </span>
            </a>
        </li>

    <?php endif; ?>



    <?php if (session('rol') == 'Cliente') : ?>

        <!-- Nav Item - Registar vehiculo -->
        <li class="nav-item" id="registrar_vehiculo">
            <a class="nav-link" href="<?= base_url('registro-auto') ?>">
                <i class="fas fa-fw bi bi-plus-circle-fill" style="font-size: 18px;"></i>
                <span> Registar vehiculo </span></a>
        </li>

        <li class="nav-item" id="asociar_vehiculo">
            <a class="nav-link" href="<?= base_url('mostrar-asociar-auto') ?>">
                <i class="fas fa-fw bi bi-plus-circle-fill" style="font-size: 18px;"></i>
                <span> Asociar vehiculo </span></a>
        </li>

        <li class="nav-item" id="estacionar_vehiculo">
            <a class="nav-link" href="<?= base_url('estacionar-vehiculo') ?>">
                <i class="fas fa-fw fa-car" style="font-size: 18px;"></i>
                <span> Estacionar vehiculo </span>
            </a>
        </li>

        <li class="nav-item" id="desEstacionar_vehiculo">
            <a class="nav-link" href="<?= base_url('des_estacionar-vehiculo') ?>">
                <i class="fas fa-fw fa-car-side" style="font-size: 18px;"></i>
                <span> DesEstacionar vehiculo </span>
            </a>
        </li>
        <li class="nav-item" id="cargar_saldo">
            <a class="nav-link" href="<?= base_url('form-cargar-saldo') ?>">
                <i class="bi bi-currency-dollar" style="font-size: 18px;"></i>
                <span> Cargar saldo </span></a>
        </li>
    <?php endif; ?>

    <?php if (session('rol') == 'Inspector') : ?>
        <li class="nav-item" id="consultar_estadia">
            <a class="nav-link" href="<?= base_url('consultar-estadia') ?>">
                <i class="fas fa-fw bi bi-cone-striped" style="font-size: 18px;"></i>
                <span> Consultar estadia </span>
            </a>
        </li>

        <li class="nav-item" id="registrar_infraccion">
            <a class="nav-link" href="<?= base_url('form-infraccion') ?>">
                <i class="fas fa-fw bi bi-cone-striped" style="font-size: 18px;"></i>
                <span> Registrar infracción </span>
            </a>
        </li>
    <?php endif; ?>

    <?php if (session('rol') == 'Vendedor') : ?>

        <li class="nav-item" id="vender_estadia">
            <a class="nav-link" href="<?= base_url('formulario-venta') ?>">
                <i class="fas fa-fw fa-hand-holding-usd" style="font-size: 18px;"></i>
                <span> Vender estadia </span>
            </a>
        </li>


        <li class="nav-item" id="listar_ventas">
            <a class="nav-link" href="<?= base_url('listar-ventas') ?>">
                <i class="fas fa-fw fa-list-alt" style="font-size: 18px;"></i>
                <span> Listar ventas </span>
            </a>
        </li>

    <?php endif; ?>

    <!-- Nav Item - Pages Collapse Menu 
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">

            <span>Prueba</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li> 
    -->

    <!-- Nav Item - Puntos de ventas 
     <li class="nav-item" id="puntos_venta">
        <a class="nav-link" href="" <i class=" fas fa-fw fa-chart-area"></i>
            <span>Puntos de ventas</span></a>
    </li>
    -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->