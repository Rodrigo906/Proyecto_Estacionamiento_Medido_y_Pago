<div class="card-header py-3">
    <h4 class="m-0 font-weight-bold text-primary"> <?= $titulo?> </h4>
</div>

<div class="contenedor_tabla" style="margin: 20px;">

    <table class=" table table-striped table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col"> N° estadia </th>
                <th scope="col"> Patente </th>
                <th scope="col"> Marca </th>
                <th scope="col"> Modelo </th>
                <th scope="col"> Zona </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($estadias as $estadia) {
            ?>
                <tr class="text-center">
                    <td> <?php echo $estadia['id_estadia'] ?> </td>
                    <td> <?php echo $estadia['patente'] ?> </td>
                    <td> <?php echo $estadia['marca'] ?> </td>
                    <td> <?php echo $estadia['modelo'] ?> </td>
                    <td> <?php echo $estadia['nombre_zona'] ?> </td>
                </tr>
            <?php };
            ?>
        </tbody>
    </table>
</div>