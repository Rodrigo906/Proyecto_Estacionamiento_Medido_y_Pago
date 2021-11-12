<html>

  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Error </title>
  <link href="<?= base_url('assets/css/style_404.css') ?>" rel="stylesheet" type="text/css" media="all">
  </head>

    <body>
    
            <h1> <?= $titulo ?> </h1>
            
            <p style="text-align: center;"> <?= $mensaje ?> </p>

            <div class="link-container">
            <a href="<?=  $_SERVER['HTTP_REFERER'] ?>" class="more-link"> Volver </a>
            </div>
       

    </body>
