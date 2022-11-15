<?php 
    require_once '../database.php'; 
    require_once '../header.php';
    require_once 'lstPresets.php'; 
    require_once 'tarjetasPresets.php'; 
    $tarjetas = genTarjetasPresets();
    
    $head = genHeader("Presets | Admin Panel","presets.css","Javapresets"); //Titulo,CSS,JS
    $body = <<<BODY
    <body>
    <div id="encabezado">
        <a href="../home.php" id="logo"><img id="logo" src="../assets/playtowinICONO.png"></a>
        <div id="header-div1">
            <h1 class="titulo">MENÚ DE PRESETS DE EVENTOS</h1>
            <button id="bot-new" onclick="abrir('popup-caja')">+ AÑADIR PRESET</button>
            <button id="bot-presets" onclick="window.location.href = 'dashboard.php';">REGRESAR AL ADMIN PANEL</button>
        </div>
        <a href="../login.php" id="logoutDiv"><img id="logout-icono" src="../assets/logoutIcon.svg">
        <p class="cerrarsesion">CERRAR SESIÓN</p></a>
    </div>
    
    <div id="cont-eventos">
        <div class="overlay visibilidad-oculta" id="popup-caja">
            <div class="popup">
                <h1 id="titulo-popup">Participa:</h1>
                <form onsubmit="return validardatos('Datos', 'nom01', 'datos01')" name="Datos" id="Datos-forms"  method="post">
                    <div class="contenedor-input" name="001" id="nom02">
                        <label for="nom01" class="dato-input">Nombre del juego:</label>
                        <input type="email" class="caja-input"  name="nom01" placeholder="Valorant, Clash Royale...">
                        <label for="datos01" class="dato-input">Imagen:</label>
                        <input type="file" class="caja-input" name="datos01" id="imagen-popup" placeholder="url">
                    </div>
                    <input type="submit"  name= 'hola' class="boton-popup" value="Enviar">
                </form>
                <button class="boton-popup" id="cerrar" onclick="cerrar('popup-caja')">Cerrar</button>
            </div>
        </div>
        <div id="caja-preset-cont">
            $tarjetas
        </div>
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
