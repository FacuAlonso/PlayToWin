<?php 
    require_once '../auxPHP/database.php'; 
    require_once '../auxPHP/header.php';
    require_once 'auxAPanel/lstPresets.php'; 
    require_once 'auxAPanel/tarjetasPresets.php'; 

    function mostrarPagina(){

        $tarjetas = genTarjetasPresets();
        
        $head = genHeaderAdmin("Presets | Admin Panel","../css/presets.css","../js/Javapresets.js"); //Titulo,CSS,JS
        $body = <<<BODY
        <body>
        <div id="encabezado">
            <a href="../home.php" id="logo"><img id="logo" src="../assets/playtowinICONO.png"></a>
            <div id="header-div1">
                <h1 class="titulo">MENÚ DE PRESETS DE EVENTOS</h1>
                <button id="bot-new" onclick="agregarClase('popup-caja', 'visibilidad')">+ AÑADIR PRESET</button>
                <button id="bot-presets" onclick="window.location.href = 'dashboard.php';">REGRESAR AL ADMIN PANEL</button>
            </div>
            <a href="../auxPHP/cerrarsesion.php" id="logoutDiv"><img id="logout-icono" src="../assets/logoutIcon.svg">
            <p class="cerrarsesion">CERRAR SESIÓN</p></a>
        </div>
        
        <div id="cont-eventos">
            <div class="overlay visibilidad-oculta" id="popup-caja"> 
                <div class="popup">
                    <h1 id="titulo-popup">Añadir un preset:</h1>
                    <div class="contenedor-input" name="001" id="nom02">
                    <form id="presets-form">
                        <label for="nom01" class="dato-input">Nombre del juego:</label>
                        <input type="text" class="caja-input" name="nombre" placeholder="Valorant, Clash Royale..."/>
                        <label for="datos01" class="dato-input">Imagen (Hasta 5 MB)</label>
                        <input type="file" class="caja-input" name="fileToUpload" id="fileToUpload" required/>
                        <input type="button" class="boton-popup" value="Enviar" onclick="loadContTextAjaxForm('cargaDatosAdmin/recibirdatos.php','presets-form')"/>
                    </form>
                    </div>
                    <button class="boton-popup" id="cerrar" onclick="cerrarForm('popup-caja','presets-form')">Cerrar</button>
                </div>
            </div>
            <div class="overlay visibilidad-oculta" id="popup-caja-editar">
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

        if(isset($_GET['err'])){ // Si desde eliminarPreset.php se devuelve error de un evento dependiendo de un preset eliminado, muestra una alerta.
            if($_GET['err']=="fk"){
                echo '<script type="text/javascript">alert("⛔ No se puede eliminar, ya que hay al menos un evento que depende de este preset.")</script>';
            }
        }
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
