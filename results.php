<?php include 'database.php'; 

// Generar un array que contenga todos los datos del evento de ID igual al QueryString del URL

$buscaEvent = "SELECT * FROM eventos WHERE id = '".$_GET['id']."'";
$result = mysqli_query($conn, $buscaEvent);
$infoEvento = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Ahora busca las propiedades del preset del evento hallado

$buscaPreset = "SELECT * FROM presets WHERE id = '".$infoEvento[0]["preset"]."' ";
$result = mysqli_query($conn, $buscaPreset);
$infoPreset = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="results.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;900&family=Work+Sans:wght@900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="assets/JoystickFAVICON64.png">
    <title>Evento | PlayToWin</title>
</head>

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
            <a href="login.html"><img id="logout-icono" src="assets\logoutIcon.svg"></a>
        </div>
    </div>

    <div class="box_contenedor">
        <div id="Info" class="box_izq">
            <div>
                <p class="div-titulo"><?php echo $infoEvento[0]["nomEvento"];?></h1>
                <p class="div-subtitulo"><?php echo $infoPreset[0]["nomJuego"];?></h2>
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
                <img class="logo-evento" src="<?php echo $infoPreset[0]["portada"];?>">
            </div>
            <div class="box-evento-b-2-2">
                <div>
                    <img class="logo_participantes" src="assets\usuariosIcono.png">
                </div>
                <div class="jugadores-evento">
                    <p><?php echo $infoEvento[0]["cantUsuarios"];?></p>
                </div>
            </div>

        
    </div>


</html>