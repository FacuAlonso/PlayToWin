<?php 
    require_once 'auxPHP/database.php'; 
    require_once 'auxPHP/header.php';
    require_once 'auxPHP/tarjetas.php';

function mostrarPagina(){
    $head = genHeader("Home | Play to Win","css/home.css",NULL); //Titulo,CSS,JS
    if (isset($_GET['res']) && $_GET['res']=="1"){
        $tarjetas = genTarjetas("FINALIZADOS"); // Función de tarjetas.php
        $t_principal = "COMPETENCIAS FINALIZADAS";
    } else{
        $tarjetas = genTarjetas("ACTIVOS"); // Función de tarjetas.php
        $t_principal = "COMPETENCIAS ACTIVAS";
    }

    if($_SESSION['tipo']==1){
        $botonAdmin = "<a href=adminPanel/dashboard.php><p class='participa-boton'>Admin Panel</p></a>";
    } else{
        $botonAdmin = "";
    }
    
    $body = <<<BODY
    <body>
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
        <div class="contenedor">
            <p class="titulo-principal">$t_principal</p>
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
