<div class="container">
    <!-- Outer Row -->

    <div class="row justify-content-center">

        <div class="col-xl-15 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-1">
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
                                    <h1 class="h4 text-gray-900 mb-4">Vender estadia</h1>
                                </div>
                                <form class="user" method="POST" action="<?= base_url('registrar-venta') ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="dominio" aria-describedby="dominio" placeholder="Dominio" name="patente" value="<?= old('patente') ?>" required>
                                        <p class="text-danger"> <?= session('errors.patente') ?> </p>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" required style="font-size: .8rem; border-radius: 10rem; width: 100%; height: calc(2em + 1.3rem + 1.7px);padding: 0.375rem 0.75rem; background-color: #fff; color: #6e707e;border: 1px solid #d1d3e2;" name="zona" required>
                                            <option value='' disabled selected>
                                                Seleccione una zona
                                            </option>

                                            <?php
                                            foreach ($zonas as $zona) {
                                            ?>
                                                <option value='<?= $zona['id_zona'] ?>'>
                                                    <?= $zona['nombre_zona'] ?>
                                                </option>
                                            <?php };
                                            ?>
                                        </select>
                                        <p class="text-danger"> <?= session('errors.zona') ?> </p>
                                    </div>

                                    <div class="form-group row">

                                        <div class="col-sm-5 mb-4 mb-sm-0">
                                            <label class="classLabel" style="margin-top: 1rem; margin-left: .6rem">Cantidad de horas: </label>
                                        </div>

                                        <div class="col-sm-7">
                                            <input type="time" min="01:00" max="12:00" class="form-control form-control-user" id="cantidad_hora" name="cant_horas" required>
                                            <p class="text-danger"> <?= session('errors.cant_horas') ?></p>
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