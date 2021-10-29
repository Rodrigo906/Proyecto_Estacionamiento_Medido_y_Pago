   <div class="container">

       <div class="card o-hidden border-0 shadow-lg my-5">
           <div class="card-body p-0 ">
               <!-- Nested Row within Card Body -->
               <div class="row justify-content-center">
                   <div class="col-lg-7">
                       <div class="p-5">
                           <div class="text-center">
                               <h1 class="h4 text-gray-900 mb-4"> <?= $subtitulo ?> </h1>
                           </div>

                           <form class="user" method="POST" action="<?= base_url('User_controller/registrarUsuario') ?>">
                               <div class="form-group row">
                                   <div class="col-sm-6 mb-3 mb-sm-0">
                                       <input type="text" class="form-control form-control-user" id="nombre" placeholder="Nombre" name="nombre" required>
                                   </div>
                                   <div class="col-sm-6">
                                       <input type="text" class="form-control form-control-user" id="apellido" placeholder="Apellido" name="apellido" required>
                                   </div>
                               </div>

                               <div class="form-group">
                                   <input type="text" class="form-control form-control-user" id="dni" placeholder="Dni" name="dni" required>
                               </div>


                               <div class="form-group row">
                                   <div class="col-sm-5 mb-4 mb-sm-0">
                                       <label class="classLabel" style="margin-top: 7%; margin-left: 6%">Fecha de nacimiento</label>
                                   </div>
                                   <div class="col-sm-7">
                                       <input type="date" class="form-control form-control-user" id="fechaNacimiento" name="fecha_nacimiento">
                                   </div>
                               </div>

                               <div class="form-group">
                                   <input type="text" class="form-control form-control-user" id="username" placeholder="Nombre de usuario" name="username" required>
                               </div>

                               <div class="form-group row">
                                   <div class="col-sm-6 mb-3 mb-sm-1">
                                       <select class="classSelect" style="font-size: .8rem;border-radius: 10rem;width: 100%;height: calc(2em + 1.3rem + 1.7px);padding: 0.375rem 0.75rem;background-color: #fff;color: #6e707e;border: 1px solid #d1d3e2;" name="rol" required>
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
                                   <input type="email" class="form-control form-control-user" id="email" placeholder="Email" name="email" required>
                               </div>

                               <div class="form-group row">
                                   <div class="col-sm-6 mb-3 mb-sm-0">
                                       <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña" name="contraseña" required>
                                   </div>
                                   <div class="col-sm-6">
                                       <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Confirmar contraseña" name="confirmarContraseña" required>
                                   </div>
                               </div>

                               <button class="btn btn-primary btn-user btn-block" type="submit">
                                   Guardar
                               </button>
                               <hr>
                               <a href="index" class="btn btn-google btn-user btn-block">
                                   Cancelar
                               </a>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>

   </div>