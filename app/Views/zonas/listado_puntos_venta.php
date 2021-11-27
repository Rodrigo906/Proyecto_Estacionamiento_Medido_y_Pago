<div class="card-header py-3">
    <h4 class="m-0 font-weight-bold text-primary"> <?= $subtitulo ?> </h4>
</div>
<div class="contenedor_tabla" style="margin: 20px;">

    <table class=" table table-striped table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col"> Comercio </th>
                <th scope="col"> Direccion </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($puntos_venta as $p_venta) {
            ?>
                <tr class="text-center">
                    <td> <?php echo $p_venta['nombre'] ?> </td>
                    <td> <?php echo $p_venta['direccion'] ?> </td>
                </tr>
            <?php };
            ?>
        </tbody>
    </table>
</div>