<div class="container">
    <!-- Outer Row -->


    <div class="row justify-content-center">

        <div class="col-xl-15 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-1" style="margin: -2%;">
                <div class=" card-body p-0">
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
                                    <h1 class="h4 text-gray-900 mb-4"> Consultar estadia </h1>
                                </div>
                                <form class="user" method="POST" action="<?= base_url('Estadia_controller/consultarEstadoEstadia') ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="dominio" aria-describedby="dominio" placeholder="Dominio" name="patente" value="<?= old('patente') ?>">
                                        <p class="text-danger"> <?= session('errors.patente') ?> </p>
                                    </div>

                                    <button class="btn btn-primary btn-user btn-block" type="submit">
                                        Aceptar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>