<?php
include 'header.php';
$head = genHeader("Login | Play to Win",'signup.css',"InfoEvent");

$body = <<<BODY
        <body>
            <a id="encabezado"><img id="logo" src="assets\playtowinICONO.png"></a>
            <form  onsubmit="return ValidarSingUp('box-login','nom01', 'ape01', 'clv01')" action='altausuario.php' method="post" id="box-login">
                <p class="titulo">Crea tu cuenta</p>
                <label for="nom01" class="datos-titulo">Email:</label>
                <input type="email" class="datos-caja" name="usuario" id="nom01" placeholder="usuario@email.com" required/>
                <label for="ape01" class="datos-titulo">Contraseña:</label>
                <input type="password" class="datos-caja" name="pass" id="ape01" placeholder="8 caracteres, combinación de números y letras" required
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contenter 8 caracteres al menos, y debe ser combinación de números, minúsculas y mayúsculas."/>
                <label for="clv01" class="datos-titulo">Confirma tu contraseña:</label>
                <input type="password" class="datos-caja" name="clave" id="clv01" placeholder="Confirma la contraseña ingresada"/>
                <input type="submit" class="datos-registro" value="REGISTRARSE" id="boton-submit">
                <a href="login.php" id="yatienecuenta">¿Ya tienes una cuenta? <b>INICIA SESIÓN</b></a>
            </form>
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
?>