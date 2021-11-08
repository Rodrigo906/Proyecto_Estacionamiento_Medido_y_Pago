<div class="container">

    <?php if (session()->get('msg')) : ?>
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong><?= session()->getFlashdata('msg') ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <!-- Outer Row -->
    <div class=" <?= session('mensajes.tipo'); ?> alert-success" role="alert" style="margin-top: 8px;">
        <p> <?= session('mensajes.exito'); ?> </p>
    </div>

    <div class="row justify-content-center">

        <div class="col-xl-15 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-1" style="margin: -2%;">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">
                                        <?= $subtitulo ?>
                                    </h1>
                                </div>
                                <form class="user" method="POST" action="<?= base_url('registrar-auto') ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="patente" placeholder="Patente" name="patente" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="marca" placeholder="Marca" name="marca" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="modelo" placeholder="Modelo" name="modelo" required>
                                    </div>

                                    <button class="btn btn-primary btn-user btn-block" type="submit">
                                        Aceptar
                                    </button>
                                    <a href="index" class="btn btn-danger btn-user btn-block">
                                        Cancelar
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