<html>

    <!-- SOLO PARA PRUEBAS (Luego lo completamos con la tabla real) -->

    <head>

        <meta charset="UTF-8">
        <title> <?= $titulo ?> </title >
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


    </head>

    <body>


        <!--
        <h1> Listado de usuarios </h1>
 
        <?php  foreach ($usuarios as $usuario): ?>
            <?= $usuario['username'] . "--" . $usuario['apellido'] . "--" . $usuario['rol'] . "<br>" ?>
        <?php endforeach?>
        -->

        <div class="container justify-content-center" style="margin-left: 2%; color: blue;"> 
            <div class="modal-header justify-content-center" style="width: 1300px; margin-bottom: 50px; margin-right: 0;">
                <h1 class="modal-title fw-bold" id="tituloModal"> <?= $titulo ?> </h1>
            </div>
        </div>


        <div class="contenedor_tabla" style="margin: 50px;">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col"> Id </th>
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
                    <th scope="row"> <?php echo $usuario['id_usuario'] ?> </th>
                    <td> <?php echo $usuario['nombre'] ?> </td>
                    <td> <?php echo $usuario['apellido'] ?> </td>
                    <td> <?php echo $usuario['username'] ?> </td>
                    <td> <?php echo $usuario['dni'] ?> </td>
                    <td> <?php echo $usuario['email'] ?> </td>
                    <td> <?php echo $usuario['rol'] ?> </td>
                    <td> 
                     
                         <button type="button" class="btn btn-outline-danger" onclick="">
                                <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg> </i>
                         </button>

                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#Modal" onclick=""> 
                                <i> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg></i>       
                        </button>
                    </td>
            </tr>
                <?php };  
                ?>
            </tbody>
        </table>
    </div>

    </body>

</html>