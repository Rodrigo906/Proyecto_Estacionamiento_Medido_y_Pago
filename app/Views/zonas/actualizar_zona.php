<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-15 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-1" style="margin: -2%;">
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
                                    <h1 class="h4 text-gray-900 mb-4">
                                        Actualizar zona
                                    </h1>
                                </div>
                                <form class="user" method="POST" action="<?= base_url('actualizar-zona') ?>">
                                    <div class="form-group">
                                        <select class="form-control" style="font-size: .8rem; border-radius: 10rem; width: 100%; height: calc(2em + 1.3rem + 1.7px);padding: 0.375rem 0.75rem; background-color: #fff; color: #6e707e;border: 1px solid #d1d3e2;" name="zona" required>
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
                                    </div>

                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-user" id="precio" placeholder="Precio" name="precio" value="<?= old('precio') ?>" required>
                                        <p class="text-danger"> <?= session('errors.precio') ?> </p>
                                    </div>

                                    <div class="form-group row">

                                        <span style="font-size: .9rem;
                                        margin-top: 1rem; margin-left: 1.1rem;">
                                            Hora de mañana
                                        </span>

                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <input type="time" min="01:00" max="12:00" class="form-control form-control-user" id="horaDesdeMañana" name="horaDesdeMañana">
                                            <p class="text-danger"> <?= session('errors.horaDesdeMañana') ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="time" min="01:00" max="12:00" class="form-control form-control-user" id="horaHastaMañana" name="horaHastaMañana">
                                            <p class="text-danger"> <?= session('errors.horaHastaMañana') ?></p>
                                        </div>

                                        <span style="font-size: .9rem;
                                        margin-top: 1rem; margin-left: 1.1rem;">
                                            Hora de tarde
                                        </span>

                                        <div class="col-sm-4 mb-3 mb-sm-0" style="margin-left: 1rem;">
                                            <input type="time" min="01:00" max="12:00" class="form-control form-control-user" id="horaDesdeTarde" name="horaDesdeTarde">
                                            <p class="text-danger"> <?= session('errors.horaDesdeTarde') ?></p>
                                        </div>
                                        <div class="col-sm-4" style="margin-left: .1rem;">
                                            <input type="time" min="01:00" max="12:00" class="form-control form-control-user" id="horaHastaTarde" name="horaHastaTarde">
                                            <p class="text-danger"> <?= session('errors.horaHastaTarde') ?></p>
                                        </div>
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