<!-- Login de prueba -->
<head>

<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>">
</script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>">
</script>

</head>
<body> 
<div>   
<form method="POST" action="<?= base_url('Inicio_controller/loguear') ?> ">

    <h1>Loging</h1>
    <p>Username</p>
    <input type="text" name="username"> 
    <p>Contraseña</p>
    <input type="text" name="contraseña">
    <button type="submit"> Ingresar </button>

</form>
</div>

