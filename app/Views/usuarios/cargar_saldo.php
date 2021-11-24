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
                                        <?= $subtitulo ?>
                                    </h1>
                                </div>
                                <form class="user" method="POST" action="<?= base_url('cargar-saldo') ?>">
                                    <div class="form-group">
                                        <input type="number" step="0.01" class="form-control form-control-user" id="monto" placeholder="Monto" name="monto" required>
                                        <p class="text-danger"> <?= session('errors.monto') ?> </p>
                                    </div>
                                    <div style="margin: .6rem;">
                                        <span style="font-size: .9rem;">
                                            Tarjeta:
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-user" id="numero" placeholder="Número" name="numero" required>
                                        <p class="text-danger"> <?= session('errors.numero') ?> </p>
                                    </div>
                                    <div class="form-group">
                                        <span style="font-size: .9rem; margin-left: .6rem;">
                                            Fecha de vencimiento
                                        </span>
                                        <select style="font-size: .8rem; border-radius: 10rem; height: calc(1.5em + 1.3rem + 1.7px);padding: 0.375rem 0.75rem; background-color: #fff; color: #6e707e;border: 1px solid #d1d3e2;">
                                            <option value="01">Enero</option>
                                            <option value="02"> Febrero</option>
                                            <option value="03">Marzo</option>
                                            <option value="04">Abril</option>
                                            <option value="05">Mayo</option>
                                            <option value="06">Junio</option>
                                            <option value="07">Julio</option>
                                            <option value="08">Agosto</option>
                                            <option value="09">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                        </select>
                                        <select style="font-size: .8rem; border-radius: 10rem; height: calc(1.5em + 1.3rem + 1.7px);padding: 0.375rem 0.75rem; background-color: #fff; color: #6e707e;border: 1px solid #d1d3e2;">
                                            <option value="16"> 2021</option>
                                            <option value="17"> 2022</option>
                                            <option value="18"> 2023</option>
                                            <option value="19"> 2024</option>
                                            <option value="20"> 2025</option>
                                            <option value="21"> 2026</option>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-user" id="codigoSeguridad" placeholder="Código de seguridad" name="codigo_seguridad" required>
                                        <p class="text-danger"> <?= session('errors.codigo_seguridad') ?> </p>
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