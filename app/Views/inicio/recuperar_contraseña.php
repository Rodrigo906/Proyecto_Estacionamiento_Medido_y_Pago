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

                                <?php if (session()->get('msg')) : ?>
                                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                        <strong><?= session()->getFlashdata('msg') ?></strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>

                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"> Recuperar contraseña </h1>
                                    <p style="text-align: justify;"> Complete el siguiente formulario y recibirá un email con su nueva contraseña de acceso. </p>
                                </div>
                                <form class="user" method="POST" action="<?= base_url('recuperar-contrasenia') ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" aria-describedby="username" placeholder="Username" name="username" value="<?= old('username') ?>">
                                        <p class="text-danger"> <?= session('errors.username') ?> </p>
                                    </div>

                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="email" aria-describedby="email" placeholder="Email" name="email" value="<?= old('email') ?>" required>
                                        <p class="text-danger"> <?= session('errors.email') ?> </p>
                                    </div>

                                    <button class="btn btn-primary btn-user btn-block" type="submit">
                                        Aceptar
                                    </button>
                                    <a href="<?= base_url('/') ?>" class="btn btn-danger btn-user btn-block">
                                        Volver
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>