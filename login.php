<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="login.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script language="javascript" type="text/javascript" src="InfoEvent.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets\JoystickFAVICON64.png">
    <title>Login | PlayToWin</title>
</head>
<body>
    <a href="home.php" id="encabezado"><img id="logo" src="assets\playtowinICONO.png"></a>
    <form action="validarlogin.php" method="post" onsubmit="return validardatos('box-login','nom01', 'ape01')" name="Datos" method="get" id="box-login">
        <p class="titulo">Accede a tu cuenta</p>
        <label for="nom01" class="datos-titulo">Email:</label>
        <input type="email" class="datos-caja" name="nombre" id="nom01" placeholder="usuario@email.com"/>
        <label for="ape01" class="datos-titulo">Contraseña:</label>
        <input type="password" class="datos-caja" name="apellido" id="ape01" placeholder="Ingresa tu contraseña aquí"/>
        <input type="submit" class="datos-registro" value="INICIAR SESIÓN" id="boton-submit">
        <a href="recuperarpass\request.html" id="olvidocuenta">¿Haz olvidado tu contraseña? <b>RECUPÉRALA AQUÍ</b></a>
        <a href="signup.html" id="yatienecuenta">¿No tienes una cuenta aún? <b>CREA TU CUENTA AQUÍ</b></a>
    </form>
</body>
</html>