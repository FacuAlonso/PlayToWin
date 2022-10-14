<?php include 'database.php'; 

// Generar un array que contenga todos los datos del evento de ID igual al QueryString del URL

$buscaEvent = "SELECT * FROM eventos WHERE id = '".$_GET['id']."'";
$result1 = mysqli_query($conn, $buscaEvent);
$infoEvento = mysqli_fetch_all($result1, MYSQLI_ASSOC);

// Ahora busca las propiedades del preset del evento hallado

$buscaPreset = "SELECT * FROM presets WHERE id = '".$infoEvento[0]["preset"]."' ";
$result2 = mysqli_query($conn, $buscaPreset);
$infoPreset = mysqli_fetch_all($result2, MYSQLI_ASSOC);

// Retornar lista de participantes

$buscaJugadores = "SELECT * FROM participaciones WHERE evento = '".$_GET['id']."' ORDER BY puntaje DESC";
$resultJugadores = mysqli_query($conn, $buscaJugadores);
$lstJugadores = mysqli_fetch_all($resultJugadores, MYSQLI_ASSOC);

$cantJugadores = count($lstJugadores);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="InfoEvent.css" rel="stylesheet">
    <script language="javascript" type="text/javascript" src="InfoEvent.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/JoystickFAVICON64.png">
    <title><?php echo $infoEvento[0]["nomEvento"];?> | PlayToWin</title>
</head>

<body onload="contador('<?php echo $infoEvento[0]["fechaFinal"];?>');">
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
                    <?php foreach($lstJugadores as $jugador): ?>
                    <p><?php echo $jugador["nickJugador"]." -> ". $jugador["puntaje"]." puntos";?></p>
                    <?php endforeach;?>
                </div>
                <button class="boton-popup" id="cerrar" onclick="cerrar('popup-caja-2')">Cerrar</button>
            </div>
        </div>
        <div id="Info" class="box_izq">
            <p class="div-titulo"><?php echo $infoEvento[0]["nomEvento"];?></p>
            <p class="div-subtitulo"><?php echo $infoPreset[0]["nomJuego"];?></p>

            <div id= Descripcion class="box-descripcion" >
                <p id= "t1" class="Descripcion-datos" >Descripción</p>
                <p class="Descripcion-datos"><?php echo $infoEvento[0]["descEvento"];?></p>
            </div>
            <div id="Reglas" class=box-reglas >
                <p id="t1">Reglas</p>
                <p class="Descripcion-datos"><?php echo $infoEvento[0]["reglasEvento"];?></p>
            </div>
        </div>
        <div class="box_derecha">
            <div class="box_logo_evento">
                <img class="logo-evento" src="<?php echo $infoPreset[0]["portada"];?>">
            </div>
            <div class="box-botones">
            <button id="bot-participar" class="boton_participar" onclick="abrir('popup-caja')">PARTICIPAR</button>
            </div>
            <div class="box-evento-b-2-2" id="cont-cant-jugadores">
                <div>
                    <img class="logo_participantes" src="assets\usuariosIcono.png">
                </div>
                <div class="jugadores-evento">
                    <p><?php echo $cantJugadores;?></p>
                </div>
            </div>
            <div class="box-fecha">
                <p class="centrarTXT" id="titulo-contador">El evento finaliza en: </p>
                <p class="centrarTXT" id="contador-cierre">Cargando...</p>
            </div>
            <div>
                <button class="boton_participantes" onclick="abrir('popup-caja-2')" href="#">Ver participantes</button>
                <a href="<?php echo 'results.php?id='.$infoEvento[0]["id"];?>" ><button id="bot-res" class="boton_resultados no-mostrar" href="#">Resultados</button></a>
            </div>
        </div>
    </div>

</body>
</html>
