   <div class="container">

       <div class="card o-hidden border-0 shadow-lg my-1" style="margin: -2%;">
           <div class="card-body p-0 ">
               <!-- Nested Row within Card Body -->
               <div class="row justify-content-center">
                   <div class="col-lg-7">
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

                               <div class="form-group">
                                   <input type="number" class="form-control form-control-user" id="dni" placeholder="Dni" name="dni" value="<?= old('dni') ?>" required>
                                   <p class="text-danger"> <?= session('errors.dni') ?> </p>
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
                                   <input type="text" class="form-control form-control-user" id="username" placeholder="Nombre de usuario" name="username" value="<?= old('username') ?>" required>
                                   <p class="text-danger"> <?= session('errors.username') ?> </p>
                               </div>


                               <div class="form-group row">
                                   <div class="col-sm-6 mb-3 mb-sm-1">
                                       <select class="form-control" style="font-size: .8rem; border-radius: 10rem; width: 100%; height: calc(2em + 1.3rem + 1.7px);padding: 0.375rem 0.75rem; background-color: #fff; color: #6e707e;border: 1px solid #d1d3e2;" name="rol" required>
                                           <option value="" disabled selected>Seleccione un rol</option>
                                           <?php

                                            foreach ($roles as $rol) {
                                            ?>
                                               <option value='<?php echo $rol['id_rol'] ?>'>
                                                   <?php echo $rol['nombre'] ?> </option>
                                           <?php };
                                            ?>
                                       </select>
                                   </div>
                               </div>


                               <div class="form-group">
                                   <input type="email" class="form-control form-control-user" id="email" placeholder="Email" name="email" value="<?= old('email') ?>" required>
                                   <p class="text-danger"> <?= session('errors.email') ?> </p>
                               </div>

                               <div class="form-group row">
                                   <div class="col-sm-6 mb-3 mb-sm-0">
                                       <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña" name="contraseña" value="<?= old('contraseña') ?>" required>
                                       <p class="text-danger"> <?= session('errors.contraseña') ?> </p>
                                   </div>
                                   <div class="col-sm-6">
                                       <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Confirmar contraseña" name="confirmarContraseña" required>
                                   </div>
                               </div>

                               <button class="btn btn-primary btn-user btn-block" type="submit" id="boton_aceptar">
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