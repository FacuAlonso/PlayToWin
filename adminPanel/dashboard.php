<?php 
    require_once '../auxPHP/database.php'; 
    require_once '../auxPHP/header.php';
    require_once 'auxAPanel/tarjetasAdmin.php';
    function mostrarPagina(){
        $head = genHeaderAdmin("Dashboard | Admin Panel","../css/dashboard.css",NULL); //Titulo,CSS,JS
        $tarjetas = genTarjetasAdmin(); // Función de tarjetasAdmin.php
        $tarjetasFinalizados = genTarjetasAdminFin();

        if ($tarjetasFinalizados == ""){
            $tituloFin = "";
        } else{
            $tituloFin = <<<TITULO
            <h1 class="titulo">Eventos finalizados:</h1>
            TITULO;
        }

        $body = <<<BODY
        <body>
        <div id="encabezado">
            <a href="../home.php" id="logo"><img id="logo" src="../assets/playtowinICONO.png"></a>
            <div id="header-div1">
                <h1 class="titulo">PANEL DE CONTROL DE ADMINISTRADOR</h1>
                <div id="sub-header-div1">
                    <button id="bot-new" onclick="window.location.href = 'new.php';">+ AÑADIR EVENTO</button>
                    <button id="bot-presets" onclick="window.location.href = 'presets.php';">MENÚ DE PRESETS</button>
                </div>
            </div>
            <a href="../auxPHP/cerrarsesion.php" id="logoutDiv"><img id="logout-icono" src="../assets/logoutIcon.svg">
            <p class="cerrarsesion">CERRAR SESIÓN</p></a>
        </div>
        <div id="cont-eventos">
        $tarjetas
        $tituloFin
        $tarjetasFinalizados
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