<?php 
        include 'auxPHP/header.php';
    function GenerarPag(){
        $head = genHeader("Login | Play to Win",'css/login.css',"js/InfoEvent.js");

        if (isset($_GET['err'])){
            if ($_GET['err']=='denegado'){
                $cartelError = "<p class='bad'>EL USUARIO O CONTRASEÑA SON INCORRECTOS</p>";
            }elseif($_GET['err']=='yaexiste'){
                $cartelError = "<p class='bad'>YA EXISTE UN USUARIO CON ESE EMAIL. INICIA SESIÓN.</p>";
            }
        }else{$cartelError = "";
        }
        

        $body = <<<BODY
            <body>
                <a id="encabezado"><img id="logo" src="assets\playtowinICONO.png"></a>
                <form action='auxPHP/validarlogin.php' method="post" onsubmit="return validardatos('box-login','nom01', 'ape01')" name="Datos" id="box-login">
                    <p class="titulo">Accede a tu cuenta</p>
                    <label for="nom01" class="datos-titulo">Email:</label>
                    <input required type="email" class="datos-caja" name="usuario" id="nom01" placeholder="usuario@email.com"/>
                    <label for="ape01" class="datos-titulo">Contraseña:</label>
                    <input required type="password" class="datos-caja" name="pass" id="ape01" placeholder="Ingresa tu contraseña aquí"/>
                    $cartelError
                    <input type="submit" class="datos-registro" value="INICIAR SESIÓN" id="boton-submit">
                    <a href="signup.php" id="yatienecuenta">¿No tienes una cuenta aún? <b>CREA TU CUENTA AQUÍ</b></a>
                </form>
            </body>
        BODY;
        $paginalog= <<<SITIO
        <!DOCTYPE html>
        <html lang="es">
        $head
        $body
        </html>
        SITIO;
        echo($paginalog);
    }
function main(){
    GenerarPag();
}
main();
?>