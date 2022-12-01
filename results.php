<?php 
require_once 'auxPHP/database.php'; 
require_once 'auxPHP/header.php';
function mostrarPagina(){
    $id=$_GET['id'];
    $infoEvento=buscaEvento($id);
    $infoPreset=buscaPreset($infoEvento[0]["preset"]);
    $imagen = $infoPreset[0]["portada"];
    $nomEvento= $infoEvento[0]["nomEvento"];
    $nomJuego = $infoPreset[0]["nomJuego"];
    if($infoEvento[0] === NULL || $infoEvento[0]['estado']!="finalizado"){
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . "/404.html");
        die;
    }
    $head = genHeader("Resultados | Play to Win",'css/results.css',"js/InfoEvent.js");
    $lstJugadores = listaJugadores($_GET['id']);
    $cantJugadores = count($lstJugadores);

    function puntajes($lstJugadores){
        $res = "";
        $i = 1;
        foreach ($lstJugadores as $jugador):
            $posicion = $i;
            $classPodio = "";
            $txtPodio = "conteiner-info";
            if($i==1){
                $classPodio = "primer-lugar";
                $txtPodio .= " txt-podio";
            }
            elseif($i==2){
                $classPodio = "segundo-lugar";
                $txtPodio .= " txt-podio";
            }
            elseif($i==3){
                $classPodio = "tercer-lugar";
                $txtPodio .= " txt-podio";
            }

            $nickname = $jugador['nickJugador'];
            $puntaje = $jugador['puntaje'];

            $resultados = <<<ENTRADA
            <div class ="column-positions $classPodio">
                <div class="$txtPodio">$posicion</div>
                <div class="$txtPodio">$nickname </div>
                <div class="$txtPodio">$puntaje</div>
            </div>
            ENTRADA;
            $res.=$resultados;
            $i++;
        endforeach;
        return $res;
    }

    if($cantJugadores!=0){
        $resultados = puntajes($lstJugadores);
    } else{
        $resultados = "<p class='div-titulo centrar-txt'>En este evento no hubo participantes</p>";
    }

    if($_SESSION['tipo']==1){
        $botonAdmin = "<a href=adminPanel/dashboard.php><p class='participa-boton'>Admin Panel</p></a>";
    } else{
        $botonAdmin = "";
    }

    $body = <<<Body
    <body>

        <div id="encabezado">
            <div id="marca">
                <a href="home.php"><img id="logo" src="assets\playtowinICONO.png"></a>
            </div>
            <div id="datos">
                <a href="home.php"><img class="navegador_boton" src="assets\Competencias.png"></a>
                <a href="#"><img class="navegador_boton" src="assets\Resultados.png"></a>
            </div>
            <div id="perfil-div">
                $botonAdmin
                <a href="auxPHP/cerrarsesion.php"><img id="logout-icono" src="assets\logoutIcon.svg"></a>
            </div>
        </div>

        <div class="box_contenedor">
            <div id="Info" class="box_izq">
                <div id= Informacion>
                    <p class="div-titulo">$nomEvento</h1>
                    <p class="div-subtitulo">$nomJuego</h2>
                </div>
                <div id= Tabla class="box-ranking" >
                    <p class="tabla-titulo">POSICIONES FINALES</p>
                    $resultados
                </div>
            </div>
            <div class="box_derecha">
                <div class="box_logo_evento">
                    <img class="logo-evento" src="$imagen">
                </div>
                <div class="box-evento-b-2-2">
                    <div class="jugadores-evento">
                    </div>
                </div>

            
        </div>
    </body>
    Body;

    $paginaresult= <<<Sitio
    <!DOCTYPE html>
    <html lang="es">
    $head
    $body
    </html>
    Sitio;
    echo($paginaresult);
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