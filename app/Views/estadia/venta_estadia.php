<div class="container">
    <!-- Outer Row -->

    <div class=" <?= session('mensajes.tipo'); ?> alert-success" role="alert" style="margin-top: 8px;" >   
    <p> <?= session('mensajes.exito'); ?> </p>   
    </div>
    
    <div class="row justify-content-center">

        <div class="col-xl-15 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-1">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Vender estadia</h1>
                                </div>
                                <form class="user" method="POST" action="<?= base_url('Estadia_controller/venderEstadia') ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="dominio" aria-describedby="dominio" placeholder="Dominio" name="patente" value="<?= old('patente') ?>">
                                        <p class="text-danger"> <?= session('errors.patente') ?> </p>
                                    </div>

                                    <div class="form-group">
                                        <select required style="font-size: .8rem; border-radius: 10rem; width: 100%; height: calc(2em + 1.3rem + 1.7px);padding: 0.375rem 0.75rem; background-color: #fff; color: #6e707e;border: 1px solid #d1d3e2;" name="zona">
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

                                    <div class="form-group">
                                        <input type="time" min= "1:00" max="12:00" class="form-control form-control-user" id="cantidad_hora" placeholder="Cantidad de horas" name="cant_horas" value="<?= old('cant_horas') ?>">
                                        <p class="text-danger"> <?= session('errors.cant_horas') ?> </p>
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