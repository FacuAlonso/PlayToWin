<?php 
    require_once '../auxPHP/database.php'; 
    require_once '../auxPHP/header.php';
    require_once 'auxAPanel/lstPresets.php'; 

    function mostrarPagina(){
        $infoEvento = buscaEvento($_GET['id']);

        if($infoEvento[0] === NULL){
            header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . "/404.html");
            die;
        }

        $nomEvento = $infoEvento[0]["nomEvento"];
        $fechaFinal = $infoEvento[0]["fechaFinal"];
        $idEvento = $infoEvento[0]["id"];
        $descripcion = $infoEvento[0]["descEvento"];
        $reglas = $infoEvento[0]["reglasEvento"];
        $presets = genlstPresetsEdit($infoEvento[0]["preset"]);
        $head = genHeaderAdmin("Editar evento | Admin Panel","../css/edit.css",NULL); //Titulo,CSS,JS
        $body = <<<BODY
        <body>
        <div id="encabezado">
            <a href="../home.php" id="logo"><img id="logo" src="../assets/playtowinICONO.png"></a>
            <div id="header-div1">
                <h1 class="titulo">EDITAR EVENTO</h1>
                <button id="bot-cancel" onclick="window.location.href = 'dashboard.php';">CANCELAR EDICIÓN</button>
            </div>
            <a href="../auxPHP/cerrarsesion.php" id="logoutDiv"><img id="logout-icono" src="../assets/logoutIcon.svg">
            <p class="cerrarsesion">CERRAR SESIÓN</p></a>
            </div>
            <div id="cont-eventos">
            <form action="cargaDatosAdmin/editEvento.php" method="post" class="box-evento">
                <h1 class="titulo">INTRODUCE LOS DETALLES DEL EVENTO</h1>
                <label for="nom01" class="datos-titulo">Selecciona el preset de juego del evento:</label>
                <select name="preset" id="selecJuego">
                $presets
                </select>
                <label for="nom01" class="datos-titulo">Título del evento:</label>
                <input type="text" class="datos-caja" name="nombre" id="nom01" value="$nomEvento"/>
                <label for="ape01" class="datos-titulo">Descripción:</label>
                <textarea class="datos-caja" name="desc">$descripcion</textarea>
                <label for="nom01" class="datos-titulo">Reglas:</label>
                <textarea class="datos-caja" name="reglas">$reglas</textarea>
                <label for="nom01" class="datos-titulo">Fecha de finalización:</label>
                <input type="datetime-local" class="fecha" name="fecha" value="$fechaFinal"/>
                <input type="text" class="no-mostrar" value="$idEvento" name="id">
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