 <div class="container">
       <div class="card o-hidden border-0 shadow-lg my-5">
           <div class="card-body p-4 ">
               <!-- Nested Row within Card Body -->
               <div class="row justify-content-center">
                   <div class="col-lg-10">
                       <div class="p-10">
                           <div class="text-center">
                               <h1 class="h4 text-gray-900 mb-4"> <?= $subtitulo ?> </h1>
                           </div>

                           <form class="user" method="POST" action="<?= base_url('Vehiculo_controller/registrarVehiculo') ?>">
                               <div class="form-group row justify-content-center">
                                   <div class="col-sm-6 mb-3 mb-sm-0">
                                       <input type="text" class="form-control form-control-user" id="patente" placeholder="Patente" name="patente" required>
                                   </div>
                               </div>

                               <div class="form-group row justify-content-center">
                                   <div class="col-sm-6 mb-3 mb-sm-0">
                                       <input type="text" class="form-control form-control-user" id="marca" placeholder="Marca" name="marca" required>
                                   </div>
                               </div>

                               <div class="form-group row justify-content-center">
                                   <div class="col-sm-6 mb-3 mb-sm-0">
                                       <input type="text" class="form-control form-control-user" id="modelo" placeholder="Modelo" name="modelo" required>
                                   </div>
                               </div>

                               <div class="form-group row justify-content-center">
                         
                                   <div class="col-sm-10 mb-10  mb-sm-5 text-center">
                                   <button class="btn btn-primary btn-user btn-lg" type="submit" style="margin: 3% 5%; width: 160px;">
                                           Guardar
                                    </button>
                                    
                                       <a href="<?= base_url('Inicio_controller') ?>" class="btn btn-google btn-user btn-lg" style="margin: 3% 5%; width: 160px;">
                                           Cancelar
                                       </a>
                                   </div>
                    
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>

   </div>
