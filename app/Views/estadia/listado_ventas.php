<div class="card-header py-3">
    <h4 class="m-0 font-weight-bold text-primary"> <?= $titulo ?> </h4>
</div>

<div class="contenedor_tabla" style="margin: 20px;">

    <table class=" table table-striped table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col"> Patente </th>
                <th scope="col"> Marca </th>
                <th scope="col"> fecha </th>
                <th scope="col"> Monto </th>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($ventas as $ventas) {
            ?>
                <tr class="text-center">
                    <td> <?php echo $ventas['patente'] ?> </td>
                    <td> <?php echo $ventas['marca'] ?> </td>
                    <td> <?php echo $ventas['fecha'] ?> </td>
                    <td> <?php echo $ventas['precio'] ?> </td>
                </tr>
            <?php };
            ?>
        </tbody>
    </table>
</div>