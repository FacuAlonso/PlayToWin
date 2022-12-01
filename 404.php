<?php
    $sitio = <<<SITIO
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <link href="css/404.css" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="assets\JoystickFAVICON64.png">
        <title>404 | PlayToWin</title>
    </head>
    <body>
        <a href="home.php" id="encabezado"><img id="logo" src="assets\playtowinICONO.png"></a>
        <div id="contenedor">
            <p class="titulo1"><b>404</b></p>
            <p class="titulo2">Oops... No pudimos encontrar lo que estabas buscando 😢</p>
        </div>
    </body>
    </html>
    SITIO;
    print($sitio);
?>