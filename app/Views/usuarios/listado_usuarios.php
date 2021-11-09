<?php if (session()->get('msg')) : ?>
    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
        <strong><?= session()->getFlashdata('msg') ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<div class="card-header py-3">
    <h4 class="m-0 font-weight-bold text-primary">Usuarios</h4>
</div>
<div class="contenedor_tabla" style="margin: 20px;">

    <div class="content-icono">

        <a href="<?= base_url('alta-usuario') ?>" data-toggle="tooltip" title="Agregar">


            <i class="bi bi-plus-circle-fill" style="font-size: 2rem;"></i>
        </a>

    </div>

    <table class=" table table-striped table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col"> Nombre </th>
                <th scope="col"> Apellido </th>
                <th scope="col"> Username </th>
                <th scope="col"> DNI </th>
                <th scope="col"> Email </th>
                <th scope="col"> Rol </th>
                <th scope="col"> Opciones </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($usuarios as $usuario) {
            ?>
                <tr class="text-center">
                    <td> <?php echo $usuario['nombre'] ?> </td>
                    <td> <?php echo $usuario['apellido'] ?> </td>
                    <td> <?php echo $usuario['username'] ?> </td>
                    <td> <?php echo $usuario['dni'] ?> </td>
                    <td> <?php echo $usuario['email'] ?> </td>
                    <td> <?php echo $usuario['rol'] ?> </td>
                    <td>
                    <a onclick="return confirm('¿Realmente desea eliminar al usuario <?= $usuario['username']?>?')" href="<?= base_url('eliminar/' . $usuario['id_usuario']) ?>" data-toggle="tooltip" title="Eliminar" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash-fill" style="font-size: .8rem"></i>
                    </a>

                        <a href="<?= base_url('actualizar-usuario/'.$usuario['id_usuario']) ?>" data-toggle="tooltip" title="Editar" class="btn btn-info btn-sm">
                            <i class="bi bi-pencil-square" style="font-size: .8rem"></i>
                        </a>

                    </td>
                </tr>
            <?php };
            ?>
        </tbody>
    </table>
</div>
