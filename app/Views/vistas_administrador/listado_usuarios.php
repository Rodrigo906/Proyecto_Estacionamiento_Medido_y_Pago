<html>

    <!-- SOLO PARA PRUEBAS (Luego lo completamos con la tabla real) -->

    <head>

    </head>

    <body>

        <h1> Listado de usuarios </h1>
 
        <?php  foreach ($usuarios as $usuario): ?>
            <?= $usuario['username'] . "--" . $usuario['apellido'] . "--" . $usuario['rol'] . "<br>" ?>
        <?php endforeach?>

    </body>

</html>