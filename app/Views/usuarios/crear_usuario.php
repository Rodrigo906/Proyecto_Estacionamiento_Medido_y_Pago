<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> <?= $titulo ?> </title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

</head>

<body>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0 ">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"> <?= $subtitulo ?> </h1>
                            </div>

                            <form class="user" method="POST" action="<?= base_url('registrarUsuario') ?>">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="nombre" placeholder="Nombre" name="nombre">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="apellido" placeholder="Apellido" name="apellido">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="dni" placeholder="Dni" name="dni">
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-5 mb-4 mb-sm-0">
                                        <label class="classLabel" style="margin-top: 7%; margin-left: 6%">Fecha de nacimiento</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control form-control-user" id="fechaNacimiento" name="facha_nacimiento">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username" placeholder="Nombre de usuario" name="username">
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-1">
                                        <select class="classSelect" style="font-size: .8rem;border-radius: 10rem;width: 100%;height: calc(2em + 1.3rem + 1.7px);padding: 0.375rem 0.75rem;background-color: #fff;color: #6e707e;border: 1px solid #d1d3e2;">
                                            <option value="" disabled selected>Seleccione un rol</option>
                                            <?php
                                            foreach ($roles as $rol) {
                                            ?>
                                                <option value='<?php echo $rol['nombre'] ?>'> <?php echo $rol['nombre'] ?> </option>
                                            <?php };
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" placeholder="Email" name="email">
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña" name="contraseña">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Confirmar contraseña" name="confirmarContraseña">
                                    </div>
                                </div>

                                <button class="btn btn-primary btn-user btn-block" type="submit">
                                    Guardar
                                </button>
                                <hr>
                                <a href="index" class="btn btn-google btn-user btn-block">
                                    Cancelar
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

</body>

</html>