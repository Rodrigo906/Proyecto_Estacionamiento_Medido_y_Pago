<html>

    <!-- Aqui va el formulario de registro del administrador-->

    <head>
    <meta charset="UTF-8">
    <title> <?= $titulo ?> </title >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    </head>

    <body>
       
        <!--
        <form method="POST" action="<?= base_url('User_controller/registrarUsuario')?>">
            <input type="text" name="valor1">
            <input type="text" name="valor2">
            <button> Enviar </button>
        </form>
        -->

        <?php if(isset($validation)) { ?>
        <div class="alert alert-danger" role="alert">
        <?= $validation->listErrors(); ?>
        <?php } ?>

    <div class="container justify-content-center" style="margin-left: 25%; color: blue;"> 
        <div class="modal-header justify-content-center" style="width: 600px; margin-bottom: 50px; margin-right: 0;">
            <h1 class="modal-title fw-bold" id="tituloModal"> <?= $titulo ?> </h1>
        </div>
    </div>

    <div class="container">
    <div class="row justify-content-center">
    <div class="col-6">
        <form  action="<?= base_url('User_controller/registrarUsuario') ?>" method="POST"> 
                         <div class="row mb-3">

                                <input type="text" name="id" id="inputId" style="display: none;">

                                <label for="inputNombre" class="col-sm-4 col-form-label fw-bold"> Nombre(*) </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="inputNombre" name="nombre" value="<?=old('nombre')?>">
                                    <p class="text-danger"> <?= session('errors.nombre')?> </p>
                                </div>
                                
                              
                            
                            </div>
                            <div class="row mb-3">
                                <label for="inputApellido" class="col-sm-4 col-form-label fw-bold"> Apellido(*) </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="inputApellido" name="apellido" value="<?=old('apellido')?>">
                                    <p class="text-danger"> <?= session('errors.apellido')?> </p>
                                </div>
                               

                            </div>
                            <div class="row mb-3">
                                <label for="inputUsername" class="col-sm-4 col-form-label fw-bold"> Username(*) </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="inputUsername" name="username" value="<?=old('username')?>">
                                    <p class="text-danger"> <?= session('errors.username')?> </p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputRol" class="col-sm-4 col-form-label fw-bold"> Rol </label>
                                <div class="col-sm-7">
                                    <select class="form-select" name="rol" id="select">
                                    <!--<option selected> Seleccione una opción </option>-->
                                        <?php
                                            foreach ($roles as $rol) {
                                        ?>
                                        <option value='<?php echo $rol['nombre'] ?>'> <?php echo $rol['nombre'] ?> </option>
                                        <?php };  
                                        ?>

                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-4 col-form-label fw-bold"> Password(*) </label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" id="inputPassword" name="password" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-4 col-form-label fw-bold" > Email(*) </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="inputEmail" name="email" value="<?=old('email')?>" >
                                    <p class="text-danger"> <?= session('errors.email')?> </p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputDni" class="col-sm-4 col-form-label fw-bold" > DNI(*) </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="inputDni" name="dni" >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputFechaNacimiento" class="col-sm-4 col-form-label fw-bold" > Fecha de nacimiento(*) </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="inputFechaNacimiento" name="fecha_nacimiento"  value="<?=old('fecha_nacimiento')?>" >
                                    <p class="text-danger"> <?= session('errors.fecha_nacimiento')?> </p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputContraseña" class="col-sm-4 col-form-label fw-bold" > Contraseña(*) </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="inputContraseña" name="contraseña" >
                                </div>
                            </div>
                          
                            <div class="modal-footer" style="margin-right: 5%; margin-top: 40px;">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="limpiar()" style="margin-right: 5%;"> Cancelar </button>
                                  <button type="submit" class="btn btn-primary" > Guardar cambios </button>
                            </div>
                        </form>
    </div>
    </div>
    </div>

    </body>
       
</html>