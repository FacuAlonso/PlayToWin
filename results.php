<?php 
include 'database.php'; 
require_once 'header.php';
function mostrarPagina(){
    $infoEvento=buscaEvento($_GET['id']);
    $infoPreset=buscaPreset($infoEvento[0]["preset"]);
    $Jugadores= $infoEvento[0]["cantUsuarios"];
    $imagen = $infoPreset[0]["portada"];
    $nomEvento= $infoEvento[0]["nomEvento"];
    $nomJuego = $infoPreset[0]["nomJuego"];


    $head = genHeader("Resultados | Play to Win",'results.css',"InfoEvent");


    $body = <<<Body
    <body>

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
                <a href="cerrarsesion.php"><img id="logout-icono" src="assets\logoutIcon.svg"></a>
            </div>
        </div>

        <div class="box_contenedor">
            <div id="Info" class="box_izq">
                <div>
                    <p class="div-titulo">$nomEvento</h1>
                    <p class="div-subtitulo">$nomJuego</h2>
                </div>
                <div id= Tabla class="box-ranking" >
                    <p class="tabla-titulo">GANADORES</p>
                    <div class ="column-positions">
                        <div class="conteiner-info">1°</div>
                        <div class="conteiner-info">JUGADOR </div>
                        <div class="conteiner-info">40</div>
                    </div>
                    <div class ="column-positions">
                        <div class="conteiner-info">2°</div>
                        <div class="conteiner-info">JUGADOR</div>
                        <div class="conteiner-info">38</div>
                    </div>
                    <div class ="column-positions">
                        <div class="conteiner-info">3°</div>
                        <div class="conteiner-info">JUGADOR </div>
                        <div class="conteiner-info">36</div>
                    </div>
                        

                </div>
            </div>
            <div class="box_derecha">
                <div class="box_logo_evento">
                    <img class="logo-evento" src="$imagen">
                </div>
                <div class="box-evento-b-2-2">
                    <div>
                        <img class="logo_participantes" src="assets\usuariosIcono.png">
                    </div>
                    <div class="jugadores-evento">
                        <p>$Jugadores</p>
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