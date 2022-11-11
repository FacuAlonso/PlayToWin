<?php 
    require_once '../database.php'; 
    require_once '../header.php';
    require_once 'tarjetasAdmin.php';
    $head = genHeader("Dashboard | Admin Panel","dashboard.css",NULL); //Titulo,CSS,JS
    $tarjetas = genTarjetasAdmin(); // Función de tarjetasAdmin.php
    $body = <<<BODY
    <body>
    <div id="encabezado">
        <a href="../home.php" id="logo"><img id="logo" src="../assets/playtowinICONO.png"></a>
        <div id="header-div1">
            <h1 class="titulo">PANEL DE CONTROL DE ADMINISTRADOR</h1>
            <button id="bot-new" onclick="window.location.href = 'new.html';">+ AÑADIR EVENTO</button>
            <button id="bot-presets" onclick="window.location.href = 'presets.html';">MENÚ DE PRESETS</button>
        </div>
        <a href="../login.html" id="logoutDiv"><img id="logout-icono" src="../assets/logoutIcon.svg">
        <p class="cerrarsesion">CERRAR SESIÓN</p></a>
    </div>
    <div id="cont-eventos">
    $tarjetas
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