<div class="card-header py-3">
    <h4 class="m-0 font-weight-bold text-primary"> <?= $titulo ?> </h4>
</div>

<?php if (session()->get('msg')) : ?>
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong><?= session()->getFlashdata('msg') ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<div class="contenedor_tabla" style="margin: 20px;">

    <table class=" table table-striped table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col"> Id </th>
                <th scope="col"> Patente </th>
                <th scope="col"> Fecha </th>
                <th scope="col"> Monto </th>
                <th scope="col"> Opción </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($estadias as $estadia) {
            ?>
                <tr class="text-center">
                    <td> <?php echo $estadia['id_estadia'] ?> </td>
                    <td> <?php echo $estadia['patente'] ?> </td>
                    <td> <?php echo $estadia['fecha'] ?> </td>
                    <td> <?php echo $estadia['precio'] ?> </td>
                    <td>
                        <a href="pagar-estadias-pendientes" data-toggle="tooltip" title="Pagar" class="btn btn-success btn-sm">
                            <i class="fas fa-dollar-sign" style="font-size: .8rem"></i>
                        </a>
                    </td>
                </tr>
            <?php };
            ?>
        </tbody>
    </table>
</div>