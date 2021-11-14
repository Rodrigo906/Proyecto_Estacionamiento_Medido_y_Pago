<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Se puede usar style="display: none" para ocultar un item-->

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('inicio')?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <!-- <i class="fas fa-laugh-wink"></i>-->
            <img center height="50" width="50" src="<?= base_url('assets/img/logo.png')?>"> 
        </div>
        <div class="sidebar-brand-text mx-3"> PS 2021 </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Inicio -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('inicio') ?>"> 
             <i class=" bi bi-house-door"></i>
            <span>Inicio</span>
        </a>
    </li>

    <!-- Nav Item - Usuarios -->
    <?php if(session('rol') == 'Administrador') : ?>
        <li class="nav-item" id="usuarios">
            <a class="nav-link" href="<?php echo base_url('listado-usuarios') ?>"> <i class="bi bi-people"></i>
                <span> Usuarios </span></a>
        </li>

    <!-- Nav Item - Vehiculos estacionados -->

    <li class="nav-item" id="vehiculos_estacionados">
        <a class="nav-link" href="<?= base_url('listar-vehiculos-estacionados') ?>">
            <svg style="height: 15px; width: 13px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="square-parking" class="svg-inline--fa fa-square-parking" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240 192H192v64h48c17.66 0 32-14.34 32-32S257.7 192 240 192zM384 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V96C448 60.65 419.3 32 384 32zM240 320H192v32c0 17.69-14.31 32-32 32s-32-14.31-32-32V160c0-17.69 14.31-32 32-32h80c52.94 0 96 43.06 96 96S292.9 320 240 320z"></path></svg>
            <span>Vehiculos estacionados</span>
        </a>
    </li>
    
    <!-- Nav Item - Multas -->
    <li class="nav-item" id="multas">
        <a class="nav-link" href=""> 
        <img class="iconsvg" style="height: 15px; width: 15px;" src="https://img.icons8.com/ios/100/000000/police-badge.png"/>
            <span>Multas</span>
        </a>
    </li>
    <?php endif; ?>



    <?php if(session('rol') == 'Cliente') : ?>
   
    <!-- Nav Item - Registar vehiculo -->
   
    <li class="nav-item" id="registrar_vehiculo">
        <a class="nav-link" href="<?= base_url('registro-auto') ?>"> 
        <i class="bi bi-plus-circle"> </i> 
            <span> Registar vehiculo </span></a>
    </li>
   
    <li class="nav-item" id="estacionar_vehiculo">
        <a class="nav-link" href="<?= base_url('estacionar-vehiculo') ?>"> <i class="fas fa-car"></i>
            <span> Estacionar vehiculo </span></a>
    </li>

    <li class="nav-item" id="desEstacionar_vehiculo">
        <a class="nav-link" href="<?= base_url('des_estacionar-vehiculo') ?>">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="car-side" class="svg-inline--fa fa-car-side" role="img" xmlns="http://www.w3.org/2000/svg" style="height: 12px;" 
            viewBox="0 0 640 512"><path fill="currentColor" d="M640 320V368C640 385.7 625.7 400 608 400H574.7C567.1 445.4 527.6 480 480 480C432.4 480 392.9 445.4 385.3 400H254.7C247.1 445.4 207.6 480 160 480C112.4 480 72.94 445.4 65.33 400H32C14.33 400 0 385.7 0 368V256C0 228.9 16.81 205.8 40.56 196.4L82.2 92.35C96.78 55.9 132.1 32 171.3 32H353.2C382.4 32 409.1 45.26 428.2 68.03L528.2 193C591.2 200.1 640 254.8 640 319.1V320zM171.3 96C158.2 96 146.5 103.1 141.6 116.1L111.3 192H224V96H171.3zM272 192H445.4L378.2 108C372.2 100.4 362.1 96 353.2 96H272V192zM525.3 400C527 394.1 528 389.6 528 384C528 357.5 506.5 336 480 336C453.5 336 432 357.5 432 384C432 389.6 432.1 394.1 434.7 400C441.3 418.6 459.1 432 480 432C500.9 432 518.7 418.6 525.3 400zM205.3 400C207 394.1 208 389.6 208 384C208 357.5 186.5 336 160 336C133.5 336 112 357.5 112 384C112 389.6 112.1 394.1 114.7 400C121.3 418.6 139.1 432 160 432C180.9 432 198.7 418.6 205.3 400z"></path></svg>    
        <span> DesEstacionar vehiculo </span> 
        </a>
    </li>
    <?php endif; ?>

    <?php if(session('rol') == 'Inspector') : ?>
        <li class="nav-item" id="consultar_estadia">
            <a class="nav-link" href="<?= base_url('consultar-estadia') ?>"> <i class="bi bi-cone-striped"></i>
                <span> Consultar estadia </span></a>
        </li>
    <?php endif; ?>

    <?php if(session('rol') == 'Vendedor') : ?>

        <li class="nav-item" id="vender_estadia">
            <a class="nav-link" href="<?= base_url('formulario-venta') ?>"> 
            <svg style="height: 14px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="car-rear" class="svg-inline--fa fa-car-rear" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M165.4 32H346.6C387.4 32 423.7 57.78 437.2 96.29L472.4 196.8C495.6 206.4 512 229.3 512 256V336C512 359.7 499.1 380.4 480 391.4V448C480 465.7 465.7 480 448 480H416C398.3 480 384 465.7 384 448V400H128V448C128 465.7 113.7 480 96 480H64C46.33 480 32 465.7 32 448V391.4C12.87 380.4 0 359.7 0 336V256C0 229.3 16.36 206.4 39.61 196.8L74.8 96.29C88.27 57.78 124.6 32 165.4 32V32zM165.4 96C151.8 96 139.7 104.6 135.2 117.4L109.1 192H402.9L376.8 117.4C372.3 104.6 360.2 96 346.6 96H165.4zM208 272C199.2 272 192 279.2 192 288V320C192 328.8 199.2 336 208 336H304C312.8 336 320 328.8 320 320V288C320 279.2 312.8 272 304 272H208zM72 304H104C117.3 304 128 293.3 128 280C128 266.7 117.3 256 104 256H72C58.75 256 48 266.7 48 280C48 293.3 58.75 304 72 304zM408 256C394.7 256 384 266.7 384 280C384 293.3 394.7 304 408 304H440C453.3 304 464 293.3 464 280C464 266.7 453.3 256 440 256H408z"></path></svg>
                <span> Vender estadia </span>
            </a>
        </li>

        <li class="nav-item" id="listar_ventas">
            <a class="nav-link" href="<?= base_url('listar-ventas') ?>"> <i class="bi bi-coin"></i>
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



</ul>
<!-- End of Sidebar -->