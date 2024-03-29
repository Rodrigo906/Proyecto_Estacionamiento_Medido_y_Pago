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
                                        <select class="form-control" style="font-size: .8rem; border-radius: 10rem; width: 100%; height: calc(2em + 1.3rem + 1.7px);padding: 0.375rem 0.75rem; background-color: #fff; color: #6e707e;border: 1px solid #d1d3e2;" name="zona" required id="zona" onchange="actualizarDatos();">
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
                                        <input step="0.01" type="number" class="form-control form-control-user" id="precio" placeholder="Precio" name="precio" value="<?= old('precio') ?>" required>
                                        <p class="text-danger"> <?= session('errors.precio') ?> </p>
                                    </div>

                                    <div class="form-group row">

                                       
                                        <div class="custom-control custom-checkbox small" style="margin-top: 15px; margin-left: 17px;">
                                            <input type="checkbox" name="indfManiana" class="custom-control-input" id="indfManiana" onchange="comprobarHoraManiana();">
                                            <label class="custom-control-label" style="padding-bottom: 20px;" for="indfManiana"> Hora de mañana </label>
                                        </div>
                                          
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <input type="time" min="00:00" max="24:59" class="form-control form-control-user" id="horaDesdeManiana" name="horaDesdeManiana">
                                            <p class="text-danger"> <?= session('errors.horaDesdeMañana') ?></p>
                                        </div>
                            
                                        <div class="col-sm-4">
                                            <input type="time" min="00:00" max="24:59" class="form-control form-control-user" id="horaHastaManiana" name="horaHastaManiana">
                                            <p class="text-danger"> <?= session('errors.horaHastaMañana') ?></p>
                                
                                        </div>

                                

                                        <div class="custom-control custom-checkbox small" style="margin-top: 15px; margin-left: 17px;">
                                            <input type="checkbox" name="indfTarde" class="custom-control-input" id="indfTarde" onchange="comprobarHoraTarde();">
                                            <label class="custom-control-label" style="padding-bottom: 20px;" for="indfTarde"> Hora de Tarde   </label>
                                        </div>

                                        <div class="col-sm-4 mb-3 mb-sm-0" style="margin-left: 1rem;">
                                            <input type="time" min="01:00" max="24:59" class="form-control form-control-user" id="horaDesdeTarde" name="horaDesdeTarde">
                                            <p class="text-danger"> <?= session('errors.horaDesdeTarde') ?></p>
                                        </div>
                                        <div class="col-sm-4" style="margin-left: .1rem;">
                                            <input type="time" min="01:00" max="24:59" class="form-control form-control-user" id="horaHastaTarde" name="horaHastaTarde">
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

<script type="text/javascript">
    function actualizarDatos() {
        var select = document.getElementById('zona');
        let zonas = <?= json_encode($zonas) ?>;
        let checkManiana =  document.getElementById("indfManiana");
        let checkTarde =  document.getElementById("indfTarde");
        
        for (var i = 0; i < zonas.length; i++) {
            if (zonas[i]['id_zona'] == select.selectedIndex) {
                document.getElementById("precio").value = zonas[i]['costo_hora'];
                if (zonas[i]['horario_pago_mañana'] != null) {
                    let horas = zonas[i]['horario_pago_mañana'].split("-");
                    verificarCheck(checkManiana);
                    document.getElementById("horaDesdeManiana").value = horas[0];
                    document.getElementById("horaHastaManiana").value = horas[1];
                } else {
                    presionar(checkManiana);
                    document.getElementById("horaDesdeManiana").value = '00:00';
                    document.getElementById("horaHastaManiana").value = '00:00';
                }
                if (zonas[i]['horario_pago_tarde'] != null) {
                    horas = zonas[i]['horario_pago_tarde'].split("-");
                    verificarCheck(checkTarde);
                    document.getElementById("horaDesdeTarde").value = horas[0];
                    document.getElementById("horaHastaTarde").value = horas[1];
                } else {
                    presionar(checkTarde);
                    document.getElementById("horaDesdeTarde").value = '00:00';
                    document.getElementById("horaHastaTarde").value = '00:00';
                }
                return 0;
            }
        }
    }

    function verificarCheck(check){
        if(check.checked){
            check.click();
        }
    }

    function presionar (check){
        if(!check.checked){
            check.click();
        }
    }

    function comprobarHoraManiana(){
        document.getElementById("horaDesdeManiana").readOnly = document.getElementById("indfManiana").checked;
        document.getElementById("horaHastaManiana").readOnly = document.getElementById("indfManiana").checked;
    }

    function comprobarHoraTarde(){
        document.getElementById("horaDesdeTarde").readOnly = document.getElementById("indfTarde").checked;
        document.getElementById("horaHastaTarde").readOnly = document.getElementById("indfTarde").checked;
    }


</script>