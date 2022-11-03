<?php 
    require_once 'database.php'; 
    require_once 'header.php';
    require_once 'tarjetas.php';
    $head = genHeader("Home | Play to Win");
    $tarjetas = genTarjetas("ACTIVOS");
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
                <img id="perfil-logo" src="assets\profileCircle.svg">
                <a href="adminPanel/dashboard.html"> <img id="open-menu-perfil" src="assets\dropDownArrow.svg"></a>
                <a href="login.php"><img id="logout-icono" src="assets\logoutIcon.svg"></a>
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

    print("<html>");
    print($head);
    print($body);
    print("</html>");
?>
