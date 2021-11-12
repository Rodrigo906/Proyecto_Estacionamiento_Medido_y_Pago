<!-- Mejorar el aspecto de esta ventana luego -->
<html>
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Error 404 </title>
  <link href="<?= base_url('assets/css/style_404.css') ?>" rel="stylesheet" type="text/css" media="all">
  </head>

    <body> 

    <h1> Lo sentimos, pagina no encontrada </h1>

       
        <p class="zoom-area"> <?= $mensaje ?> </p> 
         
        <section class="error-container">
        
        <span class="four"><span class="screen-reader-text">4</span></span>
        <span class="zero"><span class="screen-reader-text">0</span></span>
        <span class="four"><span class="screen-reader-text">4</span></span>
        
        </section>

        <div class="link-container">
        <a href="<?= $volver ?>" class="more-link"> Volver </a>
        </div>



    </body>

</html>