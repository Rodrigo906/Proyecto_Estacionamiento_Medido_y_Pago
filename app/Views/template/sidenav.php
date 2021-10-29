<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Inicio -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Inicio_controller/index') ?>" <i class=" fas fa-fw fa-chart-area"></i>
            <span>Inicio</span></a>
    </li>

    <!-- Nav Item - Usuarios -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('User_controller/index') ?>" <i class=" fas fa-fw fa-chart-area"></i>
            <span>Usuarios</span></a>
    </li>

    <!-- Nav Item - Vehiculos estacionados -->
    <li class="nav-item">
        <a class="nav-link" href="" <i class=" fas fa-fw fa-chart-area"></i>
            <span>Vehiculos estacionados</span></a>
    </li>

    <!-- Nav Item - Multas -->
    <li class="nav-item">
        <a class="nav-link" href="" <i class=" fas fa-fw fa-chart-area"></i>
            <span>Multas</span></a>
    </li>

    <!-- Nav Item - Puntos de ventas -->
    <li class="nav-item">
        <a class="nav-link" href="" <i class=" fas fa-fw fa-chart-area"></i>
            <span>Puntos de ventas</span></a>
    </li>

     <!-- Nav Item - Registar vehiculo -->
     <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Vehiculo_controller/formularioRegistroVehiculo') ?>" <i class=" fas fa-fw fa-chart-area"></i>
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

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

</ul>
<!-- End of Sidebar -->