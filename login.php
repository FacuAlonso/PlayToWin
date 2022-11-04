<?php 
    include 'header.php';
    $head = genHeader("Login | Play to Win");

    $body = <<<BODY
        <body>
            <a href="home.php" id="encabezado"><img id="logo" src="assets\playtowinICONO.png"></a>
            <form action='validarlogin.php' method="post" onsubmit="return validardatos('box-login','nom01', 'ape01')" name="Datos" id="box-login">
                <p class="titulo">Accede a tu cuenta</p>
                <label for="nom01" class="datos-titulo">Email:</label>
                <input type="email" class="datos-caja" name="nombre" id="nom01" placeholder="usuario@email.com"/>
                <label for="ape01" class="datos-titulo">Contraseña:</label>
                <input type="password" class="datos-caja" name="apellido" id="ape01" placeholder="Ingresa tu contraseña aquí"/>
                <input type="submit" class="datos-registro" value="INICIAR SESIÓN" id="boton-submit">
                <a href="signup.html" id="yatienecuenta">¿No tienes una cuenta aún? <b>CREA TU CUENTA AQUÍ</b></a>
            </form>
        </body>
    BODY;
    echo($body);
?>