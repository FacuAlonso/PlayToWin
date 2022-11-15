<?php 
    require_once '../database.php'; 
    require_once '../header.php';
    require_once 'tarjetasResultados.php';
    $tarjetas = genTarjetasResultados($_GET['id']);
    $head = genHeader("Publicar resultados | Admin Panel","publish.css",NULL); //Titulo,CSS,JS

    $body = <<<BODY
    <body>
    <div id="encabezado">
        <a href="../home.php" id="logo"><img id="logo" src="../assets/playtowinICONO.png"></a>
        <div id="header-div1">
            <h1 class="titulo">PUBLICAR RESULTADOS</h1>
            <button id="bot-cancel" onclick="window.location.href = 'dashboard.php';">CANCELAR (REGRESAR)</button>
        </div>
        <a href="../login.php" id="logoutDiv"><img id="logout-icono" src="../assets/logoutIcon.svg">
        <p class="cerrarsesion">CERRAR SESIÓN</p></a>
    </div>
    <div id="cont-eventos">
        <form action="" method="get" class="box-evento">
            <h1 class="titulo">SELECCIONA LOS GANADORES DEL EVENTO</h1>
            <input type="submit" class="boton-publicarRes" value="PUBLICAR RESULTADOS" id="boton-submit">
            $tarjetas
        </form>
    </div>
    </body>
    BODY;

    $sitio = <<<SITIO
    <!DOCTYPE html>
    <html lang="es">
        $head
        $body
    </html>
    SITIO;

    print($sitio);
?>
