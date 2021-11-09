<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Se puede usar style="display: none" para ocultar un item-->

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> PS 2021 </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Inicio -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('inicio') ?>" <i class=" fas fa-fw fa-chart-area"></i>
            <span>Inicio</span></a>
    </li>

    <!-- Nav Item - Usuarios -->
    <li class="nav-item" id="usuarios">
        <a class="nav-link" href="<?php echo base_url('listado-usuarios') ?>" <i class=" fas fa-fw fa-chart-area"></i>
            <span> Usuarios </span></a>
    </li>

    <!-- Nav Item - Vehiculos estacionados -->
    <li class="nav-item" id="vehiculos_estacionados">
        <a class="nav-link" href="<?= base_url('Estadia_controller/mostrarListadoAutosEstacionados') ?>" <i class=" fas fa-fw fa-chart-area"></i>
            <span>Vehiculos estacionados</span></a>
    </li>

    <!-- Nav Item - Multas -->
    <li class="nav-item" id="multas">
        <a class="nav-link" href="" <i class=" fas fa-fw fa-chart-area"></i>
            <span>Multas</span></a>
    </li>

    <!-- Nav Item - Puntos de ventas -->
    <li class="nav-item" id="puntos_venta">
        <a class="nav-link" href="" <i class=" fas fa-fw fa-chart-area"></i>
            <span>Puntos de ventas</span></a>
    </li>

    <!-- Nav Item - Registar vehiculo -->
    <li class="nav-item" id="registrar_vehiculo">
        <a class="nav-link" href="<?= base_url('registro-auto') ?>" <i class=" fas fa-fw fa-chart-area"></i>
            <span> Registar vehiculo </span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
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

    <li class="nav-item" id="estacionar_vehiculo">
        <a class="nav-link" href="<?= base_url('estacionar-vehiculo') ?>" <i class=" fas fa-fw fa-chart-area"></i>
            <span> Estacionar vehiculo </span></a>
    </li>

    <li class="nav-item" id="desEstacionar_vehiculo">
        <a class="nav-link" href="<?= base_url('des_estacionar-vehiculo') ?>" <i class=" fas fa-fw fa-chart-area"></i>
            <span> DesEstacionar vehiculo </span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">



</ul>
<!-- End of Sidebar -->