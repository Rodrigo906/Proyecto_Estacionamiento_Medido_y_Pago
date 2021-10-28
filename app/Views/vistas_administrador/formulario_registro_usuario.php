<html>

<!-- Aqui va el formulario de registro del administrador-->

<head>

</head>

<body>
    <h1> Formulario </h1>

    <form method="POST" action="<?= base_url('User_controller/registrarUsuario') ?>">
        <input type="text" name="valor1">
        <input type="text" name="valor2">
        <button> Enviar </button>
    </form>

</body>

</html>