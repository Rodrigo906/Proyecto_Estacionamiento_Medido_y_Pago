    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                                    </div>

                                    <p class="text-danger"> <?= session('error_login') ?> </p>

                                    <form class="user" method="POST" action="<?= base_url('Inicio_controller/loguear') ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" aria-describedby="username" placeholder="username" name="username" value="<?= old('username') ?>" required>
                                            <p class="text-danger"> <?= session('errors.username') ?> </p>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="contraseña" name="contraseña" required>
                                            <p class="text-danger"> <?= session('contraseña') ?> </p>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">
                                            Ingresar
                                        </button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('User_controller/mostrarFormularioRecuperacion')?>" > Olvidó su contraseña? </a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href=" <?= base_url('User_controller/MostrarFormularioRegistro')?> ">Create una cuenta !</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>