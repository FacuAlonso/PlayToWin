<?php 
    require_once '../auxPHP/database.php'; 
    require_once '../auxPHP/header.php';
    require_once 'auxAPanel/lstPresets.php';

    function mostrarPagina(){

        $presets = genlstPresets();
        
        $head = genHeaderAdmin("Crear evento | Admin Panel","../css/new.css",NULL); //Titulo,CSS,JS
        $body = <<<BODY
        <body>
        <div id="encabezado">
            <a href="../home.php" id="logo"><img id="logo" src="../assets/playtowinICONO.png"></a>
            <div id="header-div1">
                <h1 class="titulo">CREAR UN NUEVO EVENTO</h1>
                <button id="bot-cancel" onclick="window.location.href = 'dashboard.php';">CANCELAR CREACIÓN</button>
            </div>
            <a href="../auxPHP/cerrarsesion.php" id="logoutDiv"><img id="logout-icono" src="../assets/logoutIcon.svg">
            <p class="cerrarsesion">CERRAR SESIÓN</p></a>
            </div>
            <div id="cont-eventos">
            <form action="cargaDatosAdmin\insertEvento.php" method="post" class="box-evento">
                <h1 class="titulo">INTRODUCE LOS DETALLES DEL EVENTO</h1>
                <label for="nom01" class="datos-titulo">Selecciona el preset de juego del evento:</label>
                <select name="preset" id="selecJuego">
                $presets
                </select>
                <label for="nom01" class="datos-titulo">Título del evento:</label>
                <input type="text" class="datos-caja" name="nombre" id="nom01" placeholder="Ej.: Obtén la mayor cantidad de kills"/>
                <label for="ape01" class="datos-titulo">Descripción:</label>
                <textarea class="datos-caja" name="desc" placeholder="Ingresa la descripción del evento"></textarea>
                <label for="nom01" class="datos-titulo">Reglas:</label>
                <textarea class="datos-caja" name="reglas" placeholder="Ingresa las reglas del evento"></textarea>
                <label for="nom01" class="datos-titulo">Fecha de finalización:</label>
                <input type="datetime-local" class="fecha" name="fecha"/>
                <input type="submit" class="boton-publicarRes" value="PUBLICAR EVENTO" id="boton-submit">
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
