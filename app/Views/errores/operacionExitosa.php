<!-- Mejorar el aspecto de esta ventana luego -->
<html>

  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Error 404 </title>
  <link href="<?= base_url('assets/css/style_404.css') ?>" rel="stylesheet" type="text/css" media="all">
  </head>

    <body>
    
            <h1> ¡Operación exitosa! </h1>
            
            <p style="text-align: center;"> <?= $mensaje ?> </p>
            <section class="error-container">
            <img center height="150" width="150" src="<?= base_url('assets/img/icon-check.png')?>"> 
            </section>

            <div class="link-container" style="margin-top: -50px;">
            <a href="<?=  $_SERVER['HTTP_REFERER'] ?>" class="more-link"> Volver </a>
            </div>
       

    </body>


</html>