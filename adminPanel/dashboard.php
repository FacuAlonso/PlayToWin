<?php 
    require_once '../database.php'; 
    require_once '../header.php';
    require_once 'tarjetasAdmin.php';
    function mostrarPagina(){
        $head = genHeaderAdmin("Dashboard | Admin Panel","dashboard.css",NULL); //Titulo,CSS,JS
        $tarjetas = genTarjetasAdmin(); // Función de tarjetasAdmin.php
        $body = <<<BODY
        <body>
        <div id="encabezado">
            <a href="../home.php" id="logo"><img id="logo" src="../assets/playtowinICONO.png"></a>
            <div id="header-div1">
                <h1 class="titulo">PANEL DE CONTROL DE ADMINISTRADOR</h1>
                <button id="bot-new" onclick="window.location.href = 'new.php';">+ AÑADIR EVENTO</button>
                <button id="bot-presets" onclick="window.location.href = 'presets.php';">MENÚ DE PRESETS</button>
            </div>
            <a href="../cerrarsesion.php" id="logoutDiv"><img id="logout-icono" src="../assets/logoutIcon.svg">
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
    }

    function main(){
        session_start();
        if(isset($_SESSION['tipo'])){
            if($_SESSION['tipo']==0){
                header("Location: ../home.php");
            }
        }
        else{
            header("Location: ../login.php");
        }
        mostrarPagina();
    }
    main();
?>