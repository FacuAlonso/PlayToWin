<?php
include('database.php');
function validacion(){
    $usuario=$_REQUEST['usuario'];
    $pass=$_REQUEST['apellido'];
    $resultado= Validarpass($usuario);
    if (empty($resultado)){
        Crearcuenta($usuario,$pass);
        header("Location: login.php");
    }
    else{
        header("Location: login.php");
    }
}
function main(){
    validacion();
}
main();
?>