<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="presets.css" rel="stylesheet">
    <script language="javascript" type="text/javascript" src="Javapresets.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/JoystickFAVICON64.png">
    <title>presets | Admin Panel</title>
</head>
<body>
    <div id="encabezado">
        <a href="../home.html" id="logo"><img id="logo" src="../assets/playtowinICONO.png"></a>
        <div id="header-div1">
            <h1 class="titulo">MENÚ DE PRESETS DE EVENTOS</h1>
            <button id="bot-new" onclick="abrir('popup-caja')">+ AÑADIR PRESET</button>
            <button id="bot-presets" onclick="window.location.href = 'dashboard.html';">REGRESAR AL ADMIN PANEL</button>
        </div>
        <a href="../login.php" id="logoutDiv"><img id="logout-icono" src="../assets/logoutIcon.svg">
        <p class="cerrarsesion">CERRAR SESIÓN</p></a>
    </div>
    
    <div id="cont-eventos">
        <div class="overlay visibilidad-oculta" id="popup-caja">
            <div class="popup">
                <h1 id="titulo-popup">Participa:</h1>
                <form onsubmit="return validardatos('Datos', 'nom01', 'datos01')" name="Datos" id="Datos-forms"  method="post">
                    <div class="contenedor-input" name="001" id="nom02">
                        <label for="nom01" class="dato-input">Nombre del juego:</label>
                        <input type="email" class="caja-input"  name="nom01" placeholder="Valorant">
                        <label for="datos01" class="dato-input">Imagen:</label>
                        <input type="text" class="caja-input" name="datos01" id="imagen-popup" placeholder="url">
                    </div>
                    <input type="submit"  name= 'hola' class="boton-popup" value="Enviar">
                </form>
                <button class="boton-popup" id="cerrar" onclick="cerrar('popup-caja')">Cerrar</button>
            </div>
        </div>
        <div id="caja-preset-cont">
            <div class="box-evento">
                <div class="box-evento-a">
                    <img class="portada-evento" src="../assets/portadas/CRPortada1.png">
                </div>
                <div class="box-evento-b">
                    <div class="box-evento-b-1">
                        <p class="titulo-evento">Clash Royale</p>
                    </div>
                    <div class="box-evento-b-2">
                        <div class="box-evento-b-2-1">
                            
                        </div>
                    </div>
                </div>
                <div class="box-evento-c">
                    <div class="box-evento-c-1">
                        <div class="box-evento-c-1-1">
                            <button class="boton-editar" onclick="abrir('popup-caja')">EDITAR PRESET</button>  
                        </div>
                        <div class="box-evento-c-1-2">
                            <button class="boton-eliminar" onclick="fun()">ELIMINAR PRESET</button> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>