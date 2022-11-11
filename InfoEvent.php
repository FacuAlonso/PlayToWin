<?php 
require_once 'database.php'; 
require_once 'header.php';

$infoEvento = buscaEvento($_GET['id']);
$infoPreset = buscaPreset($infoEvento[0]["preset"]);
$lstJugadores = listaJugadores($_GET['id']);
$cantJugadores = count($lstJugadores);
$nomEvento = $infoEvento[0]["nomEvento"];
$fechaFinal = $infoEvento[0]["fechaFinal"];
$nomJuego = $infoPreset[0]["nomJuego"];
$idEvento = $infoEvento[0]["id"];
$descripcion = $infoEvento[0]["descEvento"];
$reglas= $infoEvento[0]["reglasEvento"];;
$portada = $infoPreset[0]["portada"];

$head = genHeader("$nomEvento | Play to Win","InfoEvent.css","InfoEvent");

function puntajes(){
    foreach ($GLOBALS['lstJugadores'] as $jugador):;
        echo $jugador["nickJugador"]." -> ". $jugador["puntaje"]." puntos";
    endforeach;
}

$lstPuntajes = puntajes();

$body = <<<BODY
<body onload="contador('$fechaFinal');">
    <div id="encabezado">
        <div id="marca">
            <a href="home.php"><img id="logo" src="assets\playtowinICONO.png"></a>
        </div>
        <div id="datos">
            <a href="#"><img class="navegador_boton" src="assets\Resultados.png"></a>
            <a href="#"><img class="navegador_boton" src="assets\Competencias.png"></a>
        </div>
        <div id="perfil-div">
            <img id="perfil-logo" src="assets\profileCircle.svg">
            <img id="open-menu-perfil" src="assets\dropDownArrow.svg">
            <a href="login.php"><img id="logout-icono" src="assets\logoutIcon.svg"></a>
        </div>
    </div>
    <div class="box_contenedor">
        <div class="overlay visibilidad-oculta" id="popup-caja">
            <div class="popup">
                <h1 id="titulo-popup">Participa:</h1>
                <form onsubmit="return validardatos('Datos', 'nom01', 'datos01')" name="Datos" id="Datos-forms"  method="post">
                    <div class="contenedor-input" name="001" id="nom02">
                        <label for="nom01" class="dato-input">Jugador:</label>
                        <input type="email" class="caja-input"  name="nom01" placeholder="Tu nombre dentro del juego">
                        <label for="datos01" class="dato-input">Puntaje (sólo números):</label>
                        <input type="text" class="caja-input" name="datos01" id="puntaje" placeholder="Ej: 20" pattern="^[1-9]\d*$">
                    </div>
                    <input type="submit"  name= 'hola' class="boton-popup" value="Enviar">
                </form>
                <button class="boton-popup" id="cerrar" onclick="cerrar('popup-caja')">Cerrar</button>
            </div>
        </div>
        <div class="overlay visibilidad-oculta" id="popup-caja-2"> <!-- pop up de ver participantes -->
            <div class="popup">
                <h1 id="titulo-popup-2">Participantes:</h1>
                <div class="datos-popup">
                    $lstPuntajes
                </div>
                <button class="boton-popup" id="cerrar" onclick="cerrar('popup-caja-2')">Cerrar</button>
            </div>
        </div>
        <div id="Info" class="box_izq">
            <p class="div-titulo">$nomEvento</p>
            <p class="div-subtitulo">$nomJuego</p>

            <div id= Descripcion class="box-descripcion" >
                <p id= "t1" class="Descripcion-datos" >Descripción</p>
                <p class="Descripcion-datos">$descripcion</p>
            </div>
            <div id="Reglas" class=box-reglas >
                <p id="t1">Reglas</p>
                <p class="Descripcion-datos">$reglas</p>
            </div>
        </div>
        <div class="box_derecha">
            <div class="box_logo_evento">
                <img class="logo-evento" src="$portada">
            </div>
            <div class="box-botones">
            <button id="bot-participar" class="boton_participar" onclick="abrir('popup-caja')">PARTICIPAR</button>
            </div>
            <div class="box-evento-b-2-2" id="cont-cant-jugadores">
                <div>
                    <img class="logo_participantes" src="assets\usuariosIcono.png">
                </div>
                <div class="jugadores-evento">
                    <p>$cantJugadores</p>
                </div>
            </div>
            <div class="box-fecha">
                <p class="centrarTXT" id="titulo-contador">El evento finaliza en: </p>
                <p class="centrarTXT" id="contador-cierre">Cargando...</p>
            </div>
            <div>
                <button class="boton_participantes" onclick="abrir('popup-caja-2')" href="#">Ver participantes</button>
                <a href="$idEvento" ><button id="bot-res" class="boton_resultados no-mostrar" href="#">Resultados</button></a>
            </div>
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



