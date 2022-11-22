<?php 
    require_once 'database.php'; 
    require_once 'header.php';
    require_once 'tarjetas.php';

function mostrarPagina(){
    $head = genHeader("Home | Play to Win","home.css",NULL); //Titulo,CSS,JS
    $tarjetas = genTarjetas("ACTIVOS"); // Función de tarjetas.php
    $body = <<<BODY
    <body>
        <div id="encabezado">
            <div id="marca">
                <a href="home.php"><img id="logo" src="assets\playtowinICONO.png"></a>
            </div>
            <div id="datos">
                <a href="#"><img class="navegador_boton" src="assets\Resultados.png"></a>
                <a href=""><img class="navegador_boton" src="assets\Competencias.png"></a>
            </div>
            <div id="perfil-div">
                <a href="cerrarsesion.php"><img id="logout-icono" src="assets\logoutIcon.svg"></a>
            </div>
        </div>
        <div class="contenedor">
            <p class="titulo-principal">COMPETENCIAS</p>
            <div class="contenedor_eventos">
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
};
function main(){
    session_start(); 
    if(!isset($_SESSION['tipo'])){
        header("Location: login.php");
    }
    mostrarPagina();  
}
main();
?>
