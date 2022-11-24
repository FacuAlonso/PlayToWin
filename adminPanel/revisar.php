<?php 
    require_once '../auxPHP/database.php'; 
    require_once '../auxPHP/header.php';
    require_once 'auxAPanel/tarjetasResultados.php';

    function mostrarPagina(){

        $head = genHeaderAdmin("Revisar resultados | Admin Panel","../css/revisar.css",NULL); //Titulo,CSS,JS
        $tarjetas = genTarjetasResultados($_GET['id']);
        $nomEvento = buscaEvento($_GET['id'])[0]['nomEvento'];

        if($tarjetas==""){
            $tarjetas = "<p class='titulo'>No hay participaciones válidas en este momento</p>";
        }

        $body = <<<BODY
        <body>
        <div id="encabezado">
            <a href="../home.php" id="logo"><img id="logo" src="../assets/playtowinICONO.png"></a>
            <div id="header-div1">
                <h1 class="titulo">REVISAR RESULTADOS</h1>
                <button id="bot-cancel" onclick="window.location.href = 'dashboard.php';">CANCELAR (REGRESAR)</button>
            </div>
            <a href="../auxPHP/cerrarsesion.php" id="logoutDiv"><img id="logout-icono" src="../assets/logoutIcon.svg">
            <p class="cerrarsesion">CERRAR SESIÓN</p></a>
        </div>
        <div id="cont-eventos">
            <p class="titulo">REVISAR LAS PARTICIPACIONES DEL EVENTO</p>
            <p class="titulo">$nomEvento</p>
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
                header("Location: ../../home.php");
            }
        }
        else{
            header("Location: ../../login.php");
        }
        mostrarPagina();
    }
    main();
?>
