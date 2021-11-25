<div class="card-header py-3">
    <h4 class="m-0 font-weight-bold text-primary">Infracciones</h4>
</div>
<div class="contenedor_tabla" style="margin: 20px;">

    <table class=" table table-striped table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col"> Patente </th>
                <th scope="col"> Fecha </th>
                <th scope="col"> Zona </th>
                <th scope="col"> Direccion </th>
                <th scope="col"> Motivo </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($infracciones as $infraccion) {
            ?>
                <tr class="text-center">
                    <td> <?php echo $infraccion['patente'] ?> </td>
                    <td> <?php echo $infraccion['fecha'] ?> </td>
                    <td> <?php echo $infraccion['nombre_zona'] ?> </td>
                    <td> <?php echo $infraccion['direccion'] ?> </td>
                    <td> <?php echo $infraccion['motivo'] ?> </td>
                </tr>
            <?php };
            ?>
        </tbody>
    </table>
</div>