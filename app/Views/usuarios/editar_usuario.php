<div class="container">

    <?php if (session()->get('msg')) : ?>
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong><?= session()->getFlashdata('msg') ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>


    <div class="card o-hidden border-0 shadow-lg my-1" style="margin: -2%;">
        <div class="card-body p-0 ">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">

                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4"> <?= $subtitulo ?> </h1>
                        </div>

                        <form class="user" method="POST" action="<?= base_url('registrar-usuario') ?>">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="nombre" placeholder="Nombre" name="nombre" value="<?= old('nombre') ?>" required>
                                    <p class="text-danger"> <?= session('errors.nombre') ?> </p>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="apellido" placeholder="Apellido" name="apellido" value="<?= old('apellido') ?>" required>
                                    <p class="text-danger"> <?= session('errors.apellido') ?> </p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-5 mb-4 mb-sm-0">
                                    <label class="classLabel" style="margin-top: 7%; margin-left: 6%">Fecha de nacimiento: </label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control form-control-user" id="fechaNacimiento" name="fecha_nacimiento" value="<?= old('fecha_nacimiento') ?>" required>
                                    <p class="text-danger"> <?= session('errors.fecha_nacimiento') ?> </p>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" placeholder="Email" name="email" value="<?= old('email') ?>" required>
                                <p class="text-danger"> <?= session('errors.email') ?> </p>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña" name="contraseña" value="<?= old('contraseña') ?>" required>
                                    <p class="text-danger"> <?= session('errors.contraseña') ?> </p>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Confirmar contraseña" name="confirmarContraseña" required>
                                    <p class="text-danger"> <?= session('errors.confirmarContraseña') ?> </p>
                                </div>
                            </div>

                            <button class="btn btn-primary btn-user btn-block" type="submit">
                                Guardar
                            </button>
                            <hr>
                            <a href="<?= base_url('listado-usuarios') ?>" class="btn btn-google btn-user btn-block">
                                Volver
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>