<!-- DataTable User -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Nombre</th>
                        <th>Apellido</th>

                        <th>Email</th>
                        <th>dni</th>
                        <th>Fecha de nacimiento</th>
                        <th>Opciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <tr>
                            <td> <?= $usuario['username'] ?> </td>
                            <td> <?= $usuario['nombre'] ?> </td>
                            <td> <?= $usuario['apellido'] ?> </td>

                            <td> <?= $usuario['email'] ?> </td>
                            <td> <?= $usuario['dni'] ?> </td>
                            <td> <?= $usuario['fecha_nacimiento'] ?> </td>
                            <td>Editar / Eliminar</td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>