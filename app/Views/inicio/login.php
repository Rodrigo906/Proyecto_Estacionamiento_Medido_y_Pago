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
    <p class="text-danger"> <?= session('errors.username') ?> </p>

    <p>Contraseña</p>
    <input type="text" name="contraseña">
    <p class="text-danger"> <?= session('errors.contraseña') ?> </p>
    <p class="text-danger"> <?= session('contraseña') ?> </p>
    <button type="submit"> Ingresar </button>

</form>
</div>

