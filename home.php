<?php include 'database.php'; 
$eventosActivos = listaEventos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="home.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets\JoystickFAVICON64.png">
    <title>Home | Play to Win</title>
</head>
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
            <a href="login.html"><img id="logout-icono" src="assets\logoutIcon.svg"></a>
        </div>
    </div>
    <div class="contenedor">
        <p class="titulo-principal">COMPETENCIAS</p>
        <div class="contenedor_eventos">
            <?php foreach($eventosActivos as $evento): ?>
            <?php
            $infoPreset = buscaPreset($evento["preset"]);
            ?>
            <div class="tarjeta-evento" id="ev_01" onclick="window.location.href = '<?php echo 'InfoEvent.php?id='.$evento["id"];?>';">
                <div class="info-tarjeta">
                    <p class="nombre-evento"><?php echo $evento["nomEvento"];?></p>
                    <p class="label-juego"><?php echo $infoPreset[0]["nomJuego"];?></p>
                    <p class="participa-boton">Participa</p>
                 </div>
                <div class="back-portada"><img class="portada-evento" src=<?php echo $infoPreset[0]["portada"];?>></div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</body>
</html>