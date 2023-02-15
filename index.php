
 <?php
 include 'auxPHP/header.php';
 
 function GenerarPag(){
    $head = genHeader("Play To Win",'css/index.css',"NULL");
    $body = <<<BODY
        <body>
            <div id="encabezado">
                <a href="../home.php" id="logo"><img id="logo" src="../assets/playtowinICONO.png"></a>
                <div id="header-div1">
                    <button class="boton-editar" onclick="window.location.href = 'login.php';">Iniciar Sesión</button>
                    <button class="boton-editar" onclick="window.location.href = 'signup.php';">Crear Cuenta</button>
                </div>
            </div>
            <div id="slogan1">
                <p class="titulo1">JUGAR. COMPETIR.  MEJORAR.</p>
                <img id="slogan1Img" src="assets\Joystick1Landing.gif">
            </div>

            <div id="slogan2">
                <video id="backvid" autoplay="" muted="" loop="" width="100%">
                    <source src="assets/vid/gamingStock.webm" type="video/mp4">
                </video>
                <p class="titulo2">ÚNETE A LA COMUNIDAD DE GAMERS MÁS GRANDE DE LATAM</p>
                
            </div>

            <div id="slogan1">
                <img id="slogan1Img" src="assets/nintendoSwitchCartoon.gif">
                <p class="titulo1">¡Sé parte de Play To Win!</p>
            </div>

            <button class="boton-editar" onclick="window.location.href = 'signup.php';">¡Únete ahora!</button>


        </body>
        BODY;
    $sitio= <<<Sitio
        <!DOCTYPE html>
            <html lang="es">
            $head
            $body
            </html>
        Sitio;
    echo($sitio);

}
function main(){
    session_start(); 
    if(isset($_SESSION['tipo'])){        //SuperVariable (Global) 
        header("Location: home.php");
    }
    GenerarPag();
}
main();
?>