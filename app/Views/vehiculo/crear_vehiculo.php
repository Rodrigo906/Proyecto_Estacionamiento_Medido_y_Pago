 <div class="container">

    <div class=" <?= session('mensajes.tipo'); ?> alert-success" role="alert" style="margin-top: 8px;" >   
        <p> <?= session('mensajes.exito'); ?> </p>   
    </div>

       <div class="card o-hidden border-0 shadow-lg my-3">
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
                                
                               <div class="form-group justifity-center">
                     
                                <button class="btn btn-primary btn-user btn-block" type="submit" style="width: 420px; margin: auto;">
                                   Guardar
                               </button>
                            
                               </div>

                              

                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>

   </div>
