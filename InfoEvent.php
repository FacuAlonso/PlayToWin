<?php 
require_once 'auxPHP/database.php'; 
require_once 'auxPHP/header.php';

function mostrarPagina(){
    
    $infoEvento = buscaEvento($_GET['id']);

    if($infoEvento[0] === NULL){
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . "/404.php");
        die;
    }

    $infoPreset = buscaPreset($infoEvento[0]["preset"]);
    $lstJugadores = listaJugadores($_GET['id']);
    $cantJugadores = count($lstJugadores);
    $nomEvento = $infoEvento[0]["nomEvento"];
    $fechaFinal = $infoEvento[0]["fechaFinal"];
    $nomJuego = $infoPreset[0]["nomJuego"];
    $idEvento = $infoEvento[0]["id"];
    $descripcion = $infoEvento[0]["descEvento"];
    $reglas= $infoEvento[0]["reglasEvento"];
    $portada = $infoPreset[0]["portada"];
    $idUsuario = getUsrID($_SESSION["usuario"]);
    $estado = $infoEvento[0]["estado"];
    $participacion = buscaParticipante($idEvento,$idUsuario);

    $head = genHeader("$nomEvento | Play to Win","css/InfoEvent.css","js/InfoEvent.js");

    if($participacion==NULL){
        // Se usa HEREDOC para poder utilizar "" en onclick
        $botParticipar = <<<TARJETA
        <button id='bot-participar' class='boton_participar no-mostrar' onclick="agregarClase('popup-caja', 'visibilidad')">PARTICIPAR</button> 
        TARJETA; 
    } else{
        $botParticipar = "<button id='bot-participar' class='boton_participar_2'>YA ESTÁS PARTICIPANDO</button>";
        if ($participacion[0]['descalificado'] == 1){
            $botParticipar = "<button id='bot-participar' class='boton_participar_3'>ESTÁS DESCALIFICADO/A</button>";
        }
    }

    function puntajes($lstJugadores){
        $res = "";
        foreach ($lstJugadores as $jugador):
            $res.= "<p>".$jugador["nickJugador"]." ⮕ ". $jugador["puntaje"]." puntos </p>";
        endforeach;
        return $res;
    }

    if($cantJugadores!=0){
        $lstPuntajes = puntajes($lstJugadores);
    } else{
        $lstPuntajes = "No hay participantes inscritos en este evento";
    }

    if($estado == "activo"){
        $contadorTXT = <<<CONTADOR
        <p class="centrarTXT" id="titulo-contador">El evento finaliza en: </p>
        <p class="centrarTXT" id="contador-cierre">Cargando...</p>
        CONTADOR;
    }elseif($estado == "finalizado"){
        $contadorTXT = <<<CONTADOR
        <p class="centrarTXT" id="titulo-contador">Evento finalizado</p>
        CONTADOR;
    }
    

    if($_SESSION['tipo']==1){
        $botonAdmin = "<a href=adminPanel/dashboard.php><p class='participa-boton'>Admin Panel</p></a>";
    } else{
        $botonAdmin = "";
    }

    $body = <<<BODY
    <body onload="contador('$fechaFinal');">
        <div id="encabezado">
            <div id="marca">
                <a href="home.php"><img id="logo" src="assets\playtowinICONO.png"></a>
            </div>
            <div id="datos">
                <a href="home.php"><img class="navegador_boton" src="assets\Competencias.png"></a>
                <a href="home.php?res=1"><img class="navegador_boton" src="assets\Resultados.png"></a>
            </div>
            <div id="perfil-div">
             $botonAdmin
                <a href="auxPHP/cerrarsesion.php"><img id="logout-icono" src="assets\logoutIcon.svg"></a>
            </div>
        </div>
        <div class="box_contenedor">
            <div class="overlay visibilidad-oculta" id="popup-caja">
                <div class="popup">
                    <h1 id="titulo-popup">Participa:</h1>
                    <form onsubmit="return validardatos('Datos', 'nom01', 'datos01')" name="Datos" id="Datos-forms" action="adminPanel/cargaDatosAdmin/nuevaParticipacion.php" method="post">
                        <div class="contenedor-input" name="001" id="nom02">
                            <label for="nom01" class="dato-input">Jugador:</label>
                            <input type="text" class="caja-input" name="nick" placeholder="Tu nombre dentro del juego" required>
                            <label for="datos01" class="dato-input">Puntaje (sólo números):</label>
                            <input type="number" class="caja-input" name="puntaje" id="puntaje" placeholder="Ej: 20" pattern="^[1-9]\d*$" required>
                            <input type="text" class="no-mostrar" value="$idEvento" name="idEvento">
                            <input type="text" class="no-mostrar" value="$idUsuario" name="idUsuario">
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
                $botParticipar
                </div>
                <div class="box-evento-b-2-2 no-mostrar" id="cont-cant-jugadores">
                    <div>
                        <img class="logo_participantes" src="assets\usuariosIcono.png">
                    </div>
                    <div class="jugadores-evento">
                        <p>$cantJugadores</p>
                    </div>
                </div>
                <div class="box-fecha">
                    $contadorTXT
                </div>
                <div>
                    <button class="boton_participantes" onclick="agregarClase('popup-caja-2', 'visibilidad')" href="#">Ver participantes</button>
                    <a href="results.php?id=$idEvento" ><button id="bot-res" class="boton_resultados no-mostrar" href="#">Resultados</button></a>
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
}
function main(){
    session_start(); 
    if(isset($_SESSION['usuario'])==FALSE){
        header("Location: login.php");
    }
    mostrarPagina();  
}
main();
?>