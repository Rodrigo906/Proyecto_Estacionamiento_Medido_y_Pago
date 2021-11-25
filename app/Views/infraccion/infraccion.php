   <div class="container">

       <div class="card o-hidden border-0 shadow-lg my-1" style="margin: -2%;">
           <div class="card-body p-0 ">
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
                               <h1 class="h4 text-gray-900 mb-4"> <?= $subtitulo ?> </h1>
                           </div>

                           <form class="user" method="POST" action="<?= base_url('alta-infraccion') ?>">

                               <div class="form-group">
                                   <input type="text" class="form-control form-control-user" id="patente" placeholder="Patente" name="patente" value="<?= old('patente') ?>" required>
                                   <p class="text-danger"> <?= session('errors.patente') ?> </p>
                               </div>

                               <div class="form-group">
                                   <select class="form-control" style="font-size: .8rem; border-radius: 10rem; width: 100%; height: calc(2em + 1.3rem + 1.7px);padding: 0.375rem 0.75rem; background-color: #fff; color: #6e707e;border: 1px solid #d1d3e2;" name="zona" required>
                                       <option value="" disabled selected>Seleccione una zona</option>
                                       <?php

                                        foreach ($zonas as $zona) {
                                        ?>
                                           <option value='<?php echo $zona['id_zona'] ?>'>
                                               <?php echo $zona['nombre_zona'] ?> </option>
                                       <?php };
                                        ?>
                                   </select>
                               </div>

                               <div class="form-group">
                                   <input type="text" class="form-control form-control-user" id="direccion" placeholder="Dirección" name="direccion" value="<?= old('direccion') ?>" required>
                                   <p class="text-danger"> <?= session('errors.direccion') ?> </p>
                               </div>

                               <div class="form-group">
                                   <input type="text" class="form-control form-control-user" id="motivo" placeholder="Motivo" name="motivo" value="<?= old('motivo') ?>" required>
                                   <p class="text-danger"> <?= session('errors.motivo') ?> </p>
                               </div>

                               <div class="form-group row">
                                   <div class="col-sm-4 mb-4 mb-sm-0">
                                       <label style="margin-top: .9rem; margin-left: .9rem">
                                           Fecha
                                       </label>
                                   </div>
                                   <div class="col-sm-8">
                                       <input type="datetime-local" class="form-control form-control-user" id="fecha" name="fecha" value="<?= old('fecha') ?>" required>
                                       <p class="text-danger"> <?= session('errors.fecha') ?> </p>
                                   </div>
                               </div>

                               <button class="btn btn-primary btn-user btn-block" type="submit" id="boton_aceptar">
                                   Guardar
                               </button>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>